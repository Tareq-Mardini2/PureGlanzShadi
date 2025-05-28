<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function CreateService()
    {
        return view('Admin.CreateService');
    }




    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads/services', 'public');
        }

        $service = new Service();
        $service->title = $validated['title'];
        $service->description = $validated['description'];
        $service->photo = $photoPath ?? null;
        $service->save();

        return redirect()->route('View.Services')->with('success', 'Service created successfully!');
    }

    public function ViewServices()
    {
        
        $services = Service::orderBy('created_at', 'asc')->get();
        
        return view('Admin.ViewServices', compact('services'));
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        if ($service->photo && Storage::disk('public')->exists($service->photo)) {
            Storage::disk('public')->delete($service->photo);
        }
        $service->delete();
        return redirect()->route('View.Services')->with('success', 'Service deleted successfully.');
    }












      public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('Admin.UpdateService', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => '|image|mimes:jpeg,png,jpg,webp|max:2048', // صورة اختيارية، بحد أقصى 2 ميغا
        ]);

        $service = Service::findOrFail($id);

        // تحديث الحقول
        $service->title = $request->title;
        $service->description = $request->description;

        // لو رفع صورة جديدة، نحذف القديمة ونرفع الجديدة
        if ($request->hasFile('photo')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($service->photo && Storage::disk('public')->exists($service->photo)) {
                Storage::disk('public')->delete($service->photo);
            }

            // تخزين الصورة الجديدة
            $service->photo = $request->file('photo')->store('uploads/services', 'public');
        }

        $service->save();

        return redirect()->route('View.Services')->with('success', 'Service updated successfully.');
    }
}
