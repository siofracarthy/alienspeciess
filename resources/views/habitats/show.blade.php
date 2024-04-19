<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot> --}}

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-15 p-10 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td rowspan="1">
                                    <div class="display: flex; justify-content: center;"
                                        style="height: 600px; width: 1120px;">
                                        <!-- use the asset function, access the file $species->species_image in the folder storage/images -->
                                        <img src="{{ asset($habitat->species_image) }}" alt="{{ $habitat->title }}"
                                            style="height:100%; width:200%;">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-bold py-3" style="font-size: 2.5rem;">{{ $habitat->title }}</td>
                            </tr>

                            <td class="font-bold" style="font-size: 1.2rem;">Species    :
                                @if ($habitat->species)
                                    @foreach ($habitat->species as $specie)
                                        <a href="{{ route('species.show', $specie->id) }}">{{ $specie->title }}</a>
                                    @endforeach
                                @else
                                    No relevent habitat found.
                                @endif
                            </td>



                            <tr>
                                <td class="font-thin" style="font-size: 1.2rem;">
                                    {!! nl2br(preg_replace('/\n{2,}/', "\n", e($habitat->description))) !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
