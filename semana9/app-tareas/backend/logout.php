<?php

require 'message_log.php';

session_start();
session_unset();
session_destroy();

logDebug('Usuario ceerró sesión');
