{% extends "base.volt" %}
{% block title %}Мои маршруты{% endblock %}
{% block content %}
    <div id="new-route-div">
        <div>От: <input type="text" id="route-from" value="Москва, Белорусский вокзал" /></div>
        <div>До: <input type="text" id="route-to" value="Москва, Лефортово" /></div>
        <div>
            <input type="submit" value="Построить маршрут" onclick="createRoute();" />
            <input type="submit" value="Сохранить маршрут" onclick="saveRoute();" />
        </div>
    </div>

    <div id="add-training-div">
        <div>Расстояние(метры): <input type="text" id="training-distance" value="" /></div>
        <div>
            <input type="submit" value="Добавить дистанцию" onclick="addTraining();" />
        </div>
    </div>
    <div id="map"></div>
{% endblock %}

{% block left_menu %}
    <div id="route-menu">
        <li><a href="#" onclick="newRoute();">Новый маршрут</a></li>
    {% for rout in routes %}
        <li id="li-route-{{ rout.id }}">
            <a onclick="loadRoute({{ rout.id }})" href="#?{{ rout.id }}">{{ rout.name|e }}</a>
            <a onclick="deleteRoute({{ rout.id }})" href="#?{{ rout.id }}">x</a>
        </li>
    {% endfor %}
    </div>
{% endblock %}
{% block js %}
    <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"> </script>

    <script>
        var map, mapRoute, mapLine, selectedRoute;

        ymaps.ready(function() {
            map = new ymaps.Map('map', {
                center: [55.76, 37.64],
                zoom: 12,
                controls: []
            });
            //map.controls.add('routeEditor');
        });


        /*


         Пусть A(x1, y1), B(x2,y2) - точки принадлежащие прямой. Требуется найти точку C(x3, y3) на прямой AB, такую что длина отрезка AC равна L. Я правильно понял?
         Обозначим D = √((x2-x1)2 + (y2-y1)2) - это длина отрезка отрезка AB
         Из подобия треугольников получаем
         (x3 -x1)/(x2-x1) = (y3 - y1)/ (y2-y1) = L / D
         x3 = x1 + L*(x2-x1) / D
         y3 = y1 + L*(y2-y1)/ D


         */

        function addTraining()
        {

            var distance = $("#training-distance").val();

            if (distance && selectedRoute){

                var posting = $.post( '/training/add?id='+selectedRoute+"&distance="+ distance);

                posting.done(function( data ) {

                    var result = jQuery.parseJSON(data);

                    if (result.status == 200) {
                        alert("Ok");
                        $("#training-distance").val('');
                    }
                });
            }
        }


        function deleteRoute(routeId){
            var posting = $.post( '/route/delete?id='+routeId );
            posting.done(function( data ) {

                var result = jQuery.parseJSON(data);

                if (result.status == 200) {
                    clearMap();
                    $("#li-route-"+routeId).remove();
                }


            });
        }

        function loadRoute(routeId){


            var posting = $.post( '/route?id='+routeId );

             // Put the results in a div
             posting.done(function( data ) {
                //var content = $( data ).find( "#content" );
                //$( "#result" ).empty().append( content );


                 var result = jQuery.parseJSON(data);

                 var coordinats = [];

                 jQuery.each( result.data.points, function( i, point ) {
                     coordinats.push([point.x,point.y])
                 });

                 var myPolyline = new ymaps.Polyline(
                 // Указываем координаты вершин ломаной.
                    coordinats
                    , {
                         // Описываем свойства геообъекта.
                        // Содержимое балуна.
                        balloonContent: "Ломаная линия"
                    }, {
                         // Задаем опции геообъекта.
                         // Отключаем кнопку закрытия балуна.
                         balloonCloseButton: false,
                         // Цвет линии.
                         strokeColor: "#000000",
                         // Ширина линии.
                         strokeWidth: 4,
                         // Коэффициент прозрачности.
                         strokeOpacity: 0.5
                 });


                 clearMap();

                 map.geoObjects.add(myPolyline);

                 map.setBounds(map.geoObjects.getBounds());


                 mapLine = myPolyline;

                 selectedRoute = routeId;


             });

            return false;

        }

        function createRoute() {
            // Удаление старого маршрута
            clearMap();

            var routeFrom = document.getElementById('route-from').value;
            var routeTo = document.getElementById('route-to').value;

            // Создание маршрута
            ymaps.route([routeFrom, routeTo], {mapStateAutoApply:true}).then(
                    function(route) {
                        map.geoObjects.add(route);
                        mapRoute = route;
                    },
                    function(error) {
                        alert('Невозможно построить маршрут');
                    }
            );



        }

        function clearMap(){

            if (mapRoute) {
                map.geoObjects.remove(mapRoute);
            }

            if (mapLine) {
                map.geoObjects.remove(mapLine);
            }
        }



        function newRoute() {

            clearMap();

            mapRoute = null;
            selectedRoute = null;


            //$('#route-from').val('');
            //$('#route-to').val('');
        }

        function saveRoute() {

            if (!mapRoute) {
                return ;
            }

            var routeName=prompt('Название маршрута','')

            if (routeName){

                var coordinats = [];

                mapRoute.getPaths().each(function(path) {
                    var segs = path.getSegments();

                    segs.forEach(function(segment) {
                        segment.getCoordinates().forEach(function(point){
                            coordinats.push(point);
                        });

                    });
                });

                var data = {
                        'name':routeName,
                        'coordinats':coordinats
                };

                var posting = $.post( '/route/save', JSON.stringify( data ) );

                // Put the results in a div
                posting.done(function( data ) {
                    var result = jQuery.parseJSON(data);
                    $("#route-menu").append('<li id="li-route-'+result.routeId+'"><a onclick="loadRoute('+result.routeId+')" href="#?'+result.routeId+'">'+result.routeName+'</a>&nbsp;<a onclick="deleteRoute('+result.routeId+')" href="#?'+result.routeId+'">x</a></li>');
                    loadRoute(result.routeId);
                });
            }
        }

    </script>

{% endblock %}
{% block style %}
    <style>
        #map {
            width: 100%;
            height: 600px;
        }
    </style>
{% endblock %}