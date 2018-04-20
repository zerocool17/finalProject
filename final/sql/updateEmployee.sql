/* Update the employee info where the customer id where it matches */
UPDATE final_employee
SET firstname = :firstname, lastname = :lastname, address = :address, city = :city, zipcode = :zipcode, state = :state
WHERE employeeid = :employeeid;

select * from final_employee