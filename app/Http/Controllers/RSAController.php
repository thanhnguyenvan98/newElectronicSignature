<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RSAController extends Controller
{
    //
    public function createKey(){
    	use ParagonIE\EasyRSA\KeyPair;
		$keyPair = KeyPair::generateKeyPair(4096);
		$secretKey = $keyPair->getPrivateKey();
		$publicKey = $keyPair->getPublicKey();
		echo $secretKey.'+++++'$publicKey;
    }
}
