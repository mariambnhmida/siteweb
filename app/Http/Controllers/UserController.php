<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Note;
use App\Models\Scat;
use App\Models\User;
use App\Models\Partie;
use App\Models\Contact;
use App\Models\contacta;
use App\Models\Formation;
use App\Models\Abonnement;
use App\Models\Achatjeton;
use App\Models\Parrainage;
use Illuminate\Http\Request;
use App\Models\Achatformation;
use App\Models\UserCompetence;
use Illuminate\Support\Facades\DB;
use App\Models\participationpartie;
use App\Models\PartieE;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\LinesOfCode\Counter;
use PDF;
class UserController extends Controller
{

    public function indexuser(Request $request)

    {
        $id=$request['id'];
        $cats = Cat::with('scats')->get();
        $formations=Formation::all();
        $abonnements=Abonnement::all();
        $users=User::where('role', '=', '0')->get();
        $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
        $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $countnote=DB::table('notes')->where('formation_id',$id)->sum('note');
        $countnotes= ($countnote *5) /100;
        $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
        $achatformations=\App\Models\Achatformation::where('user_id',Auth::user()->id)->get();
        return view('user.dashboard',compact('countnotes','countnote','countmsg','abonnements','formations','users','cats','count','countparr','achatformations'));
    }
    //REGISTER ETUDIANT
    public function registeruser()
    {
        $users=\App\Models\User::all();
        return view('user.registeruser');
    }
    public function RegisterU(Request $request)
    {
        $this->validate($request, [

            'name' => 'string|nullable|max:255',
            'email' => 'email|unique:users|nullable|max:255',
            "cv" => "required|mimes:pdf|max:10000"
            ]);
         $users = new \App\Models\User();
         $users->name=$request['name'];
         $users->email=$request['email'];
         $users->phone = $request['phone'];
         $users->password=Hash::make($request['password']);
         if ($request->hasfile('profile_photo_path'))
        {
            $file=$request->file('profile_photo_path');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('image/', $filename);
            $users->profile_photo_path=$filename;
        }
         $users->cv=$request->cv->store('pdf');
         $users->role=$request['role'];
         $users->save();
         return redirect()->route('login')->with('azer','formateur créé avec succées.');
    }

    //EDIT COMPTE USER
public function ShowEditcompteU(Request $request)
{
     $cats=Cat::with('scats')->get();
     $id=$request['id'];
     $users=\App\Models\User::find($id);
     $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
     $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
     $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
     return view('user.edituser',compact('users','cats','count','countmsg','countparr'));
}
public function EditCompteU(Request $request)
{
     $id=$request['id'];
     $users=\App\Models\User::find($id);
     $users->name = $request['name'];
     $users->email=$request['email'];
     $users->phone = $request['phone'];
     if($request->hasFile('cv')){
     $users->cv=$request->cv->store('pdf');
     if($request->hasFile('profile_photo_path')){
     $users->profile_photo_path=$request->profile_photo_path->store('images');
   }
     $users->update();
     $users=\App\Models\User::all();
     return redirect()->route('acceuil')->with('success','les cordonnées de formateur ont  été modifié avec succées');
   }
}
//messages
 //EDIT COMPTE USER
 public function msgs()
 {
      $cats=Cat::with('scats')->get();
      $users=\App\Models\User::all();
      $formations=\App\Models\Formation::all();
      $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
      $contactas = contacta::where('to',Auth::user()->email)->get();
      $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
      $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
      return view('user.msg',compact('users','cats','count','contactas','countmsg','formations','countparr'));
 }
   //PARRAINAGE
   public function showparrain()
    {
        $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
        $cats = Cat::with('scats')->get();
        $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
        $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $formations=\App\Models\Formation::all();
        return view('user.addparrain',compact('cats','count','countmsg','formations','countparr'));
    }

