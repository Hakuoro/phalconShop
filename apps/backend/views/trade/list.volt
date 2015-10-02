{% extends "base.volt" %}
{% block title %}Продажи{% endblock %}

{% block content %}
    <div class="col-md-10 col-md-offset-2 main">
        <div><a href="/haku/trade/new">Добавить продажу</a> |
            <a href="/haku/trade">Активные выплаты</a> |
            <a href="/haku/trade/list/cash/closed">Закрытые выплаты</a> |
            <a href="/haku/trade/list/cash/all">Все выплаты</a>
        </div>
        <!--div ><a href="/haku/trade/new">Добавить продажу</a> | <a href="/haku/trade/new">Добавить продажу</a></div-->
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Дата Кашаута</th>
                <th>Link</th>
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
                    <td scope="row"><a target="_blank" href="https://opskins.com/index.php?loc=shop_search&search_item={{ trade.Skins.name }}&min=&max=&inline=&grade=&inline=&type=&inline=&sort=lh">opskins</a>
                    <a target="_blank" href="https://csgo.tm/?s=price&search={{ trade.Skins.name }}">csgo</a></td>
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