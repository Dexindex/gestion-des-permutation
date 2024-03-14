<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Permutation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $etablissement = Etablissement::find($user->etablissement_id);
        $permutations = Permutation::where('formateur_id', $user->id)->get();
        return view('app.home', compact('user', 'etablissement', 'permutations'));
    }
}
