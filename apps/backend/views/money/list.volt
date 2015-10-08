{% extends "base.volt" %}
{% block title %}Бабло{% endblock %}

{% block content %}
    <div class="col-md-10 col-md-offset-2 main">
        <a href="/haku/money/new">Добавить запись</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Сумма</th>
                <th>Остаток</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>

            {% for money in entities %}
                <tr>
                    <td>{{ money.opdate }}</td>
                    <td>{{ money.opsum }} руб</td>
                    <td>{{ money.money }} руб</td>
                    <td scope="row"><a href="/haku/money/{{ money.id }}">Edit</a></td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>

{% endblock %}