<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>{% block title %}{% endblock %} - Pars Pack</title>
    <meta name="description" content="Pars Pack Domain Service">
    <meta name="author" content="Hossein Bahrami Neko">
    <link href="/hosttracker/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="{{ base_url }}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ base_url }}css/custom.css">
    <script src="{{ base_url }}js/jquery-1.11.2.min.js"></script>
    <script>
        var BASE_URL = "{{ base_url }}";
    </script>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="page-header-1" style='z-index: 2048'>
        <div class="">
            <div class="">
                <a class="brand" href="http://parspack.com/">
                    <img class='Logo' alt='' src='{{ base_url }}images/summit.png' width="150" height="70" />
                </a>
            </div>
        </div>
        <!-- search form -->
        <div class="col-sm-3 col-md-3 pull-left header-search">
            <form class="navbar-form" role="search" action="{{ base_url }}index/search" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="url" id="srch-term">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="text-right home-buttons">
        <a title="Admin" href="{{ base_url }}admin" class="glyphicon glyphicon-dashboard btn btn-default" id='login-btn'></a>
        <a title="Home" href="{{ base_url }}" class="glyphicon glyphicon-home btn btn-default" id='login-btn'></a>
    </div>
    {% block content %}{% endblock %}
    <div class="search_form_error"></div>
</div>

<script src="{{ base_url }}js/json2.js"></script>
<script src="{{ base_url }}js/underscore-min.js"></script>
<script src="{{ base_url }}js/backbone-min.js"></script>
<script src="{{ base_url }}js/bootstrap.min.js"></script>
<script src="{{ base_url }}js/custom.js"></script>
<div class="push"></div>
</div> <!-- container DIV in the header section -->
<div class="footer">
    <p>Copyright (c) 2016</p>
</div>
</body>
</html>