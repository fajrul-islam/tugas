<?php
$apikeysimak = "db429eff98bdfbad5db82761504d2225";//TA Client
function curl_post($url,$uid,$password){
	global $apikeysimak;
	if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', "X-API-KEY: $apikeysimak"));
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('uid'=> $uid, 'password'=> $password)));
	$result=curl_exec($ch);
	curl_close($ch);
	return $result;
}


function curl_get($url){
	global $apikeysimak;
	if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', "X-API-KEY: $apikeysimak"));
	$result=curl_exec($ch);
	curl_close($ch);
	return $result;
	//return json_decode($result,true);
}


$status = curl_get("https://simak.poliupg.ac.id/api/machine/get_tabel_konten/bri_mhs_aktif/thn_ajar/20201/kode_prodi/425/kelas/3C");

$arrMhs['data'] = json_decode($status);

file_put_contents("data.txt",json_encode($arrMhs));

?>