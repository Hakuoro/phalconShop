{% extends "base.volt" %}
{% block title %}Выплаты{% endblock %}

{% block content %}
    <div class="col-md-10 col-md-offset-2 main">
        <a href="/haku/trade/new">Добавить выплату</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>OP send</th>
                <th>OP send clear</th>
                <th>Расход руб</th>
                <th>Приход руб</th>
                <th>Курс</th>
                <th>Доход руб</th>
                <th>Доход %</th>
                <th>Дата кешаута</th>
                <th>Дата пайпала</th>
                <th>Дата банка</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>

            {% for cashout in entities %}
                <tr>
                    <td>{{ cashout.op_send }} $</td>
                    <td>{{ cashout.op_sum }} $</td>
                    <td>{{ cashout.cost }} руб</td>
                    <td>{{ cashout.pal_sum }} руб</td>
                    <td>{{ cashout.rate }}</td>
                    <td>{{ cashout.pal_sum - cashout.cost }} </td>
                    {% set ret12 = (cashout.pal_sum - cashout.cost)/cashout.cost*100 %}
                    <td>{{ ret12|fund_round }} %</td>
                    <td>{{ cashout.op_date }}</td>
                    <td>{{ cashout.pal_date }}</td>
                    <td>{{ cashout.bank_date }}</td>
                    <td scope="row"><a href="/haku/cashout/{{ cashout.id }}">Редактировать</a></td>
                </tr>

            {% endfor %}
            </tbody>
        </table>
    </div>

{% endblock %}