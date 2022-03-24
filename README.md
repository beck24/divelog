# DiveLog

Yet another divelog project

<br><br>

# Platform
Built on Laravel 8

using:

- Tailwind v2.2.16 - https://v2.tailwindcss.com/docs
- Alpinejs - https://alpinejs.dev/

<br><br>

# Installation

## Standard LAMP Server

Ensure the server has all of the required dependencies for Laravel 8 including:

- PHP Version 7.4
- BCMath PHP Extension
- Ctype PHP Extension
- CURL PHP Extension
- EXIF PHP Extension
- Fileinfo PHP extension
- GD PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Zip PHP Extension

Clone this repo and configure the vhost to server from:

 `{/path/to/this/repo/}public`

Install dependency software:

- Composer v2 (2.2.7 currently)
- Node 14 (14.15.1 currently, npm 6.14.8)

Use composer to install PHP dependencies

    composer install

Use npm to install JS dependencies

    npm install

Copy the `.env.example` file to `.env` and change any values for your environment

Use the artisan command to set up Laravel

    php artisan key:generate
    php artisan storage:link
    php artisan cache:clear

Create an account

    php artisan make:user

<br><br>

## Via Docker

Install Docker

Copy the .env.example to .env, update any custom values

Build the container with

    docker compose up -d --build

Log into the container with the command

    docker exec -it crowd_detector_webserver bash

Install dependencies and link storage

    composer install
    php artisan storage:link
    npm install

Create an account

    php artisan make:user


<br><br>