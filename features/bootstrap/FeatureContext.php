<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Element\Element;

use Behat\MinkExtension\Context\MinkContext;
//use \AmeliaConfigs  as AmeliaConfigs ;
//use \AmeliaHandlers as AmeliaHandlers;
require_once('AmeliaHandlers.php');

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */


    public function __construct()
    {
	
    }
    
    /**
     * @Given I click the :arg1 element
     */
    public function iClickTheElement($selector)
    {
        $page    = $this->getSession()->getPage();
        $element = $page->find('css', $selector);
        
        if (empty($element)) {
            throw new Exception("No html element found for the selector ('$selector')");
        }
        
        $element->click();
    }
    
    /**
     * @When I wait for the page to be loaded
     */
    public function iWaitForThePageToBeLoaded()
    {
        $this->getSession()->wait(10000, "document.readyState === 'complete'");
    }
    
    
    
    /**
     * @Then I wait :sec sec
     */
    public function iWaitSec($sec)
    {
        sleep($sec);
    }
    

    /**GREETINGS
     * Checks, that page contains specified text
     * Example: Then I should see "Who is the Batman?"
     * Example: And I should see "Who is the Batman?"
     *
     * @Then Amelia should say :arg 
     */
    public function ameliaShouldSay($bubble)
    {
        $this->assertSession()->pageTextContains($this->fixStepArgument($bubble));
    }

     
    /**
     * Checks, that page contains specified text
     * Example: Then I should see "Who is the Batman?"
     * Example: And I should see "Who is the Batman?"
     *
     * @Then Amelia should greet you 
     */
    public function ameliaShouldGreetYou()
    {
			
		$greetings = AmeliaConfigs::GREETINGS;
		$AmelialastResponse = $this->getAmeliaLastResponse();
		if($AmelialastResponse && in_array($AmelialastResponse , $greetings))
		{
			return true;	
		}else{
            throw new \RuntimeException("Could not find Amelia's Greeting.");
		}
    }


    /**
     * semulating user input in chat
     *
     * @When User should say :say
     */
    public function userShouldSay($say)
    {	
		// fillField method does not require use method findAll so only use the class of user's text area
        $this->fillField(AmeliaConfigs::USER_CLASSES["user-chat-textarea"]["placeholder"],$say);
		$this->getSession()->getPage()->find("css",".ChatInput__submit-button")->click();
    }


    /**
     * @Then Amelia should respond with :say
     */
    public function ameliaShouldRespondWith($say)
    {
        $ameliaLastResponse = $this->getAmeliaLastResponse();
		if($ameliaLastResponse != $say){
            throw new \RuntimeException(sprintf("Amelia responded with '%s' , but '%s' was expected",$ameliaLastResponse,$say));
		}
    }


    /**
     * @When User select option :optionValue
     */
    public function userSelectOption($optionValue)
    {	
		$avaliableOptions = $this->getSession()->getPage()->findAll("css",".Select--singleSelection input");
		$optionFoundFlag = false;
		print_r(count($avaliableOptions));
		foreach($avaliableOptions as $option){
			print_r($option->getAttribute('value'));
			if($option->getAttribute('value') == $optionValue){
				$optionFoundFlag = true;
				$option->click();	
				break;
			}
		}
		// if we did not find the option
		if(!$optionFoundFlag){
            throw new \RuntimeException(sprintf("There was no option with value '%s'",$optionValue));
		}
   }


    /**
     * @Then User last Response should be :say
     */
    public function userLastResponseShouldBe($say)
    {
        $userLastResponse = $this->getUserLastResponse();
		if($userLastResponse != $say){
            throw new \RuntimeException(sprintf("User responded with '%s' , but '%s' was expected",$userLastResponse,$say));
		}
    }


    /**
     * @Then Amelia should respond with message like :msg
     */
    public function ameliaShouldRespondWithMessageLike($msg)
    {
        $ameliaLastResponse = $this->getAmeliaLastResponse();
		$pos = strpos($ameliaLastResponse,$msg);
		print_r($pos);  		
		if($pos === false){
			throw new \RuntimeException(sprintf("Amelia's message '%s' was not part of her last response '%s'",$msg,$ameliaLastResponse));
		}
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
     
	private function getAmeliaLastResponse()
	{
		$page = $this->getSession()->getPage();
		$ameliaClasses = AmeliaConfigs::AMELIA_CLASSES;
		$ameliaResponses = $page->findAll($ameliaClasses["amelia-chat-bubble"]["selector"],$ameliaClasses["amelia-chat-bubble"]["path"]);
		if($ameliaResponses){
			$lastResponse = end($ameliaResponses);
			return $lastResponse->getText();			
		}else{
			return false;
		}
	}


	private function getUserLastResponse()
	{
		$page = $this->getSession()->getPage();
		$userClasses = AmeliaConfigs::USER_CLASSES;
		$userResponses = $page->findAll($userClasses["user-response-bubble"]["selector"],$userClasses["user-response-bubble"]["path"]);

		if($userResponses){
			$lastResponse = end($userResponses);
			return $lastResponse->getText();			
		}else{
			return false;
		}
	}


}