   public function AddP(Request $request)
   {
       $this->validate($request, [
           'new_id'=> 'string|nullable|max:255',
           'mail' => 'email|unique:parrainages|nullable|max:255',
           'user_id' => 'string|nullable|max:255',
           'etat' => 'string|nullable|max:255',
           ]);
        $parrainages= new \App\Models\Parrainage();
        $parrainages->new_id=$request['new_id'];
        $parrainages->mail=$request['mail'];
        $parrainages->user_id=$request['user_id'];
        $parrainages->etat=$request['etat'];
        $parrainages->save();
        $user = User::find($request['user_id']);
        $details = [
            'title' => 'Mail de E-learning site',
            'body' => 'Bonjour ,nous vous informons que vous avez parrinée par '. $user->name .' merci de s\'inscrire pour voir nos formations et gagner des jetons. Le lien de confirmation est le suivant : http://127.0.0.1:8000/regiseruser'
        ];
        \Mail::to($request['mail'])->send(new \App\Mail\MyTestMail($details));
       // dd("Email is Sent.");
        return redirect()->route('listparrainage',compact('parrainages'))->with('azer','new user créé avec succées.');
   }
   //voir list parrainage
   public function showlistparrain()
   {
       $parrainages=\App\Models\Parrainage::where('user_id',Auth::user()->id)->get();
       $cats = Cat::with('scats')->get();
       $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
       $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
       $formations=\App\Models\Formation::all();
       $users=\App\Models\User::all();
       $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
       return view('user.listparrainage',compact('countmsg','parrainages','count','cats','formations','users','countparr'));
   }
   ///// VOIR LE NOMBRE DES JETONS
   public function Showjetons()
   {
    $cats = Cat::with('scats')->get();
    $scats=Scat::all();
    $formations=Formation::all();
    $abonnements=Abonnement::all();
    $users=User::where('role', '=', '0')->get();
    $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
    $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
    $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
    return view('user.showjeton',compact('countmsg','abonnements','formations','users','cats','scats','count','countparr'));

   }
   //USER COMPETENCE
   public function usercompetences()
   {
    if (!Auth::user()) {
        return redirect(route('registeruser'));
    }
    $cats=Cat::all();
    $scats=Scat::where('id','=','cat_id')->get();
    $scats=Scat::all();
    $data = DB::table('users_competences')->get();
    return view('user.competence',compact('scats','cats','data'));
   }
   public function usercom(Request $request)
   {
           for($i=0;$i<count($request->scat_id);$i++)
           {
               $comp = new UserCompetence();
               $comp ->user_id = Auth::user()->id;
               $comp ->scat_id = $request->scat_id[$i];
               $comp ->niv = $request->niv[$i];
               $comp->save();
           }
      return $this->test();
   }

   public function test(){
    $formations1=Formation::all();
    $abonnements=Abonnement::all();
    $cats=Cat::all();
    $users=User::where('role', '=', '0')->get();
    $technologies = UserCompetence::where('niv','<>','Expert')->where('user_id',Auth::user()->id)->get();
        foreach($technologies as $technologie)
        {
            $formation = Formation::where('scat_id',$technologie->scat_id)->get();
            if($formation){
                $formations[] = $formation;
            }
        }
         // dd($formations);
     $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
     $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
     $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
     return view('user.aide',compact('countmsg','formations','abonnements','users','cats','count','formations1','countparr'));
    }

