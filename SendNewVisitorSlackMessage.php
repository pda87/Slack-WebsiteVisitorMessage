<?php

$requestMethod = $_SERVER['REQUEST_METHOD'];

switch($requestMethod) {
	case 'GET':
		GetMethod();
	break;
	case 'POST':
		PostMethod();
		break;
	default:
		echo 'Unhandled request';
}

function GetMethod()
{
	//Slack API Key
	$slackAPIKey = "MySlackAPIKey";
	//The ID of the channel where the message should be posted
	$slackChannelID = "MySlackChannelID";
	//The username of the bot which will send the message
	$botUsername = "MyBotUsername";
	//The message to send
	$message = "You%20have%20a%20website%20visitor";

	$slackSendMessageURL = "https://slack.com/api/chat.postMessage?token=slackAPIKey&channel=$slackChannelID&username=$botUsername&as_user=false&text=$message";

	$response = file_get_contents($slackSendMessageURL);	
}

function PostMethod()
{
	//Read the IP address from the Post request
	$ipAddress = $_POST["ip"];
	
	//Get the location data from IP API
	$gpsResponse = file_get_contents("http://ip-api.com/json/$ipAddress");
	$gpsJSON = json_decode($gpsResponse);
	
	//A Slack webhook to allow a bot to send messages to a channel
	$slackWebhook = "MySlackWebhook";
	
	//Build JSON for Slack request
	$attachments = array([
	  "fallback" => "Something went wrong",
	  "pretext" => "New Website Visitor",
	  "mrkdown" => "true",
	  "title" => $gpsJSON->query,
	  "text" => "City: ".$gpsJSON->city."\nZip: ".$gpsJSON->zip." \nCountry: ".$gpsJSON->country,	  
	]);

	$data = json_encode(
	array(
	"attachments" => $attachments
	));

	//Execute Slack Webhook
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $slackWebhook);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

	$result = curl_exec($ch);
}
?>