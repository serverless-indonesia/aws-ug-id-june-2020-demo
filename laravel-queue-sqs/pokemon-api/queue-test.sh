#!/bin/bash

sleep 5

for i in {1..10}
do
    curl -XGET http://localhost:8000/test-queue
    echo "";

    sleep 1
done