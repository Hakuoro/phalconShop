{% extends "base.volt" %}
{% block title %}Боты{% endblock %}

{% block content %}
    <div class="col-md-10 col-md-offset-2 main">
        Боты: {% for bot in bots %}<a href="/haku/bots/show/{{ bot.id_bot }}">{{ bot.id_bot }}</a> {% endfor %}
    </div>
{% endblock %}