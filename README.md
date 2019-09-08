# RockTabulator Dev Environment

**This site is intended for development use only!**

## Install

1) Clone the repo and update/init submodules

```
cd /your/root/folder
git clone git@github.com:BernhardBaumrock/tabulator.test.git .
git submodule update --init --recursive
```

2) Restore the latest DB dump either manually or with this script

```
php site/assets/mysqldump/restore.php
```

The site and the script use user `root` with no password to connect to mysql!

## Login

```
username = tabulator
password = tabulator
```

## Play around

Go to Setup > RockMarkup Sandbox
