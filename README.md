# Test Task - Events API
#### Prerequisites:
- PHP 8.2 with extensions: xml, mbstring, intl, dom, curl
- Composer
- Docker

To run the application for ```development```:
1. run ```composer install```
2. copy ``.env.example`` to ```.env```
3. run ```php artisan key:generate```
4. build and run the Docker container with [Laravel Sail](https://laravel.com/docs/10.x/sail) ``` ./vendor/bin/sail up ```
5. run the migrations ```./vendor/bin/sail artisan migrate```
6. run the database seeders ```./vendor/bin/sail artisan db:seed```

P.S: default port is 80, you can access the events list at route ```/api/events```

To build for ```production```:
1. all the configuration files for Docker are there, just deploy.
