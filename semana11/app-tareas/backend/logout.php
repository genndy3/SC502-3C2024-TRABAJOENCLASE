<?php

require 'message_log.php';

session_start();
session_unset();
session_destroy();

logDebug('Usuario cerró sesión');

header('Location: /semana11/app-tareas/index.html');

