<!-- resources/views/milestones/leaderboard.blade.php -->

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <h1 class="font-bold py-8" style="font-size: 2rem;">Leaderboard</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <hr class="">
                            <th class="font-bold px-8" style="font-size: 1.2rem;">Rank</th>
                            <th class="font-bold px-8" style="font-size: 1.2rem;">Name</th>
                            <th class="font-bold px-8" style="font-size: 1.2rem;">Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td class="font-thin px-8">{{ $index + 1 }}</td>
                                <td class="font-thin px-8">{{ $user->name }}</td>
                                <td class="font-thin px-8">{{ $user->score }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-app-layout>
