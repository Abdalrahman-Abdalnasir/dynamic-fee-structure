<?php

namespace App\Http\Controllers;

use App\Models\FeePercentage;
use App\Models\FeePreset;
use App\Models\Service;
use App\Models\Threshold;
use Illuminate\Http\Request;

class FeePercentageController extends Controller
{
    // Display a listing of the fee percentages
    public function index()
    {
        $fees = FeePercentage::with(['feePreset', 'service', 'threshold'])->get();
        return view('fee_percentages.index', compact('fees'));
    }

    // Show the form for creating a new fee percentage
    public function create()
    {
        $presets = FeePreset::all();
        $services = Service::all();
        $thresholds = Threshold::all();
        return view('fee_percentages.create', compact('presets', 'services', 'thresholds'));
    }

    // Store a newly created fee percentage in storage
    public function store(Request $request)
    {
        $request->validate([
            'fee_preset_id' => 'required',
            'service_id' => 'required',
            'threshold_id' => 'required',
        ]);

        // Determine the percentage based on the threshold amount
        $threshold = Threshold::findOrFail($request->threshold_id);
        $percentage = $this->determinePercentage($threshold->amount); // Use a function to determine the percentage

        FeePercentage::create([
            'fee_preset_id' => $request->fee_preset_id,
            'service_id' => $request->service_id,
            'threshold_id' => $request->threshold_id,
            'percentage' => $percentage, // Ensure the percentage is not null
        ]);

        return redirect()->route('fee-percentages.index')->with('success', 'Fee percentage added successfully');
    }

    // Show the form for editing the specified fee percentage
    public function edit($id)
    {
        $fee = FeePercentage::findOrFail($id);
        $presets = FeePreset::all();
        $services = Service::all();
        $thresholds = Threshold::all();
        return view('fee_percentages.edit', compact('fee', 'presets', 'services', 'thresholds'));
    }

    // Update the specified fee percentage in storage
    public function update(Request $request, $id) {
        $request->validate([
            'fee_preset_id' => 'required',
            'service_id' => 'required',
            'threshold_id' => 'required',
            'percentage' => 'required|numeric'
        ]);

        $fee = FeePercentage::findOrFail($id);

        // Get the new threshold and determine the new percentage
        $threshold = Threshold::findOrFail($request->threshold_id);
        $percentage = $this->determinePercentage($threshold->amount); // Calculate the new percentage based on the threshold

        // Update the fee percentage with the new values
        $fee->update([
            'fee_preset_id' => $request->fee_preset_id,
            'service_id' => $request->service_id,
            'threshold_id' => $request->threshold_id,
            'percentage' => $percentage, // Update the percentage
        ]);

        return redirect()->route('fee-percentages.index')->with('success', 'Fee percentage updated successfully');
    }

    // Remove the specified fee percentage from storage
    public function destroy($id)
    {
        FeePercentage::destroy($id);
        return redirect()->route('fee-percentages.index')->with('success', 'Fee percentage deleted successfully');
    }

    // Calculate the fee based on the provided parameters
    public function calculate(Request $request)
    {
        $request->validate([
            'preset_id' => 'required',
            'service_id' => 'required',
            'total_spent' => 'required|numeric'
        ]);

        // Determine the percentage based on the total amount spent
        $percentage = $this->determinePercentage($request->total_spent);

        // Calculate the fee
        $fee = ($request->total_spent * $percentage / 100);

        return response()->json(['fee' => $fee]);
    }

    // Function to determine the percentage based on the total spent
    private function determinePercentage($totalSpent)
    {
        if ($totalSpent < 500) {
            return 5; // 5% for amounts less than 500
        } elseif ($totalSpent < 1000) {
            return 4; // 4% for amounts between 500 and 1000
        } else {
            return 3; // 3% for amounts greater than 1000
        }
    }

    // Function to get the threshold ID based on the total spent
    private function getThresholdId($totalSpent)
    {
        $threshold = Threshold::where('amount', '<=', $totalSpent)
            ->orderBy('amount', 'desc')
            ->first();

        return $threshold ? $threshold->id : null;
    }
}
