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
                        <input type="radio" name="icTypeRadio[]" value="Port" data-ic-option="ip" id="port-radio-button"
                               data-input-example="HostName:port"/>
                        Port
                    </label>
                </td>
            </tr>
        </table>

    </div>
</form>
<h3 style="margin-top:50px;padding-left: 20px;">Http results for {{ url|escape }}</h3>
<p>&nbsp;</p>
<h4 style="padding-left: 20px;">at : {{ time|escape }}</h4>
<div id="progressBar"><div></div></div>
<div id="url-data" data-url='{{ url }}'></div>
<script type="text/javascript">
    function progress(percent, $element) {
    var progressBarWidth = percent * $element.width() / 100;
    $element.find('div').animate({ width: progressBarWidth }, 30000).html();
}
progress(100, jQuery('#progressBar'));
jQuery.ajax({
    url: BASE_URL + 'index/show_uptime_table',
    type: 'get',
    data: { url: jQuery('#url-data').data('url') },
    dataType: 'html',
    success: function(data)
    {
        jQuery("#progressBar").hide();
        jQuery("#uptime_table").html(data);
    },
    error: function() {
    }
});
</script>
<div id="uptime_table"></div>
{% endblock %}
