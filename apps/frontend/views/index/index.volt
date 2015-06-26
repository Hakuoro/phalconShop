{% extends "base.volt" %}
{% block title %}Мои маршруты{% endblock %}
{% block js %}
    <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"> </script>

    <script>
        var map, mapRoute;

        ymaps.ready(function() {
            map = new ymaps.Map('map', {
                center: [55.76, 37.64],
                zoom: 12,
                controls: []
            });
            map.controls.add('routeEditor');
        });


        /*


         Пусть A(x1, y1), B(x2,y2) - точки принадлежащие прямой. Требуется найти точку C(x3, y3) на прямой AB, такую что длина отрезка AC равна L. Я правильно понял?
         Обозначим D = √((x2-x1)2 + (y2-y1)2) - это длина отрезка отрезка AB
         Из подобия треугольников получаем
         (x3 -x1)/(x2-x1) = (y3 - y1)/ (y2-y1) = L / D
         x3 = x1 + L*(x2-x1) / D
         y3 = y1 + L*(y2-y1)/ D


         */


        function createRoute() {
            // Удаление старого маршрута
            if (mapRoute) {
                map.geoObjects.remove(mapRoute);
            }

            var routeFrom = document.getElementById('route-from').value;
            var routeTo = document.getElementById('route-to').value;

            // Создание маршрута
            ymaps.route([routeFrom, routeTo], {mapStateAutoApply:true}).then(
                    function(route) {

                        var coordinats = [];

                        route.getPaths().each(function(path) {
                            var segs = path.getSegments();

                            segs.forEach(function(segment) {
                                segment.getCoordinates().forEach(function(point){
                                    console.log(point);
                                    coordinats.push(point)
                                });

                            });

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


                        //map.geoObjects.add(route);
                        map.geoObjects
                                .add(myPolyline);
                        //document.getElementById('route-length').innerHTML = 'Длина маршрута = ' + route.getHumanLength();
                        mapRoute = route;
                    },
                    function(error) {
                        alert('Невозможно построить маршрут');
                    }
            );
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

{% block content %}
    <div>От: <input type="text" id="route-from" value="Москва, Белорусский вокзал" /></div>
    <div>До: <input type="text" id="route-to" value="Москва, Лефортово" /></div>
    <div><input type="submit" value="Построить маршрут" onclick="createRoute();" /></div>
    <div id="map"></div>
{% endblock %}
