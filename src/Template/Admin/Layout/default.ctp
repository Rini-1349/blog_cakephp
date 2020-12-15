<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a>STLN Actus</a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="left">
                <li> <?= $this->Html->link(__('Retour au site'), '/') ?></li>
            </ul>
        </div>
        <div class="top-bar-section">
            <ul class="right">
                <?php
                if ($loggedUser != null) {
                ?>
                    <li> <?= $this->Html->link(__('Déconnexion'), ['controller' => 'users', 'action' => 'logout', $loggedUser['id']]) ?></li>
                <?php
                } 
                else
                {
                ?>
                    <li><?= $this->Html->link(__('Connexion'), ['controller' => 'users', 'action' => 'login']) ?></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>

    <?php if ($loggedUser != null AND $loggedUser['role'] == 1)
    {
    ?>
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <nav class="large-3 medium-4 columns" id="actions-sidebar">
                    <ul class="side-nav">
                        <li class="heading"><?= __('Menu principal') ?></li>
                        <li><?= $this->Html->link('Utilisateurs',['controller' => 'Users', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link('Articles',['controller' => 'Posts', 'action' => 'index']) ?></li>    
                        <li><?= $this->Html->link('Catégories',['controller' => 'Categories', 'action' => 'index']) ?></li>      
                    </ul>
                </nav> 
            </section>
            <!-- /.sidebar -->
        </aside>
    <?php 
    } 
    ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
