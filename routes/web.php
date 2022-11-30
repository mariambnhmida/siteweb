<?php
use App\Models\UserCompetence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeeController;
use App\Http\Controllers\ExemplController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\AddFormateurController;
use App\Http\Controllers\ContactparrainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/exemple', [ExemplController::class, 'exmp'])->name('exemple');




Route::get('/', [WelcomeController::class, 'indexwelcome'])->name('welcome');

Auth::routes();
Route::get('redirect',function(){

    if (Auth::user()->role == 1) {
        return redirect()->route('redirects');
    }
     elseif (Auth::user()->role == 0) {
        return redirect()->route('dashboard');
    }
     elseif (Auth::user()->role == 2) {
        $technologies = UserCompetence::where('user_id',Auth::user()->id)->exists();
            if ($technologies) {
                return redirect()->route('resultest');
            }
            else {
                return redirect()->route('competence');
            }
    }
})->name('redirect');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    return view('dashboard');
})->name('dashboard');
//contact us
Route::post('/welcome',[ WelcomeController::class,'createcontactus'])->name('createcontactus');
Route::get('/wformation/{id}', [WelcomeController::class, 'wformation'])->name('wformation');

//adminFormateur
Route::get('/redirects', [HomeeController::class, 'index'])->name('redirects');
Route::get('/showformateur', [ AddFormateurController::class, 'showformateurr' ])->name('showformateur');
Route::get('/paiementF', [ AddFormateurController::class, 'paiementf' ])->name('paiementF');
Route::get('/gainstotale{id}', [ AddFormateurController::class, 'totalef' ])->name('gainstotale');
Route::get('/paiement{id}', [ AddFormateurController::class, 'pay' ])->name('paiement');
Route::post('/payf', [ AddFormateurController::class, 'payf' ])->name('payf');
Route::get('/historiquer', [ AddFormateurController::class, 'historiqueR' ])->name('historiquer');

Route::get('/showformationF{id}', [ AddFormateurController::class, 'showformationf' ])->name('showformationF');
Route::get('/showdetailF/{id}', [ AddFormateurController::class, 'showdetailf' ])->name('showdetailF');

Route::get('/ShowEditcompteA/{id}', [ AddFormateurController::class, 'ShowEditcompteA' ])->name('ShowEditcompteA');
Route::post('/EditCompteA', [ AddFormateurController::class, 'EditCompteA' ])->name('EditCompteA');
Route::get('/addformateur', [ AddFormateurController::class, 'addformateur' ])->name('addformateur');
Route::post('/add', [ AddFormateurController::class, 'Add' ])->name('addf');
Route::get('/ShowDeleteF/{id}', [ AddFormateurController::class, 'ShowDeleteF' ])->name('ShowDeleteF');
Route::post('/DeleteF', [ AddFormateurController::class, 'DeleteF' ])->name('DeleteF');
Route::get('/ShowEditF/{id}', [ AddFormateurController::class, 'ShowEditF' ])->name('ShowEditF');
Route::post('/EditF', [ AddFormateurController::class, 'EditF' ])->name('EditF');
Route::get('/showetudiant', [ AddFormateurController::class, 'showetudiantt' ])->name('showetudiant');
Route::post('/showe', [ AddFormateurController::class, 'showe' ])->name('showe');
Route::get('/showformationE/{id}', [ AddFormateurController::class, 'showformationetudiant' ])->name('showformationE');
Route::get('/showparticipation/{id}', [ AddFormateurController::class, 'showparticipations' ])->name('showparticipation');
Route::get('/consulterformation', [ AddFormateurController::class, 'consulterformations' ])->name('consulterformation');
Route::get('/showdetailsP/{id}', [ AddFormateurController::class, 'showdetailsp' ])->name('showdetailsP');
Route::get('/consulterparrainage', [ AddFormateurController::class, 'consulterparrainages' ])->name('consulterparrainage');

