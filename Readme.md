# www.jbolocallygrown.org
This site is developed on Digital Ocean's Wordpress instance. Local development is not supported at this time.

## Migrating
1. Backup existing server. (assuming server at 107.170.124.125)
  1. `rsync -acv --delete root@107.170.124.125:/var/www/ src/`
  1. `ssh root@107.170.124.125`
    1. `mysqldump --add-drop-table -u root wordpress | bzip2 -c > jbo.bak.sql.bz2`
    1. `exit`
  1. `rsync -acv root@107.170.124.125:jbo.bak.sql.bz2 .`
1. Copy files to new server. (replace 127.x.x.x with real ip)
  1. `ssh root@127.x.x.x`
    1. Copy the password from the `define('DB_PASSWORD')` line in /var/www/wp-config.php`
    1. `exit`
  1. Paste the copied password into the same line in src/wp-config.php
  1. `rsync -acv --delete src/ root@127.x.x.x:/var/www/` (Might have to run twice)
  1. `rsync -acv jbo.bak.sql.bz2 root@127.x.x.x:.`
  1. `rsync -acv Search-Replace-DB-master.zip root@127.x.x.x:/var/www/`
  1. `ssh root@127.x.x.x`
    1. `bzip2 -d jbo.bak.sql.bz2`
    1. `mysql -u root wordpress < jbo.bak.sql`
    1. `cd /var/www`
    1. `apt-get update`
    1. `apt-get install -y unzip`
    1. `unzip Search-Replace-DB-master.zip`
    1. Open http://127.x.x.x/Search-Replace-DB-master/
      1. Replace *107.170.124.125*
      1. With *127.x.x.x*
      1. DB name *wordpress*
      1. user _default_ 
      1. pass _default_
      1. host *localhost*
      1. *all tables*
      1. Click *live run*
      1. Click *delete me*
        1. If this fails: `rm -rf /var/www/Search-Replace-DB-master*`
    1. Remove the Apache Password for Admin areas. https://www.digitalocean.com/community/articles/one-click-install-wordpress-on-ubuntu-13-10-with-digitalocean
    1. `exit`
1. Open http://127.x.x.x and make sure everything works.

Git
===
[Checkout pull requests locally to test before accepting.](https://help.github.com/articles/checking-out-pull-requests-locally)
