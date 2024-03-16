<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Formateur;
use App\Models\Metier;
use App\Models\Permutation;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        if (auth()->check() && auth()->user()->email != 'admin@admin.admin') {
            return redirect()->route('home');
        }
        $admin = Auth::user();
        $etablissement = Etablissement::find($admin->etablissement_id);

        $usersCount = Formateur::count();
        $etablissementsCount = Etablissement::count();
        $matiersCount = Metier::count();
        $demandesCount = Permutation::where('valide', '0')->count();
        $demandesCountSuccess = ceil(Permutation::where('valide', '1')->count() / 2);

        return view('app.admin.index', compact('admin', 'etablissement', 'usersCount', 'etablissementsCount', 'matiersCount', 'demandesCount', 'demandesCountSuccess',));
    }
    public function getMetiers()
    {
        if (auth()->check() && auth()->user()->email != 'admin@admin.admin') {
            return redirect()->route('home');
        }
        $admin = Auth::user();
        $etablissement = Etablissement::find($admin->etablissement_id);
        $metiers = Metier::all();
        return view('app.admin.metier', compact('admin', 'metiers', 'etablissement'));
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
        if (auth()->check() && auth()->user()->email != 'admin@admin.admin') {
            return redirect()->route('home');
        }
        $admin = Auth::user();
        $etablissement = Etablissement::find($admin->etablissement_id);
        $villes = Ville::orderBy('ville')->get();
        $etablissements = Etablissement::all();
        return view('app.admin.etablissement', compact('admin', 'etablissements', 'etablissement', 'villes'));
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

    public function deleteEtablissement($id)
    {
        $etablissement = Etablissement::findOrFail($id);
        $etablissement->delete();
        return redirect()->route('admin.etablissement')->with('success', 'Suppression effectuee avec succes');
    }
}
