<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Warehouse;
use App\Models\market;

class CheckMerchantEditProducts
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





        if(Auth::check()){

        $check_merchant_edit = market::where('user_id','=',Auth::user()->id)->first();
        $market_id = $check_merchant_edit->id;

        $warehouse = Warehouse::where('id','=',$request->route()->id)->first();

            // เช็ค ยืนยันตัวตนพ่อค้าที่จะแก้ไขข้อมูลใน record

        if(!empty($warehouse -> market_id)){
                return $next($request);
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }
    }
}
