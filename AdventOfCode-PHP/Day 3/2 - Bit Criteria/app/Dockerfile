FROM php:8.0-apache as base

COPY /src .
# Copy project files
COPY /src /usr/src/depthApp
WORKDIR /usr/src/depthApp

# Run php
CMD [ "php", "./d3p2.php" ]