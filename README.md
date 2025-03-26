# laravel Documentation

## Project Management Commands

- ### Create a Laravel Project
        laravel new project_name

- ### Run the project
        php artisan serve

- ### Make Application to maintenance mode
        php artisan down

- ### Brings Application out of maintenance mode
        php artisan up

## Database Management Commands

- ### Database Migration
        php artisan migrate

- ### Rolls back the last database migration
        php artisan migrate:rollback

- ### Roll back all migration
        php artisan migrate:reset

- ### Refresh All database migration
        php artisan migrate:refresh

- ### Create table in migration
        php artisan make:migration file_name

-  ### Seed the data
        php artisan db:seed

- ### Clear All table in Database
        php artisan db:wipe

## Code generate Commands

- ### Create a view
        php artisan make:view view_name

- ### Create a Controller
        php artisan make:controller controller_name

- ### Create a Model
        php artisan make:model model_name

- ### Create a job
        php artisan make:job job_name

- ### Create a Command
        php artisan make:command command_name

- ### Generate a New Mail
        php artisan make:mail mail_name

- ### Generate a New Middleware
        php artisan make:middleware middleware_name

- ### Generate a Validation Rule
        php artisan make:rule rule_name

- ### Generate a Application Key
        php artisan key:generate

- ### Create a Seeder Class
        php artisan make:seeder

- ### Create a API
        php artisan install:api

## Queue regarding Commands

- ###  Start processing jobs on the queue
        php artisan queue:work

- ### List all of the failed queue jobs
        php artisan queue:failed

- ### Flush all of the failed queue jobs
        php artisan queue:flush

- ### Delete a failed queue job
        php artisan queue:forget

- ### Retry a failed queue job
        php artisan queue:retry

## Other commands

- ### Run the scheduled commands
        php artisan schedule:run   

- ### Create the links between public/storage and storage/app/public
        php artisan storage:link

- ### remove the links between public/storage and storage/app/public
        php artisan storage:unlink

- ### Publish all stubs
        php artisan stub:publish

## Default Auth using breeze and alpine js

        composer require laravel/breeze --dev
        php artisan breeze:install

## Use Seeder and Faker to Generate and store testing data for Student table

- ### create a seeder
        php artisan make:seeder StudentSeeder

- ### run the StudentSeedeer file
        php artisan db:seed --class=StudentSeeder

## Show Data Using yajra plugin
        composer require yajra/laravel-datatables:"^12.0"
        php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"
