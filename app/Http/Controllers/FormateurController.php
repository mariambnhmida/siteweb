<?php

namespace App\Http\Controllers;
use App\Models\Cat;
use App\Models\Scat;
use App\Models\User;
use App\Models\Partie;
use App\Models\Contact;

use App\Models\contacta;
use App\Models\Formation;
use App\Models\Abonnement;
use App\Models\ScatSelect;
use App\Models\JetonSelect;
use Illuminate\Http\Request;
use App\Models\CategorieSelect;
use App\Models\Gainsformateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
class FormateurController extends Controller
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

    public function showformateur()
    {
        $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $users=\App\Models\User::all();
        return view('formateur.dashboard',compact('users','count'));
    }

    //EDIT COMPTE
public function ShowEditcompte(Request $request)
{
    if (!Auth::user()) {
        return redirect(route('login'));
    }
    $userss=\App\Models\User::all();
     $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
     $id=$request['id'];
     $users=\App\Models\User::find($id);

     $contactas = contacta::where('to',Auth::user()->email)->get();
     return view('formateur.editcompte',compact('users','count','contactas','userss'));
}

public function EditCompte(Request $request)
{
     $id=$request['id'];
     $users=\App\Models\User::find($id);
     $users->name = $request['name'];
     $users->email=$request['email'];
     $users->phone=$request['phone'];
     if($request->hasFile('cv')){
     $users->cv=$request->cv->store('pdf');
     if($request->hasFile('profile_photo_path')){
     $users->profile_photo_path=$request->profile_photo_path->store('images');
   }
     $users->update();
     $users=\App\Models\User::all();
     return redirect()->route('dashboard',compact('users'))->with('success','Vos cordonnées  ont  été modifié avec succées');
   }
}
    //ADDFORMATION
    public function index3(Request $request)
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $id=$request['id'];
        $formations=Formation::where('user_id',Auth::user()->id)->get();
        $form=\App\Models\Formation::paginate(4);
        $users=User::all();
        $contactas = contacta::where('to',Auth::user()->email)->get();
        return view('formateur.listformation', compact('formations','count','users','contactas','form'));
    }
    public function addformation()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $cats=\App\Models\Cat::all();
        $scats=\App\Models\Scat::all();
        $abonnements=\App\Models\Abonnement::all();
        $contacts=\App\Models\Contact::all();
        $formations=\App\Models\Formation::all();
        $users=User::all();
        $contactas = contacta::where('to',Auth::user()->email)->get();
        return view('formateur.formation',compact('contactas','users','formations','contacts','cats','scats','abonnements','count'));
    }
    public function AddF(Request $request)
    {
        $this->validate($request, [
            'nom' => 'string|nullable|max:255',
            'user_id' => 'string|nullable|max:255',
            'descf' => 'string|nullable|max:255',
            'scat_id' => 'string|nullable|max:255',
            'cat_id' => 'string|nullable|max:255',
            "niveau" =>'string|nullable|max:255',
            "abonnement_id" =>'string|nullable|max:255',
            "pourcentagef" =>'string|nullable|max:255',
            "visibilite" =>'string|nullable|max:255',
            "bande" =>'required|file|mimetypes:video/mp4',
            ]);

         $formations = new \App\Models\Formation();
         $formations->nom=$request['nom'];
         $formations->pourcentagef=$request['pourcentagef'];
         $formations->user_id=$request['user_id'];
         $formations->scat_id=$request['scat_id'];
         $formations->cat_id=$request['cat_id'];
         $formations->descf=$request['descf'];
         $formations->niveau=$request['niveau'];
         $formations->visibilite=$request['visibilite'];
         $formations->abonnement_id=$request['abonnement_id'];
         $formations->image=$request->image->store('images');
         $formations->bande=$request->bande->store('images');
         $formations->save();
         return redirect()->route('listformation',compact('formations'))->with('azer','Formation ajoutée avec succées.');
    }
    //EDIT Formations
public function ShowEditFormation(Request $request)
{
    if (!Auth::user()) {
        return redirect(route('login'));
    }
    $users=User::all();
     $contactas = contacta::where('to',Auth::user()->email)->get();
     $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
     $id=$request['id'];
     $formations=\App\Models\Formation::find($id);
     $scats=Scat::all();
     $contacts=\App\Models\Contact::all();
     $abonnements=\App\Models\Abonnement::all();
     $categs=CategorieSelect::all();
     $vv=Cat::all();
     $scatt=ScatSelect::all();
     $bb=Scat::all();
     $jet=JetonSelect::all();
     $jj=Abonnement::all();
     return view('formateur.editformation',compact('users','contactas','count','formations','contacts','scats','abonnements','categs','vv','scatt','bb','jj','jet'));
}

