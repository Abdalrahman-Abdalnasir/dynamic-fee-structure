<?php

// app/Http/Controllers/ServiceController.php
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create() {
        return view('services.create');
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required']);
        Service::create($request->all());
        return redirect()->route('services.index')->with('success', 'تم إضافة الخدمة بنجاح');
    }

    public function edit($id) {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id) {
        $request->validate(['name' => 'required']);
        $service = Service::findOrFail($id);
        $service->update($request->all());
        return redirect()->route('services.index')->with('success', 'تم تحديث الخدمة بنجاح');
    }

    public function destroy($id) {
        Service::destroy($id);
        return redirect()->route('services.index')->with('success', 'تم حذف الخدمة بنجاح');
    }
}
