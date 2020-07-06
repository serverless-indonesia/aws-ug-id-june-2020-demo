# Laravel Queue + AWS SQS

## Running The Example

```
$ cd laravel-queue-sqs/pokemon-api
$ composer install
$ cp .env-sqs.example .env
```

After you have finished with dependencies installation. Then, put your AWS credential and SQS configuration inside `.env`.

Run the web application at first console:

```
$ php -S localhost:8000 -t public
```

Run the worker at second terminal:

```
$ php artisan queue:work
```

Open your web browser and hit this endpoint `http://localhost:8000/test-queue`. Then, you may check the queue is processing message at second terminal.

You might also run `queue-test.sh` to simulate the request.