{% extends "base.volt" %}
{% block title %}Выплата от {{ entity.op_date |e }}{% endblock %}

{% block content %}

    <div class="col-md-6 col-md-offset-2 main" style="float: left;">
        <form class="form-horizontal" method="post" >

            {{ form.render('id') }}

            <div class="form-group">
                <label for="inputTitle" class=" col-md-2 control-label">Дата запроса</label>
                <div class="col-md-8">
                    {{ form.render('op_date', ['class':"form-control", 'id':'inputCashout']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputTitle" class=" col-md-2 control-label">Остаток</label>
                <div class="col-md-8">
                    {{ form.render('rest', ['class':"form-control", 'id':'inputCashout']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="inputSkin" class="col-md-2 control-label">OP грязные</label>
                <div class="col-md-8">
                    {{ form.render('op_send', ['class':"form-control", 'id':'inputSkin']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="inputpurchase" class="col-md-2 control-label">OP чистые</label>
                <div class="col-md-8">
                    {{ form.render('op_sum', ['class':"form-control", 'id':'inputpurchase']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputsale" class="col-md-2 control-label">Расход</label>
                <div class="col-md-8">
                    {{ form.render('cost', ['class':"form-control", 'id':'inputsale']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputsale" class="col-md-2 control-label">Приход</label>
                <div class="col-md-8">
                    {{ form.render('pal_sum', ['class':"form-control", 'id':'inputsale']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputsale" class="col-md-2"  style="text-align: right;">Курс Paypal</label>
                <div class="col-md-8"  style="text-align: left;">
                    {{ entity.rate }}  $
                </div>
            </div>

            <div class="form-group">
                <label for="inputsale" class="col-md-2 control-label">Дата Paypal</label>
                <div class="col-md-8">
                    {{ form.render('pal_date', ['class':"form-control", 'id':'inputsale']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputsale" class="col-md-2 control-label">Дата Банк</label>
                <div class="col-md-8">
                    {{ form.render('bank_date', ['class':"form-control", 'id':'inputsale']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputsale" class="col-md-2"  style="text-align: right;">Прибыль</label>
                <div class="col-md-8"  style="text-align: left;">
                    {{ entity.pal_sum - entity.cost }}
                </div>
            </div>

            <div class="form-group">
                <label  class="col-md-2 " style="text-align: right;">Прибыль %</label>
                <div class="col-md-8" style="text-align: left;">
                    {% set ret12 = (entity.pal_sum - entity.cost)/entity.cost*100 %}
                    {{ ret12|fund_round }}
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