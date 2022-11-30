<?php
namespace App\Http\Controllers;
use App\Models\Cat;
use App\Models\Scat;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\CategorieSelect;
use Illuminate\Support\Facades\DB;

class ScatController extends Controller
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
    public function index2()
    {
        $scats=Scat::all();
        $scats = $scats->last();
        $contacts = Contact::all();
        $users = User::all();
        $scats=\App\Models\Scat::all();
        $count = DB::table('contacts')->count();
        return view('admin.listscat', compact('scats','contacts','users','count'));
    }

    public function addscat()
    {
        $scats=Cat::all();
        $contacts = Contact::all();
        $count = DB::table('contacts')->count();
        $users = User::all();
        return view('admin.addscat',compact('scats','contacts','count','users'));
    }

    public function AddScatt(Request $request)
    {
        $this->validate($request, [
            'nom' => 'string|nullable|max:255',
            'cat_id' => 'string|nullable|max:255',
            'desc' => 'string|nullable|max:255',
            "mots_cles" =>'string|nullable|max:255'
            ]);
         $scats = new \App\Models\Scat();
         $scats->nom=$request['nom'];
         $scats->cat_id=$request['cat_id'];
         $scats->desc=$request['desc'];
         $scats->mots_cles=$request['mots_cles'];
         $scats->save();
         $scatt= new \App\Models\ScatSelect();
         $scatt->nom=$request['nom'];
         $scatt->save();
         return redirect()->route('listscat',compact('scats'))->with('azer','Sous Ctegorie ajoutée avec succées.');
    }

    //EDIT Sous categories
public function ShowEditS(Request $request)
{
     $id=$request['id'];
     $scats=\App\Models\Scat::find($id);
     $vv=Cat::all();
     $categs=CategorieSelect::all();
     $contacts = Contact::all();
     $users = User::all();
     $count = DB::table('contacts')->count();
     return view('admin.editscat',compact('scats','contacts','users','vv','categs','count'));
}

public function EditS(Request $request)
{
     $id=$request['id'];
     $scats=\App\Models\Scat::find($id);
     $scats->nom=$request['nom'];
     $scats->cat_id=$request['cat_id'];
     $scats->desc=$request['desc'];
     $scats->mots_cles=$request['mots_cles'];
     $scats->update();
     return redirect()->route('listscat',compact('scats'))->with('success','les  sous categories  ont  été modifié avec succées');
   }
   // DELETE Categories
public function ShowDeleteS(Request $request)
{
     $id=$request['id'];
     $scats=\App\Models\Scat::find($id);
     $scats->delete();
    return redirect()->route('listscat');
    // return view('redirects.ShowDeleteF',compact('users'));
}

public function DeleteS(Request $request)
{
     $id=$request['id'];
     $scats=\App\Models\Scat::find($id);
     $scats->delete();
     $scats=\App\Models\Scat::all();
     return redirect()->route('listscat',compact('scats'))->with("SuccessDelete","Sous Catégorie  supprimé avec succées!");
}
//voir sous categgg
public function adminShowSsouscategorie($id)
    {
        $contacts = Contact::all();
        $users = User::all();
        $cats=\App\Models\Cat::with('scats')->get();
        $scats=\App\Models\Scat::where('cat_id',$id)->with('cats')->get();
        $count = DB::table('contacts')->count();
        return view('admin.adminShowSsouscategorie', compact('scats','contacts','users','count'));
    }
//voir details sous categ
public function adminShowScategorie($id)
    {
        $users = User::all();
        $contacts = Contact::all();
        $scats=\App\Models\Scat::where('id',$id)->first();
        $count = DB::table('contacts')->count();
        return view('admin.souscategorie', compact('users','scats','contacts','count'));
    }
}

