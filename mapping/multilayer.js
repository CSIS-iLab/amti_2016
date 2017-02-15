function getURLParameter(name) {
    return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [, ""])[1].replace(/\+/g, '%20')) || null
}

var user = getURLParameter('u');
var table = getURLParameter('t');
var uuid = getURLParameter('v');
var title = getURLParameter('tt');
var description = getURLParameter('d');
var baseVizJsonUrl = "https://" + user + ".cartodb.com/api/v2/viz/" + uuid + "/viz.json";

var multilayer = angular.module('multilayer', []);
multilayer.controller('SelectorCtrl', function ($scope) {
    var cartodbLayers = [];

    function addLayer(id, show) {
        return function (layer) {
            if (!show) {
                layer.hide();
            }
            cartodbLayers[id] = layer;
        };
    }

    $scope.title = title;
    $scope.description = description;

    $scope.selectedLayers = [];

    $scope.layersUpdated = function (id) {
        var layer = cartodbLayers[id];
        if ($scope.selectedLayers[id]) {
            layer.show();
        } else {
            layer.hide();
        }
    };

    cartodb.createVis('map', baseVizJsonUrl, {
        zoom: 4,
        center_lat: 16.3144685,
        center_lon: 110.581688,
        loaderControl: false,
        cartodb_logo: false,
        search: false,
        scrollwheel: true,
        legends: true,
        zoomControl: true
    }).done(function (vis) {

        var map = vis.getNativeMap();

        vis.map.set({
            minZoom: 4,
            maxZoom: 12
          });

        var sql = new cartodb.SQL({user: user});
        sql.execute("SELECT name, show, viz_json as vizjson, sql, cartocss, interactivity, sql_user FROM " + table + " WHERE name IS NOT NULL")
            .done(function (data) {
                $scope.layers = data.rows;
                for (var id = 0; id < $scope.layers.length; ++id) {
                    var layerOptions;

                    layer = $scope.layers[id];
                    layer.id = id;
                    $scope.selectedLayers[id] = layer.show ? true : false;
                    if (layer.vizjson) {
                        layerOptions = layer.vizjson;
                    } else {
                        layerOptions = {
                            user_name: layer.sql_user ? layer.sql_user : user,
                            type: "cartodb",
                            sublayers: [{
                                sql: layer.sql,
                                cartocss: layer.cartocss,
                                interactivity: layer.interactivity
                            }],
                            params: {
                                id: id
                            }
                        };
                    }
                    cartodb.createLayer(map, layerOptions)
                        .addTo(map)
                        .done(addLayer(id, layer.show))
                        .error(function (error) {
                            console.log("error: " + error);
                        });
                }
                $scope.$apply();
            })
            .error(function (errors) {
                console.log("errors: " + errors);
            });
    });
});
