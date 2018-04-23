SELECT final_customer.customerid, final_customer.firstname, final_customer.lastname, final_customer.address, final_customer.city, final_customer.zipcode, final_state.state_name
FROM final_customer
JOIN final_state ON final_customer.stateid = final_state.stateid
WHERE lastname LIKE :searchTerm
ORDER BY final_customer.customerid DESC;
