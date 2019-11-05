<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

		use phpseclib\Crypt\RSA;

class RSAController extends Controller
{
    //
    public function createKey(){
    	//create key
			$rsa = new RSA();
			 
			//$rsa->setPrivateKeyFormat(RSA::PRIVATE_FORMAT_PKCS1);
			//$rsa->setPublicKeyFormat(RSA::PUBLIC_FORMAT_PKCS1);

			//define('CRYPT_RSA_EXPONENT', 65537);
			//define('CRYPT_RSA_SMALLEST_PRIME', 64); // makes it so multi-prime RSA is used
			$array = $rsa->createKey(1024); // == $rsa->createKey(1024) where 1024 is the key size

			$message = "chan vclll hahaha";

			$hashMessage = md5($message);

			$rsa->loadKey($array['publickey']);//publickey

			$signature = $rsa->encrypt($hashMessage);
			

			echo 'Chu ky dien tu : '.$signature;
			echo "<br>";

			//kiem tra chu ky
			

			//giai ma chu ky
			$rsa->loadKey($array['privatekey']); // private key
			echo 'sau khi giai ma chu ky : '.$rsa->decrypt($signature);
			echo "<br>";
			echo 'Bam message : '.$hashMessage;
			echo "<br>";
			if ($hashMessage == $rsa->decrypt($signature)) {
				# code...
				echo "File khong thay doi tren duong truyen";
			}


/*
		//convert privateKey
			$rsa = new RSA();
			//$rsa->setPassword('password'); 
			$rsa->loadKey('...');

			//$rsa->setPassword(); // clear the password if there was one
			$privatekey = $rsa->getPrivateKey(); // could do RSA::PRIVATE_FORMAT_PKCS1 too
			$publickey = $rsa->getPublicKey(); // could do RSA::PUBLIC_FORMAT_PKCS1 too

		//convert publicKey
			$rsa = new RSA();
 
			$rsa->loadKey('...');
			$rsa->setPublicKey();

			$publickey = $rsa->getPublicKey(); // could do RSA::PUBLIC_FORMAT_PKCS1 too


		//create/verify signature
			$rsa = new RSA();
			//$rsa->setPassword('password');
			$rsa->loadKey('...'); // private key

			$plaintext = '...';

			//$rsa->setSignatureMode(RSA::SIGNATURE_PSS);
			$signature = $rsa->sign($plaintext);

			$rsa->loadKey('...'); // public key
			echo $rsa->verify($plaintext, $signature) ? 'verified' : 'unverified';

		//encrypt  decrypt message
			$rsa = new RSA();
			$rsa->loadKey('...'); // public key

			$plaintext = '...';

			//$rsa->setEncryptionMode(RSA::ENCRYPTION_OAEP);
			$ciphertext = $rsa->encrypt($plaintext);

			$rsa->loadKey('...'); // private key
			echo $rsa->decrypt($ciphertext)

			*/
    }
}
