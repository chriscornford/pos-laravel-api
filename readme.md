## Simple Laravel point of sale API
This is a rough API proof of concept for an offline first, point of sale application.

#### Installation
1. `git clone https://github.com/chriscornford/pos-laravel-api.git`
2. `composer install`
3. Ensure correct database details are in new `.env` file
4. `php artisan migrate`
5. `php artisan db:seed --class=ProductsTableSeeder`

Postman collection export can be found in the base directory.
