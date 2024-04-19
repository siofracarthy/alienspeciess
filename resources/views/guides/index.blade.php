<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Guides') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 py-5">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-12">
                    <div class="text-black py-12 ">
                        <h1 class="font-bold text-black py-2 text-center" style="font-size: 2.9rem;">
                            {{ __('All Guides') }}
                        </h1>
                        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-4 py-8">
                            @forelse ($guides as $guide)
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm flex flex-col my-2">
                                    <div class="h-48 relative">

                                        @if ($guide->guide_image)
                                            <img src="{{ asset($guide->guide_image) }}" alt="{{ $guide->title }}"
                                                class="object-cover w-full h-full">
                                        @else
                                            <div class="bg-gray-200 w-full h-full flex items-center justify-center">
                                                No Image
                                            </div>
                                        @endif

                                    </div>
                                    <div class="px-6 py-4">
                                        <b class="font-bold">
                                            <a href="{{ route('guides.show', $guide) }}"
                                                style="font-size: 1.4rem;">{{ implode(' ', array_slice(explode(' ', $guide->title), 0, 2)) }}</a>
                                        </b>
                                        <p class="font-thin" style="font-size: 1rem;">
                                            {{ implode(' ', array_slice(explode(' ', $guide->description), 0, 25)) }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">No Guide</p>
                            @endforelse
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="dividers bg-green-800">
        <div class="bg-green-600 max-w-7xl mx-auto sm:px-6 lg:px-8 py-8"></div>
    </div>
    <footer class="bg-green-800 text-white py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 flex flex-col lg:flex-row items-start">
            <div class="lg:mr-12">
                <h3 class="font-bold text-center lg:text-left" style="font-size: 2rem;">Invasive Alien Species</h3>
                <p class="font-thin max-w-xl text-center lg:text-left">
                    An invasive alien species refers to a plant, animal, or microorganism that is introduced to a new
                    environment and causes harm to native species, ecosystems, or human activities. They often
                    outcompete
                    native species for resources, disrupt ecosystems, and can have negative economic and ecological
                    impacts.
                </p>
            </div>
            <ul class="flex flex-col py-4 mx-4">
                <h3 class="text-center text-bold" style="font-size: 1.3rem;">Quick Links:</h3>
                <li class="text-thin py-1">
                    <a href="{{ route('species.index') }}" class="btn btn-link btn-lg px-5 py-2 rounded-lg mt-3"
                        style="font-size: 0.9rem;">View All Species</a>
                </li>

                <li class="text-thin  py-1">
                    <a href="{{ route('guides.index') }}" class="btn btn-link btn-lg px-5 py-2 rounded-lg mt-3"
                        style="font-size: 0.9rem;">View All Guides</a>
                </li>

                <li class="text-thin  py-1">
                    <a href="{{ route('habitats.index') }}" class="btn btn-link btn-lg px-5 py-2 rounded-lg mt-3"
                        style="font-size: 0.9rem;">View All Habitats</a>
                </li>

                <li class="text-thin  py-1">
                    <a href="{{ route('milestone.leaderboard') }}"
                        class="btn btn-link btn-lg px-5 py-2 rounded-lg mt-3" style="font-size: 0.9rem;">View
                        Leaderboard</a>
                </li>

                <li class="text-thin  py-1">
                    <a href="{{ route('profile.edit') }}" class="btn btn-link btn-lg px-5 py-2 rounded-lg mt-3"
                        style="font-size: 0.9rem;">View Profile</a>
                </li>
            </ul>
        </div>
    </footer>
</x-app-layout>


