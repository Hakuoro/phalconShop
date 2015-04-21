{% extends "base.volt" %}
{% block title %}{{ entity.title |e }}{% endblock %}

{% block content %}
    <div class="col-sm-6 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <form class="form-horizontal" method="post" >

            {{ form.render('id') }}

            <div class="form-group">
                <label for="inputTitle" class="col-sm-1 control-label">Наименование</label>
                <div class="col-sm-6">
                    {{ form.render('title', ['class':"form-control", 'id':'inputTitle']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="inputDesc" class="col-sm-1 control-label">Описание</label>
                <div class="col-sm-6">
                    {{ form.render('description', ['class':"form-control", 'id':'inputDesc', 'rows':'5']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="inputPrice" class="col-sm-1 control-label">Цена</label>
                <div class="col-sm-6">
                    {{ form.render('price', ['class':"form-control", 'id':'inputPrice']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputUrl" class="col-sm-1 control-label">SEO Url</label>
                <div class="col-sm-6">
                    {{ form.render('url', ['class':"form-control", 'id':'inputUrl']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputStatus" class="col-sm-1 control-label">Статус</label>
                <div class="col-sm-6">
                    {{ form.render('status', ['class':"form-control", 'id':'inputStatus']) }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-6">
                    <button type="submit" class="btn btn-default">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
{% endblock %}