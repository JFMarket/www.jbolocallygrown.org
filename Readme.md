Developing on Mac OSx or Linux
==============================
1. Clone this repo, then go to that directory
2. Run `vagrant up`
3. Browse to http://localhost:8080 and test that the webserver is installed and running.
4. Create a topic branch to make changes on
5. Use your favorite editor to add a new feature or fix a bug
6. File changes are automatically synced to the VB. A refresh should be sufficient to see them
7. Once the feature is ready to be reviewed, push the branch to GitHub and create a Pull Request (https://help.github.com/articles/using-pull-requests) so that it can be reviewed before being merged into master

Developing on Windows
=====================
Prerequisites
-------------
1. VirtualBox
2. Vagrant
3. Putty
4. Git or GitHub
Setup
-----
1. Clone this repo, then go to that directory
2. Run `vagrant up`
3. Browse to http://localhost:8080 and test that the webserver is installed and running.
4. Create a topic branch to make changes on
5. Use Putty to SSH into the server, (run `vagrant ssh-config` in the folder with the vagrantfile to see how)
5. Use your favorite linux editor to add a new feature or fix a bug
6. File changes are automatically synced to the VB. A refresh should be sufficient to see them
7. Once the feature is ready to be reviewed, push the branch to GitHub and create a Pull Request (https://help.github.com/articles/using-pull-requests) so that it can be reviewed before being merged into master
Errors?
-------
1. Inifinite Timeout? (Check to make sure you have virtualization enabled in BIOS for VirtualBox in Windows)
2. Can't SSH? (Make sure you have converted the private key to a ppk that putty can use and the machine is running `vagrant status`)
3. Still having problems? (Contact Ryan Robeson)