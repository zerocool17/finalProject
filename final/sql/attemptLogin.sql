/* Select employees where the username and password match those passed as parameters */
SELECT *
FROM final_employee
WHERE username = :username AND password = :password;
