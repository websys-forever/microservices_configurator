#!/usr/bin/env bash

sleep 10;
/var/www/bin/console messenger:consume -vv async >&1;