#!/bin/python
import os
import getpass

#install
os.system("""
sudo apt-get update
sudo apt-get install apache2 mysql-server phpmyadmin -y
""")
print "Enter MySql Password"
p = getpass.getpass()
os.system("sed -i 's/.password.*$/" + '"'  + p + '"' + "\;/g' sql.php")
os.system("""
sudo apt-get install php5 php5-mysql php5-curl pwgen dnsutils python curl smbclient -y
curl https://bootstrap.pypa.io/get-pip.py -o get-pip.py
python get-pip.py
pip install paramiko
""")
os.system("""
chmod 777 /var/www/html/se/webfront/injects
chmod +x /var/www/html/se/pollers/*
php setup.php
echo '<meta http-equiv="refresh" content="0; url=/se/webfront/scoreboard.php" />' > /var/www/html/index.html
echo "---------------------------"
echo "---------------------------"
echo "---------------------------"
echo "---------------------------"
echo "All Set Up! Navigate to http://localhost and access database via http://localhost/phpmyadmin"
echo "---------------------------"
echo "---------------------------"
echo "---------------------------"
echo "---------------------------"
""")