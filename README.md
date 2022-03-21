# RockTabulator Dev Environment

## A message to Russian 🇷🇺 people

If you currently live in Russia, please read [this message](https://github.com/Roave/SecurityAdvisories/blob/latest/ToRussianPeople.md).

[![SWUbanner](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://github.com/vshymanskyy/StandWithUkraine/blob/main/docs/README.md)

---

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
