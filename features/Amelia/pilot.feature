Feature: Pilot
  In order to see a pilot trial for Amelia
  I need to be able to login
  
  @javascript
  Scenario: login to Amelia new UI
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
#When User should say "Bitlocker recovery key xAsVp1LoMtSsv39RQx"
When User should say "Bitlocker recovery key"
#Then I wait 2 sec
#Then User last response should be "Bitlocker recovery key"
Then I wait 5 sec
Then Amelia should respond with "I'm happy to help you with your Bitlocker issues."
Then I wait 5 sec	
Then Amelia should respond with "May I please have your email address."
When User should say "vispltest.ameliatesting02@ppinternal.vodafone.com"
Then I wait 10 sec
Then Amelia should respond with "Please select one of the above options."
Then I wait 5 sec
When User select option "4"
Then I wait 2 sec
Then Amelia should respond with message like "please provide your asset ID"
Then I wait 5 sec
Then Amelia Should Respond with "Does your mobile number ends with ********* 531"
When User select option "yes"
Then I wait 2 sec 
Then Amelia should respond with "Do you prefer to receive your Bitlocker Key to your mobile or to your email address?"
When User select option "Mobile"
Then I wait 15 sec
		
