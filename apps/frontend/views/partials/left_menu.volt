<ul class="nav nav-sidebar">
    {% for url,title in config.left_menu %}
        <li {% if strurl is currentPage %}class="active"{% endif %}><a href="{{ url }}">{{ title }}{% if url is currentPage %}<span class="sr-only">(current)</span>{% endif %}</a></li>
    {% endfor %}
</ul>