public function Editformation(Request $request)
{
     $id=$request['id'];
     $formations=\App\Models\Formation::find($id);
     $formations->nom=$request['nom'];
     $formations->scat_id=$request['scat_id'];
     $formations->user_id=$request['user_id'];
     $formations->cat_id=$request['cat_id'];
     $formations->descf=$request['descf'];
     $formations->niveau=$request['niveau'];
     $formations->visibilite=$request['visibilite'];
     $formations->abonnement_id=$request['abonnement_id'];
     if($request->hasFile('bande')){
     $formations->bande=$request->bande->store('images');
         if($request->hasFile('image')){
           $formations->image=$request->image->store('images');
         }
     $formations->update();
     $formations=\App\Models\Formation::all();
     return redirect()->route('listformation',compact('formations'))->with('success','la formation  a  été modifié avec succées');

     }
}

   // DELETE formations
   public function DeleteFormation(Request $request)
   {

        $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $id=$request['id'];
        $formations=\App\Models\Formation::find($id);
        $formations->delete();
        $formations=\App\Models\Formation::all();
        return redirect()->route('listformation',compact('count','formations'))->with("SuccessDelete","Formation  supprimé avec succées!");
   }
   //formation details
   public function formationdetail($id)
    {
        if (!Auth::user()) {
        return redirect(route('login'));
        }
        $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $formations=Formation::find($id);
        $historiqparticipationparties=\App\Models\historiqparticipationpartie::where('formation_id', $id)->get();
        return view('formateur.formationdetails', compact('count','formations','historiqparticipationparties'));
    }
  //CONTACT
  public function createcontact(Request $request)
  {
       $this->validate($request, [
        'user_id'=> 'string|nullable|max:255',
        'msg' => 'string|nullable|max:255',
        'sujet' => 'string|nullable|max:255',
        ]);

      $contacts = new \App\Models\Contact();
      $contacts->user_id=$request['user_id'];
      $contacts->sujet=$request['sujet'];
      $contacts->msg=$request['msg'];
      $contacts->save();
      $contacts=\App\Models\Contact::all();
      return redirect()->route('dashboard')->with('azer','le message a été bien envoyé');
 }

  public function showcontact()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $users = User::all();
        $contactas = contacta::where('to',Auth::user()->email)->get();
        $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $contacts=\App\Models\Contact::all();
        return view('formateur.contact',compact('contacts','count','contactas','users'));
    }
    public function Showinbox()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
            $users = User::all();
            $contacts = Contact::all();
            $contactas = contacta::where('to',Auth::user()->email)->get();
            $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
            return view("formateur.showinbox",compact('users','contacts','contactas','count'));

    }
    public function addparti($id)
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $users = User::all();
        $formations=\App\Models\Cat::all();
        $formations=\App\Models\Scat::all();
        $formations=\App\Models\Abonnement::all();
        $contacts=\App\Models\Contact::all();
        $formations = Formation::with('parties')->find($id);
        $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $contactas = contacta::where('to',Auth::user()->email)->get();
        return view('formateur.addpartie',compact('formations','contacts','count','contactas','users'));
    }
    public function addpartiepost(Request $request)
    {
        $this->validate($request, [
            'nom' => 'string|nullable|max:255',
            'user_id' => 'string|nullable|max:255',
            'descp' => 'string|nullable|max:255',
            'formation_id' => 'string|nullable|max:255',
            "gratuite" =>'string|nullable|max:255',
            "video" =>'required|file|mimetypes:video/mp4',
            ]);

         $partie = new \App\Models\Partie();
         $partie->nom=$request['nom'];
         $partie->user_id=$request['user_id'];
         $partie->formation_id=$request['formation_id'];
         $partie->descp=$request['descp'];
         $partie->gratuite=$request['gratuite'];
         $partie->etatp=$request['etatp'];
         $partie->video=$request->video->store('images');
         $partie->save();
         return redirect()->route('listformation',compact('partie'))->with('azer','Chapitre ajoutée avec succées.');
    }
      //Afficher partie formation
