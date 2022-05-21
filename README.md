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

