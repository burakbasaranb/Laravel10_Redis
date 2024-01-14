# Laravel Redis Server Connection
 
Welcome to the Laravel Redis Server Connection repository! This project serves as a guide on how to establish a seamless connection between a Laravel project and a Redis server. Feel free to fork and use it for your projects. Follow the straightforward steps below to configure and run this project effortlessly.

## Step 1: Laravel Installation

```bash
composer create-project laravel/laravel Laravel10_Redis --prefer-dist
```

## Step 2: Start Laravel

```bash
php artisan serve
```

## Step 3: Install Predis Package

Install predis/predis package: Laravel uses the predis/predis package. You can install it via Composer

```bash
composer require predis/predis
```

# Step 4: Laravel Redis Setup

## 4.1 Configure .env file

Configure Laravel to use Redis: Open your .env file and update the following lines:

```dotenv
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

## 4.2 Configure database.php

Configure database.php: Open config/database.php and ensure the Redis section looks like this:
	
The important info for this part is `option > prefix` which adds APP_NAME before the Redis key. 

Example:

Set key as 'name' but it records the Redis server as 'Laravel10_Redis_name'

Redis::set('name', 'Taylor');

`Path:` config/database.php

```php
'redis' => [
    'client' => env('REDIS_CLIENT', 'predis'),
    'options' => [
        'cluster' => env('REDIS_CLUSTER', 'predis'),
        //Records in to Redis with this prefix... Such as your key is 'user' in the Laravel. But record in Redis server with prefix such as `Laravel10_Redis_user`
        'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
    ],
    'default' => [
        'url' => env('REDIS_URL'),
        'host' => env('REDIS_HOST', '127.0.0.1'),
        'password' => env('REDIS_PASSWORD', null),
        'port' => env('REDIS_PORT', '6379'),
        'database' => env('REDIS_DB', '0'),
    ],
    'cache' => [
        'url' => env('REDIS_URL'),
        'host' => env('REDIS_HOST', '127.0.0.1'),
        'password' => env('REDIS_PASSWORD', null),
        'port' => env('REDIS_PORT', '6379'),
        'database' => env('REDIS_CACHE_DB', '1'),
    ],
],
```

## 4.3 Create Redis Controller

```bash
php artisan make:Controller RedisController --resource
```

## 4.4 Configure RedisController.php

Open Laravel10_Redis\app\Http\Controllers\RedisController.php and add the following code:

```php
$data = "";

try{
    Redis::set('name', 'Taylor');
    $data = "Redis::set('name', 'Taylor'); > ";
    $data .= "Redis::get('name'); >";
    $data .= Redis::get('name');
} catch (\Exception $e) {
    $data = 'Redis connection failed. Error: ' . $e->getMessage();
}

return view('welcome', ['data' => $data]);
```

## 4.5 Configure web.php

```php
Route::get('/', 'App\Http\Controllers\RedisController@index');
```

## Step 5: Install Redis Server

```bash
sudo apt-get install redis-server
```

Now you have a Laravel project with Redis server connection set up. Run the Laravel server and visit the specified route to see the Redis connection in action! Feel free to use and customize this repository for your own projects. Happy coding!
