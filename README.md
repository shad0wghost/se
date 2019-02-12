This is a service-testing engine used for scoring the uptime of various services (ssh, pop3, mysql, http/https, ftp & dns) that may be encountered in a CCDC competition.
Deploy on a LAMP stack, modify host, user, and pass in sql.php then run and remove setup.php to initialize mysql databases and check for dependencies.
controller.php can be executed via cli (cron job) or cgi to simulate a service check, running active=1 pollers configured in database. This is in early stages of development, so some configurations are still made directly in the database. A web front-end is currently planned.
view webfront/scoreboard.php to display current service status and team scores. Separate logins and scoring page (for multiple teams) is also a planned feature.
