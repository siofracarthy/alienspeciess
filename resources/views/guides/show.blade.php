<x-app-layout>
 <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{session('success') }}
            </x-alert-success>

            <div class="overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-15 p-10 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td rowspan="1">
                                    <div class="display: flex; justify-content: center;" style="height: 600px; width: 1120px;" >
                                        <!-- use the asset function, access the file $species->species_image in the folder storage/images -->
                                        <img src="{{ asset($guide->guide_image) }}" alt="{{ $guide->title }}"
                                        style="height:100%; width:200%;">
                                    </div>
                                </td>
                            </tr>
                            <div class="seperation">
                                <tr>
                                    <td class="font-bold" style="font-size: 2.5rem; padding-top:10px;">{{ $guide->title }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold py-1 " style="font-size: 1.2rem;">Publish Date:
                                        {{ $guide->date_of_publish }} </td>
                                </tr>
                                <tr>
                                    <td class="font-thin py-2" style="font-size: 1.2rem;">
                                        {{$guide->description}}
                                    </td>
                                </tr>
                            </div>
                        </tbody>


                    </table>

                    {{-- <x-primary-button><a href="{{ route('guide.edit', $guide) }}">Edit</a> </x-primary-button> --}}
                    {{-- <form action="{{ route('guide.destroy', $guide) }}" method="post"> --}}
                        @method('delete')
                        @csrf



                        {{-- <x-primary-button
                            onclick="return confirm('Are you sure you want to delete?')">Delete</x-primary-button> --}}
                    </form>
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

