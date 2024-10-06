<?php

namespace App\Http\Controllers;

use App\Models\FeePreset;
use Illuminate\Http\Request;

class FeePresetController extends Controller
{
    public function index() {
        $presets = FeePreset::all();
        return view('fee_presets.index', compact('presets'));
    }

    public function create() {
        return view('fee_presets.create');
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required']);
        FeePreset::create($request->all());
        return redirect()->route('fee-presets.index')->with('success', 'تم إضافة الإعداد المسبق بنجاح');
    }

    public function edit($id) {
        $preset = FeePreset::findOrFail($id);
        return view('fee_presets.edit', compact('preset'));
    }

    public function update(Request $request, $id) {
        $request->validate(['name' => 'required']);
        $preset = FeePreset::findOrFail($id);
        $preset->update($request->all());
        return redirect()->route('fee-presets.index')->with('success', 'تم تحديث الإعداد المسبق بنجاح');
    }

    public function destroy($id) {
        FeePreset::destroy($id);
        return redirect()->route('fee-presets.index')->with('success', 'تم حذف الإعداد المسبق بنجاح');
    }
}
