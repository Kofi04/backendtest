<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\produits;
use App\Models\commandes;
use App\Models\kkiapays;
use App\Models\User;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    
    
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'prix'=>'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'user_id' => ['required', 'integer'],
        ]);
        $path = $request->file('photo')->store('storage', 'public');
        $produits=new produits();
        $produits->nom=$request->nom;
        $produits->prix=$request->prix;
        $produits->photo=$path;
        $produits->user_id=$request->user_id;
        $produits->save();
        return back()->with("success","Produit enregistré avec succès");
    }
    

    public function vue()
    {
      if (Auth::check() && Auth::user()->roles_id == 2) {
            $produit = produits::where('user_id', Auth::id())->get();
        } else {
            $produit = produits::all();
        }
        $commandes = commandes::all();
        $user = User::all();
        
        return view('dashboard', compact('produit','commandes','user'));
    }


    public function modifier(Request $request,$id)
    {   
       $produits = produits::where('id',$id)->first();
    
       
   if ($request->hasFile('photo')) {
    $path = $request->file('photo')->store('storage', 'public');
    $produits->photo = $path;
 }
     
        $produits->nom=$request->nom;
        $produits->prix=$request->prix;
       
        $produits->save();
        return back()->with("success","Produit mis à jour");
    
    }
    
    public function destroy($id)
    {
        $produits = produits::findOrFail($id);
        $produits->delete();
    
        return back()->with('success', 'Produit supprimé');
    }

    public function commande(Request $request)
    {
        $request->validate([
            'quantite' => 'required|integer',
            'produits_id' => 'required|exists:produits,id',
        ]);

        commandes::create([
            'quantite' => $request->quantite,
            'user_id' => Auth::id(),
            'produits_id' => $request->produits_id,
        ]);

        return back()->with('success', 'Commande créée avec succès');
    }

    public function vuecommande()
    {
        if (Auth::check() && Auth::user()->roles_id == 1) {
            $commandes = commandes::where('user_id', Auth::id())->get();
        } else {
    $commandes = commandes::whereHas('produits', function ($query) {
        $query->where('user_id', Auth::id());
    })->get();
           
        }

        return view('commande', compact('commandes'));
    }

    public function kkiapay(Request $request)
    {
        $request->validate([
            'kkiapay_id' => 'required|integer',
            'user_id' => ['required', 'integer'],
        ]);
        $kkiapay=new kkiapays();

        $kkiapay->kkiapay_id=$request->kkiapay_id;
        
        $kkiapay->user_id=$request->user_id;
      
        $kkiapay->save();
        return back()->with('success', 'ID Kkiapay enregistré ');
}
}
