{% extends "layouts/main.tpl" %}
{% block title %}Report{% endblock %}
{% block content %}
<p style="margin-top: 50px;padding-left: 20px;"><!--Enter Url to check its uptime test :--></p>
<br/>
<!--<a style="display: inline-block;margin-left: 20px;" href="{{ base_url }}"><button>Return</button></a>-->
<form action="{{ base_url }}index/checkUrl" class="inline-form icForm" id="IC" method="post">
    <input name="_token" type="hidden" value="zrWDtdGVRnzreYGnZizSHqeIo7jPQlXBlGP03iJW">

    <div>
        <div class="input-prepend" id="inputCheckBlock">
            <button class="check-btn" type="submit" style="padding: 0;margin: 0;">
                <span id="checkSpan">Check</span>
            </button>
            <input placeholder="http://www.mysite.com" id="InstantCheckUrl" name="InstantCheckUrl" type="text"
                   class="form-control" style="width:450px"/>
        </div>
        <div class="errorHolder"></div>
    </div>
    <div class="form-group checkurl-type">
        <table>
            <tr>
                <td class="small bold" style="padding-bottom:.7ex">
                    <label title="Each test simulates the download of the page by a real customer">
                        <input type="radio" name="icTypeRadio[]" value="Http" data-ic-option="ip"
                               data-input-example="http://www.mysite.com" checked="checked"/>
                        Http
                    </label>
                    <label title="Check a site or server by ICMP">
                        <input type="radio" name="icTypeRadio[]" value="Ping" data-ic-option="ip"
                               data-input-example="Host name or IP"/>
                        Ping
                    </label>
                    <label title="Check your network-faced applications or protocols like ftp etc.">
                        <input type="radio" name="icTypeRadio[]" value="Port" data-ic-option="ip"
                               data-input-example="HostName:port"/>
                        Port
                    </label>
                </td>
            </tr>
        </table>

    </div>
</form>
    <p class="alert alert-danger">{{ error|escape }}</p>
    {% endblock %}