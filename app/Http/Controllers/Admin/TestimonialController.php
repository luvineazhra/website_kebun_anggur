<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Testimonial;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::with('user')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'is_approved' => 'nullable|boolean',
        ]);

        $testimonial->update(['is_approved' => $request->has('is_approved')]);

        return redirect()->route('admin.testimoni.index')->with('success', 'Status testimoni berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
