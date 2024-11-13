<?php
/* Smarty version 4.3.4, created on 2024-11-13 15:36:33
  from 'C:\wamp64\www\hotels\mod_connexion\vue\connexionVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6734c7819f4724_20972748',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae319d5c8e8bcd4630283bc0c590dcd298e22493' => 
    array (
      0 => 'C:\\wamp64\\www\\hotels\\mod_connexion\\vue\\connexionVue.tpl',
      1 => 1731512151,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.tpl' => 1,
    'file:public/top-header.tpl' => 1,
    'file:public/footer.tpl' => 1,
  ),
),false)) {
function content_6734c7819f4724_20972748 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:public/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="right-panel" class="right-panel">
    <?php $_smarty_tpl->_subTemplateRender("file:public/top-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Connexion</strong>
                        </div>
                        <div class="card-body">
                            <?php if ((isset($_smarty_tpl->tpl_vars['erreur']->value))) {?>
                                <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['erreur']->value;?>
</div>
                            <?php }?>
                            <form action="index.php" method="POST">
                                <input type="hidden" name="gestion" value="connexion">
                                <input type="hidden" name="action" value="connexion">
                                
                                <div class="form-group">
                                    <label for="lastName">Nom de famille</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="resNo">Numéro de réservation</label>
                                    <input type="text" class="form-control" id="resNo" name="resNo" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Se connecter</button>
                                <a href="index.php" class="btn btn-secondary">Annuler</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:public/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
