This is a simple BVN verification App

follow the instructions below to run it on your local machine

You are expected to have the below applications installed on your local machine

PHPMYADMIN

XAMPP

PHP

LARAVEL

step1: clone the repository down to your local machine

step2: run `composer install`  to get the vendor folder on your local machine

Step 3: create a new file called `.env` then copy  the `.env.example` file  content and paste it into the `.env` file

step 4: Run `php artisan key:generate` to generate the key in the  `.env` file

step 5: Create a database in your phpmyadmin , name it `bvnverification`,  and edit the credentials in the .env file to match with your credentials like `DB_USERNAME` `DB_PASSWORD`, `DB_DATABASE`

step 6: Run `php artisan migrate` to get the tables in your phpmyadmin

step 7: Run `php artisan serve` to start the server, then paste the server into the browser to run the application 

step 8: Register as a user and login

Step 9: then use the below bvn to test the application 
            `11111111111`

to verify BVN via Api request  use the below endpoint and it should be a POST request

`http://127.0.0.1:8000/api/verifybvn`  

Remember to change the base URL to your own (the server you started)
and add this to the header


`'token' => 'SXFn2GA8.HwmyddDZkgmSdODrmtkHu1TwqPpagnKZ5PPE'`, `'Content-Type' => 'application/json'` 

and add this to the body


`{
    "id" : "11111111111",
    "isSubjectConsent": "true"
}`

Remember  not to choose  form-data in the postman body instead choose Raw and JSON
 

Congratulations  You have successfully run the BVN verification app on your local machine 
