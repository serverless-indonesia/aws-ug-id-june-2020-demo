import time
import os

from celery import Celery
from kombu.utils.url import safequote


app = Celery('tasks')

aws_access_key = safequote(os.environ.get('AWS_ACCESS_KEY'))
aws_secret_key = safequote(os.environ.get('AWS_SECRET_KEY'))

broker_url = "sqs://{aws_access_key}:{aws_secret_key}@".format(
    aws_access_key=aws_access_key, aws_secret_key=aws_secret_key,
)

app.conf.broker_url = broker_url
app.conf.result_backend = os.environ.get('CELERY_RESULT_BACKEND')
app.conf.task_default_queue = os.environ.get('TASK_DEFAULT_QUEUE')


@app.task
def add(x, y):
    time.sleep(5)
    return x + y
