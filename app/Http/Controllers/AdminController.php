<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Formateur;
use App\Models\Metier;
use App\Models\Permutation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        $admin = Auth::user();
        $usersCount = Formateur::count();
        $etablissementsCount = Etablissement::count();
        $matiersCount = Metier::count();
        $demandesCount = Permutation::count()->where('valide', '0');
        $demandesCountSuccess = ceil(Permutation::count()->where('valide', '1') / 2);

        return view('admin.index', compact('admin', 'usersCount', 'etablissementsCount', 'matiersCount', 'demandesCount', 'demandesCountSuccess',));
    }
    public function getMetiers()
    {
        $admin = Auth::user();
        $matiers = Metier::all();
        return view('admin.metier', compact('admin', 'matiers'));
    }


    public function addMetier(Request $request)
    {
        Metier::create([
            'metier' => $request->metier
        ]);
        return redirect()->route('admin.metier')->with('success', 'Enregistrement effectuee avec succes');
    }

    public function updateMetier(Request $request, int $id)
    {
        $metier = Metier::findOrFail($id);
        $metier->update([
            'metier' => $request->metier
        ]);
        return redirect()->route('admin.metier')->with('success', 'Modification effectuee avec succes');
    }

    public function deleteMetier(int $id)
    {
        $metier = Metier::findOrFail($id);
        $metier->delete();
        return redirect()->route('admin.metier')->with('success', 'Suppression effectuee avec succes');
    }


    public function getEtablissements()
    {
        $admin = Auth::user();
        $etablissements = Etablissement::all();
        return view('admin.metier', compact('admin', 'etablissements'));
    }


    public function addEtablissement(Request $request)
    {
        Etablissement::create([
            'etablissement' => $request->etablissement,
            'code' => $request->code,
            'ville_id' => $request->ville_id,
            'adresse' => $request->adresse,
            'tel' => $request->tel,
            'fax' => $request->fax,
        ]);
        return redirect()->route('admin.etablissement')->with('success', 'Enregistrement effectuee avec succes');
    }


    public function updateEtablissement(Request $request, int $id)
    {
        $etablissement = Etablissement::findOrFail($id);
        $etablissement->update([
            'etablissement' => $request->etablissement,
            'code' => $request->code,
            'ville_id' => $request->ville_id,
            'adresse' => $request->adresse,
            'tel' => $request->tel,
            'fax' => $request->fax,
        ]);
        return redirect()->route('admin.etablissement')->with('success', 'Modification effectuee avec succes');
    }

    public function deleteEtablissement(int $id)
    {
        $etablissement = Etablissement::findOrFail($id);
        $etablissement->delete();
        return redirect()->route('admin.etablissement')->with('success', 'Suppression effectuee avec succes');
    }
}
