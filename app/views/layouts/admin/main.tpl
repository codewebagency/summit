<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>{% block title %}Admin{% endblock %} - Pars Pack</title>
    <meta name="description" content="Pars Pack Domain Service">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Hossein Bahrami Neko">
    <script>
        var BASE_URL = "{{ base_url }}";
    </script>
    <link href="{{ base_url }}images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="{{ base_url }}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ base_url }}css/custom-admin.css">
    <link rel="stylesheet" href="{{ base_url }}css/simple-sidebar.css">

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
                    <img class='Logo' alt='' src='{{ base_url }}images/logo.gif' />
                </a>
            </div>
        </div>
    </div>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <br />
                <br />
                <br />
                <br />
                <li class="sidebar-brand">
                        Admin Menu
                </li>
                <li>
                    <a href="{{ base_url }}admin">Dashboard</a>
                </li>
                <li>
                    <a href="{{ base_url }}server">Server</a>
                </li>
                <li>
                    <a href="{{ base_url }}admin/logout">Logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <br />
                        <br />
                        <br />
                        <h1>Dashboard</h1>
                        {% block content %}{% endblock %}
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
</div>

<script src="{{ base_url }}js/jquery-1.11.2.min.js"></script>
<script src="{{ base_url }}js/json2.js"></script>
<script src="{{ base_url }}js/underscore-min.js"></script>
<script src="{{ base_url }}js/backbone-min.js"></script>
<script src="{{ base_url }}js/bootstrap.min.js"></script>
<script src="{{ base_url }}js/custom.js"></script>
<script src="{{ base_url }}js/custom-admin.js"></script>
<div class="push"></div>
</div> <!-- container DIV in the header section -->
<div class="footer text-right">
    <p>Copyright (c) 2016</p>
</div>
</body>
</html>