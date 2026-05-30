@extends('layouts.app')

@section('title', 'Pelatihan - Kebun Anggur Jakarta Pusat')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Jadwal Pelatihan</h1>
            <p class="text-gray-600">Tingkatkan pengetahuan berkebun anggur Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($trainings as $training)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="h-48 bg-green-100 flex items-center justify-center">
                        @if($training->image)
                            <img src="{{ asset('storage/trainings/' . $training->image) }}" alt="{{ $training->title }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-6xl">📚</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $training->title }}</h3>
                        <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ Str::limit($training->description, 100) }}</p>
                        <div class="space-y-2 mb-4">
                            <p class="text-sm text-gray-500">📅 {{ \Carbon\Carbon::parse($training->schedule_date)->format('d M Y') }}</p>
                            <p class="text-green-600 font-bold">{{ $training->formatted_price }}/orang</p>
                            <p class="text-sm text-gray-500">Kuota: {{ $training->available_slots }} / {{ $training->max_participants }}</p>
                        </div>
                        <a href="{{ route('trainings.show', $training->id) }}" class="block w-full bg-green-600 text-white py-2 rounded text-center hover:bg-green-700 transition">Lihat Detail</a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500">
                    Tidak ada jadwal pelatihan
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $trainings->links() }}
        </div>
    </div>
</div>
@endsection