<x-app-layout>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <h1 class="font-bold text-center text-black py-2" style="font-size: 2.9rem;">{{ __('All Habitats') }}</h1>


            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-10 py-8">
                @forelse ($habitats as $habitat)
                    <div class="bg-white py-9 px-5 border border-gray-200 shadow-sm rounded-lg flex"
                        style="border-radius: 8;">

                        <div class="ml-4 flex-grow">
                            <b class="font-bold">
                                <a href="{{ route('habitats.show', $habitat) }}"
                                    style="font-size: 1.7rem;">{{ implode(' ', array_slice(explode(' ', $habitat->title), 0, 3)) }}
                                </a>
                            </b>
                            <p class="mt-2">
                            <h3 class="font-bold text-1x1">
                                <p class="font-thin" style="font-size: 1rem;">
                                    {{ implode(' ', array_slice(explode(' ', $habitat->description), 0, 25)) }}</p>
                            </h3>
                            </p>
                        </div>
                    </div>
                @empty
                @endforelse
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