    //All formation
    public function allformations()
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
         //$cats = Cat::with('cats')->get();
        $cats=Cat::all();
        $formations=Formation::all();
        $abonnements=Abonnement::all();
        $users=User::where('role', '=', '0')->get();
        $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
        $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
       // nbr de visiteurs
        $pojects=participationpartie::latest()->paginate(5);
        participationpartie::increment('views');
        $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
        return view('user.allformation',compact('countmsg','abonnements','formations','users','cats','count','pojects','countparr'));
    }
    public function detailsformations($id)
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $cats=Cat::with('scats')->get();
        $users=User::all();
        $reviews=Note::all();
        $reviews=Note::orderBy('created_at', 'asc')->first();
        $formations=\App\Models\Formation::where('id',$id)->first();
        $post_detail = Formation::with('ReviewData')->find($id);
        $formations = Formation::with('Parties')->find($id);
        $count = DB::table('parties')->where('formation_id',$id)->count();
        $parties=\App\Models\Partie::where('formation_id',$id)->get();
        $countt = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
        $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
        $countnotes=DB::table('notes')->where('formation_id',$id)->sum('note') ;
        $countnote= ($countnotes *5) /100;
        $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $countcommnt=DB::table('notes')->where('formation_id',$id)->count('comments');
        return view('user.detailsformation',compact('countnotes','countparr','countcommnt','countmsg','countnote','formations','cats','users','reviews','post_detail','count','parties','countt'));
    }
    //Myformation apres achat

    public function myformations(Request $request)
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $id=$request['id'];
        $cats=Cat::with('scats')->get();
        $formations=\App\Models\Formation::where('id',$id)->first();
        $achatformations=\App\Models\Achatformation::where('user_id',Auth::user()->id)->get();
        $formations=\App\Models\Formation::with('achatformations')->get();
        $formations = Formation::with('Parties')->find($id);
        $countt = DB::table('parties')->where('formation_id',$id)->count();
        $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
        $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
        $historiqparticipationpartie=DB::table('historiqparticipationparties')->where('formation_id',$id)->count();
        $countpartie = DB::table('parties')->where('formation_id',$id)->count();
        return view('user.myformation',compact('countpartie','historiqparticipationpartie','countmsg','cats','achatformations','formations','count','countt','countparr'));
    }

    //MES FORMATIONS
    public function mesformation(Request $request)
    {
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $id=$request['id'];
        $cats=Cat::with('scats')->get();
        $formations=\App\Models\Formation::where('id',$id)->first();
        $achatformations=\App\Models\Achatformation::where('user_id',Auth::user()->id)->get();
        $formations=\App\Models\Formation::with('achatformations')->get();
        $formations = Formation::with('Parties')->find($id);
        $countt = DB::table('parties')->where('formation_id',$id)->count();
        $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
        $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
        $historiqparticipationpartie=DB::table('historiqparticipationparties')->where('formation_id',$id)->count();
        $countpartie = DB::table('parties')->where('formation_id',$id)->count();

        return view('user.mesformations',compact('countpartie','historiqparticipationpartie','countmsg','cats','achatformations','formations','count','countt','countparr'));
    }


    ////NOTES
    public function viewnotes($id)
    {
        $cats=Cat::with('scats')->get();
        $post_detail = Formation::with('ReviewData')->orderBy('created_at', 'desc')->find($id);
        $countuser=DB::table('notes')->where('formation_id',$id)->where('user_id',$id)->count();
        $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
        $countnote=DB::table('notes')->where('formation_id',$id)->count();
        $countnote= ($countnote *5) /100;
        $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
        return view('user.viewnote',compact('countmsg','post_detail','cats','count','countuser','countnote','countparr'));
    }
    public function reviewstore(Request $request){
        $review = new Note();
        $review->user_id = $request->user_id;
        $review->formation_id = $request->formation_id;
        $review->note = $request->note;
        $review->comments= $request->comment;
        $review->save();
         return redirect()->back()->with('flash_msg_success',' Votre avis a été soumis avec succès');
    }
    //Achatformations
    public function achatformation(Request $request)
    {
         $users = User::all();
         $id=$request['id'];
         $formations=\App\Models\Formation::find($id);
         $parties=\App\Models\Partie::where('formation_id',$id)->get();
        // $parties=Partie::all();
         $part = PartieE::all();
         $countnote=DB::table('notes')->where('formation_id',$id)->count();
         $countnote= ($countnote *5) /100;
         $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
         return view('user.achatformations',compact('countnote','formations','users','countparr','part','parties'));
    }

    public function achatf(Request $request)
    {
        $id=$request['formation_id'];
        $formations=\App\Models\Formation::with('abonnement')->where('id',$id)->first();
        $jeton=Auth::user()->jeton;
        //dd($formations->abonnement->jeton);
         if ($jeton >= $formations->abonnement->jeton)
        {
                $id=$request['id'];
                $formations=\App\Models\Formation::find($id);
                $achatf = new \App\Models\Achatformation();
                $achatf->formation_id=$request->formation_id;
                $achatf->user_id=$request->user_id;
                $achatf->prix=$request->prix;
                $achatf->save();

              //Gainformateur
              $id=$request['id'];
              $formations=\App\Models\Formation::find($id);
              $gainsformateur = new \App\Models\Gainsformateur();
              $gainsformateur->formation_id=$request->formation_id;
              $gainsformateur->user_id=$request->user_id;
              $gainsformateur->prixformation=$request->prixformation;
              $gainsformateur->pourcentageF=$request->pourcentageF;
              $gainsformateur->formateur_id=$request->formateur_id;
              $gainsformateur->etatG=$request->etatG;
              $gainsformateur->gainF= ($request->prixformation * $request->pourcentageF)/100;
              $gainsformateur->gainA= ($request->prixformation -= $gainsformateur->gainF);
              $gainsformateur->save();

                //pour modifier les jetons aprés l'achat de la table users
                $id=$request['id'];
                $users= \App\Models\User::find($achatf->user_id);
                $users->update(['jeton' => $users->jeton -= $request['prix']]);

                //add part
                for($i=0;$i<count($request->partie_id);$i++)
                {
                    $part = new PartieE();
                    $part ->user_id = Auth::user()->id;
                    $part ->partie_id = $request->partie_id[$i];
                    $part ->f_id = $request->f_id[$i];
                    $part ->titrep = $request->titrep[$i];
                    $part ->desc = $request->desc[$i];
                    $part ->Etat = $request->Etat[$i];
                    $part->save();
                }

                return redirect()->route('myformation',compact('achatf','formations','gainsformateur','part'));
        }
        else
            {
                return redirect()->route('mercirecharge',compact('formations','jeton'));

            }
    }
