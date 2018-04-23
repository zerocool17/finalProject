/*Search Employees based on last name*/
SELECT e.employeeid, e.firstname, e.lastname, e.address, e.city, e.zipcode, s.state_name
FROM final_employee AS e
JOIN final_state AS s ON e.state = s.stateid
WHERE lastname LIKE :searchTerm
ORDER BY e.employeeid DESC;
