<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('packages.book', compact('service'));
    }

}
