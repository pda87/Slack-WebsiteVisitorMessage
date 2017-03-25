<?php
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
?>