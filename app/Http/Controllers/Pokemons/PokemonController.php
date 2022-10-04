<?php

namespace App\Http\Controllers\Pokemons;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function showPokemon()
    {
        return view('pokemons.show', ['url' => $_REQUEST['url']]);
    }
}
