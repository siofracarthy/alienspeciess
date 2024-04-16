<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Guides') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- <x-alert-success>
                {{ session('success') }}
            </x-alert-success> --}}

            {{-- <x-primary-button><a href="{{ route('guides.create') }}" class="btn-link btn-lg mb-2">Add a
                    Guide</a></x-primary-button> --}}

                @forelse ($guides as $guide)
                <div class="my-20 p-20 bg-green-600 border-b border-gray-200 shadow-sm sm:rounded-lg text-white">
                    <b class="font-bold text-2xl">
                        <a href="{{ route('guides.show', $guide) }}"> {{ $guide->title }} </a>
                    </b>
                    <p class="desc-small">{{ $guide->description }}</p>
                    @if ($guide->image)
                    <img src="{{ asset($guide->image) }}" alt="{{ $guide->title }}" width="100">
                @else
                    No Image
                @endif


                </div>
            @empty
                <p>No Species</p>
            @endforelse

        </div>
    </div>
</x-app-layout>

