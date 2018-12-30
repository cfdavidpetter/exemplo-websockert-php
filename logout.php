<?php

session_start();

session_unset();

session_destroy();

header("Location: /exemplo-websockert-php/");