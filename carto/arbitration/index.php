<?php

$lang = $_GET['t'];

switch($lang) {
    // English
    case 'arbitrationctrl':
        include('lang/en.php');
        $title = "{{content.data.name}}";
        break;
    // Simplified Chinese
    case 'arbitration_zh_hans':
        include('lang/zh-hans.php');
        $title = "{{content.data.name_china}}";
        break;
    // Traditional Chinese
    case 'arbitration_zh_hant':
        include('lang/zh-hant.php');
        $title = "{{content.data.name_china}}";
        break;
    // Vietnamese
    case 'arbitration_vi':
        include('lang/vi.php');
        $title = "{{content.data.name_vietnam}}";
        break;
    // Malay
    case 'arbitration_ms':
        include('lang/ms.php');
        $title = "{{content.data.name_malaysia}}";
        break;
    default:
        include('lang/en.php');
        $title = "{{content.data.name}}";
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

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-55717458-1', 'auto');
          ga('send', 'pageview');

        </script>

</head>

    <body>

        <div id="map"></div>

        <script type="infowindow/php" id="infowindow_template">
          <div class="cartodb-popup header blue v2" style="width: 226px;">
              <a href="#close" class="cartodb-popup-close-button close">x</a>
              <div class="cartodb-popup-header">
                      <h1><?php echo $title; ?></h1>
                    <span class="separator"></span>
              </div>
              <div class="cartodb-popup-content-wrapper">
                <div class="cartodb-popup-content">
                      <h4><?php echo $text['dateOfOccupation']; ?></h4>
                      <p><?php echo $title; ?></p>
                      <h4><?php echo $text['name']; ?></h4>
                      <p>{{content.data.name}}</p>
                      <h4><?php echo $text['nameChina']; ?></h4>
                      <p>{{content.data.name_china}}</p>
                      <h4><?php echo $text['nameTaiwan']; ?></h4>
                      <p>{{content.data.name_taiwan}}</p>
                      <h4><?php echo $text['namePhilippines']; ?></h4>
                      <p>{{content.data.name_philippines}}</p>
                      <h4><?php echo $text['nameVietnam']; ?></h4>
                      <p>{{content.data.name_vietnam}}</p>
                      <h4><?php echo $text['nameMalaysia']; ?></h4>
                      <p>{{content.data.name_malaysia}}</p>
              </div>
              <div class="cartodb-popup-tip-container">
              </div>
            </div>
        </script>
        
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

        <!-- Map Legend -->
        <div id="legend-toggle">
            <div class='cartodb-legend custom'>
                <div class="legend-title"><?php echo $text['legendTitle']; ?></div>
                <ul>
                    <li>
                        <div class="bullet" style="background:#229a00"></div>
                        <?php echo $text['rocks']; ?>
                    </li>
                    <li>
                        <div class="bullet" style="background:#6b0fb2"></div>
                        <?php echo $text['lowTide']; ?>
                    </li>
                    <li>
                        <div class="bullet" style="background:#f7941e"></div>
                        <?php echo $text['continentalShelf']; ?>
                    </li>
                    <li>
                        <div class="bullet" style="background:#27aae1"></div>
                        <?php echo $text['territorialSeas']; ?>
                    </li>
                    <li>
                        <div class="bullet" style="background:#f11810"></div>
                        <?php echo $text['nineDashLine']; ?>
                    </li>
                </ul>
                <br />
            </div>
        </div>

        <button id="keyctrl"><?php echo $text['toggleKey']; ?> <i class="fa fa-sort-desc"></i></button>
        <div class="copyright_bug">

            <p>&copy; 2016 <a href="https://www.csis.org" target="_blank">CSIS</a> | <a href="https://amti.csis.org" target="_blank">AMTI</a></p>

        </div>

        <script src="https://cartodb-libs.global.ssl.fastly.net/cartodb.js/v3/3.15/cartodb.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.js"></script>
        <script src="features_multilayer.js"></script>

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