<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\UserCompetence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class isNotNiv
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

            $technologies = UserCompetence::where('user_id',Auth::user()->id)->get();
            
            if ($technologies) {

                return $next($request);
            }
            else {
                return redirect()->route('resultest');
            }
    }
}