//Commencer votreformation
public function commencerf(Request $request , $id)
{
        $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
        $cats=Cat::with('scats')->get();
        $users=User::all();
        $reviews=Note::all();
        $formations=\App\Models\Formation::where('id',$id)->first();
        $post_detail = Formation::with('ReviewData')->find($id);
        $formations = Formation::with('Parties')->find($id);
        $count = DB::table('parties')->where('formation_id',$id)->count();
        $counth = DB::table('historiqparticipationparties')->where('formation_id',$id)->count();
        $parties=\App\Models\Partie::where('formation_id',$id)->get();
        $part = PartieE::where('f_id',$id)->get();
        $countt = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
        $countnotes=DB::table('notes')->where('formation_id',$id)->sum('note') ;
        $countnote= ($countnotes *5)/100;
        $historique= DB::table('historiqparticipationparties')->where('formation_id',$formations->id)->get();
        //dd($historique);
        $historiqparticipationpartie=DB::table('historiqparticipationparties')->where('formation_id',$formations->id)->count();
        $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $countcommnt=DB::table('notes')->where('formation_id',$id)->count('comments');
    return view('user.commencerF',compact('part','counth','countnotes','historique','historiqparticipationpartie','countparr','countcommnt','countmsg','countnote','formations','cats','users','reviews','post_detail','count','parties','countt'));
}
//All chapitres
public function allchapitre($id)
{
    $cats=Cat::with('scats')->get();
    $users=User::all();
    $reviews=Note::all();
    $formations=\App\Models\Formation::where('id',$id)->first();
    $post_detail = Formation::with('ReviewData')->find($id);
    $formations = Formation::with('Parties')->find($id);
    $count = DB::table('parties')->where('formation_id',$id)->count();
    $counth = DB::table('historiqparticipationparties')->where('formation_id',$id)->count();
    $parties=\App\Models\Partie::where('formation_id',$id)->get();
    $historiqparticipationparties=\App\Models\historiqparticipationpartie::where('formation_id',$id)->get();
    $countt = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
    $countnote=DB::table('notes')->where('formation_id',$id)->count();
    $countnote= ($countnote *5) /100;
    $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
    $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
    $part = PartieE::where('f_id',$id)->get();

return view('user.allchapitres',compact('part','counth','historiqparticipationparties','countparr','countmsg','countnote','formations','cats','users','reviews','post_detail','count','parties','countt'));
}
 //Add Historiq partie
 public function AddH(Request $request)
 {
  $this->validate($request, [
      'new_id'=> 'string|nullable|max:255',
      'mail' => 'email|unique:parrainages|nullable|max:255',
      'user_id' => 'string|nullable|max:255',
      'etat' => 'string|nullable|max:255',
      ]);
   $historiqparticipationparties= new \App\Models\historiqparticipationpartie();
   $historiqparticipationparties->user_id=$request['user_id'];
   $historiqparticipationparties->partie_id=$request['partie_id'];
   $historiqparticipationparties->formation_id=$request['formation_id'];
   $historiqparticipationparties->etat=$request['etat'];
   $historiqparticipationparties->save();

   //update etat de la partie
     $id=$request['id'];
     $part= \App\Models\PartieE::where('partie_id',$request['partie_id'])->first();
    // dd($part);

     $part->update(['Etat' =>'oui']);
     return redirect()->back();
 }
 public function showchap($id)
 {
    $cats=Cat::with('scats')->get();
    $users=User::all();
    $parties=\App\Models\Partie::where('id',$id)->first();
    $formations = Formation::with('Parties')->find($id);
    $part = PartieE::where('partie_id',$id)->find($id);
    $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
    $countnote=DB::table('notes')->where('formation_id',$id)->count();
    $countnote= ($countnote*5) /100;
    $countt = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
    $count = DB::table('parties')->where('formation_id',$id)->count();
    $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
    return view('user.chapitre',compact('part','countmsg','parties','users','cats','countt','formations','countnote','count','countparr'));
   }

