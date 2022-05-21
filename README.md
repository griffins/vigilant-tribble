## Requirements
PHP@7, MYSQL

## Installation


Clone the repo

```git clone git@github.com:griffins/vigilant-tribble.git```

Install composer dependencies

```composer install```

## Environment configuration

Copy `example.env` to `.env` and fill appropriately. Specifically database, queue and mail driver details.

For testing use `log` as the maildriver. Emails will be logged to `storage/logs/*`

## API
```
+----------+-------------------------+------------------------------------------------------------+------------+
| Method   | URI                     | Action                                                     | Middleware |
+----------+-------------------------+------------------------------------------------------------+------------+
| POST     | api/mailing/subscribe   | App\Http\Controllers\SubscriptionController@subscribe      | api        |
| POST     | api/mailing/unsubscribe | App\Http\Controllers\SubscriptionController@unsubscribe    | api        |
| POST     | api/post/create         | App\Http\Controllers\PostController@create                 | api        |
+----------+-------------------------+------------------------------------------------------------+------------+
```

```
POST /api/post/create

params:
    - title
    - body
    - websiteId
 ```
 
```
POST /mailing/subscribe 

params:
    - userId
    - websiteId
 ```
 
 ```
POST /mailing/unsubscribe 

params:
    - userId
    - websiteId
 ```
