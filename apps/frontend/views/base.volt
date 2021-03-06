<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{% block title %}{% endblock %}</title>
    {% block meta %}{% endblock %}
    {% block js %}{% endblock %}
    {% block style %}{% endblock %}
    {{ assets.outputCss() }}

</head>
<body>
{% block top_menu %}{% include "partials/top_menu.volt" %}{% endblock %}
<div class="container-fluid">
    <div class="row">
        <div class=" col-md-2 sidebar">
            {% block left_menu %}{% include "partials/left_menu.volt" %}{% endblock %}
        </div>
        <div class="col-md-10 col-md-offset-2 main">
        {% block content %}{% endblock %}
        </div>
    </div>
</div>
{{ assets.outputJs() }}
</body>
</html>