<?php
/* Smarty version 4.3.4, created on 2024-11-13 18:59:15
  from 'C:\wamp64\www\hotels\mod_calendrier\vue\calendrier.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6734f703e1a293_69638352',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63ad2cb2124b00a85d7451ae62a90f06c8d28066' => 
    array (
      0 => 'C:\\wamp64\\www\\hotels\\mod_calendrier\\vue\\calendrier.tpl',
      1 => 1731524351,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_6734f703e1a293_69638352 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\hotels\\include\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    
    <link rel="stylesheet" href="public/assets/css/normalize.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="public/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="public/assets/scss/style.css">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link href="public/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
> -->

</head>
<body>

<!-- Left Panel -->


<?php $_smarty_tpl->_subTemplateRender('file:public/left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- FIN : Left Panel -->



<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!--Header -->

    <?php $_smarty_tpl->_subTemplateRender("file:public/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    
    <div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Mes réservations</strong>
                        
                        <!-- Ajout des sélecteurs -->
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <form action="index.php" method="GET" class="form-inline">
                                    <input type="hidden" name="gestion" value="calendrier">
                                    <select name="mois" class="form-control mr-2">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['liste_mois']->value, 'nom', false, 'num');
$_smarty_tpl->tpl_vars['nom']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['nom']->value) {
$_smarty_tpl->tpl_vars['nom']->do_else = false;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['num']->value == $_smarty_tpl->tpl_vars['mois']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['nom']->value;?>
</option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                    <select name="annee" class="form-control mr-2">
                                        <?php
$_smarty_tpl->tpl_vars['an'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['an']->step = 1;$_smarty_tpl->tpl_vars['an']->total = (int) ceil(($_smarty_tpl->tpl_vars['an']->step > 0 ? $_smarty_tpl->tpl_vars['annee_max']->value+1 - ($_smarty_tpl->tpl_vars['annee_min']->value) : $_smarty_tpl->tpl_vars['annee_min']->value-($_smarty_tpl->tpl_vars['annee_max']->value)+1)/abs($_smarty_tpl->tpl_vars['an']->step));
if ($_smarty_tpl->tpl_vars['an']->total > 0) {
for ($_smarty_tpl->tpl_vars['an']->value = $_smarty_tpl->tpl_vars['annee_min']->value, $_smarty_tpl->tpl_vars['an']->iteration = 1;$_smarty_tpl->tpl_vars['an']->iteration <= $_smarty_tpl->tpl_vars['an']->total;$_smarty_tpl->tpl_vars['an']->value += $_smarty_tpl->tpl_vars['an']->step, $_smarty_tpl->tpl_vars['an']->iteration++) {
$_smarty_tpl->tpl_vars['an']->first = $_smarty_tpl->tpl_vars['an']->iteration === 1;$_smarty_tpl->tpl_vars['an']->last = $_smarty_tpl->tpl_vars['an']->iteration === $_smarty_tpl->tpl_vars['an']->total;?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['an']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['an']->value == $_smarty_tpl->tpl_vars['annee']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['an']->value;?>
</option>
                                        <?php }
}
?>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Afficher</button>
                                </form>
                            </div>
                            <?php if ((isset($_SESSION['client'])) && (isset($_smarty_tpl->tpl_vars['hotel_info']->value))) {?>
                                <div class="col-md-8">
                                    <span style="font-size: 21px; font-weight: bold;" class="badge badge-primary">
                                        Hôtel réservé : <?php echo $_smarty_tpl->tpl_vars['hotel_info']->value['Name'];?>
 
                                        <span class="hotel-stars">
                                            <?php
$__section_star_0_loop = (is_array(@$_loop=strlen((string) $_smarty_tpl->tpl_vars['hotel_info']->value['Stars'])) ? count($_loop) : max(0, (int) $_loop));
$__section_star_0_total = $__section_star_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_star'] = new Smarty_Variable(array());
if ($__section_star_0_total !== 0) {
for ($__section_star_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_star']->value['index'] = 0; $__section_star_0_iteration <= $__section_star_0_total; $__section_star_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_star']->value['index']++){
?>
                                                <i style="color: gold;" class="fa fa-star"></i>
                                            <?php
}
}
?>
                                        </span>
                                    </span>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if ((isset($_SESSION['client']))) {?>
                            <div class="alert alert-info">
                                Debug: Recherche des réservations pour '<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'trim' ][ 0 ], array( $_SESSION['client']['LastName'] ));?>
' 
                                du <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date_debut']->value,"%d/%m/%Y");?>
 
                                au <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date_fin']->value,"%d/%m/%Y");?>

                                <br>
                                Nombre de réservations trouvées : <?php echo $_smarty_tpl->tpl_vars['total_reservations']->value;?>

                            </div>
                            
                                                        
                            
                            <table class="calendar">
    <thead>
        <tr>
            <th>Dimanche</th>
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
            <th>Samedi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
                <?php $_smarty_tpl->_assignInScope('premier_jour', smarty_modifier_date_format($_smarty_tpl->tpl_vars['date_debut']->value,"%w"));?>
        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['premier_jour']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['premier_jour']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
            <td class="empty">&nbsp;</td>
        <?php }
}
?>
        
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, range(1,$_smarty_tpl->tpl_vars['nombre_jours']->value), 'jour');
$_smarty_tpl->tpl_vars['jour']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['jour']->value) {
$_smarty_tpl->tpl_vars['jour']->do_else = false;
?>
            <?php if (($_smarty_tpl->tpl_vars['premier_jour']->value+$_smarty_tpl->tpl_vars['jour']->value-1)%7 == 0 && $_smarty_tpl->tpl_vars['jour']->value != 1) {?>
                </tr><tr>
            <?php }?>
            <td class="day">
                <?php echo $_smarty_tpl->tpl_vars['jour']->value;?>

                <?php $_smarty_tpl->_assignInScope('reservation_affichee', false);?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reservations_uniques']->value, 'reservation');
$_smarty_tpl->tpl_vars['reservation']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['reservation']->value) {
$_smarty_tpl->tpl_vars['reservation']->do_else = false;
?>
                    <?php if (in_array($_smarty_tpl->tpl_vars['jour']->value,$_smarty_tpl->tpl_vars['reservation']->value['jours'])) {?>
                        <?php if (!$_smarty_tpl->tpl_vars['reservation_affichee']->value) {?>
                            <div class="reservation-info 
                                <?php if ($_smarty_tpl->tpl_vars['jour']->value == reset($_smarty_tpl->tpl_vars['reservation']->value['jours'])) {?>debut<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['jour']->value == end($_smarty_tpl->tpl_vars['reservation']->value['jours'])) {?>fin<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['jour']->value != reset($_smarty_tpl->tpl_vars['reservation']->value['jours']) && $_smarty_tpl->tpl_vars['jour']->value != end($_smarty_tpl->tpl_vars['reservation']->value['jours'])) {?>continuation<?php }?>">
                                <?php echo $_smarty_tpl->tpl_vars['reservation']->value['LastName'];?>
 <?php echo $_smarty_tpl->tpl_vars['reservation']->value['FirstName'];?>
 - Ch.<?php echo $_smarty_tpl->tpl_vars['reservation']->value['Room'];?>

                            </div>
                            <?php $_smarty_tpl->_assignInScope('reservation_affichee', true);?>
                        <?php }?>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </td>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        
                <?php $_smarty_tpl->_assignInScope('dernier_jour', ($_smarty_tpl->tpl_vars['premier_jour']->value+$_smarty_tpl->tpl_vars['nombre_jours']->value-1)%7);?>
        <?php if ($_smarty_tpl->tpl_vars['dernier_jour']->value < 6) {?>
            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 6+1 - ($_smarty_tpl->tpl_vars['dernier_jour']->value+1) : $_smarty_tpl->tpl_vars['dernier_jour']->value+1-(6)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['dernier_jour']->value+1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                <td class="empty">&nbsp;</td>
            <?php }
}
?>
        <?php }?>
        </tr>
    </tbody>
</table>
                        <?php } else { ?>
                            <div class="alert alert-warning">
                                Veuillez vous connecter pour voir vos réservations.
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hotel-info {
    margin-bottom: 20px;
    text-align: center;
}

.hotel-info h2 {
    color: #333;
    font-size: 24px;
}
.reservation-info {
    background-color: #e3f2fd;
    margin: 2px 0;
    padding: 2px;
    font-size: 11px;
    border-radius: 3px;
    min-height: 20px; /* Pour maintenir une hauteur constante même sans texte */
}

