#!/bin/python
import os
import time
import sys
try:
	t = sys.argv[1]
	t = float(t)
	while True:
		print "STARTING POLL"
		os.system('php ./controller.php')
		print "POLL OVER"
		time.sleep(t)
except:
	print "Usage: start.py <time in seconds>" 
