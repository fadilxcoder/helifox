<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HELIFOX - #MVC Framework</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL?>favicon.ico"/>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo URL ?>assets/css/helifox-style.css">
    </head>
    <body>
        <div id="helifox-landing-page">
            <img src="<?php echo URL?>assets/images/helifox-logo.png" class="img-responsive" alt="logo" title="<?php echo $this->msg ?>">
            <h1><?php echo $this->msg ?></h1>
            <p>A Light &amp; Cunning MVC Framework, built for PHP developers to create web apps.</p>
            <h2>Overview</h2>
            <ul>
                <li> PHP VERSION >= 7.2 </li>
                <li> Uses Hash Argon2i , <i>Note that Argon2i hashing algorithm is not supported in some shared servers because it needs python 3.4</i> </li>
                <li> Uses PSR-4 autoloading standard</li>
                <li> Uses PSR-2 coding standard</li>
                <li> <strong>mod_rewrite</strong> MUST be enable </li>
                <li> Dependencies need to be downloaded by composer</li>
            </ul>
            <h2>Using the framework</h2>
            <ul>
                <li> Create a virtual host in apache (locally)</li>
                <li> Point virtual host url `<strong>http://helifox.local/</strong>` to folder `<strong>helifox_project_name/public/</strong>`</li>
                <li> Change `<strong>URL</strong>` in`<strong>helifox_project_name/configuration/settings.php</strong>` file.</li>
            </ul>
            <h2>What's included</h2>
            <pre>
                <b>&#9944;</b>
                ├── README.md
                ├── index.html
                ├── helifox-logo.png
                ├── composer.lock
                ├── composer.json
                ├── .htaccess
                ├── views
                │   ├── error
                │   │   └── index.php
                │   ├── inc
                │   │   ├── footer.php
                │   │   └── header.php
                │   ├── helifox-landing-page.php
                │   └── index.html
                ├── vendor
                │   ├── autoload.php
                │   └── ...
                ├── public
                │   ├── assets
                │   │   ├── css
                │   │   │    └── ...
                │   │   ├── images
                │   │   │    └── ...
                │   │   └── js
                │   │       └── ...
                │   ├── .htaccess
                │   ├── favicon.ico
                │   ├── index.php
                │   ├── offline.html
                │   ├── offline.js
                │   └── robots.txt
                ├── models
                │   ├── Home.php
                │   └── index.html
                ├── library
                │   ├── Controller.php
                │   ├── index.html
                │   ├── Core.php
                │   ├── Database.php
                │   ├── Error.php
                │   ├── View.php
                │   └── Model.php
                ├── controllers
                │   ├── HomeController.php
                │   └── index.html
                └── configuration
                    ├── functions.php
                    ├── routes.php
                    ├── settings.php
                    └── index.html
            </pre>
            <p><a href="https://goo.gl/EbHMQX" target="_blank">&copy; fadilxcoder</a></p>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="<?php echo URL ?>assets/js/scripts.js"></script>
    </body>
</html>
