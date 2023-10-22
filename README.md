# Passenger Code Test

An application to download and store postcodes and retrieve post codes on partial string matches (postcode) input (eg: M14 or M13 or AB10 or anything you wish you check for post codes) and postcodes on longitude and latitude entered. I have used laravel 10 framework to create the application and JWT to set up the authentication.
I have used the application working around [postcodes.io](https://postcodes.io/) with validation. 

## Requirements

- PHP :- 8 or above
- MySQL :- 5.6 or above
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

For API authentication / security i have implemented the JWT auth instead of using sanctum or OAuth. JSON Web Token (JWT) is an open standard that allows two parties to securely send data and information as JSON objects. This information can be verified and trusted because it is digitally signed. JWT authentication has aided the wider adoption of stateless API services.

Once your dependencies are download and tables created next would be setting up your JWT authentication key in the .env or enviorment file. This can be accomplished by running the command below

```bash
$ php artisan jwt:secret
```

Check your .env file if the secret key is generated an example like below
```
JWT_SECRET=AYBKioTi6AOI1EOEMJkmrH8vHDquUnmot4ff6w7d4XBB3WC93ceqmSMJAtW8kxco

```

## Testing the Application

All API endpoints require a post request to be made which is already made mandatory in the api route file for secure transfer of data.

### Task 1) 

The instructions were to download and import postcodes into a database through a console command. You can use the below command to enter a postcode and grab the details and it being stored in the database table 'post_codes'.

```bash
$ php artisan app:import-post-codes
```

### Task 2)

The instructions were to enter a partial string matches (postcode) and grab the all possible postcodes and return back as a json response. I have used postman for testing my API end points created in the routes/api.php. Before checking you start to test the endpoint you will need to generate a JWT token inorder to see the controller in action found in app/Http/Controllers/PostCodesController.php

All endpoints require a post request to be made which is already made mandatory in the api route file for secure transfer of data.

```bash
Url : <define your localhost with port/virtual domain> localhost/api/login
Params : 
- email <already a user account with email created. Please refer the doc for the informations>,
- password
```
The API will return you with a secure token generated for use. Next you can use the token be set under the Authorization tab.

```
Authorization --> Type (Select Bearer Token)
```

The partial string can be sent to the end point 'partialstring' through the Url :- http://localhost/api/partialstring which will return a Json response. for example like below. Else it will generate a error response.

```
{
    "PostCodes": [
        "AB10 1AB",
        "AB10 1AF",
        "AB10 1AG",
        "AB10 1AH",
        "AB10 1AL",
        "AB10 1AN",
        "AB10 1AP",
        "AB10 1AQ",
        "AB10 1AR",
        "AB10 1AS"
    ]
}
```

### Task 3)

The instruction to return postcodes near a location for a given latitude and longitude. The endpoint to call is 'longlat' through the Url :- http://localhost/api/longlat which will return a Json response. for example like below. Else it will generate a error response.

```
 {
        "postcode": "CM8 1EF",
        "quality": 1,
        "eastings": 581459,
        "northings": 213679,
        "country": "England",
        "nhs_ha": "East of England",
        "longitude": 0.629806,
        "latitude": 51.792326,
        "european_electoral_region": "Eastern",
        "primary_care_trust": "Mid Essex",
        "region": "East of England",
        "lsoa": "Braintree 017F",
        "msoa": "Braintree 017",
        "incode": "1EF",
        "outcode": "CM8",
        "parliamentary_constituency": "Witham",
        "admin_district": "Braintree",
        "parish": "Witham",
        "admin_county": "Essex",
        "date_of_introduction": "198001",
        "admin_ward": "Witham South",
        "ced": "Witham Southern",
        "ccg": "NHS Mid and South Essex",
        "nuts": "Essex Haven Gateway",
        "pfa": "Essex",
        "codes": {
            "admin_district": "E07000067",
            "admin_county": "E10000012",
            "admin_ward": "E05010388",
            "parish": "E04012935",
            "parliamentary_constituency": "E14001045",
            "ccg": "E38000106",
            "ccg_id": "06Q",
            "ced": "E58000470",
            "nuts": "TLH34",
            "lsoa": "E01033460",
            "msoa": "E02004462",
            "lau2": "E07000067",
            "pfa": "E23000028"
        },
        "distance": 0
    },
    {
        "postcode": "CM8 1EU",
        "quality": 1,
        "eastings": 581508,
        "northings": 213652,
        "country": "England",
        "nhs_ha": "East of England",
        "longitude": 0.630501,
        "latitude": 51.792068,
        "european_electoral_region": "Eastern",
        "primary_care_trust": "Mid Essex",
        "region": "East of England",
        "lsoa": "Braintree 017F",
        "msoa": "Braintree 017",
        "incode": "1EU",
        "outcode": "CM8",
        "parliamentary_constituency": "Witham",
        "admin_district": "Braintree",
        "parish": "Witham",
        "admin_county": "Essex",
        "date_of_introduction": "198001",
        "admin_ward": "Witham South",
        "ced": "Witham Southern",
        "ccg": "NHS Mid and South Essex",
        "nuts": "Essex Haven Gateway",
        "pfa": "Essex",
        "codes": {
            "admin_district": "E07000067",
            "admin_county": "E10000012",
            "admin_ward": "E05010388",
            "parish": "E04012935",
            "parliamentary_constituency": "E14001045",
            "ccg": "E38000106",
            "ccg_id": "06Q",
            "ced": "E58000470",
            "nuts": "TLH34",
            "lsoa": "E01033460",
            "msoa": "E02004462",
            "lau2": "E07000067",
            "pfa": "E23000028"
        },
        "distance": 55.88754888
    },
    {
        "postcode": "CM8 1PH",
        "quality": 1,
        "eastings": 581421,
        "northings": 213740,
        "country": "England",
        "nhs_ha": "East of England",
        "longitude": 0.629287,
        "latitude": 51.792887,
        "european_electoral_region": "Eastern",
        "primary_care_trust": "Mid Essex",
        "region": "East of England",
        "lsoa": "Braintree 017H",
        "msoa": "Braintree 017",
        "incode": "1PH",
        "outcode": "CM8",
        "parliamentary_constituency": "Witham",
        "admin_district": "Braintree",
        "parish": "Witham",
        "admin_county": "Essex",
        "date_of_introduction": "198001",
        "admin_ward": "Witham Central",
        "ced": "Witham Southern",
        "ccg": "NHS Mid and South Essex",
        "nuts": "Essex Haven Gateway",
        "pfa": "Essex",
        "codes": {
            "admin_district": "E07000067",
            "admin_county": "E10000012",
            "admin_ward": "E05012966",
            "parish": "E04012935",
            "parliamentary_constituency": "E14001045",
            "ccg": "E38000106",
            "ccg_id": "06Q",
            "ced": "E58000470",
            "nuts": "TLH34",
            "lsoa": "E01033462",
            "msoa": "E02004462",
            "lau2": "E07000067",
            "pfa": "E23000028"
        },
        "distance": 71.9607022
    },
    {
        "postcode": "CM8 1PQ",
        "quality": 1,
        "eastings": 581399,
        "northings": 213755,
        "country": "England",
        "nhs_ha": "East of England",
        "longitude": 0.628977,
        "latitude": 51.793028,
        "european_electoral_region": "Eastern",
        "primary_care_trust": "Mid Essex",
        "region": "East of England",
        "lsoa": "Braintree 017H",
        "msoa": "Braintree 017",
        "incode": "1PQ",
        "outcode": "CM8",
        "parliamentary_constituency": "Witham",
        "admin_district": "Braintree",
        "parish": "Witham",
        "admin_county": "Essex",
        "date_of_introduction": "198001",
        "admin_ward": "Witham Central",
        "ced": "Witham Southern",
        "ccg": "NHS Mid and South Essex",
        "nuts": "Essex Haven Gateway",
        "pfa": "Essex",
        "codes": {
            "admin_district": "E07000067",
            "admin_county": "E10000012",
            "admin_ward": "E05012966",
            "parish": "E04012935",
            "parliamentary_constituency": "E14001045",
            "ccg": "E38000106",
            "ccg_id": "06Q",
            "ced": "E58000470",
            "nuts": "TLH34",
            "lsoa": "E01033462",
            "msoa": "E02004462",
            "lau2": "E07000067",
            "pfa": "E23000028"
        },
        "distance": 96.80988582
    }
```

## Improvements

- I would like to make improvement to the error capturing by making use of error handler in laravel, make use of JsonResponse error handling
- Check the quality of code by using tools like PHPsniffer, PHP-CS-Fixer with PSR2 and Symfony standards (much extra checks, closer to Laravel than PSR2).
- Writing unit tests and integration tests to ensure API functionality
- Keep the code as simple as possible and following S.O.L.I.D princples.
- Use HTTP status codes to indicate the success or failure of requests.(200, 201, 204, 400, 404)
- Improving validation of inputs.
- Leverage caching techniques to improve API response times like Redis or Memcached.
- Enhancing API development with versioning, rate limiting, and request throttling features.
