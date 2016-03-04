<table class="table table-responsive table-bordered table-hover table-striped text-center">
    <tr><th class="text-center">LOCATION</th><th class="text-center">IP</th><th class="text-center" colspan="2">STATUS</th><tr>
    {% for result in info %}
        <tr>
            {% if result.error is not defined %}
                    {% if result.availability %}
                        <td>{{ result.location|escape }}</td><td>{{ result.real_ip }}</td>
                        <td colspan="2" id="ok">{{ "Ok" }}</td>
                    {% else %}
                        <td>{{ result.location|escape }}</td><td>{{ result.real_ip }}</td>
                        <td colspan="2" id="fail">{{ "Fail" }}</td>
                    {% endif %}
            {% else %}
                <td colspan="2">{{ result.ip }}</td><td colspan="2">{{ result.error }}</td>
            {% endif %}
        </tr>
    {% endfor %}
</table>