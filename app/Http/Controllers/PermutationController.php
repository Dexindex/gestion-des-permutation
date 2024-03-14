<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use App\Models\Permutation;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermutationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $currentFormateurId = Auth::user()->id;

        $currentFormateurPermutations = Permutation::where('formateur_id', $currentFormateurId)->get();

        $permutations_similaire = Permutation::whereIn('ville_id', $currentFormateurPermutations->pluck('ville_id'))
            ->where('formateur_id', '!=', $currentFormateurId)
            ->get();



        $formateur_matches = Formateur::whereIn('id', $permutations_similaire->pluck('formateur_id'))
            ->where('metier_id', Auth::user()->metier_id)
            ->get();

        return view('app.permutation.index', compact('user', 'permutations_similaire'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $villes = Ville::all();
        return view('app.permutation.create', compact('user', 'villes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = $request->validate([
            'ville_id' => 'required|exists:villes,id',
            'date' => 'required|date',
        ]);
        $formdata['valide'] = "0";
        $formdata['formateur_id'] = Auth::user()->id;
        Permutation::create($formdata);
        return redirect()->route('home')->with('success', 'Enregistrement effectuee avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permutation $permutation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permutation $permutation)
    {
        $user = Auth::user();
        $permutation = Permutation::findOrFail($permutation->id);
        $villes = Ville::all();
        return view('app.permutation.edit', compact('permutation', 'user', 'villes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permutation $permutation)
    {
        $permutation = Permutation::findOrFail($permutation->id);
        $formdata = $request->validate([
            'ville_id' => 'required|exists:villes,id',
            'date' => 'required|date',
        ]);
        $formdata['valide'] = "0";
        $formdata['formateur_id'] = Auth::user()->id;
        $permutation->update($formdata);
        return redirect()->route('home')->with('success', 'Modification effectuee avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permutation $permutation)
    {
        $permutation->delete();
        return redirect()->route('home')->with('success', 'Suppression effectuee avec succes');
    }
}
