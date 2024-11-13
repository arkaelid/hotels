<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{$SCRIPT_NAME}</title>
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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>

<!-- Left Panel -->


{include file='public/left.tpl'}

<!-- FIN : Left Panel -->



<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!--Header -->

    {include file="public/header.tpl"}

    
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
                                        {foreach from=$liste_mois key=num item=nom}
                                            <option value="{$num}" {if $num == $mois}selected{/if}>{$nom}</option>
                                        {/foreach}
                                    </select>
                                    <select name="annee" class="form-control mr-2">
                                        {for $an=$annee_min to $annee_max}
                                            <option value="{$an}" {if $an == $annee}selected{/if}>{$an}</option>
                                        {/for}
                                    </select>
                                    <button type="submit" class="btn btn-primary">Afficher</button>
                                </form>
                            </div>
                            {if isset($smarty.session.client) && isset($hotel_info)}
                                <div class="col-md-8">
                                    <span class="badge badge-primary">
                                        Hôtel réservé : {$hotel_info.Name} 
                                        <span class="hotel-stars">
                                            {section name=star loop=$hotel_info.Stars|strlen}
                                                <i class="fa fa-star"></i>
                                            {/section}
                                        </span>
                                    </span>
                                </div>
                            {/if}
                        </div>
                    </div>
                    <div class="card-body">
                        {if isset($smarty.session.client)}
                            <div class="alert alert-info">
                                Debug: Recherche des réservations pour '{$smarty.session.client.LastName|trim}' 
                                du {$date_debut|date_format:"%d/%m/%Y"} 
                                au {$date_fin|date_format:"%d/%m/%Y"}
                                <br>
                                Nombre de réservations trouvées : {$total_reservations}
                            </div>
                            
                            <table class="table table-bordered calendar">
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
                                        {* Remplir les jours vides du début du mois *}
                                        {section name=foo loop=$jour_semaine}
                                            <td class="empty-day"></td>
                                        {/section}
                                        
                                        {* Boucle sur tous les jours du mois *}
                                        {assign var=jour_courant value=1}
                                        {while $jour_courant <= $nombre_jours}
                                            {if ($jour_semaine + $jour_courant - 1) % 7 == 0}</tr><tr>{/if}
                                            
                                            <td>
                                                <div class="date">{$jour_courant}</div>
                                                {assign var=date_complete value="`$annee`-`$mois|string_format:"%02d"`-`$jour_courant|string_format:"%02d"`"}
                                                
                                                {if isset($reservations_par_date[$date_complete])}
                                                    {foreach from=$reservations_par_date[$date_complete] item=reservation}
                                                        <div class="reservation">
                                                            {if isset($reservation.LastName)}
                                                                {$reservation.LastName|trim}
                                                            {/if}
                                                            {if isset($reservation.Room)}
                                                                Chambre {$reservation.Room}
                                                            {/if}
                                                        </div>
                                                    {/foreach}
                                                {/if}
                                            </td>
                                            
                                            {assign var=jour_courant value=$jour_courant+1}
                                        {/while}
                                        
                                        {* Remplir les jours vides de fin de mois *}
                                        {section name=foo loop=(7 - ($jour_semaine + $nombre_jours - 1) % 7) % 7}
                                            <td class="empty-day"></td>
                                        {/section}
                                    </tr>
                                </tbody>
                            </table>
                        {else}
                            <div class="alert alert-warning">
                                Veuillez vous connecter pour voir vos réservations.
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.form-inline select {
    width: auto;
}

.form-inline {
    align-items: center;
}

.hotel-stars {
    color: #ffd700;
    margin-left: 5px;
}

.badge {
    font-size: 14px;
    padding: 8px 12px;
}
.hotel-stars {
    color: #ffd700;  /* Couleur dorée pour les étoiles */
}

.calendar td {
    height: 120px;
    width: 14.28%;
    vertical-align: top;
    padding: 5px;
}

.calendar .date {
    font-weight: bold;
    margin-bottom: 5px;
}

.calendar .reservation {
    font-size: 12px;
    background: #e9ecef;
    margin-bottom: 2px;
    padding: 4px;
    border-radius: 3px;
    border-left: 3px solid #007bff;
}

.calendar .reservation.debut {
    background: #d4edda;
    border-left: 3px solid #28a745;
}

.calendar .reservation.fin {
    background: #f8d7da;
    border-left: 3px solid #dc3545;
}

.empty-day {
    background: #f8f9fa;
}

.badge {
    font-size: 10px;
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


<script src="public/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="public/assets/js/plugins.js"></script>
<script src="public/assets/js/main.js"></script>


<script src="public/assets/js/lib/chart-js/Chart.bundle.js"></script>
<script src="public/assets/js/dashboard.js"></script>
<script src="public/assets/js/widgets.js"></script>
<script src="public/assets/js/lib/vector-map/jquery.vmap.js"></script>
<script src="public/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
<script src="public/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
<script src="public/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
<script>
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
</script>

</body>
</html>

