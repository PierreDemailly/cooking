<?php
$_SESSION = [];
session_destroy();

if(isset($_COOKIE['cooking_auth_token']))
  unset($_COOKIE['cookie_auth_token']);
  
header('Location: '.$path.'/');
