# SE:
SE is a competition scoring engine used to judge whether or not services are up/down.
![alt text](https://github.com/shad0wghost/se/blob/master/DemoImg.png)

## To Install:
Install apache2

Clone to `/var/www/html` and run `python install.py` 

**WHEN PROMPTED:** Select `apache`

## To Access: 
In a web browser navigate to `http://<IP>/se`

## To Administer:
**Add a Service to Check:**

In the linux terminal navigate to `/var/www/html/se/admin` and execute the tools with `php <toolname>`. Tool name are very self explanatory. Debug output will give you instructions. 

**Standard Workflow:**

`./teamadd.php Team1` -> `./serviceadd.php Team1 dns` -> `./serviceon.php 1`

**Access PhpMyAdmin:**
The install script pulls and sets up phpmyadmin located at `http://<ip>/phpmyadmin` 

**To Start Scoring:**
To start the pollers run the start python script. Usage `python start.py <time in seconds>`

**Example:** `python start.py 60` will run service checks every 60 seconds.

**Adding an Inject:** 
If you would like a white team to upload injects you can use the inject uploader tool located at `http://<ip>/addinject.php`.

**Reset Scoreboard:**
Use `reset-scoreboard.php` under `/var/www/html/se/admin` This will set `Attempts` and `Successful` to zero for all teams and services. 

## Configuring Database:

You will need to make some changes to the SQL database to match your environment. This is very easy with the use of PHPMyAdmin.

**Database:** `ccdc` **Table:** `services` 

**Example Database Config:**

![alt text](https://github.com/shad0wghost/se/blob/master/DemoDB.png)

## Pollers:

**The Current Pollers Offerd Are:**

* DNS 
  + Usage: `./dns <DNS Server IP> <Domain> <Expected IP>`
* FTP 
  + Usage: `./ftp <FTP Server IP> <FTP User> <FTP Password>`
* HTTP
  + Usage: `./http <URL> <Directory> <Expected MD5 Hash>`
* HTTPS 
  + Usage: `./http <URL> <Directory> <Expected MD5 Hash>`
* MYSQL 
  + Usage: `./mysql <MySQL Server> <MySQL User> <MySQL Password>`
  + This looks for the STRING "ccdc" in the DATABASE "checkdb" from the TABLE "checktable" for the COLUMN "checkstring" 
* POP3 
  + Usage: `./pop3 <Pop3 Server> <Pop3 User> <Pop3 Password>`
* SMB 
  + Usage: `./smb <SMB Server> <SMB User> <SMB Password>`
* SSH
  + Usage: `./ssh <SSH Server> <SSH User> <SSH Password>`
  
**Debuging Checks By the Pollers:**

In the directory `/var/www/html/se/pollers` are where all the pollers live. You can execute them directly via the comand line with the argurmens listed above. Executing them directly provides valuable information on why a service may not be scoring.  

**Example:** `php smb 127.0.0.1 administrator password` 
 
