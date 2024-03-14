<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\Formateur;
use App\Models\Metier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $metiers = Metier::all();
        $etablissments = Etablissement::all();
        return view('app.formateur.create', ['metiers' => $metiers, 'etablissments' => $etablissments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'nom' => 'required|max:30|min:3',
            'prenom' => 'required|max:30|min:3',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/',
            'matricule' => 'required|numeric',
            'tel' => 'required|numeric',
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'metier_id' => 'required|exists:metiers,id',
            'etablissement_id' => 'required|exists:etablissements,id',
            'date_naissance' => 'required|date',
            'date_recrutement' => 'required|date',
            'poste' => 'required',
            'grade' => 'required'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);




        $formFields['photo'] = $request->file('photo')->store('images', 'public');

        Formateur::create($formFields);
        return redirect()->route('login.show')->with('success', 'Votre compte a bien été crée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Formateur $formateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formateur $formateur)
    {
        $metiers = Metier::all();
        $etablissments = Etablissement::all();
        $user = Auth::user();

        return view('app.formateur.edit', ['formateur' => $formateur, 'metiers' => $metiers, 'etablissments' => $etablissments, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $formateur = Formateur::findOrFail($id);
        $formFields = $request->all();

        $formFields['email'] = Auth::user()->email;

        if ($request->filled('password')) {
            $formFields['password'] = bcrypt($request->input('password'));
        } else {
            $formFields['password'] = $formateur->password;
        }

        if ($request->hasFile('photo')) {
            if ($formateur->photo) {
                Storage::disk('public')->delete($formateur->photo);
            }
            $formFields['photo'] = $request->file('photo')->store('images', 'public');
        } else {
            $formFields['photo'] = $formateur->photo;
        }

        $formateur->update($formFields);
        return redirect()->route('home')->with('success', 'Votre compte a bien été modifié');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formateur $formateur)
    {
        //
    }
}
