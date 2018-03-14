<?php
include('conn/koneksi.php');
$conn = new Connection();
$conn->connOpen();

@session_start();

$aksi=$_GET["aksi"];

if ($aksi=='kritik'){
	$kritik3 = $_POST['kritik'];
	$kritik2 = mysql_real_escape_string($kritik3);
	$kritik = strip_tags($kritik2);

	mysql_query("INSERT INTO `kaluhan` (`id_keluhan`, `keluhan`, `tanggaljam`) VALUES (NULL, '$kritik', CURRENT_TIMESTAMP);");


  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    $ip=$_SERVER['HTTP_CLIENT_IP'];
  } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  } else{
    $ip=$_SERVER['REMOTE_ADDR'];
  }

  $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
  $jam = date("Y-m-d h:i:sa");





function kirimperintah($perintah,$token_bot,array $keterangan=null)
{
$url="https://api.telegram.org/bot".$token_bot."/";
$url.=$perintah."?";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$keterangan);
$output = curl_exec($ch);
curl_close($ch);
return $output;
}





	$token_bot="337437271:AAEsxzxKS_iTZz9Aa0dNpfl9Zty29G7yNtc";
	$id="540687478";
	$text="
	<i>Kritik</i>
	Hostname : $hostname
	Ip : $ip
	Jam : $jam

	<b>Isi Kritik :</b>
	$kritik

	";


	$post = array("chat_id" => $id, "text"=> $text, "parse_mode" => "HTML");
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"https://api.telegram.org/bot" .$token_bot. "/sendMessage");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_exec ($ch);
	curl_close ($ch);



// TELEGRAM END

	header('location:index.php');
}

$conn->connClose();
?>
