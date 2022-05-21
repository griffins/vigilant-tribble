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
+----------+-------------------------+------------------------------------------------------------+
| Method   | URI                     | Action                                                     |
+----------+-------------------------+------------------------------------------------------------+
| POST     | api/mailing/subscribe   | App\Http\Controllers\SubscriptionController@subscribe      |
| POST     | api/mailing/unsubscribe | App\Http\Controllers\SubscriptionController@unsubscribe    |
| POST     | api/post/create         | App\Http\Controllers\PostController@create                 |
+----------+-------------------------+------------------------------------------------------------+
```

```
POST /api/post/create

params:
    - title
    - body
    - websiteId
 ```
 
```
POST /api/mailing/subscribe 

params:
    - userId
    - websiteId
 ```
 
 ```
POST /api/mailing/unsubscribe 

params:
    - userId
    - websiteId
 ```
