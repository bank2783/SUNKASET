<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\market;

class CheckMarketApprove
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
        // if(Auth::check()){
        //     $market = market::where('user_id','=',Auth::user()->id)->where('market_status','=','approved')->first();
        //     if($market == null){
        //         return redirect()->route('/');
        //     }
        //     else{
        //         return $next($request);
        //     }
        // }
    }
}
