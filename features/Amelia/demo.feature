Feature: Fixed Line Epics Demo
  In order to explore basic functionalities of Amelia 2 


  @javascript
  Scenario: login to Amelia new UI for fixed line epic demo
    Given I am on "/AmeliaCust/index.html"
    Then I wait 10 sec
    Then Amelia should greet you	
    Given I click the ".toggle-menu-button" element
    Then I should see "Login"
    When I follow "Login"
    When I fill in "username" with "ahmed.reda1@vodafone.com"
    When I fill in "password" with "Hello@1234"
    And I click the ".LoginForm__button" element
    Then I wait 10 sec
    Then I should see "Hi, Ahmed Reda"
    Then I should see "Select a domain."
    When I follow "Vodafone-Stg"
    Then I wait 10 sec
    Then I should see "Welcome to Vodafone Service Desk Ahmed. How can I help you?"
	When User should say "i need to raise a nonstandard request"
	Then I wait 5 sec
	Then Amelia should respond with "I am happy to help you raise a Non-Standard Service Request (Fixed Line) on your behalf."
	Then I wait 5 sec	
	Then Amelia should respond with "May I please have your email address."
	When User should say "user.ameliatesting1@vodafone.com"
	Then I wait 10 sec
	Then Amelia should respond with "Is this request for you or someone else?"
	When User should say "me"
	Then I wait 5 sec
	Then I should see "Please note a Non Standard Service Request has an SLA of 20 working days. A Standard Request has an SLA of 5 working days."	
	Then I should see "Please note, your Non - Standard Request will be rejected/cancelled by the Resolver Team if there is already a Standard option available for the Request."
	Then I should see "Please confirm if you would like to proceed with a Non Standard Request?"
	When User should say "yes"
	Then I wait 5 sec
	Then Amelia should respond with "Please provide a detailed description of the Request."
	When User should say "TESTING"
	Then I wait 5 sec
	Then Amelia should respond with message like "Do you have the following information."
	Then Amelia should respond with message like "Resolving team ( Queue Name or Engineer Name from the resolver team )"
	When User should say "no"
	Then I wait 5 sec
	Then Amelia should respond with message like "Do you have any attachment to be added?"
	When User should say "no"
	Then I wait 30 sec
	Then I should see "A request has been created. For future reference the request number is REQ0000"
	Then I should see "I am glad I was able to help you."
	Then I should see "This conversation has been closed."