//MErci recharger votre compte
    public function mercirecharges()
    {
     $cats = Cat::with('scats')->get();
     $scats=Scat::all();
     $formations=Formation::all();
     $abonnements=Abonnement::all();
     $users=User::where('role', '=', '0')->get();
     $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
     $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
     $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
     return view('user.mercirecharge',compact('countmsg','abonnements','formations','users','cats','scats','count','countparr'));
    }

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
        return redirect()->route('dashboard');
   }
   //sho categ
   public function showcateg($id)
   {
    if (!Auth::user()) {
        return redirect(route('login'));
    }
      $cats=\App\Models\Cat::with('formations')->get();
      $formations=\App\Models\Formation::where('cat_id',$id)->with('cats')->get();
      $abonnements=Abonnement::all();
      $users=User::where('role', '=', '0')->get();
      $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
      $countt = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
      $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
      $countnote=DB::table('notes')->where('formation_id',$id)->count();
      $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
      return view('user.categ',compact('countnote','countmsg','cats','abonnements','formations','users','countt','count','countparr'));
     }
     public function formateurs($id)
     {
      $users=User::all();
      $cats = Cat::with('scats')->get();
      $scats=Scat::all();
      $allformation=Formation::all();
      $formations=\App\Models\Formation::where('user_id',$id)->get();
      $achatformations= DB::table('achatformations')->where('formation_id',$id)->count();
      $abonnements=Abonnement::all();
      $users=User::where('role', '=', '0')->get();
      $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
      $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
      $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();

      return view('user.formateur',compact('achatformations','users','allformation','countmsg','abonnements','formations','users','cats','scats','count','countparr'));
     }
