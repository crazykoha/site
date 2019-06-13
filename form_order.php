<?php
include 'classes/Order.php';
include 'classes/User.php';
$user = new \classes\User($_POST['name'], $_POST['lastName'], $_POST['number'], $_POST['email'], $_POST['passport']);
$user->save();
$order = new \classes\Order($user->id, $_POST['link'], $_POST['sum']);
$order->save();
$user->login();
header("Location: http://sayt.loc");