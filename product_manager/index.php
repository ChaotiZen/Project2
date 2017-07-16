<?php
require('../model/database.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_products';
    }
}

if ($action == 'list_products') {
    // Get product data
    $products = get_products();

    // Display the product list
    include('product_list.php');
} else if ($action == 'delete_product') {
    $product_code = filter_input(INPUT_POST, 'product_code');
    delete_product($product_code);
    header("Location: .");
} else if ($action == 'show_add_form') {
    include('product_add.php');
} else if ($action == 'add_product') {
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $version = filter_input(INPUT_POST, 'version', FILTER_VALIDATE_FLOAT);
    $release_date = filter_input(INPUT_POST, 'release_date');


    /* Trendon Ellis - the following is my solution to 2-2 */
    $isValid = true;                                                        /* '$isValid' used as a flag for various validity tests */

    if ($code === NULL ||                                                   /* original validation logic that simply controls the value of the flag */
        $name === FALSE ||
        $version === NULL ||
        $version === FALSE ||
        $release_date === NULL)
    {
        $isValid = false;                                                   /* set to false if any of the original validations were failed */
    }

    try                                                                     /* Try catch used to test date format. */
    {
        $suppliedDate = new DateTime($release_date);                        /* attempt to create new DateTime object with supplied release date*/
    } catch (Exception $e)
    {
        $isValid = false;                                                   /* failure to create new DateTime object sets flag to false*/
    }


    // Validate the inputs
    if ( $isValid === false) {                                              /* new final if logic that shows the error if any validations above fail */
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        add_product($code, $name, $version, $release_date);                 /* if everything checks out, the record is updated. */
        header("Location: .");
    }
}
?>