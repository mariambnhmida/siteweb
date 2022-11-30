<?php

namespace App\Http\Controllers;
use App\Models\Cat;
use App\Models\Scat;
use App\Models\User;
use App\Models\Abonnement;
use App\Models\Achatjeton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Auth;



class CheckoutController extends Controller
{
    public function show ($id){
        if (!Auth::user()) {
            return redirect(route('login'));
        }
        $countmsg=  DB::table('contactas')->where('to',Auth::user()->email)->count();
        $cats = Cat::with('scats')->get();
        \Stripe\Stripe::setApiKey('sk_test_51KUxi1K08dThpNI9ofZ4psJmR68JDXunq8ayLem7C5zPwq0fFIwjKSdrnKPRSXa3FZppTgvKyALQBNmO2cr8s35L00qfwnoEqj');
        $abonnement=\App\Models\Abonnement::where('id', $id)->first();
        $amount = (int) $abonnement->prix;
		$amount *= 100;
        $amount = (int) $amount;
    $payment_intent = \Stripe\PaymentIntent::create([
        'description' => 'Stripe Test Payment',
        'amount' => $amount,
        'currency' => 'AED',
        'description' => 'Payment From All About site maryem',
        'payment_method_types' => ['card'],
    ]);
    $intent = $payment_intent->client_secret;
    $count = DB::table('achatformations')->where('user_id',Auth::user()->id)->count();
    return view ('checkout.credit-card',compact('abonnement','intent','cats','count','countmsg'));
}
    public function checkout(Request $request )
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51KUxi1K08dThpNI9ofZ4psJmR68JDXunq8ayLem7C5zPwq0fFIwjKSdrnKPRSXa3FZppTgvKyALQBNmO2cr8s35L00qfwnoEqj');
        $abonnement=\App\Models\Abonnement::where('id',$request->id)->first();
        $amount = 100;
		$amount = 100;
		$amount *= 100;
        $amount = (int) $amount;
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'AED',
			'description' => 'Payment From All About site maryem',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;
        $achat = new \App\Models\Achatjeton();
        $achat->user_id = $request['user_id'];
        $achat->abonnement_id=$request['abonnement_id'];
        $achat->prix=$request['prix'];
        $achat->save();
        //pour ajouter jeton table users
        $id=$request['id'];
        $users=\App\Models\User::find($id);
        $users->update(['jeton' => $users->jeton += $request['jeton']]);

        //jeton parrain
        $parrainages= \App\Models\Parrainage::where('mail',Auth::User()->email)->first();
    
        if($parrainages == null){
            return redirect()->route('afterPayment',compact('intent','achat','abonnement','parrainages'));
        }
        else{
            if ($parrainages->etat=='parrinée'){
                return redirect()->route('afterPayment',compact('intent','achat','abonnement','parrainages'));
            }
            else {
            $parrain= \App\Models\User::find($parrainages->user_id);
            $parrain->update(['jeton'=> $parrain->jeton += 1 ]);
            $parrainages->update(['etat'=>'parrinée']);
            return redirect()->route('afterPayment',compact('intent','achat','abonnement'));
            }
        }
    }

    public function afterPayment( )
    {
        echo 'Paiement reçu, merci d\'avoir utilisé nos services.';
    }
}
