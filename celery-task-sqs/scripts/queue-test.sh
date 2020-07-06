#!/bin/bash

sleep 5

for i in {1..30}
do
    curl -XGET http://localhost:5000/test-queue
    echo "";

    sleep 1
done