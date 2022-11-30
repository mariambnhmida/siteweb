<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Models\contacta;
use App\Models\Formation;
use App\Models\Abonnement;
use App\Models\Achatjeton;
use App\Models\Parrainage;
use Illuminate\Http\Request;
use App\Models\Gainsformateur;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AddFormateurController extends Controller
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
    public function addformateur()
    {
        $users=\App\Models\User::all();
        $contacts=\App\Models\Contact::all();
        $count = DB::table('contacts')->count();
        return view('admin.addformateur',compact('users','contacts','count'));
    }
    // ADD FORMATEUR
   public function Add(Request $request)
   {
       $this->validate($request, [

           'name' => 'string|nullable|max:255',
           'email' => 'email|unique:users|nullable|max:255',
           "cv" => "required|mimes:pdf|max:10000"
           ]);
        $users = new \App\Models\User();
        $users->name=$request['name'];
        $users->email=$request['email'];
        $users->phone=$request['phone'];
        $users->password=Hash::make($request['password']);
        $users->profile_photo_path=$request->profile_photo_path->store('images');
        $users->cv=$request->cv->store('pdf');
        $users->role=$request['role'];
        $users->pourcentage=$request['pourcentage'];
        $users->save();
        return redirect()->route('redirects')->with('azer','formateur créé avec succées.');
   }
    //EDIT COMPTE Admin
public function ShowEditcompteA(Request $request)
{
     $id=$request['id'];
     $users=\App\Models\User::find($id);
     $contacts = Contact::all();
     $count = DB::table('contacts')->count();
     return view('admin.editcompteadmin',compact('users','contacts','count'));
}

public function EditCompteA(Request $request)
{
     $id=$request['id'];
     $users=\App\Models\User::find($id);
     $users->name = $request['name'];
     $users->phone = $request['phone'];
     $users->email=$request['email'];
     if($request->hasFile('profile_photo_path')){
     $users->profile_photo_path=$request->profile_photo_path->store('images');
   }
     $users->update();
     $users=\App\Models\User::all();
     return redirect()->route('redirects',compact('users'))->with('success','Vos cordonnées  ont  été modifié avec succées');

   }
   public function showformateurr()
   {
       $contacts = Contact::all();
       $users=\App\Models\User::paginate(4);
       $count = DB::table('contacts')->count();
       $role=Auth::user()->role;
       if($role=='1')
       {
           $m = User::where('role', '=', '0')->get();
           return view ('admin.showformateur',compact('m','contacts','users','count'));
       }
   }
   public function showformationf($id)
   {
       $contacts = Contact::all();
       $users=\App\Models\User::paginate(4);
       $count = DB::table('contacts')->count();
       $formations=\App\Models\Formation::where('user_id',$id)->get();
           return view ('admin.showformationF',compact('contacts','users','count','formations'));

   }
   public function showdetailf($id)
   {
       $contacts = Contact::all();
       $users=\App\Models\User::paginate(4);
       $count = DB::table('contacts')->count();
       $formations=\App\Models\Formation::where('id',$id)->get();
        return view ('admin.showdetailF',compact('contacts','users','count','formations'));

   }
   // @if ($l->role =='0')
  // <td>Formateur</td>
   //@endif

//EDIT FORMATEUR
public function ShowEditF(Request $request)
{
     $contacts = Contact::all();
     $id=$request['id'];
     $users=\App\Models\User::find($id);
     $count = DB::table('contacts')->count();
     return view('admin.editformateur',compact('users','contacts','count'));
}

public function EditF(Request $request)
{
     $id=$request['id'];
     $users=\App\Models\User::find($id);
     $users->name = $request['name'];
     $users->email=$request['email'];
     $users->password=$request['password'];
     $users->phone = $request['phone'];
     $users->pourcentage=$request['pourcentage'];
     if($request->hasFile('cv')){
     $users->cv=$request->cv->store('pdf');
     if($request->hasFile('profile_photo_path')){
     $users->profile_photo_path=$request->profile_photo_path->store('images');
   }
     $users->update();
     $users=\App\Models\User::all();
     return redirect()->route('redirects',compact('users','formations'))->with('success','les cordonnées de formateur ont  été modifié avec succées');
   }
}
// DELETE FORMATEUR
public function ShowDeleteF(Request $request)
{
     $id=$request['id'];
     $users=\App\Models\User::find($id);
     $users->delete();
    return redirect()->route('admin.redirects');
}

