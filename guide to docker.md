GUIDE TO DOCKER (Windows/Mac)

Step 1: install the engine files you need from https://docs.docker.com/engine/install/

Step 2:open the Docker hub

Step 3: create a folder to store the website in. 

Step 4: navigate to the folder in windows explorer and open Windows Powershell.
if you are on mac, use the command prompt to navigate to the correct folder.

Step 5: enter the following code: docker run --rm -v ${PWD}:/install
vjedev/installer:latest

(copy and paste for best results)

Step 6: once the install is completed, insert the website files into websites/default/public. replace any files that might be in that folder.

Step 7: in the folder you have installed docker into, type docker-compose up

Step 8: Open a web browser and type v.je in the bar. if it has worked, you should now be at the home page of the website.
