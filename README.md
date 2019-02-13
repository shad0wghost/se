# SE:
SE is a competition scoring engine used to judge weather or not service are up/down.
## To Install:
Clone to `/var/www/html` and run `python install.py` 

**WHEN PROMPTED** Selected `apache`

## To Administer:
Navigate to `/var/www/html/se/admin` and execute the tools with `php <toolname>` then login into phpmyadmin and input values for pollers. 

If you need more information on how the pollers work navigate to `/var/www/html/se/pollers` and execute the tools via `php <toolname>` the debug output should give you enough to figure out what is needed.

All tools requiere 3 arguments to be passed to the script. 

**Example:** `php smb 127.0.0.1 administrator password`

**To Start Poller:**
To start the poller run the start python script. Usage `python start.py <time in seconds>`

**Example:** `python start.py 60` will run service checks every 60 seconds.

**Adding an Inject:** 
If you would like a white team to uplaod injects you can use the inject uploader tool located at `http://<ip>/addinject.php`.


