<?php
require_once './action/action-session.php';
// remove all session variables
session_unset();

// destroy the session
session_destroy();
header("Location: ../index.php");