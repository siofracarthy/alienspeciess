<x-app-layout>
    <div class="flex flex-col min-h-screen">
        <div class="py-12 flex-grow">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="container">
                    <h1 class="font-bold py-8 text-center" style="font-size: 2.9rem;">Leaderboard</h1>
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="font-bold px-8" style="font-size: 1.2rem;">Rank:</th>
                                        <th class="font-bold px-8" style="font-size: 1.2rem;">Name:</th>
                                        <th class="font-bold px-8" style="font-size: 1.2rem;">Score:</th>
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
    </div>
</x-app-layout>
