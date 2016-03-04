<table class="table table-responsive table-bordered table-hover table-striped text-center">
    <tr>
        <th class="text-center">LOCATION</th>
        <th class="text-center">IP</th>
        <th class="text-center">STATUS</th>
        <th class="text-center">DNS</th>
        <th class="text-center">HEAD</th>
        <th class="text-center">REQUEST SIZE</th>
        <th class="text-center">TOTAL</th>
    </tr>
    <!-- ip is the server's IP -->
    {% for ip, result in info %}
    <tr>
        {% if result is iterable %}
            <td>{{ result.request_info.location|escape }}</td>
            <td>{{ result.request_info.ip|escape }}</td>
            <td>{{ result.request_info.http_code_html|raw }}</td>
            <td>{{ result.request_info.time_namelookup|escape }}</td>
            <td>{{ result.request_info.time_pretransfer|escape }}</td>
            <td>{{ result.request_info.size_request|escape }}</td>
            <td>{{ result.request_info.time_total|escape }}</td>
        {% else %}
            <td>{{ result.request_info.location }}</td></td><td colspan="4">{{ result|escape }}</td>
        {% endif %}
    </tr>
    {% endfor %}
</table>
