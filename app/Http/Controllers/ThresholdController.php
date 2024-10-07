<?php

namespace App\Http\Controllers;

use App\Models\Threshold;
use Illuminate\Http\Request;

class ThresholdController extends Controller
{
    public function index() {
        $thresholds = Threshold::all();
        return view('thresholds.index', compact('thresholds'));
    }

    public function create() {
        return view('thresholds.create');
    }

    public function store(Request $request) {
        $request->validate(['amount' => 'required|numeric']);
        Threshold::create($request->all());
        return redirect()->route('thresholds.index')->with('success', 'تم إضافة العتبة بنجاح');
    }

    public function edit($id) {
        $threshold = Threshold::findOrFail($id);
        return view('thresholds.edit', compact('threshold'));
    }

    public function update(Request $request, $id) {
        $request->validate(['amount' => 'required|numeric']);
        $threshold = Threshold::findOrFail($id);
        $threshold->update($request->all());
        return redirect()->route('thresholds.index')->with('success', 'تم تحديث العتبة بنجاح');
    }

    public function destroy($id) {
        Threshold::destroy($id);
        return redirect()->route('thresholds.index')->with('success', 'تم حذف العتبة بنجاح');
    }
}