.reservation-info.debut {
    border-left: 3px solid #4CAF50;
}

.reservation-info.fin {
    border-right: 3px solid #f44336;
}
.reservation-info.continuation {
    border-left: none;
    border-right: none;
    background-color: #e3f2fd;
}
.day {
    position: relative;
    min-height: 40px;
}



.calendar {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.calendar th, .calendar td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

.calendar th {
    background-color: #f5f5f5;
}

.day {
    height: 80px;
    vertical-align: top;
}

.empty {
    background-color: #f9f9f9;
}

.reserved {
    background-color: #e3f2fd;
}

.reservation-info {
    font-size: 12px;
    color: #2196F3;
    margin-top: 5px;
    padding: 2px;
    background-color: rgba(33, 150, 243, 0.1);
    border-radius: 3px;
}

.controls {
    margin-bottom: 20px;
}

.controls select {
    margin-right: 10px;
}

.hotel-info {
    margin-bottom: 20px;
    text-align: center;
}
</style>

    <!-- FIN : header -->

    <!--<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    -->
    <div class="content mt-3">

        <br>

        <div class="animated fadeIn">
            <div class="row">


                


                <!-- /# column -->
            </div>


        </div> <!-- .content -->
    </div>
</div><!-- /#right-panel -->


<?php echo '<script'; ?>
 src="public/assets/js/vendor/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/plugins.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/main.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 src="public/assets/js/lib/chart-js/Chart.bundle.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/dashboard.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/widgets.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/vector-map/jquery.vmap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/vector-map/jquery.vmap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/vector-map/jquery.vmap.sampledata.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/vector-map/country/jquery.vmap.world.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
<?php echo '</script'; ?>
>

</body>
</html>

<?php }
}
