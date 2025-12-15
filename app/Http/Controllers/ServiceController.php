<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Public: Display all services
     */
    public function publicIndex()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    /**
     * Public: Show a specific service
     */
    public function publicShow($id)
    {
        $service = Service::findOrFail($id);
        return view('packages.book', compact('service'));
    }

    /**
     * Admin: Display all services
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'desc')->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Admin: Show a specific service
     */
    public function show($id)
    {
        $service = Service::with('bookings')->findOrFail($id);
        return view('admin.services.show', compact('service'));
    }

    /**
     * Admin: Show the form for creating a new service
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Admin: Store a newly created service
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
        ]);

        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price ?? 0,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Dienst aangemaakt!');
    }

    /**
     * Admin: Show the form for editing a service
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Admin: Update a service
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price ?? $service->price,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Dienst bijgewerkt!');
    }

    /**
     * Admin: Delete a service
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        
        // Check if service has bookings
        if ($service->bookings()->count() > 0) {
            return redirect()->route('admin.services.index')
                ->with('error', 'Deze dienst kan niet worden verwijderd omdat er boekingen voor zijn.');
        }
        
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Dienst verwijderd!');
    }
}
