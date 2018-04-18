SELECT c.customerid, c.firstname, c.lastname, c.address, c.city, c.zipcode, s.stateid, s.state_name
FROM final_customer c
JOIN final_state AS s ON s.stateid = c.stateid
WHERE customerid = :customerid;
