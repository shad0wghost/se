# SE:
SE is a competition scoring engine used to judge whether or not services are up/down.
## To Install:
Install apache2

Clone to `/var/www/html` and run `python install.py` 

**WHEN PROMPTED** Selected `apache`

## To Administer:
**To Add a Service to Check**

Navigate to `/var/www/html/se/admin` and execute the tools with `php <toolname>`.

To get more information on how the pollers work navigate to `/var/www/html/se/pollers` and execute the tools via the command `php <toolname>` the debug output should give you enough to figure out what is needed. Open the script in a text editor and look at the arguemnts you need to pass to the pollers and take note of the order. 

All tools requiere 3 arguments to be passed to the script. 

**Example:** `php smb 127.0.0.1 administrator password`

Now login into phpmyadmin and input values for pollers in the order that they appear. Random entries will be generated for new players. This will need to be fixed to get scores to work.

**To Start Poller:**
To start the poller run the start python script. Usage `python start.py <time in seconds>`

**Example:** `python start.py 60` will run service checks every 60 seconds.

**Adding an Inject:** 
If you would like a white team to uplaod injects you can use the inject uploader tool located at `http://<ip>/addinject.php`.


