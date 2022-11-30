<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Scat;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    function search()
    {
        $cats = Cat::with('scats')->get();
        $scats=Scat::all();
        $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
        $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
        return view('user.search',compact('countmsg','cats','scats','count','countparr'));

    }
    function find(Request $request)
    {
       // $abonnements=Abonnement::all();
       $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
       $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
       $cats = Cat::with('scats')->get();
       $scats=Scat::all();
       $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
       $request->validate([ 'query'=>'required|min:2' ]);
        $search_text = $request->input('query');
        $formations = DB::table('formations')->where('nom','LIKE','%'.$search_text.'%')
        //   ->orWhere('SurfaceArea','<', 10)
        //   ->orWhere('LocalName','like','%'.$search_text.'%')
          ->paginate(2);
        return view('user.search',compact('formations','cats','scats','count','countparr','countmsg'));
    }

}
