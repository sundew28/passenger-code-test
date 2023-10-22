# Passenger Code Test

An application to download and store postcodes and retrieve post codes on partial partial input (eg: M14 or M13 or AB10 or anything you wish you check for post codes) and postcodes on longitude and latitude entered. I have used laravel 10 framework to create the application and JWT to set up the authentication.
I have used the application working around [postcodes.io](https://postcodes.io/) with validation. 

## Requirements

- PHP :- 8 or above
- MySQL :-5 or above
- Composer :- To install the dependencies
- Postman :- To test the API calls

## Install

Clone the repo to your working directory using your favorite CLI console (eg: GitBash, PowerShell, cmd or any of your choice) 

```bash
$ git clone https://github.com/sundew28/passenger-code-test.git
```

Once you are done cloning the repo next would be to run composer in your console to install laravel framework dependencies by running the below composer command. Make sure you have composer installed

Via Composer

```bash
$ composer install
```

Now lets move on to creating our tables by running the artisan migration command along with the seeder to populate the Users table with a basic user account.

```bash
$ php artisan migrate:fresh --seed --seeder=UsersTableSeeder
```

This would create all the basic tables to run your application smoothly. I have created a basic user account for easy to use in this case.

```php
// User account
   Email : admin@passenger.tech
   Password : adminadmin
```

## Security

For API authentication / security i have implemented the JWT auth instead of using santum or OAuth. JSON Web Token (JWT) is an open standard that allows two parties to securely send data and information as JSON objects. This information can be verified and trusted because it is digitally signed. JWT authentication has aided the wider adoption of stateless API services.

Once your dependencies are download and tables created next would be setting up your JWT authentication key in the .env or enviorment file. This can be accomplished by running the command below

```bash
$ php artisan jwt:secret
```

Check your .env file if the secret key is generated an example like below
```
JWT_SECRET=AYBKioTi6AOI1EOEMJkmrH8vHDquUnmot4ff6w7d4XBB3WC93ceqmSMJAtW8kxco

```

## Testing the Application

### Task 1) 

The instructions were to download and import postcodes into a database through a console command. You can use the below command to enter a postcode and grab the details and it being stored in the database table 'post_codes'.

```bash
$ php artisan app:import-post-codes
```

### Task 2)

The instructions were to enter a partial string matches (postcode) and grab the all possible postcodes and return back as a json response. I have used postman for testing my API end points created in the routes/api.php. Before checking you start to test the endpoint you will need to generate a JWT token inorder to see the controller in action found in app/Http/Controllers/PostCodesController.php

```bash
Url : <define your localhost with port/ virtual domain>localhost/api/login
Params : email <already a user account with email created. Please refer the doc for the informations>
		 password
```