<?php
require_once('class/session.php');
Session::init();
Session::destroy();
header('Location: index.php');
