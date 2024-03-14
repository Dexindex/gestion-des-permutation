<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Formateur;
use App\Models\Permutation;
use App\Models\Region;
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
        $userEtabdata = Etablissement::where('id', $user->etablissement_id)->get();
        $userVilledata = Ville::where('id', $userEtabdata[0]->ville_id)->get();
        $villesRelatedToSameRegion = Ville::where('region_id', $userVilledata[0]->region_id)->get();

        $data = Formateur::where('id', "!=", $user->id)->where('metier_id', $user->metier_id)->get();

        $permutaion_1=Permutation::whereIn('formateur_id', $data->pluck('id'))->where('ville_id', $userVilledata[0]->id)->get();
        $permutaion_2=Permutation::whereIn('formateur_id', $data->pluck('id'))->whereIn('ville_id', $villesRelatedToSameRegion->pluck('id'))->get();


        $data1=Formateur::whereIn('id', $permutaion_1->pluck('formateur_id'))->get();
        $data2=Formateur::whereIn('id', $permutaion_2->pluck('formateur_id'))->whereNotIn('id', $data1->pluck('id'))->get();
       


        return view('app.permutation.index', compact('user', 'data1', 'data2'));
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
