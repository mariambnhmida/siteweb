<?php

namespace App\Http\Controllers;

use App\Models\Achatformation;
use App\Models\User;
use App\Models\Contact;
use App\Models\contacta;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeeController extends Controller
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

    public function index()
    {
        $contactas = contacta::where('to',Auth::user()->email)->get();
        $countm=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $contacts = Contact::all();
        $users=\App\Models\User::paginate(4);
        $count = DB::table('contacts')->count();
        $count0 = DB::table('users')->where('role','=','0')->count();
        $count1 = DB::table('users')->where('role','=','2')->count();
        $count2 = DB::table('formations')->count();
        $count3 = DB::table('achatformations')->count();
        $total= $count2 + $count3 + $count0 ;
        $role=Auth::user()->role;
        if($role=='1')
        {
            $m = User::where('role', '=', '0')->get();
            return view ('admin.dashboard',compact('m','contacts','users','count','count0','count1','count2','count3','total'));
        }
        elseif ($role=='0' )  {
            return view('formateur.dashboard',compact('countm','contactas','users'));
        }
        elseif($role=='2')
        {
            return redirect()->route('acceuil');
        }
    }
}
