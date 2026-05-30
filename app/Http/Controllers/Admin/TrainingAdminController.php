<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Training;
use App\Models\TrainingRegistration;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TrainingAdminController extends Controller
{
    public function index(): View
    {
        $trainings = Training::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.trainings.index', compact('trainings'));
    }

    public function create(): View
    {
        return view('admin.trainings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'schedule_date' => 'required|date|after_or_equal:today',
            'price_per_person' => 'required|numeric|min:0',
            'bonus_info' => 'nullable|string|max:255',
            'max_participants' => 'required|integer|min:1',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'training_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/trainings', $filename);
            $data['image'] = $filename;
        }

        Training::create($data);

        return redirect()->route('admin.pelatihan.index')->with('success', 'Jadwal pelatihan berhasil ditambahkan.');
    }

    public function edit($id): View
    {
        $training = Training::findOrFail($id);
        return view('admin.trainings.edit', compact('training'));
    }

    public function update(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'schedule_date' => 'required|date',
            'price_per_person' => 'required|numeric|min:0',
            'bonus_info' => 'nullable|string|max:255',
            'max_participants' => 'required|integer|min:1',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'training_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/trainings', $filename);
            $data['image'] = $filename;
        }

        $training->update($data);

        return redirect()->route('admin.pelatihan.index')->with('success', 'Jadwal pelatihan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();

        return redirect()->route('admin.pelatihan.index')->with('success', 'Jadwal pelatihan berhasil dihapus.');
    }

    public function registrations($id): View
    {
        $training = Training::findOrFail($id);
        $registrations = TrainingRegistration::with('user')->where('training_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return view('admin.trainings.registrations', compact('training', 'registrations'));
    }

    public function updateRegistration(Request $request, $id)
    {
        $registration = TrainingRegistration::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $registration->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }
}
