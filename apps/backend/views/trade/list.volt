{% extends "base.volt" %}
{% block title %}Товары{% endblock %}

{% block content %}
    <div class="col-md-10 col-md-offset-2 main">
        <a href="/haku/trade/new">Добавить покупку</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Дата Кашаута</th>
                <th>Hаименование</th>
                <th>Закупка</th>
                <th>Продажа</th>
                <th>Продажа free</th>
                <th>Продажа руб</th>
                <th>Доход руб</th>
                <th>Доход %</th>
            </tr>
            </thead>
            <tbody>

            {% for trade in entities %}
                <tr>
                    <td>{{ trade.CashoutInfo.op_date }}</td>
                    <td scope="row"><a href="/haku/trade/{{ trade.id }}">{{ trade.Skins.name }}</a></td>
                    <td>{{ trade.purchase }} руб</td>
                    <td>{{ trade.sale }} $</td>
                    <td>{{ trade.sale_free }} $</td>
                    <td>{{ trade.sale_rub }} руб</td>
                    <td>{{ trade.income }} руб</td>
                    <td>{{ trade.income_percent }} %</td>
                </tr>

            {% endfor %}
            </tbody>
        </table>
    </div>

{% endblock %}