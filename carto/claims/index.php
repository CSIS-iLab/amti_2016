<?php

$lang = $_GET['t'];

switch($lang) {
    // English
    case 'multilayer_claims_copy':
        include('lang/en.php');
        break;
    // Simplified Chinese
    case 'claims_hans':
        include('lang/zh-hans.php');
        break;
    // Traditional Chinese
    case 'claims_hant':
        include('lang/zh-hant.php');
        break;
    // Vietnamese
    case 'claims_vi':
        include('lang/vi.php');
        break;
    // Malay
    case 'claims_ms':
        include('lang/ms.php');
        break;
    default:
        include('lang/en.php');
}
?>

<!DOCTYPE html>
<html lang="en" ng-app="multilayer">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
        <title><?php echo $text['title']; ?></title>
        <link rel="stylesheet" href="https://cartodb-libs.global.ssl.fastly.net/cartodb.js/v3/3.15/themes/css/cartodb.css" />
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
        <script src="https://use.fontawesome.com/fefaea6f90.js"></script>
        <link rel="stylesheet" href="reset.css" />
        <link rel="stylesheet" href="app-style.css" />

        <style>
button {
  position: absolute;
}
        </style>

</head>

    <body>

        <div id="map"></div>
        <div id="selector" ng-controller="SelectorCtrl" ng-cloak class="ng-cloak">
            <div class="header">
                <h1><?php echo $text['title']; ?></h1>
                <h2><?php echo $text['description']; ?></h2>

                <button id="menuctrl"><?php echo $text['toggleMenu']; ?> <i class="fa fa-toggle-on"></i></button>

            </div>
            <ul id="toggle_list">
                <li ng-repeat="layer in layers">
                    <table>
                        <tr>
                            <td><input type="checkbox" ng-model="selectedLayers[layer.id]" ng-change="layersUpdated(layer.id)" name="layer.id" /></td>
                            <td><label>{{ layer.name }}</label></td>
                        </tr>
                    </table>
                </li>
            </ul>
        </div>
        <div id="legend-toggle">
            <div class='cartodb-legend custom'>
                <div class="legend-title"><?php echo $text['legendTitle']; ?></div>

                <ul>
                    <li>
                        <div class="bullet" style="background: #8DC63F"></div> <?php echo $text['territorialBaseline']; ?>
                    </li>
                    <li>
                        <div class="bullet" style="background: #27AAE1"></div> <?php echo $text['territorialSeas']; ?>
                    </li>
                    <li>
                        <div class="bullet" style="background: #FEE91D"></div> <?php echo $text['eez']; ?>
                    </li>
                    <li>
                        <div class="bullet" style="background: #F7941E"></div> <?php echo $text['continentalShelf']; ?>
                    </li>
                </ul>
                <br />
                <div class="legend-title"><?php echo $text['specialClaims']; ?></div>
                <ul>
                    <li>
                        <div class="bullet" style="background: #F11810"></div> <?php echo $text['nineDashLine']; ?>

                    </li>
                </ul>
                <br /><br />
            </div>
        </div>


        <button id="keyctrl"><?php echo $text['toggleKey']; ?> &nbsp;<i class="fa fa-sort-desc"></i></button>
        <div class="copyright_bug">

<p>&copy; 2016 <a href="https://www.csis.org" target="_blank">CSIS</a> | <a href="https://amti.csis.org" target="_blank">AMTI</a></p>

        </div>

        <script src="https://cartodb-libs.global.ssl.fastly.net/cartodb.js/v3/3.15/cartodb.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.js"></script>
        <script src="multilayer.js"></script>

        <script>
        $(document).ready(function(){
            $("button#menuctrl").click(function(){
              $('ul#toggle_list').slideToggle(500);
              $(this).find('i').toggleClass('fa fa-toggle-on fa fa-toggle-off')
            });
            $("button#keyctrl").click(function(){
              $(".cartodb-legend").slideToggle(500);
              $(this).find('i').toggleClass('fa fa-sort-desc fa fa-sort-asc')
            });
        });
        </script>
    </body>
</html>