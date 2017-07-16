<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registration_db.php');

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'login_customer';
    }
}

if (isSet($_SESSION['email']))              /*if login that will check for an active session*/
{
    $action = 'get_customer';               /*sets action to skip the login screen if true*/
}

//instantiate variable(s)
$email = '';

if ($action == 'login_customer') {
    include('customer_login.php');
} else if ($action == 'get_customer') {
    if(!isSet($_SESSION['email'])) {                /*sets the session email if there is not an active session i.e. coming straight from the login screen.*/
        $_SESSION['email'] = $_POST['email'];
    }
    $email = filter_input(INPUT_POST, 'email');
    $customer = get_customer_by_email($email);
    $products = get_products();
    include('product_register.php');
} else if ($action == 'register_product') {
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    $product_code = filter_input(INPUT_POST, 'product_code');
    add_registration($customer_id, $product_code);
    $message = "Product ($product_code) was registered successfully.";
    include('product_register.php');
}
?>