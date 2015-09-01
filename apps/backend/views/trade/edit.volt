{% extends "base.volt" %}
{% block title %}{{ entity.Skins.name |e }}{% endblock %}

{% block content %}

    <div class="col-md-6 col-md-offset-2 main" style="float: left;">
        <form class="form-horizontal" method="post" >

            {{ form.render('id') }}


            <div class="form-group">
                <label for="inputTitle" class=" col-md-2 control-label">Cashout</label>
                <div class="col-md-8">
                    {{ form.render('id_cashout', ['class':"form-control", 'id':'inputCashout']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="inputSkin" class="col-md-2 control-label">id_skin</label>
                <div class="col-md-8">
                    {{ form.render('id_skin', ['class':"form-control", 'id':'inputSkin']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="inputpurchase" class="col-md-2 control-label">purchase</label>
                <div class="col-md-8">
                    {{ form.render('purchase', ['class':"form-control", 'id':'inputpurchase']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputsale" class="col-md-2 control-label">sale</label>
                <div class="col-md-8">
                    {{ form.render('sale', ['class':"form-control", 'id':'inputsale']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputsale" class="col-md-2"  style="text-align: right;">sale tax free</label>
                <div class="col-md-8"  style="text-align: left;">
                    {{ entity.sale_free }}  $
                </div>
            </div>

            <div class="form-group">
                <label  class="col-md-2 " style="text-align: right;">sale руб</label>
                <div class="col-md-8" style="text-align: left;">
                    {{ entity.sale_rub }}  руб
                </div>
            </div>

            <div class="form-group">
                <label  class="col-md-2 " style="text-align: right;">income</label>
                <div class="col-md-8" style="text-align: left;">
                    {{ entity.income }} руб
                </div>
            </div>

            <div class="form-group">
                <label  class="col-md-2 " style="text-align: right;">income_percent</label>
                <div class="col-md-8" style="text-align: left;">
                    {{ entity.income_percent }} %
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