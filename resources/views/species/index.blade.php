@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>All species</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($species as $species)
                    <tr>
                        <td>{{ $species->title }}</td>
                        <td>{{ $species->description }}</td>
                        <td>
                            @if ($species->species_image)
                                <img src="{{ $species->species_image }}" alt="{{ $species->title }}" width="100">
                            @else
                                No image
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
