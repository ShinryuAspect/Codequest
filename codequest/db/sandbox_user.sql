CREATE USER IF NOT EXISTS 'cq_sandbox'@'localhost' IDENTIFIED BY 'change_this_password';
GRANT SELECT ON codequest_sandbox.* TO 'cq_sandbox'@'localhost';
FLUSH PRIVILEGES;
