# Project 2

## Task 2-1 Use a drop down list
- First I created the countries-db.php file to handle the interaction with the database. It can be found in the model folder.
- Next, I removed the existing HTML for country code and replaced it with the code found in customer_manager/customer_display.php.
I also had to make some changes to the customer_manager/index.php page. All changes are commented and explained.

## Task 2-2 Improve Date Handling
- First I modified product_list to show release dates in the mm-dd-yyyy format.
- Next. I modified index.php. i used a try catch to see if the supplied date could be used to create a DateTime object, 
and used a flag '$isvalid' to control the final if logic.

## Task 2-3 Use Sessions
- First I included session_start() and if logic on the index page to check for an active session. setting the $action
variable to 'get_customer' in order to bypass the login page.
- next I added a prompt letting the user know they are signed in to product_register.php