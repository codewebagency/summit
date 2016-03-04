{% extends "layouts/main.tpl" %}
{% block title %}Home{% endblock %}
{% block content %}
<br/>
{% if ((message is defined) and (message is not empty)) %}
<p class="alert alert-warning">{{ message }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
{% endif %}
<p class="welcome-message">welcome !</p>
<p class="welcome-message">Summit , sophisticated and well designed framework .</p>
{% endblock %}






