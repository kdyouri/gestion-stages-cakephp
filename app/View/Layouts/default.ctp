<?php
/**
 * @var AppView $this
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestion Stages - <?= $this->fetch('title') ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <?= $this->Html->css('custom.css') ?>
    <?= $this->fetch('css') ?>
</head>
<body style="padding-top: 63px;">

    <?= $this->element('navbar') ?>

    <section class="container">
        <?= $this->Flash->render() ?>
        <?= $this->Flash->render('auth', ['element' => 'Flash/error']) ?>

        <?= $this->fetch('content') ?>
    </section>

    <footer class="container">
        <hr>
        <p>© 2022 Company, Inc.</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    <?= $this->Html->script('global.js') ?>
    <?= $this->fetch('script') ?>
</body>
</html>