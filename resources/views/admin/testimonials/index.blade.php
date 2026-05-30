@extends('admin.layout')

@section('title', 'Kelola Testimoni')
@section('header', 'Kelola Testimoni')

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Testimoni</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rating</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($testimonials as $testimonial)
                <tr>
                    <td class="px-6 py-4 text-gray-800">{{ $testimonial->name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ Str::limit($testimonial->content, 50) }}</td>
                    <td class="px-6 py-4 text-yellow-500">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $testimonial->rating)
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded text-xs font-semibold {{ $testimonial->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $testimonial->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.testimoni.update', $testimonial->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <select name="is_active" class="border rounded px-2 py-1 text-sm" onchange="this.form.submit()">
                                <option value="1" {{ $testimonial->is_active ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ !$testimonial->is_active ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </form>
                        <form action="{{ route('admin.testimoni.destroy', $testimonial->id) }}" method="POST" class="inline ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada testimoni</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $testimonials->links() }}
</div>
@endsection