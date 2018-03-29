# Behat3-Mink-Kickstart
This Repoitory meant to be a kickstart for developers who intent to start using behvioural testing for their application by using Behat testing framework which already integrated with both Mink framework , goute driver , selenium web-derive and chrome web-driver

How to Install :

- Install PHP 
- Install Composer 
  - sudo apt-get update
  - sudo apt-get install curl  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; # Install the curl utility
  - sudo curl -s https://getcomposer.org/installer | php &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; # Download the installer
- composer update      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  # download dependencies
- bin/behat -h   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; # show help , also no need for behat intialization (bin/behat --init )since features directory is already attached the repo and integration between Mink and Behat in Bootstrap/FeatureContext.php
- bin/behat -dl  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; # show avaliable functions (Mink) 
- bin/behat features/search.feature   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  # test the WIKI search scenario 
