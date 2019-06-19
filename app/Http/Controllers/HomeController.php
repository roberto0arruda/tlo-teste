<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Repositories\Beers;

class HomeController extends Controller
{
    protected $beers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Beers $beers)
    {
        $this->middleware('auth');
        $this->beers = $beers;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth::user();

        $beers = $this->beers->all();

        return view('home', compact('user', 'beers'));
    }

    public function show($id)
    {
        $beer = $this->beers->find($id);

        return view('show', compact('beer'));
    }

    public function buscarCerveja(Request $request)
    {
        $search = $request->get('search');

        $beers = $this->beers->search($search);

        return view('home', compact('beers'));
    }
}
