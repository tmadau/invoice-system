# invoice-system

<img src="./resources/img/challenge.png" width="100%">

Building a simple invoice systems that allows individuals to add and invoice. It caters for taxes, before taxes, and after tax. The total amount the individual has to pay. It also has an API call for [CRUD] _creating_, _reading_, _updating_ and _deleting_.

# Installation

## Prerequisites

A local apache server to host on, in this case we will use a bitnami local server environment - [Bitnami local server environments](https://bitnami.com/stacks/infrastructure)

### MacOS

    - Install [Bitnami MAMP](https://bitnami.com/stack/mamp)

### Windows

    - Install [Bitnami WAMP](https://bitnami.com/stack/wamp)

### Linux

> Note - this project has not been tested on a linux based system

    - Install [Bitnami LAMP](https://bitnami.com/stack/lamp)

# Clone

Clone this repo to your local machine using:

```
cd [Insert path to your MAM/WAMP/LAMP directory]/apache2/htdocs
git clone https://github.com/tmadau/invoice-system.git
```

# Setup

## Configuring Server Environment

Locate and run the executable file

![Server](./resources/img/MAMPEXE.png)

Start the server

![Server](./resources/img/MAMP3.png)

Browse to site location
http://localhost/Camagru

> Note - by default the server is set to port 80

## Configuring Camagru

### Changing Camagru Variables

In [Insert path to your MAP/WAMP/LAMP directory]/apache2/htdocs/Camagru/config/database.php

Change the password of `$db_pass`, to the password you set during bitnami installation/setup.

![Database_Configuration](./resources/img/db_pass.png)

### Creating Database and Table

To create database and tables:

In the browser, navigate to
http://localhost/Camagru/config/setup.php

![Database_Configuration](./resources/img/setup.png)

# Samples | Screenshots

## Landing | Home page

![Screenshot_Landingpage](./resources/img/landing.png)

## Webcam

![Screenshot_Landingpage](./resources/img/webcam.png)

### Uploading an image

![Screenshot_Landingpage](./resources/img/imageupload.png)

# Project Insight

## Project Brief

- [Invoice System Project Brief](./resources/uploads/Developer Challenge - Invoicing.pdf)

## Project stack / Technologies

### Front-end

- HTML
- CSS
- JavaScript

### Back-end

- [PHP](https://www.php.net/)

### Database

- [MySQL](https://www.mysql.com/)
- [PHPMYADMIN](https://www.phpmyadmin.net/)
