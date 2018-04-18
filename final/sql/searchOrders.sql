/* search and list our orders by lastname.*/
SELECT o.orderid, o.startdate, o.customerid, c.firstname, c.lastname, c.address, c.city, c.zipcode, s.state_name, o.totalprice
FROM final_order AS o
JOIN final_customer AS c ON c.customerid = o.customerid
JOIN final_state AS s ON s.stateid = c.stateid
WHERE c.lastname LIKE :searchTerm
ORDER BY c.lastname ASC;

