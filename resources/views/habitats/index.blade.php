<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Habitats') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- <x-alert-success>
                {{ session('success') }}
            </x-alert-success> --}}

                @forelse ($habitats as $habitat)
                <div class="my-20 p-20 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <b class="font-bold text-2xl">
                        <a href="{{ route('habitats.show', $habitat) }}"> {{ $habitat->title }} </a>
                    </b>
                    <p class="desc-small">{{ $habitat->description }}</p>

                </div>
            @empty
                <p>No Species</p>
            @endforelse

        </div>
    </div>
</x-app-layout>

