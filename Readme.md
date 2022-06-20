## Code quality & Maintainability
Code quality has been validated by Codacy. You can access the inspection report by clicking on the badge below.

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/cbae18f267754daebf3f44fde38d71c9)](https://www.codacy.com/gh/Kakahuette400/project_07/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Kakahuette400/project_07&amp;utm_campaign=Badge_Grade)

Maintanibility has been validated by CodeClimate. You can access the inspection report by clicking on the badge below.

[![Maintainability](https://api.codeclimate.com/v1/badges/41c949735602a5a2f964/maintainability)](https://codeclimate.com/github/Kakahuette400/project_07/maintainability)

## Installation
- PHP 8.0.13
- MySql 5.7.36
- Apache 2.*
- OpenSSL
- Symfony 6

## Requirements
- Localhost 
For this project i used WAMPSERVER avaible here : https://www.wampserver.com/ (include PHP/SQL/APACHE)

- OpenSSL
To use JWT you need OpenSSl avaiable here : https://slproweb.com/products/Win32OpenSSL.html (take 64 version)


## Installing the project:
Step 1: Clone the Repository on server from the root via the command: **git clone https://github.com/Kakahuette400/project_07.git**

Step 2: Install composer on your project if it's not already the case: https://getcomposer.org/
- Install all dependances avaible on : https://packagist.org/ whit "composer install"
- Read the documentation to customize your installation

Step 3: To create a database follow this instructions :

`Place this command in your terminal `
  
    1 - php bin/console doctrine:database:create
    2 - php bin/console doctrine:migrations:migrate
    3 - php bin/console doctrine:fixtures:load


Step 4: Create SSH Keys ->  Add your passphrase "JWT_PASSPHRASE=" into .env.local or env

`Place this command in your terminal`
  
    1 - mkdir config/jwt
    2 - openssl genrsa -out config/jwt/private.pem -aes256 4096
    3 - openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem


Step 5: Run the application : 

`Place this command in your terminal `
  
    php -S localhost:8000 -t public   

## Principle libraries used:
The libraries were installed via composer, please install it:
- For the API: **api-platform/core** https://packagist.org/packages/api-platform/core
- For the fake data : **fakerphp/faker** https://packagist.org/packages/fakerphp/faker
- For the documentation **nelmio/api-doc-bundle https://packagist.org/packages/nelmio/api-doc-bundle
- For the JWT Authentication : **lexik/jwt-authentication-bundle** https://packagist.org/packages/lexik/jwt-authentication-bundle














