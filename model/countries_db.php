<?php
/**
 * File name: countries_db.php
 * Project : tech_support_Project2
 * User: ChaotiZen | Trendon Ellis
 * Date: 7/16/2017
 * Using PhpStorm.
 * Notes: This file exists to communicate with the database for all queries directly related countries as an entity.
 * This does not include specific portions of queries such as searching for a customers country code as that would
 * describe a customer entity and would be located in customer_db.php.
 */


function get_countries()
{
    global $db;
    $query = "SELECT * FROM countries";
    $statement = $db->prepare($query);
    $statement->execute();
    $countries = $statement->fetchAll();
    $statement->closeCursor();
    return $countries;
}
