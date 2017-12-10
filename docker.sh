#!/bin/bash

docker build -t worker .

docker run -it --rm --name worker worker
