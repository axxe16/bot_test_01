<?php
require_once 'config.php';
require_once 'FacebookBot.php';
$bot = new FacebookBot(FACEBOOK_VALIDATION_TOKEN, FACEBOOK_PAGE_ACCESS_TOKEN);
$bot->run();
$messages = $bot->getReceivedMessages();
foreach ($messages as $message)
{
	$recipientId = $message->senderId;
	if($message->text == trim("ciao"))
	{
		$bot->sendTextMessage($recipientId, $message->text . ' a te! ' . print_r($bot,true));
	}
	elseif($message->text) {
		$bot->sendTextMessage($recipientId, $message->text);
	}
	elseif($message->attachments)
	{
		$bot->sendTextMessage($recipientId, "Attachment received");
	}
	
}

function processRequest($text)
{
	$text = trim($text);
	$text = strtolower($text);
	$response = "";
	if($text=="domanda 1")
	{
		$response = "risposta alla domanda 1";
	}
	elseif ($text=="domanda 2")
	{
		$response = "risposta alla domanda 2";
	}
	elseif ($text=="debug")
	{
		$response = print_r($request);
	}
	else
	{
		$response = "Non capisco la domanda";
	}
	return $response;
}
