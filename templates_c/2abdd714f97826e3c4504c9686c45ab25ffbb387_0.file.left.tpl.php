<?php
/* Smarty version 4.3.4, created on 2024-11-13 15:50:37
  from 'C:\wamp64\www\hotels\public\left.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6734cacdc34355_61186222',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2abdd714f97826e3c4504c9686c45ab25ffbb387' => 
    array (
      0 => 'C:\\wamp64\\www\\hotels\\public\\left.tpl',
      1 => 1731512970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6734cacdc34355_61186222 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <a href="left.tpl"></a>
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php?gestion=Accueil">Les Hôtels</a>
                <a class="navbar-brand hidden" href="index.php?gestion=Accueil">G</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php?gestion=Accueil"> <i class="menu-icon fa fa-dashboard"></i>Accueil </a>
                    </li>
                    <h3 class="menu-title">ADMINISTRATION</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Modes de paiements</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="index.php?gestion=paymenttypes">Liste</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="index.php?gestion=paymenttypes&action=form_ajouter">Nouveau</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>xxxxxx</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="#A VOUS D'ECRIRE LE LIEN">Liste</a></li>
                            <li><i class="fa fa-table"></i><a href="#A VOUS D'ECRIRE LE LIEN">Nouveau</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
    <a href="index.php?gestion=connexion&action=profil"> 
        <i class="menu-icon fa fa-th"></i>Mon profil
    </a>
</li>

                    <h3 class="menu-title">xxxxx</h3><!-- /.menu-title -->

                    <li class="dropdown">
                        <a href="#A VOUS D'ECRIRE LE LIEN"> <i class="menu-icon fa fa-tasks"></i>xxxxx</a>
                         
                        
                    </li>
                    <li>
                        <a href="#"> <i class="menu-icon ti-email"></i>xxxxxx</a>
                    </li>
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel --><?php }
}
