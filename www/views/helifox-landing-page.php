<?php 
    $this->layout('layouts/lp.base.layout', [
        'title' => 'HELIFOX - #MVC Framework'
    ]);
?>

<?php $this->start('landingPage') ?>
<div id="helifox-landing-page">
    <img src="<?php echo URL?>assets/images/helifox-logo.png" class="img-responsive" alt="logo" title="<?php echo $this->e($msg) ?>">
    <h1><?php echo $this->e($msg) ?></h1>
    <p>A Light &amp; Cunning MVC Micro Framework, built for PHP developers to create web apps.</p>
    <hr>
    <h2>Using the framework (DOCKER)</h2>
    <ul>
        <li> Build docker images (docker-compose up -d --build)</li>
        <li> Connect to docker terminal (docker exec -it fx_php_fpm ash) & install dependencies, `<strong>composer install</strong>`</li>
    </ul>
    <h2>What's included</h2>
    <pre>
        &lt;www&gt;
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
<?php $this->stop() ?>

<?php $this->push('landingPage') ?>
<script src="<?php echo URL ?>assets/js/scripts.js"></script>
<?php $this->end() ?>