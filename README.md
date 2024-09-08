# Subscription Platform

Requirements:

- PHP >= 8.0.2
- Composer

Install composer dependencies
`composer install`

Change `.env` values for database, mail

For Queue Setup, change `QUEUE_CONNECTION` in `.env`
`QUEUE_CONNECTION=database`

Add Migrations for job table
`php artisan queue:table`

Run Migrations
`php artisan migrate`

Run Seeders for populating user and website
`php artisan db:seed`

Run (Local)
`php artisan serve`

Run Queue
`php artisan queue:work`

Run Email Send Command
`php artisan send:email`

API Documentation Link
`https://documenter.getpostman.com/view/10844993/2sAXjRWUvW`