//voir historiq jetons
Route::get('/historiqjeton', [ AddFormateurController::class, 'historiqjetons' ])->name('historiqjetons');
Route::post('/hjeton', [ AddFormateurController::class, 'hjeton' ])->name('hjeton');

//voir tous  historiq formation achat
Route::get('/historiqformation', [ AddFormateurController::class, 'historiqformations' ])->name('historiqformations');
//categories
Route::get('/listcateg', [CatsController::class, 'indexx'])->name('listcateg');
Route::get('/addcateg', [ CatsController::class, 'addcateg' ])->name('addcateg');
Route::post('/addc', [ CatsController::class, 'AddCat' ])->name('addc');
Route::get('/ShowEditC/{id}', [ CatsController::class, 'ShowEditC' ])->name('ShowEditC');
Route::post('/EditC', [ CatsController::class, 'EditC' ])->name('EditC');
Route::get('/ShowDeleteC/{id}', [ CatsController::class, 'ShowDeleteC' ])->name('ShowDeleteC');
Route::post('/DeleteC', [ CatsController::class, 'DeleteC' ])->name('DeleteC');

//ABONNEMENT
Route::get('/listabonnoment', [AbonnementController::class, 'index1'])->name('listabonnement');
Route::get('/addabonnement', [ AbonnementController::class, 'addabonnement' ])->name('addabonnement');
Route::post('/adda', [ AbonnementController::class, 'AddAbon' ])->name('adda');
Route::get('/ShowEditA/{id}', [ AbonnementController::class, 'ShowEditA' ])->name('ShowEditA');
Route::post('/EditA', [ AbonnementController::class, 'EditA' ])->name('EditA');
Route::get('/ShowDeleteA/{id}', [ AbonnementController::class, 'ShowDeleteA' ])->name('ShowDeleteA');
Route::post('/DeleteA', [ AbonnementController::class, 'DeleteA' ])->name('DeleteA');

//Souscategories
Route::get('/listscat', [ScatController::class, 'index2'])->name('listscat');
Route::get('/addscat', [ ScatController::class, 'addscat' ])->name('addscat');
Route::post('/adds', [ ScatController::class, 'AddScatt' ])->name('adds');
Route::get('/ShowEditS/{id}', [ ScatController::class, 'ShowEditS' ])->name('ShowEditS');
Route::post('/EditS', [ ScatController::class, 'EditS' ])->name('EditS');
Route::get('/ShowDeleteS/{id}', [ ScatController::class, 'ShowDeleteS' ])->name('ShowDeleteS');
Route::post('/DeleteS', [ ScatController::class, 'DeleteS' ])->name('DeleteS');
Route::get('/adminShowSsouscategorie/{id}', [ScatController::class, 'adminShowSsouscategorie'])->name('adminShowSsouscategorie');
Route::get('/souscategorie/{id}', [ScatController::class, 'adminShowScategorie'])->name('adminShowScategorie');

//ContactADMIN
Route::get('/mesmsg' , [AddFormateurController::class,'mesmsgs'])->name('mesmsg');
Route::get('/showmsg', [ AddFormateurController::class, 'Showmsg' ])->name('showmsgg');
Route::get('/ShowDeletemsg/{id}', [ AddFormateurController::class, 'ShowDeletemsg' ])->name('ShowDeletemsg');
Route::post('/Deletemsg', [ AddFormateurController::class, 'Deletemsg' ])->name('Deletemsg');
Route::get('/contacta', [AddFormateurController::class,'showcontactadmin'])->name('contacta');
Route::post('/contactA', [AddFormateurController::class,'createcontactA'])->name('createcontactA');
//dashFormateur
Route::get('/showhistorique', [FormateurController::class, 'Showhistorique'])->name('showhistorique');
Route::get('/dashboard', [HomeeController::class, 'index'])->name('dashboard');
Route::get('/ShowEditcompte/{id}', [ FormateurController::class, 'ShowEditcompte' ])->name('ShowEditcompte');
Route::post('/EditCompte', [ FormateurController::class, 'EditCompte' ])->name('EditCompte');
Route::get('/historiqp/{id}', [ FormateurController::class, 'historiqP' ])->name('historiqp');
Route::get('/mesgains', [FormateurController::class, 'mesgain'])->name('mesgains');

