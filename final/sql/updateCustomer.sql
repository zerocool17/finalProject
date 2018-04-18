/* Update the customer info where the customer id where it matches */
UPDATE final_customer
SET firstname = :firstname, lastname = :lastname, address = :address, city = :city, zipcode = :zipcode, stateid = :stateid
WHERE customerid = :customerid;
