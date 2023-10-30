#!/bin/sh

composer install
symfony server:start --no-tls --port=8000