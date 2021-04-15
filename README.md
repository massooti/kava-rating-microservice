###Kavano Rating Micro Service Library

1 - composer require massooti/rating-microservice

2 - put  in config/app.php providers
Kavano\Rating\RatingServiceProvider::class,

3 - php artisan vendor:publish --provider="Kavano\Rating\RatingServiceProvider"


4 - in config/rating.php :

change default prefix

add your custom middleware

5 - and put thease parameter in your .env

RATING_MICROSERVICE_URI =***htpp://localhost***
RATING_MICROSERVICE_USERNAME =***USERNAME***
RATING_MICROSERVICE_PASSWORD = ***PASSWORD***

6 - composer update


thats it, now you connected to rating microservice