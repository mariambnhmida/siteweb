<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Scat;
use App\Models\User;
use App\Models\Formation;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\participationpartie;

class WelcomeController extends Controller
{
    public function indexwelcome()

    {
        // nbr de visiteurs
        $pojects=participationpartie::latest()->paginate(5);
        participationpartie::increment('views');
        $cats = Cat::with('scats')->get();
        $formations=Formation::all();
        $abonnements=Abonnement::all();
        $users=User::where('role', '=', '0')->get();
        $count = DB::table('users')->where('role','=','0')->count();
        $count1 = DB::table('users')->where('role','=','2')->count();
        $count2 = DB::table('formations')->count();
        $count3 = DB::table('achatformations')->count();
        return view('welcome',compact('users','abonnements','formations','cats','count','count1','count2','count3','pojects'));
    }
    public function createcontactus(Request $request)
    {
         $this->validate($request, [
          'nom' => 'string|nullable|max:255',
          'email' => 'string|nullable|max:255',
          'msg' => 'string|nullable|max:255',
          'sujet' => 'string|nullable|max:255',
          ]);
        $contactus = new \App\Models\Contactus();
        $contactus->nom=$request['nom'];
        $contactus->email=$request['email'];
        $contactus->sujet=$request['sujet'];
        $contactus->msg=$request['msg'];
        $contactus->save();
        $contactus=\App\Models\contactus::all();
        return redirect()->route('welcome');
   }
   public function wformation($id)
   {
    $cats=\App\Models\Cat::with('formations')->get();
    $formations=\App\Models\Formation::where('cat_id',$id)->with('cats')->get();
    $formationss=\App\Models\Formation::all();
    $abonnements=Abonnement::all();
    $users=User::where('role', '=', '0')->get();
    $countnotes=DB::table('notes')->where('formation_id',$id)->sum('note') ;
    $countnote= ($countnotes *5) /100;
    return view('user.wformation',compact('cats','abonnements','formations','users','countnote','formationss','countnotes'));
   }

}
