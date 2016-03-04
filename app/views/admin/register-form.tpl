{% extends "layouts/main.tpl" %}
{% block title %}Register Form{% endblock %}
{% block content %}
<form action="{{ base_url }}admin/do_register" id="register-form" method="post">
    <p>Register</p>
    <hr/>
    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong>
    </div>
    <div class="form-group">
        <label for="InputName">Enter Username : </label>

        <div class="input-group">
            <input type="text" class="form-control" name="Username" id="regfister-form-email"
                   placeholder="Enter Username"
                   required>
            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        </div>
    </div>
    <div class="form-group">
        <label for="InputEmail">Enter Password : </label>

        <div class="input-group">
            <input type="password" class="form-control" id="register-form-password" name="Password"
                   placeholder="Enter Password" required>
            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        </div>
    </div>
    <div class="form-group">
        <label for="InputEmail">Confirm Password :</label>

        <div class="input-group">
            <input type="password" class="form-control" id="register-form-password" name="Password2"
                   placeholder="Confirm Password" required>
            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        </div>
    </div>
    <div class="form-group">
        <label>Email: </label>
        <div class="input-group">
        <input type="email" name="email" class="form-control" required="required" />
        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
            </div>
    </div>
    <div class="form-group">
        <label>Group: </label>
        <select name="groupID" class="form-control">
            <option value="1">Administrator</option>
            <option value="2">User</option>
        </select>
    </div>
    <div class="form-group" style="text-align: center;">
        <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">
    </div>
    <p>OR <a href="{{ base_url }}admin/login">Login</a></p>
</form>
<div class="errorHolder"></div>
{% endblock %}