public function DeleteF(Request $request)
{
     $id=$request['id'];
     $users=\App\Models\User::find($id);
     $users->delete();
     $users=\App\Models\User::all();
     return redirect()->route('admin.redirects',compact('users'))->with("SuccessDelete","le formateur  a bien été supprimé avec succées!");
}

//show list etudiants
public function showetudiantt()
{
    $users=\App\Models\User::where('role', '=', '2')->get();
    $contacts = Contact::all();
    $count = DB::table('contacts')->count();
    return view('admin.showetudiant',compact('users','contacts','count'));
}
//show Formation des etudiants
public function showformationetudiant($id)
{
    $contacts = Contact::all();
    $users=\App\Models\User::paginate(4);
    $count = DB::table('contacts')->count();
    $achatformations=\App\Models\Achatformation::where('user_id',$id)->get();
     return view ('admin.showformationE',compact('achatformations','contacts','users','count'));

}
public function showparticipations($id)
{
    $contacts = Contact::all();
    $users=\App\Models\User::paginate(7);
    $count = DB::table('contacts')->count();
    $historiqparticipationparties=\App\Models\historiqparticipationpartie::where('formation_id', $id)->get();
    $parties=\App\Models\Partie::with('historiqparticipationparties') ->get();
     return view ('admin.showparticipation',compact('parties','historiqparticipationparties','contacts','users','count'));

}
public function showdetailE($id)
{
    $contacts = Contact::all();
    $users=\App\Models\User::paginate(11);
    $count = DB::table('contacts')->count();
    $formations=\App\Models\Formation::where('id',$id)->get();
     return view ('admin.showdetailF',compact('contacts','users','count','formations'));

}
//SHOWINBOXX
public function Showmsg()
{
    $users = User::all();
    $contacts = Contact::all();
    $count = DB::table('contacts')->count();
    return view("admin.showmsg",compact('users','contacts','count'));
}
//mes msg
public function mesmsgs()
{
    $users = User::all();
    $contacts = Contact::all();
    $count = DB::table('contacts')->count();
    $contactas = contacta::all();
    return view("admin.mesmsg",compact('users','contacts','count','contactas'));
}
//delete msg
public function ShowDeletemsg(Request $request)
{
     $id=$request['id'];
     $contactas=\App\Models\contacta::find($id);
     $contactas->delete();
    return redirect()->route('admin.mesmsg');
}

public function Deletemsg(Request $request)
{
     $id=$request['id'];
     $contactas=\App\Models\contacta::find($id);
     $contactas->delete();
     $contactas=\App\Models\User::all();
     return redirect()->route('mesmsg',compact('contactas'))->with("SuccessDelete","le formateur  a bien été supprimé avec succées!");
}
//contact
public function showcontactadmin()
{
    $users = User::all();
    $contacts = Contact::all();
    $count = DB::table('contacts')->count();
    $contactas = contacta::all();
    return view("admin.contacta",compact('users','contacts','count','contactas'));
}

public function createcontactA(Request $request)
{
    if (!Auth::user())
    {
        return redirect(route('login'));
    }
     $this->validate($request, [
      'user_id'=> 'string|nullable|max:255',
      'msg' => 'string|nullable|max:255',
      'objet' => 'string|nullable|max:255',
      'to' => 'string|nullable|max:255',

      ]);

    $contactas = new \App\Models\contacta();
    $contactas->user_id=$request['user_id'];
    $contactas->to=$request['to'];
    $contactas->objet=$request['objet'];
    $contactas->msg=$request['msg'];
    $contactas->save();
    $contactas=\App\Models\contacta::all();
    return redirect()->route('mesmsg')->with('azer','le message a été bien envoyé');
}

