# Challenge
----------
REST API Challenge

## Installation
Require

    PHP 7.2 or higher
    drive: pdo_sqlite

Install all the dependencies using composer

    composer update

Run the database migrations

    php artisan migrate:fresh

Start the local development server

    php artisan serve

Routes - root

    | POST     | api/poll              | poll.store | App\Http\Controllers\Api\PollController@store | api        |
    | GET|HEAD | api/poll/{poll}       | poll.get   | App\Http\Controllers\Api\PollController@get   | api        |
    | GET|HEAD | api/poll/{poll}/stats | poll.stats | App\Http\Controllers\Api\PollController@stats | api        |
    | POST     | api/poll/{poll}/vote  | poll.vote  | App\Http\Controllers\Api\PollController@vote  | api        |

