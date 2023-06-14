<?php
$fullName = $_REQUEST['fullName'];
$phoneNumber = $_REQUEST['phoneNumber'];
$email = $_REQUEST['email'];
$mailingAddress = $_REQUEST['mailingAddress'];
$tellAnswer = $_REQUEST['tellAnswer'];
$agree = $_REQUEST['agree'];

$regUrl = "http://amberconnect.com/idayforyogaAPI/Register";
$regPostArray = array("Name" => $fullName, "Email" => $email, "PhoneNumber" => $phoneNumber, "MailingAddress" => $mailingAddress, "HearAbout" => $tellAnswer, "Disclaimer" => $agree);
$regData = getData($regUrl, $regPostArray);
$regJson = json_decode($regData);

echo $status = $regJson->response->status->success;

function getData($url,$post) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
?>