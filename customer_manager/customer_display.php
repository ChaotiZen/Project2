<?php include '../view/header.php'; ?>
<main>

    <!-- display a table of customer information -->
    <h2>View/Update Customer</h2>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="update_customer">
        <input type="hidden" name="customer_id" 
               value="<?php echo htmlspecialchars($customer['customerID']); ?>">

        <label>First Name:</label>
        <input type="text" name="first_name" 
               value="<?php echo htmlspecialchars($customer['firstName']); ?>"><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" 
               value="<?php echo htmlspecialchars($customer['lastName']); ?>"><br>

        <label>Address:</label>
        <input type="text" name="address" 
               value="<?php echo htmlspecialchars($customer['address']); ?>" 
               size="50"><br>

        <label>City:</label>
        <input type="text" name="city" 
               value="<?php echo htmlspecialchars($customer['city']); ?>"><br>

        <label>State:</label>
        <input type="text" name="state" 
               value="<?php echo htmlspecialchars($customer['state']); ?>"><br>

        <label>Postal Code:</label>
        <input type="text" name="postal_code" 
               value="<?php echo htmlspecialchars($customer['postalCode']); ?>"><br>

        <!--Trendon Ellis - This will show the country name (not country code),
        but will post the value country_code as before. It is now a drop down containing
        all countries form the DB.   Notes to the right of solution-->

        <label>Country:</label>
        <select name="country_code">
            <?php foreach ($countries as $country): ?>                                  <!--starts a loop to run the $countries array as $country-->
                <?php if($customer['countryCode'] == $country['countryCode']): ?>       <!--if logic that tests the country code assigned to the customer array against the iteration of the foreach loop-->
                    <option value="<?php echo $country['countryCode']; ?>" selected>    <!--if they match that 'option' tag has the 'selected' attribute added to it-->
                        <?php echo $country['countryName']; ?>                          <!--the actual country name is used in the 'option' element-->
                    </option>
                <?php else: ?>                                                          <!--if the values do not match-->
                    <option value="<?php echo $country['countryCode']; ?>" >            <!--the iteration is handled exactly the same except for the exclusion of the 'selected' attribute-->
                        <?php echo $country['countryName']; ?>
                    </option>
                <?php endif; ?>                                                         <!--end if logic-->
            <?php endforeach; ?>                                                        <!--end foreach loop-->
        </select> <br>                                                                  <!--end select-->

        <label>Phone:</label>
        <input type="text" name="phone" 
               value="<?php echo htmlspecialchars($customer['phone']); ?>"><br>

        <label>Email:</label>
        <input type="text" name="email" 
               value="<?php echo htmlspecialchars($customer['email']); ?>" 
               size="50"><br>

        <label>Password:</label>
        <input type="text" name="password" 
               value="<?php echo htmlspecialchars($customer['password']); ?>"><br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Customer"><br>
    </form>
    <p><a href="">Search Customers</a></p>

</main>
<?php include '../view/footer.php'; ?>