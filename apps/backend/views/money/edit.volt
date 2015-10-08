{% extends "base.volt" %}
{% block title %}Выплата от {{ entity.op_date |e }}{% endblock %}

{% block content %}

    <div class="col-md-6 col-md-offset-2 main" style="float: left;">
        <form class="form-horizontal" method="post" >

            {{ form.render('id') }}

            <div class="form-group">
                <label for="inputTitle" class=" col-md-2 control-label">Дата запроса</label>
                <div class="col-md-8">
                    {{ form.render('opdate', ['class':"form-control", 'id':'inputCashout']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputTitle" class=" col-md-2 control-label">Сумма</label>
                <div class="col-md-8">
                    {{ form.render('opsum', ['class':"form-control", 'id':'inputCashout']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="inputSkin" class="col-md-2 control-label">Остаток</label>
                <div class="col-md-8">
                    {{ form.render('money', ['class':"form-control", 'id':'inputSkin']) }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-default">Сохранить</button>
                </div>
            </div>
        </form>
    </div>

{% endblock %}