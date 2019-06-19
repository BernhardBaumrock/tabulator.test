# RockTabulator Dev Environment

**This site is intended for development use only!**

## Install

1) Clone the repo and update/init submodules

```
cd /your/root/folder
git clone git@github.com:BernhardBaumrock/tabulator.test.git .
git submodule update --init --recursive
```

2) Restore the latest DB dump

```
/site/assets/backups/database/tabulator.sql  ---> DB name tabulator
```

The site uses user `root` with no password to connect to mysql!

## Login

```
username = tabulator
password = tabulator
```
