{% extends "base.volt" %}
{% block title %}{{ entity.title |e }}{% endblock %}

{% block content %}
    <div class="row">
        <div class="form-group">
            <label for="inputTitle" class=" col-md-2 control-label">Теги</label>
            <div class="col-md-4">
                {% for tagItem in entity.tag %}<a href="/haku/tag/{{ tagItem.id }}">{{ tagItem.name |e }}</a> {% if !loop.last %}<br/>{% endif %} {% endfor %}
                    <a>Добавить</a>
            </div>
        </div>
    </div>
    <div class="row">

        <form class="form-horizontal" method="post" >

            {{ form.render('id') }}

            <div class="form-group">
                <label for="inputTitle" class=" col-md-2 control-label">Наименование</label>
                <div class="col-md-4">
                    {{ form.render('title', ['class':"form-control", 'id':'inputTitle']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="inputDesc" class="col-md-2 control-label">Описание</label>
                <div class="col-md-4">
                    {{ form.render('description', ['class':"form-control", 'id':'inputDesc', 'rows':'5']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="inputPrice" class="col-md-2 control-label">Цена</label>
                <div class="col-md-4">
                    {{ form.render('price', ['class':"form-control", 'id':'inputPrice']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputUrl" class="col-md-2 control-label">SEO Url</label>
                <div class="col-md-4">
                    {{ form.render('url', ['class':"form-control", 'id':'inputUrl']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputStatus" class=" col-md-2 control-label">Статус</label>
                <div class="col-md-4">
                    {{ form.render('status', ['class':"form-control", 'id':'inputStatus']) }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-4">
                    <button type="submit" class="btn btn-default">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
{% endblock %}