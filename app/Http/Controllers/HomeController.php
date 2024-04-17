<?php
namespace App\Http\Controllers;
use App\Models\Species;
use App\Models\Guide;

    class HomeController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {
            //In order from highest level of risk to lowest
            $species = Species::orderByDesc('risk_level')->take(4)->get();
            $guides = Guide::orderByDesc('id')->take(6)->get();

            return view('dashboard', [
                'species' => $species,
                'guides' => $guides,
            ]);
        }
    }
