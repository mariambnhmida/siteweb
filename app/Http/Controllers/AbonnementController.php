<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Scat;
use App\Models\User;
use App\Models\Contact;
use App\Models\Formation;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AbonnementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index1()
    {
        $contacts = Contact::all();
        $users = User::all();
        $abonnements=\App\Models\Abonnement::paginate(4);
        $count = DB::table('contacts')->count();
        return view('admin.listabonnement',compact('abonnements','contacts','users','count'));
    }
    public function addabonnement()
    {
         $contacts = Contact::all();
         $users = User::all();
         $count = DB::table('contacts')->count();
         return view('admin.addabonnement',compact('contacts','users','count'));
    }
    public function AddAbon(Request $request)
    {
        $this->validate($request, [

            'nom' => 'string|nullable|max:255',
            'desca' => 'string|nullable|max:255',
            "jeton" =>'string|nullable|max:255',
            "prix" =>'string|nullable|max:255'
            ]);
         $abonnements = new \App\Models\Abonnement();
         $abonnements->nom=$request['nom'];
         $abonnements->desca=$request['desca'];
         $abonnements->jeton=$request['jeton'];
         $abonnements->prix=$request['prix'];
         $abonnements->save();
         $jet= new \App\Models\JetonSelect();
         $jet->jeton=$request['jeton'];
         $jet->save();
         return redirect()->route('listabonnement')->with('azer','Pack ajoutée avec succées.');
    }
     //EDIT Abonnement
public function ShowEditA(Request $request)
{

    $id=$request['id'];
    $abonnements=\App\Models\Abonnement::find($id);
    $contacts = Contact::all();
    $users = User::all();
    $count = DB::table('contacts')->count();
     return view('admin.editabonnement',compact('abonnements','contacts','users','count'));
}

public function EditA(Request $request)
{

     $id=$request['id'];
     $abonnements=\App\Models\Abonnement::find($id);
     $abonnements->nom = $request['nom'];
     $abonnements->desca=$request['desca'];
     $abonnements->jeton=$request['jeton'];
     $abonnements->prix=$request['prix'];
     $abonnements->update();
     $abonnements=\App\Models\Abonnement::all();
     return redirect()->route('listabonnement',compact('abonnements'))->with('success',' Abonnement a  été modifié avec succées');

   }
     // DELETE  Abonnement
public function DeleteA(Request $request)
{
     $id=$request['id'];
     $abonnements=\App\Models\Abonnement::find($id);
     $abonnements->delete();
     $abonnements=\App\Models\Abonnement::all();
     return redirect()->route('listabonnement',compact('abonnements'))->with("SuccessDelete","Abonnement a bien été supprimé avec succées!");
}
public function showabonnement()
{   $cats=Cat::all();
    $scats=Scat::where('id','=','cat_id')->get();
    $abonnements=Abonnement::all();
    $formations=Formation::all();
    $contacts = Contact::all();
    //$count = DB::table('contacts')->count();
    $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
    $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
    $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
    return view('user.abonnement',compact('countmsg','abonnements','formations','scats','cats','contacts','count','countparr'));
}
}
