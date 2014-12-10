<?php

//ini_set('display_errors', 'On');
//error_reporting(E_ALL);

require_once('model/fields.php');
require_once('model/validate.php');

// Add fields with optional initial message
$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('address');
$fields->addField('city');
$fields->addField('province', 'Must be a Canadian Province');
$fields->addField('postalcode', 'Must be a Canadian postal code.');
$fields->addField('phone', 'Use 888-555-1234 format.');
$fields->addField('email', 'Must be a valid email address.');
$fields->addField('product', 'Must be a valid product.');

if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'reset';
}

$action = strtolower($action);
switch ($action) {
    case 'reset':
        include 'view/register.php';
        break;
    case 'register':
        // Copy form values to local variables
         $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $address = trim($_POST['address']);
        $city = trim($_POST['city']);
        $province = trim($_POST['province']);
        $postalcode = trim($_POST['postalcode']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $product = trim($_POST['product']);

        // Validate form data
        $validate->nonumber('first_name', $first_name);
        $validate->nonumber('last_name', $last_name);
        $validate->address('address', $address);
        $validate->city('city', $city);
        $validate->nonumber('province', $province);
        $validate->postalcode('postalcode', $postalcode);
        $validate->phone('phone', $phone);
        $validate->email('email', $email);
        $validate->product('product', $product);

        // Load appropriate view based on hasErrors
        if ($fields->hasErrors()) {
            include 'view/register.php';
        } else {
            include 'view/success.php';
        }
        break;
}
?>