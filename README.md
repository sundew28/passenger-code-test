# Passenger Code Test

A application to download and store postcodes and retrieve post codes on partial partial input (eg: M14 or M13 or AB10 or anything you wish you check for post coees) and postcodes on longitude and latitude entered. I have used laravel 10 framework to create the application and JWT to set up the authentication.

## Install

Clone the repo to your working directory using your favorite CLI console (eg: GitBash, PowerShell, cmd or any of your choice) 

```bash
$ git clone https://github.com/sundew28/passenger-code-test.git
```

Once you are done cloning the repo next would be to run composer in your console to install laravel framework dependencies by running the below composer command.

Via Composer

```bash
$ composer install
```

Once your dependencies are download next would be set up your JWT authentication key in the .env or enviorment file. This can be accomplished by running the command below

```bash
$ php artisan jwt:secret
```

Now lets move to creating our tables by running the artisan migrations command along with the seeder to populate the Users table with a basic user account.

```bash
$ php artisan migrate:fresh --seed --seeder=UsersTableSeeder
```

This would create all the basic tables to run your application soomthly. I have created a basic user account for easy to use in this case.

```php
// User account
   Email : admin@passenger.tech
   Password : adminadmin
```