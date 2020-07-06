# Celery Task + AWS SQS

## Prerequisites

Please install some dependencies by following these commands:

```
$ sudo apt-get update
$ sudo apt-get install libcurl4-openssl-dev libssl-dev
$ cd celery-task-sqs
$ pip install -r requirements.txt
```

Copy `env.sh.example` within `scripts` directory as `env.sh`. Put your AWS credential and task default name in that file:

```
$ cp scripts/env.sh.example scripts/env.sh
$ nano scripts/env.sh
```

Load your `env.sh` to the environment variables:

```
$ source scripts/env.sh
```

## How to Run This Project

Open Celery Task at first terminal:

```
$ cd celery-task-sqs
$ celery -A tasks worker --loglevel=info
```

Open the web application at second terminal:

```
$ cd celery-task-sqs
$ python main.py
```

Open your web browser and hit this endpoint `http://localhost:5000/test-queue`. Then, you may check the queue is processing message at second terminal.

You might also run `scripts/queue-test.sh` to simulate the request.