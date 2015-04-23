{% extends "base.volt" %}
{% block title %}{{ entity.title |e }}{% endblock %}

{% block content %}

    <div class="col-md-6 col-md-offset-2 main">
        <form class="form-horizontal" method="post" >

            {{ form.render('id') }}

            <div class="form-group">
                <label for="inputTitle" class=" col-md-2" style="text-align: right;">Теги</label>
                <div class="col-md-10">
                    <select id="select6" name="tags[]" multiple style="width: 100%; height: 40px;">
                        {% for tag in tags %}
                            <option  value="{{ tag['id'] }}" {% if tag['selected'] %}selected="selected"{% endif %} >{{ tag['name'] |e }}</option>
                        {% endfor %}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputTitle" class=" col-md-2 control-label">Наименование</label>
                <div class="col-md-10">
                    {{ form.render('title', ['class':"form-control", 'id':'inputTitle']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="inputDesc" class="col-md-2 control-label">Описание</label>
                <div class="col-md-10">
                    {{ form.render('description', ['class':"form-control", 'id':'inputDesc', 'rows':'5']) }}
                </div>
            </div>
            <div class="form-group">
                <label for="inputPrice" class="col-md-2 control-label">Цена</label>
                <div class="col-md-10">
                    {{ form.render('price', ['class':"form-control", 'id':'inputPrice']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputUrl" class="col-md-2 control-label">SEO Url</label>
                <div class="col-md-10">
                    {{ form.render('url', ['class':"form-control", 'id':'inputUrl']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputStatus" class=" col-md-2 control-label">Статус</label>
                <div class="col-md-10">
                    {{ form.render('status', ['class':"form-control", 'id':'inputStatus']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputMeta1" class=" col-md-2 control-label">Мета титул</label>
                <div class="col-md-10">
                    {{ form.render('meta_title', ['class':"form-control", 'id':'inputMeta1']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputMeta2" class=" col-md-2 control-label">Мета слова</label>
                <div class="col-md-10">
                    {{ form.render('meta_keyword', ['class':"form-control", 'id':'inputMeta2']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="inputMeta3" class=" col-md-2 control-label">Мета описание</label>
                <div class="col-md-10">
                    {{ form.render('meta_description', ['class':"form-control", 'id':'inputMeta3', 'rows':'5']) }}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-default">Сохранить</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-4 col-md-offset-8 main">
        <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
        <br>
        <br>
        <!-- The global progress bar -->
        <div id="progress" class="progress">
            <div class="progress-bar progress-bar-success"></div>
        </div>
        <!-- The container for the uploaded files -->
        <div id="files" class="files"></div>

    </div>
{% endblock %}