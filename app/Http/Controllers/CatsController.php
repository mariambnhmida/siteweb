<?php

namespace App\Http\Controllers;
use App\Models\Cat;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatsController extends Controller
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
    public function indexx()
    {
        //$cats=\App\Models\Cat::paginate(4);
        $contacts = Contact::all();
        $users = User::all();
        $cats=Cat::all();
        $count = DB::table('contacts')->count();
        return view('admin.listcateg', compact('cats','contacts','users','count'));
    }

    public function addcateg()
    {
        $contacts = Contact::all();
        $users = User::all();
        $count = DB::table('contacts')->count();
        return view('admin.addcateg',compact('contacts','users','count'));
    }

    public function AddCat(Request $request)
    {
        $this->validate($request, [

            'nom' => 'string|nullable|max:255',
            'desc' => 'string|nullable|max:255',
            "mots_cles" =>'string|nullable|max:255'
            ]);
         $cats = new \App\Models\Cat();
         $cats->nom=$request['nom'];
         $cats->desc=$request['desc'];
         $cats->mots_cles=$request['mots_cles'];
         $cats->save();
         $categs= new \App\Models\CategorieSelect();
         $categs->nom=$request['nom'];
         $categs->save();
         return redirect()->route('listcateg')->with('azer','Ctegorie ajoutée avec succées.');
    }
    //EDIT categories
public function ShowEditC(Request $request)
{
     $id=$request['id'];
     $cats=\App\Models\Cat::find($id);
     $contacts = Contact::all();
     $users = User::all();
     $count = DB::table('contacts')->count();
     return view('admin.editcateg',compact('cats','contacts','users','count'));
}

public function EditC(Request $request)
{

     $id=$request['id'];
     $cats=\App\Models\Cat::find($id);
     $cats->nom = $request['nom'];
     $cats->desc=$request['desc'];
     $cats->mots_cles=$request['mots_cles'];
     $cats->update();
     $cats=\App\Models\Cat::all();
     return redirect()->route('listcateg',compact('cats'))->with('success','les categories  ont  été modifié avec succées');

   }
   // DELETE Categories
public function ShowDeleteC(Request $request)
{
     $id=$request['id'];
     $cats=\App\Models\Cat::find($id);
     $cats->delete();
    return redirect()->route('listcateg');

}
public function DeleteC(Request $request)
{
     $id=$request['id'];
     $cats=\App\Models\Cat::find($id);
     $cats->delete();
     $cats=\App\Models\Cat::all();
     return redirect()->route('listcateg',compact('cats'))->with("SuccessDelete","Catégorie a bien été supprimé avec succées!");
}
}

