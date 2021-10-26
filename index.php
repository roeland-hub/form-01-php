<?php
//this line makes PHP behave in a more strict way
//declare(strict_types=1);
include 'from-view.php';
//we are going to use session variables so we need to enable sessions
session_set_cookie_params(0);
session_start();

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];

$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];



$totalValue = 0;
whatIsHappening();
//require 'form-view.php';

$emailErr = $streetErr = $streetNumberErr = $cityErr =  $zipcodeErr = "";
$email = $street = $streetNumber= $city = $zipcode = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email required";
    } else {
        $email = input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["street"])) {
        $streetErr = "Street required";
    }else {
        $street = input($_POST["street"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$street)) {
            $streetErr = "only letters and white space";
        }
    }

    if (empty($_POST["streetnumber"])) {
        $streetNumberErr = "Number required";
    }else {
        $streetNumber = input($_POST["streetnumber"]);
        if (!preg_match("/^[1-9][0-9]*$/",$streetNumber)) {
            $streetNumberErr = "only numbers";
        }
    }

    if(empty($_POST["city"])) {
        $cityErr = "City required";
    }else {
        $city = input($_POST["city"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
            $cityErr = "only letters characters and white space";
        }
    }

    if(empty($_POST["zipcode"])) {
        $zipcodeErr = "Zipcode required";
    }else {
        $zipcode = input($_POST["zipcode"]);
        if (!preg_match("/^[1-9][0-9]*$/",$zipcode)) {
            $zipcodeErr = "only numbers";
        }
    }
}