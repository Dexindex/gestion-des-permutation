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
        $demandesCount = Permutation::where('valide', '0')->count();
        $demandesCountSuccess = ceil(Permutation::where('valide', '1')->count() / 2);

        return view('app.admin.index', compact('admin', 'usersCount', 'etablissementsCount', 'matiersCount', 'demandesCount', 'demandesCountSuccess',));
    }
    public function getMetiers()
    {
        $admin = Auth::user();
        $matiers = Metier::all();
        return view('app.admin.metier', compact('admin', 'matiers'));
    }


    public function addMetier(Request $request)
    {
        Metier::create([
            'metier' => $request->metier
        ]);
        return redirect()->route('app.admin.metier')->with('success', 'Enregistrement effectuee avec succes');
    }

    public function updateMetier(Request $request, int $id)
    {
        $metier = Metier::findOrFail($id);
        $metier->update([
            'metier' => $request->metier
        ]);
        return redirect()->route('app.admin.metier')->with('success', 'Modification effectuee avec succes');
    }

    public function deleteMetier(int $id)
    {
        $metier = Metier::findOrFail($id);
        $metier->delete();
        return redirect()->route('app.admin.metier')->with('success', 'Suppression effectuee avec succes');
    }


    public function getEtablissements()
    {
        $admin = Auth::user();
        $etablissements = Etablissement::all();
        return view('app.admin.etablissement', compact('admin', 'etablissements'));
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
        return redirect()->route('app.admin.etablissement')->with('success', 'Enregistrement effectuee avec succes');
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
        return redirect()->route('app.admin.etablissement')->with('success', 'Modification effectuee avec succes');
    }

    public function deleteEtablissement(int $id)
    {
        $etablissement = Etablissement::findOrFail($id);
        $etablissement->delete();
        return redirect()->route('app.admin.etablissement')->with('success', 'Suppression effectuee avec succes');
    }
}