//show historiq achat jeton
public function historiqjetons()
{
    $achatsjetons=\App\Models\Achatjeton::all();
    $abonnements=\App\Models\Abonnement::all();
    $users=\App\Models\User::all();
    $contacts = Contact::all();
    $count = DB::table('contacts')->count();
    return view('admin.historiqjetons',compact('abonnements','achatsjetons','users','contacts','count'));
}
//show historiq achat formations
public function historiqformations()
{
    $achatformations=\App\Models\Achatformation::all();
    $formations=\App\Models\Formation::with('achatformations')->get();
    $users=\App\Models\User::all();
    $contacts = Contact::all();
    $count = DB::table('contacts')->count();
    return view('admin.historiqueformations',compact('achatformations','users','contacts','count','formations'));
}
public function consulterformations()
{
    $formations=\App\Models\Formation::all();
    $users=\App\Models\User::paginate(7);
    $contacts = Contact::all();
    $count = DB::table('contacts')->count();
    return view('admin.consulterformation',compact('formations','users','contacts','count'));
}
public function showdetailsp($id)
    {
        $users=\App\Models\User::paginate(4);
        $contacts=\App\Models\Contact::all();
        $count = DB::table('contacts')->count();
        $formations=\App\Models\Formation::with('parties')->where('id',$id)->get();
        $parties=\App\Models\Partie::where('formation_id',$id)->with('formations')->get();

        return view('admin.showdetailsP', compact('parties','contacts','formations','count','users'));
    }
    public function consulterparrainages()
{
    $users=\App\Models\User::paginate(7);
    $contacts = Contact::all();
    $parrainages = Parrainage::all();
    $count = DB::table('contacts')->count();
    return view('admin.consulterparrainage',compact('parrainages','users','contacts','count'));
}

public function paiementf()
{
    $contacts = Contact::all();
    $users=\App\Models\User::paginate(4);
    $count = DB::table('contacts')->count();
    $role=Auth::user()->role;
    if($role=='1')
    {
        $m = User::where('role', '=', '0')->get();
    }
    return view ('admin.paiementF',compact('m','contacts','users','count'));
}
public function totalef($id)
{
    $contacts = Contact::all();
    $users=\App\Models\User::paginate(4);
    $count = DB::table('contacts')->count();
    $formations = Formation::all();
    $gainsformateur=\App\Models\Gainsformateur::where('formateur_id',$id)->get();
    $totale=\App\Models\Totale::where('form_id',$id)->get();
    $countform=\App\Models\totale::where('form_id',$id)->sum('gainformateur');
    $countad=\App\Models\totale::where('form_id',$id)->sum('gainadmin');
    $countf=\App\Models\gainsformateur::where('formateur_id',$id)->sum('gainF');
    $counta=\App\Models\gainsformateur::where('formateur_id',$id)->sum('gainA');
    $countF=$countf - $countform ;
    $countA=$counta - $countad ;
    return view ('admin.gainstotale',compact('countad','countF','countA','countf','counta','formations','gainsformateur','contacts','users','count','totale'));
}

public function pay($id)
{
    $contacts = Contact::all();
    $users=\App\Models\User::paginate(4);
    $count = DB::table('contacts')->count();
    $formations = Formation::all();
    $gainsformateur=\App\Models\Gainsformateur::where('formation_id',$id)->get();
   // dd($gainsformateur);
    return view ('admin.paiement',compact('formations','gainsformateur','contacts','users','count'));
}

        public function payF(Request $request)
        {
            $this->validate($request,
             [
                'gainformateur' => 'string|nullable|max:255',
                'gainadmin' => 'string|nullable|max:255',
                'etat' => 'string|nullable|max:255',
                'commentaire' => 'string|nullable|max:255',
                'form_id' => 'string|nullable|max:255',
                "gain_id" =>'string|nullable|max:255',
                ]);

             $totale = new \App\Models\Totale();
             $totale->gainformateur=$request['gainformateur'];
             $totale->gainadmin=$request['gainadmin'];
             $totale->etat=$request['etat'];
             $totale->commentaire=$request['commentaire'];
             $totale->form_id=$request['form_id'];
             $totale->gain_id=$request['gain_id'];
             $totale->save();
             //pour modifier l'etatG de la table gainsformateurs
                $id=$request['id'];
                $gainsformateur= \App\Models\Gainsformateur::find($totale->gain_id);
                $gainsformateur->update(['etatG' =>$request['etat']]);
             return redirect()->route('paiementF',compact('totale','gainsformateur'))->with('azer','totale ajoutée avec succées.');
        }

        public function historiqueR(Request $request)
        {
            $id=$request['id'];
            $contacts = Contact::all();
            $users=\App\Models\User::paginate(4);
            $user=\App\Models\User::get();
            $count = DB::table('contacts')->count();
            $formations = Formation::all();
            $gainsformateur=\App\Models\Gainsformateur::where('formateur_id',$id)->get();
            $totale=\App\Models\Totale::get();
            return view ('admin.historiquer',compact('user','gainsformateur','count','formations','contacts','users','totale'));
        }

}
