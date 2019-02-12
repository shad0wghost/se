#!/bin/bash
sudo apt-get update
sudo apt-get install apache2 mysql-server php5 php5-mysql php5-curl pwgen python curl smbclient phpmyadmin -y
curl https://bootstrap.pypa.io/get-pip.py -o get-pip.py
python get-pip.py
pip install paramiko
php setup.php
echo '<meta http-equiv="refresh" content="0; url=/se/webfront/scoreboard.php" />' > /var/www/html/index.html
echo "---------------------------"
echo "---------------------------"
echo "---------------------------"
echo "---------------------------"
echo "All Set Up! Navigate to http://localhost and access database via http://localhost/phpmyadmin"
echo "BE SURE TO EDIT sql.php AND UPDATE YOUR SQL PASSWORD!"
echo "---------------------------"
echo "---------------------------"
echo "---------------------------"
