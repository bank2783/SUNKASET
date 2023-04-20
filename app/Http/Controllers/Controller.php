<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function PutMessageLine($line_msg,$type){
    //     $ch = curl_init('https://notify-api.line.me/api/notify'.$type);
    //     $authorization = "Authorization: Bearer 7ii8h72WOu1qmolQ003UGZXHrgJTQzNaCyCyQ9b8coq";
    //     $payload = json_encode($line_msg);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS,$payload);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$authorization));
    //     curl_setopt($ch, CURLOPT_RETURNRANSFER,true);

    //     $resule = curl_exec($ch);
    //     curl_close($ch);
    // }
}
