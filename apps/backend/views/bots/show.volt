{% extends "base.volt" %}
{% block title %}Боты{% endblock %}

{% block content %}
    <div class="col-md-10 col-md-offset-2 main">
        Боты: {% for bot in bots %}<a href="/haku/bots/show/{{ bot.id_bot }}">{{ bot.id_bot }}</a> {% endfor %}
    </div>
    <div class="col-md-10 col-md-offset-2 main">
        Бот: {{ showBot.id_bot }}
        <form action="/haku/bots/save/{{ showBot.id_bot }}" method="post">
        <input type="hidden" name="id_bot" value="{{ showBot.id_bot }}"><br/><br/>
        Отдавать предметы: <input type="checkbox" name="give" value="on" {% if (botConfig.give) %} checked {% endif %}><br/><br/>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Предмет</th>
                <th>Цена</th>
                <th>Включена торговля</th>
            </tr>
            </thead>
            <tbody>

            {% for index, item in botConfig.tradeConfig %}
                <tr>
                    <td>{{ item.name }}</td>
                    <td><input type="text" size="4" name="price[{{ index }}]" value="{{ item.price }}"></td>
                    <td><input type="checkbox" name="trading[{{ index }}]" value="on" {% if (item.trading) %} checked {% endif %}></td>
                </tr>

            {% endfor %}
            </tbody>
        </table>
            <input type="submit" name="Save" value="Save">
        </form>
    </div>
{% endblock %}