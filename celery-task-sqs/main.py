import redis

from flask import Flask
from random import randint

from tasks import add


app = Flask(__name__)
redis = redis.Redis(host='redis', port=6379, db=0)


@app.route('/')
def hello_world():
    return 'Hello world!'


@app.route('/test-queue')
def test_queue():
    x = randint(1, 9999)
    y = randint(1, 9999)
    add.delay(x, y)
    return 'Queue sedang dijalankan ...'

if __name__ == '__main__':
    app.run(host='0.0.0.0')
