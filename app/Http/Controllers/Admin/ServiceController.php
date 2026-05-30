<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Service;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request): View
    {
        $query = Service::with('user');

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $services = $query->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.services.index', compact('services'));
    }

    public function show($id): View
    {
        $service = Service::with('user')->findOrFail($id);
        return view('admin.services.show', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $service->update(['status' => $request->status]);

        return redirect()->route('admin.layanan.index')->with('success', 'Status layanan berhasil diperbarui.');
    }
}
