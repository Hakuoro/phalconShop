<h1>Товары</h1>
<ul>
    {% for product in products %}
        <li>{{ product.title|e }}</li>
    {% endfor %}
</ul>