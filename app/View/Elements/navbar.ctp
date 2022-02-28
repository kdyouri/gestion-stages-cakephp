<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Basculer la navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= Router::url('/') ?>">Gestion Stages</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php $base = $this->params['controller']; ?>
                <li<?php if ($base == 'pages') echo ' class="active"'; ?>>
                    <a href="<?= Router::url('/') ?>">Accueil</a>
                </li>
                <?php if ($this->Session->check('Auth.User')): ?>
                <li<?php if ($base == 'stages') echo ' class="active"'; ?>>
                    <?= $this->Html->link('Mes stages', '/stages') ?>
                </li>
                <li<?php if ($base == 'stages') echo ' class="active"'; ?>>
                    <?= $this->Html->link('Tous les stages', '/stages/all') ?>
                </li>
                <?php if ($this->Session->read('Auth.User.role') == 'Administrateur'): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><?= $this->Html->link('Étudiants par enseignant', '/stages/par_enseignant') ?></li>
                        <li><?= $this->Html->link('Étudiants sans encadrants pédagogiques', '/stages/sans_encadrant') ?></li>
                        <li><?= $this->Html->link('Étudiants qui n’ont pas déposer le rapport', '/stages/sans_rapport') ?></li>
                        <li><?= $this->Html->link('Stages validés pour la soutenance', '/stages/valides_pour_soutenance') ?></li>
                        <li><?= $this->Html->link('Notes attribués aux étudiants', '/stages/notes_attribues') ?></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($this->Session->check('Auth.User')): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?= $this->Html->avatar(['class' => 'img-circle', 'height' => '22']) ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= Router::url('/utilisateurs/profile') ?>"><i class="fa fa-edit"></i> Mon profil</a></li>
                            <li class="divider" role="separator"></li>
                            <li><a href="<?= Router::url('/utilisateurs/logout') ?>"><i class="fa fa-sign-out"></i> Se déconnecter</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a href="<?= Router::url('/utilisateurs/login') ?>"><i class="fa fa-sign-in"></i> Se connecter</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>