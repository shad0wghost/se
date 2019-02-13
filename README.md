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


**Debuging Checks By the Pollers**

To get more information on how the pollers work navigate to `/var/www/html/se/pollers` and execute the tools via the command `php <toolname>` the debug output should give you enough to figure out what is needed. Open the script in a text editor and look at the arguemnts you need to pass to the pollers and take note of the order. 

All tools requiere 3 arguments to be passed to the script. 

**Example:** `php smb 127.0.0.1 administrator password` 

Now login into phpmyadmin and input values for pollers in the order that they appear. Random entries will be generated for new pollers. This will need to be modified to get scores to work. 

**Access PhpMyAdmin:**
The install script pulls and sets up phpmyadmin located at `http://<ip>/phpmyadmin` 

**Example Database config:**

Database: `ccdc` Table: `services` 

![alt text](https://github.com/shad0wghost/se/blob/master/Demodb.png)

**To Start Scoring:**
To start the pollers run the start python script. Usage `python start.py <time in seconds>`

**Example:** `python start.py 60` will run service checks every 60 seconds.

**Adding an Inject:** 
If you would like a white team to upload injects you can use the inject uploader tool located at `http://<ip>/addinject.php`.


