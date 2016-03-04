{% extends "layouts/main.tpl" %}
{% block title %}Login Form{% endblock %}
{% block content %}
<br />
<form action="?url=index/login" method="post">
    <div>
        <input type="text" placeholder="username" />
    </div>
    <div>
        <input type="text" placeholder="password" />
    </div>
    <input type="submit" />
</form>
{% endblock %}