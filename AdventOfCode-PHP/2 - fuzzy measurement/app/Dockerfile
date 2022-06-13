FROM php:8.0-apache as base

COPY /src .

# Copy project files
COPY /src /usr/src/depthApp
WORKDIR /usr/src/depthApp

# Run hello.php
CMD [ "php", "./day1p2.php" ]