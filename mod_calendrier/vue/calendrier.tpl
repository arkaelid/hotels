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
                                    <span style="font-size: 21px; font-weight: bold;" class="badge badge-primary">
                                        Hôtel réservé : {$hotel_info.Name} 
                                        <span class="hotel-stars">
                                            {section name=star loop=$hotel_info.Stars|strlen}
                                                <i style="color: gold;" class="fa fa-star"></i>
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
                            
                            {* Affichage des informations de l'hôtel *}
                            
                            
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
        {* Ajout des cellules du mois précédent *}
        {assign var=premier_jour value=$date_debut|date_format:"%w"}
        {for $i=0 to $premier_jour-1}
            <td class="empty">&nbsp;</td>
        {/for}
        
        {* Affichage des jours du mois *}
        {foreach from=1|range:$nombre_jours item=jour}
            {if ($premier_jour + $jour - 1) % 7 == 0 && $jour != 1}
                </tr><tr>
            {/if}
            <td class="day">
                {$jour}
                {assign var=reservation_affichee value=false}
                {foreach from=$reservations_uniques item=reservation}
                    {if $jour|in_array:$reservation.jours}
                        {if !$reservation_affichee}
                            <div class="reservation-info 
                                {if $jour == $reservation.jours|@reset}debut{/if}
                                {if $jour == $reservation.jours|@end}fin{/if}
                                {if $jour != $reservation.jours|@reset && $jour != $reservation.jours|@end}continuation{/if}">
                                {$reservation.LastName} {$reservation.FirstName} - Ch.{$reservation.Room}
                            </div>
                            {assign var=reservation_affichee value=true}
                        {/if}
                    {/if}
                {/foreach}
            </td>
        {/foreach}
        
        {* Compléter la dernière semaine *}
        {assign var=dernier_jour value=($premier_jour + $nombre_jours - 1) % 7}
        {if $dernier_jour < 6}
            {for $i=$dernier_jour+1 to 6}
                <td class="empty">&nbsp;</td>
            {/for}
        {/if}
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

