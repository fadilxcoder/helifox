<?php 
    $this->layout('layouts/lp.base.layout', [
        'title' => 'HELIFOX'
    ]);
?>

<?php $this->start('landingPage') ?>
    <div id="helifox-landing-page">
        <img src="<?php echo URL?>assets/images/helifox-logo.png" class="img-responsive" alt="logo" title="logo">
        <h1><?php echo $this->e($heading) ?></h1>
        <h2><?php echo $this->e($text) ?></h2>
        <?php if (!$this->data['users']) : ?>
            <h5><code>$ Did you forget to "php bin/console database:init" ?</code></h5>
        <?php else: ?>
        <ul>
            <?php foreach($this->data['users'] as $users) : ?>    
                <li><?php echo $users['username'] . ' - ' . $users['uuid'] . ' - ' . $users['name'] ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <p id="loading-time"></p>
    </div>
<?php $this->stop() ?>