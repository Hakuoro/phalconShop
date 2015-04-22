{% extends "base.volt" %}
{% block title %}Товары{% endblock %}

{% block content %}
    <div class="col-md-10 col-md-offset-2 main">
        <a href="/haku/product/new">Добавить товар</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Название</th>
                <th>Теги</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>

            {% for product in entities %}
                <tr>
                    <th scope="row"><a href="/haku/product/{{ product.id }}">{{ product.title|e }}</a></th>
                    <td>{% for tagItem in product.tag %}<a href="/haku/tag/{{ tagItem.id }}">{{ tagItem.name |e }}</a> {% if !loop.last %}, {% endif %} {% endfor %}</td>
                    <td><a href="/haku/product/delete/{{ product.id }}" onclick="return confirm('are u shure?') ? true : false;">Удалить</a></td>
                </tr>

            {% endfor %}
            </tbody>
        </table>
    </div>

{% endblock %}