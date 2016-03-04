{% extends "layouts/main.tpl" %}
{% block title %}Login Form{% endblock %}
{% block content %}
<br/>
{% if validation_errors is defined %}
{% for message in validation_errors %}
<p class="alert alert-danger">{{ message|escape }}<a href="#" class="close" data-dismiss="alert"
                                                     aria-label="close">&times;</a></p>
{% endfor %}
{% endif %}

<form method="post" action="{{ base_url }}admin/login" id="login-form" role="form">
    <div class="form-group">
        <label>Email:</label>

        <div class="input-group">
            <input class="form-control" type="email" name="email" required="required"/>
            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        </div>
    </div>
    <div class="form-group">
        <label>Password:</label>

        <div class="input-group">
            <input class="form-control" type="password" name="password" required="required"/>
            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        </div>
    </div>

    <div class="form-group">
        <label>Remember me?:</label>
        <input type="checkbox" name="auto" value="1"/>
    </div>

    <input type="submit" value="login" class="btn btn-info"/>
    <hr/>
    OR&nbsp;&nbsp;&nbsp; <a href="{{ base_url }}admin/register_form">Register</a>
</form>

{% endblock %}