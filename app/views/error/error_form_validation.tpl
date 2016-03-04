<div class="validation-errors">
    <ul class="">
        {% for error in validation_errors %}
            <li>{{ error }}</li>
        {% endfor %}
    </ul>
</div>