//Repondre msg
public function repondreu(Request $request)
{
    $id=$request['id'];
    $cats = Cat::with('scats')->get();
    $formations=Formation::all();
    $abonnements=Abonnement::all();
    $users=User::where('role', '=', '0')->get();
    $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
    $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
    $countnote=DB::table('notes')->where('formation_id',$id)->sum('note');
    $countnotes= ($countnote *5) /100;
    $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
    $achatformations=\App\Models\Achatformation::where('user_id',Auth::user()->id)->get();
    return view('user.repondre',compact('countnotes','countnote','countmsg','abonnements','formations','users','cats','count','countparr','achatformations'));
}

public function Historiqueachats(Request $request)
{
    $id=$request['id'];
    $cats = Cat::with('scats')->get();
    $abonnements=Abonnement::all();
    $formations=Formation::all();
    $users=User::where('role', '=', '0')->get();
    $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
    $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
    $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
    $achatformations=\App\Models\Achatformation::where('user_id',Auth::user()->id)->get();
    return view('user.historiqueachats',compact('formations','countmsg','abonnements','users','cats','count','countparr','achatformations'));
}
public function recues($id)
     {
      $users=User::all();
      $cats = Cat::with('scats')->get();
      $scats=Scat::all();
      $allformation=Formation::all();
      $formations=\App\Models\Formation::all();
      $achatformations=\App\Models\Achatformation::where('formation_id',$id)->get();
      $abonnements=Abonnement::all();
      $users=User::where('role', '=', '0')->get();
      $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
      $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
      $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
      return view('user.recue',compact('achatformations','users','allformation','countmsg','abonnements','formations','users','cats','scats','count','countparr'));
     }
     public function factures($id)
     {
      $users=User::all();
      $cats = Cat::with('scats')->get();
      $scats=Scat::all();
      $allformation=Formation::all();
      $formations=\App\Models\Formation::all();
      $achatformations=\App\Models\Achatformation::where('formation_id',$id)->get();
      $abonnements=Abonnement::all();
      $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
      $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
      $countparr = DB::table('parrainages')->where('user_id',Auth::user()->id)->count();
      return view('user.facture',compact('achatformations','users','allformation','countmsg','abonnements','formations','users','cats','scats','count','countparr'));
     }
     public function downloadPDF(Request $request)
     {
        $id=$request['id'];
        $cats = Cat::all();
        $formations=\App\Models\Formation::all();
        $abonnements=Abonnement::all();
        $achatformations=\App\Models\Achatformation::where('formation_id',$id)->get();
        $pdf = PDF::loadView('user.facture',compact('achatformations','abonnements','formations','cats'));
        return $pdf->download('Facture.pdf');
     }
     public function Certif(Request $request)
     {
        $randomNumber = random_int(100000, 999999);
        $randomNumber1 = random_int(100000, 999999);
        $id=$request['id'];
        $users=User::all();
        $formations=\App\Models\Formation::where('id',$id)->first();
        $count = DB::table('parties')->where('formation_id',$id)->count();
        $historique= DB::table('historiqparticipationparties')->where('formation_id',$formations->id)->get();
        $historique=\App\Models\historiqparticipationpartie::orderBy('created_at', 'desc')->first();
      return view('user.certif',compact('users','formations','count','historique','randomNumber','randomNumber1'));
     }

     /////
     public function formats($id)
     {
      $users=User::all();
      $cats = Cat::with('scats')->get();
      $scats=Scat::all();
      $formations=\App\Models\Formation::where('user_id',$id)->get();
      $allformation=Formation::all();
      $abonnements=Abonnement::all();
      $users=User::where('role', '=', '0')->get();

      return view('user.forma',compact('users','allformation','abonnements','users','cats','scats','formations'));
     }

}



