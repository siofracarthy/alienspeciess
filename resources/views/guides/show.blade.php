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
                                    <td class="font-bold py-3" style="font-size: 2.5rem;">{{ $guide->title }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold" style="font-size: 1.2rem;">Publish Date:
                                        {{ $guide->date_of_publish }} </td>
                                </tr>

                                <td class="font-bold" style="font-size: 1.2rem;">Habitat:
                                    @if ($species->habitats)
                                        @foreach ($species->habitats as $habitat)
                                            <a
                                                href="{{ route('habitats.show', $habitat->id) }}">{{ $habitat->title }}</a>
                                        @endforeach
                                    @else
                                        No relevent habitat found.
                                    @endif
                                </td>


                                <tr>
                                    <td class="font-thin" style="font-size: 1.2rem;">
                                        {!! nl2br(preg_replace('/\n{2,}/', "\n", e($guide->description))) !!}
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
</x-app-layout>

