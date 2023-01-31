<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class SessionController extends Controller{
  
        public function getSessionData(Request $request){
            if($request->session()->has('key')){
                return $request->session()->get('key');
            }
            else{
                return 'Session has no value';
            }
        }

        public function storeSessionData(Request $request){
            $request->session()->put('key', 'web journey');
            return 'Value successfully added to the session';
        }

        public function destroySessionData(Request $request){
            $request->session()->forget('key');
            return 'Session value successfully destroy';
        }

}