public function showpartie($id)
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $contacts=\App\Models\Contact::all();
        $formations=\App\Models\Formation::with('parties')->where('id',$id)->get();
        $parties=\App\Models\Partie::where('formation_id',$id)->with('formations')->get();
        $parties=\App\Models\Partie::paginate(4);
        $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $users=User::all();
        $contactas = contacta::where('to',Auth::user()->email)->get();
        $historiqparticipationparties=\App\Models\historiqparticipationpartie::where('formation_id', $id)->get();
        return view('formateur.showpartief', compact('parties','contacts','formations','count','contactas','users','historiqparticipationparties'));
    }
    //EditPartie+ delete
    public function editpartie(Request $request)
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
         $id=$request['id'];
         $partie=\App\Models\Partie::find($id);
         $contacts=\App\Models\Contact::all();
         $formations=Formation::all();
         $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
         $users=User::all();
         $contactas = contacta::where('to',Auth::user()->email)->get();
         return view('formateur.editpartie',compact('formations','contacts','partie','count','contactas','users'));
    }

    public function Editp(Request $request)
    {
         $id=$request['id'];
         $partie=\App\Models\Partie::find($id);
         $partie->user_id=$request['user_id'];
         $partie->nom = $request['nom'];
         $partie->descp=$request['descp'];
         $partie->gratuite=$request['gratuite'];
         $partie->etatp=$request['etatp'];
         $partie->video=$request->video->store('images');
         $partie->update();
         $formations=\App\Models\Formation::all();
         return redirect()->route('listformation',compact('formations'))->with('success','la formation  a  été modifié avec succées');

       }
       public function DeletePartie(Request $request)
       {
            $id=$request['id'];
            $parties=\App\Models\Partie::find($id);
            $parties->delete();
            return redirect()->route('listformation',compact('parties'))->with("SuccessDelete","Formation  supprimé avec succées!");
       }
        //partie details
   public function detailparties($id)
   {
    if (!Auth::user()) {
        return redirect(route('login'));
    }
       $users = User::all();
       $contactas = contacta::where('to',Auth::user()->email)->get();
       $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
       $parties=Partie::find($id);
       return view('formateur.detailpartie', compact('parties','count','users','contactas'));
   }

       //SHOWHISTORIQUE
       public function Showhistorique()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $contactas = contacta::where('to',Auth::user()->email)->get();
        $users=\App\Models\User::all();
        $achatformations=\App\Models\Achatformation::get();
        $formations=\App\Models\Formation::with('achatformations')->where('user_id',Auth::user()->id)->get();
        $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        return view('formateur.showhistorique',compact('achatformations','formations','users','count','contactas'));
    }

    public function historiqP($id)
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $contactas = contacta::where('to',Auth::user()->email)->get();
        $users=\App\Models\User::all();
        $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $historiqparticipationparties=\App\Models\historiqparticipationpartie::where('formation_id',$id)->get();
        $parties=\App\Models\Partie::with('historiqparticipationparties') ->get();
         return view ('formateur.historiqp',compact('parties','historiqparticipationparties','contactas','users','count'));

    }
    //Mes gains
    public function mesgain()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $countm=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $formations=\App\Models\Formation::where('user_id',Auth::user()->id)->get();
        $users=\App\Models\User::all();
        $contactas = contacta::where('to',Auth::user()->email)->get();
        $gainsformateur=\App\Models\Gainsformateur::where('formateur_id',Auth::user()->id)->get();
        $totale=\App\Models\Totale::where('form_id',Auth::user()->id)->get();
        $countform=\App\Models\totale::where('form_id',Auth::user()->id)->sum('gainformateur');
        $countf=\App\Models\gainsformateur::where('formateur_id',Auth::user()->id)->sum('gainF');
        $countF=$countf - $countform ;
        return view('formateur.mesgains',compact('totale','countF','formations','gainsformateur','contactas','count','users','countm','countf','countform'));
    }

    public function historiqretrait()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $countm=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $count=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $formations=\App\Models\Formation::where('user_id',Auth::user()->id)->get();
        $users=\App\Models\User::all();
        $contactas = contacta::where('to',Auth::user()->email)->get();
        $gainsformateur=\App\Models\Gainsformateur::where('formateur_id',Auth::user()->id)->get();
        $totale=\App\Models\Totale::get();
        $countform=\App\Models\totale::where('form_id',Auth::user()->id)->sum('gainformateur');
        $countFT=\App\Models\gainsformateur::where('formateur_id',Auth::user()->id)->sum('gainF');
        $countf=\App\Models\gainsformateur::where('formateur_id',Auth::user()->id)->sum('gainF');
        $countF=$countf - $countform ;
        return view('formateur.historiqueretrait',compact('countFT','totale','countF','formations','gainsformateur','contactas','count','users','countm','countf','countform'));
    }
    public function recuF($id)
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $formations=\App\Models\Formation::where('user_id',Auth::user()->id)->get();
        $users=\App\Models\User::where('id',Auth::user())->get();
        $gainsformateur=\App\Models\Gainsformateur::where('id',$id)->get();
        $totale=\App\Models\Totale::where('gain_id',$id)->get();
        $countform=\App\Models\totale::where('form_id',Auth::user()->id)->sum('gainformateur');
        $countFT=\App\Models\gainsformateur::where('formateur_id',Auth::user()->id)->sum('gainF');
        $countf=\App\Models\gainsformateur::where('formateur_id',Auth::user()->id)->sum('gainF');
        $countF=$countf - $countform ;
     return view('formateur.recuf',compact('formations','users','gainsformateur','totale','countform','countFT','countf','countF'));
    }
    public function DPDF(Request $request)
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
       $id=$request['id'];
       $formations=\App\Models\Formation::where('user_id',Auth::user()->id)->get();
       $users=\App\Models\User::where('id',Auth::user())->get();
       $gainsformateur=\App\Models\Gainsformateur::where('id',$id)->get();
       $totale=\App\Models\Totale::where('gain_id',$id)->get();
       $countform=\App\Models\totale::where('form_id',Auth::user()->id)->sum('gainformateur');
       $countFT=\App\Models\gainsformateur::where('formateur_id',Auth::user()->id)->sum('gainF');
       $countf=\App\Models\gainsformateur::where('formateur_id',Auth::user()->id)->sum('gainF');
       $countF=$countf - $countform ;
       $pdf = PDF::loadView('formateur.recuf',compact('formations','users','gainsformateur','totale','countform','countFT','countf','countF'));
     return $pdf->download('reçu.pdf');
    }

}
