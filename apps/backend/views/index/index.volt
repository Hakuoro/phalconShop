{% extends "base.volt" %}
{% block title %}Dashboard{% endblock %}

{% block content %}
    <div class="col-md-10 col-md-offset-2 main">
        Продается сейчас на опскине
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Предмет</th>
                <th>Количество на бирже</th>
                <th>Количество на боте</th>
            </tr>
            </thead>
            <tbody>
            {% for name,item in results %}
                <tr>
                    <td>{{ name }}</td>
                    <td>{{ item['opcount']}}</td>
                    <td>{{ item['count'] }}</td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
{% endblock %}