/* Select employees where the employeeid is equal to a passed employee id */
SELECT e.employeeid, e.firstname, e.lastname, e.address, e.city, e.zipcode, s.stateid, s.state_name
FROM final_employee e
JOIN final_state AS s ON s.stateid = e.state
WHERE employeeid = :employeeid;

