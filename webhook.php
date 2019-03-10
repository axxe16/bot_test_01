<?php
require_once 'config.php';
require_once 'FacebookBot.php';
$bot = new FacebookBot(FACEBOOK_VALIDATION_TOKEN, FACEBOOK_PAGE_ACCESS_TOKEN);
$bot->run();
$messages = $bot->getReceivedMessages();
foreach ($messages as $message)
{
	$recipientId = $message->senderId;
	if($message->text)
	{
		$response = processRequest($message->text);
		$bot->sendTextMessage($recipientId, $response);
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
	elseif ($text=="scuola" || $text=="issm" || $text=="istituto" || $text=="san marco")
	{
		
		
     $response = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"generic",
        "elements"=>[
          [
            "title"=>"ISSM",
            "item_url"=>"http://www.issm.it/",
            "image_url"=>"http://www.issm.it/wp-content/themes/issm_theme/img/testata_logo_v2-1.png",
            "subtitle"=>"Istituto Salesiano San Marco di Mestre",
            "buttons"=>[
              [
                "type"=>"web_url",
                "url"=>"http://www.issm.it",
                "title"=>"Vai al sito web"
              ],
              [
                "type"=>"postback",
                "title"=>"Inizia a chattare",
                "payload"=>"DEVELOPER_DEFINED_PAYLOAD"
              ]              
            ]
          ]
        ]
      ]
    ]];

     $response = [
    'recipient' => [ 'id' => $senderId ],
    'message' => $answer 
];
		
		
		$response = print_r($request);
	}
	else
	{
		$response = "Non capisco la domanda";
	}
	return $response;
}