//Contactformateur
Route::get('/contact', [FormateurController::class,'showcontact'])->name('contact');
Route::post('/contactM', [FormateurController::class,'createcontact'])->name('createcontact');
Route::get('/showinbox' , [FormateurController::class,'Showinbox'])->name('showinbox');

//addformations formateur
Route::get('/listformation', [FormateurController::class, 'index3'])->name('listformation');
Route::get('/formation', [ FormateurController::class, 'addformation' ])->name('addformation');
Route::post('/addfor', [ FormateurController::class, 'AddF' ])->name('addfor');
Route::get('/ShowEditFormation/{id}', [ FormateurController::class, 'ShowEditFormation' ])->name('ShowEditFormation');
Route::post('/Editformation', [ FormateurController::class, 'Editformation' ])->name('Editformation');
Route::post('/DeleteFormation', [ FormateurController::class, 'DeleteFormation' ])->name('DeleteFormation');
Route::get('/formationdetails/{id}', [ FormateurController::class, 'formationdetail' ])->name('formationdetails');
Route::get('/detailpartie/{id}', [ FormateurController::class, 'detailparties' ])->name('detailpartie');
Route::get('/recuf/{id}', [ FormateurController::class, 'recuF' ])->name('recuf');

//ADD PARTIE FORMATION formateur
Route::get('/addpartie/{id}', [ FormateurController::class, 'addparti' ])->name('addpartie');
Route::post('/addpartiepost', [ FormateurController::class, 'addpartiepost' ])->name('addpartiepost');
Route::get('/showpartief/{id}', [ FormateurController::class, 'showpartie' ])->name('showpartief');
Route::get('/editpartie/{id}', [ FormateurController::class, 'editpartie' ])->name('editpartie');
Route::post('/Editp', [ FormateurController::class, 'Editp' ])->name('Editp');
Route::post('/DeletePartie', [ FormateurController::class, 'DeletePartie' ])->name('DeletePartie');
Route::get('/historiqueretrait', [ FormateurController::class, 'historiqretrait' ])->name('historiqueretrait');
Route::get('/Dpdf',[App\Http\Controllers\FormateurController::class,'DPDF' ])->name('Dpdf');



//AUTHUSERRR
Route::get('/regiseruser', [ UserController::class, 'registeruser' ])->name('registeruser');
Route::post('/regiseruser', [ UserController::class, 'RegisterU' ])->name('registeru');
Route::get('/acceuil', [UserController::class, 'indexuser'])->name('acceuil');
Route::post('user/contactM',[ UserController::class,'createcontact'])->name('createcontact');
Route::get('/msg' , [UserController::class,'msgs'])->name('msg');
Route::get('/repondre' , [UserController::class,'repondreu'])->name('repondre');
Route::post('createcontactt',[ UserController::class,'createcontactt'])->name('createcontactt');

//dashUser
Route::get('/ShowEditcompteU/{id}', [ UserController::class, 'ShowEditcompteU' ])->name('ShowEditcompteU')->middleware('auth');
Route::post('/EditCompteU', [ UserController::class, 'EditCompteU' ])->name('EditCompteU')->middleware('auth');

//AJOUTER UN PARRAIN
Route::get('/showparrain', [ UserController::class, 'showparrain' ])->name('showparrain')->middleware('auth');
Route::post('/addpar', [ UserController::class, 'AddP' ])->name('addpar')->middleware('auth');
Route::get('/listparrainage', [ UserController::class, 'showlistparrain' ])->name('listparrainage')->middleware('auth');

//Maiiiiiiil
Route::get('send-mail',[ UserController::class,'AddP'])->name('send-mail')->middleware('auth');

