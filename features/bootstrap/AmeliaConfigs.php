<?php

/**
 * Defines application features from the specific context.
 */
class AmeliaConfigs 
{
	 const GREETINGS = array(
		"Greetings.",
		"My greetings."
		);







	const AMELIA_CLASSES = array(
		"amelia-chat-bubble" => array(
				"selector"=>"css",
				"path"=>".message-chat--amelia .bubble-message div"
			)
		);




	const USER_CLASSES = array(
		"user-chat-textarea" => array(			
				"selector"=>"css",
				"path"=>".ChatInput__input",
				"type"=>"text",
				"placeholder"=>"Type your message here..."

			),
		"user-response-bubble" => array(
				"selector" => "css",
				"path"=> ".user-bubble-message div"

			)	

		);









} 
