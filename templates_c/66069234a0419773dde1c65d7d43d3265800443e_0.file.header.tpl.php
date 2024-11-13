<?php
/* Smarty version 4.3.4, created on 2024-11-13 15:50:37
  from 'C:\wamp64\www\hotels\public\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6734cacdc54c03_08303590',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66069234a0419773dde1c65d7d43d3265800443e' => 
    array (
      0 => 'C:\\wamp64\\www\\hotels\\public\\header.tpl',
      1 => 1731512689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6734cacdc54c03_08303590 (Smarty_Internal_Template $_smarty_tpl) {
?>       <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>


                    </div>
                </div>

                <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="public/images/admin.jpg" alt="User Avatar">
                </a>
                <div class="user-menu dropdown-menu">
                    <?php if ((isset($_SESSION['client']))) {?>
                        <a class="nav-link" href="index.php?gestion=connexion&action=profil">
                            <i class="fa fa-user"></i> Profil
                        </a>
                        <a class="nav-link" href="index.php?gestion=connexion&action=deconnexion">
                            <i class="fa fa-power-off"></i> Déconnexion
                        </a>
                    <?php } else { ?>
                        <a class="nav-link" href="index.php?gestion=connexion&action=form_connexion">
                            <i class="fa fa-sign-in"></i> Connexion
                        </a>
                    <?php }?>
                </div>
            </div>
            <div class="user-area">
                Bienvenue <?php if ((isset($_SESSION['client']))) {
echo $_SESSION['client']['LastName'];?>
 <?php echo $_SESSION['client']['FirstName'];
} else { ?>Invité<?php }?>
            </div>
        </div>
    </div>
</header><!-- /header --><?php }
}