//SHOW ABONNEMENT
Route::get('/showabonnement', [ AbonnementController::class, 'showabonnement' ])->name('showabonnement')->middleware('auth');
Route::post('/addab', [ AbonnementController::class, 'AddAB' ])->name('addab')->middleware('auth');
    //dd("Email is Sent.");

//STRIPE
Route::get('checkout/{id}','App\Http\Controllers\CheckoutController@show')->name('checkout');
Route::post('checkout','App\Http\Controllers\CheckoutController@checkout')->name('checkout.credit-card');
Route::get('/checkout1','App\Http\Controllers\CheckoutController@afterPayment')->name('afterPayment');

//Showjetons
Route::get('/Showjetons', [ UserController::class, 'showjetons' ])->name('Showjetons')->middleware('auth');
Route::post('/showjet', [ UserController::class, 'showJ' ])->name('showjet')->middleware('auth');

//cropping
Route::get('image-crop',[App\Http\Controllers\CropImageUploadController::class,'index' ])->name('image-crop');
Route::post('save-crop-image', [App\Http\Controllers\CropImageUploadController::class,'store' ]);

//usercompetences
Route::middleware(['middleware'=>'notniv'])->group(function () {
Route::get('/test', [ UserController::class, 'test' ])->name('resultest');
});
Route::get('/competence', [UserController::class, 'usercompetences'])->name('competence');
Route::post('/usercom', [ UserController::class, 'usercom' ])->name('usercom');

//ALL formation
Route::get('/allformation', [UserController::class, 'allformations'])->name('allformation');
Route::get('/detailsformation/{id}', [UserController::class, 'detailsformations'])->name('detailsformation');

//tous MES FORMATIONS
Route::get('/mesformations', [UserController::class, 'mesformation'])->name('mesformations');

//Achatformations
Route::get('/achatformations/{id}', [UserController::class, 'achatformation'])->name('achatformations');
Route::get('/myformation/(id)', [UserController::class, 'myformations'])->name('myformation');
Route::post('achatf/(id)', [UserController::class, 'achatf'])->name('achatf');
Route::get('/mercirecharge', [UserController::class, 'mercirecharges'])->name('mercirecharge');

//Commencer Formation
Route::get('/commencerF/{id}', [UserController::class, 'commencerf'])->name('commencerF');
Route::get('/allchapitres/{id}', [UserController::class, 'allchapitre'])->name('allchapitres');
//Note
Route::get('/viewnote/{id}',[UserController::class, 'viewnotes'])->name('viewnote');
Route::post('/review-store',[UserController::class, 'reviewstore'])->name('review.store');
Route::get('/search',[SearchController::class, 'search'])->name('web.search');
Route::get('/find',[SearchController::class, 'find'])->name('web.find');
//add hisoriq partie
Route::get('/chapitre/{id}', [ UserController::class, 'showchap' ])->name('chapitre');
Route::post('/addhistoriqp', [ UserController::class, 'AddH' ])->name('addhistoriqp');
//Voir categ  user
Route::get('/categ/{id}', [ UserController::class, 'showcateg' ])->name('categ');
//BOTMAN
Route::match(['get', 'post'], '/botman', [\App\Http\Controllers\BotmanController::class,'handle']);
//voir formation des Formateurs
Route::get('/forma/{id}', [UserController::class, 'formats'])->name('forma');
Route::get('/formateur/{id}', [UserController::class, 'formateurs'])->name('formateur');
Route::get('/historiqueachats', [UserController::class, 'Historiqueachats'])->name('historiqueachats');
Route::get('/recue/{id}', [UserController::class, 'recues'])->name('recue');
Route::get('/facture/{id}', [UserController::class, 'factures'])->name('facture');
//pdf
Route::get('/download-pdf',[App\Http\Controllers\UserController::class,'downloadPDF' ])->name('download-pdf');
Route::get('/certif',[App\Http\Controllers\UserController::class,'Certif' ])->name('certif');
