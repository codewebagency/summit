<table class="table table-responsive table-bordered table-hover table-striped text-center">
    <tr>
        <th class="text-center">LOCATION</th>
        <th class="text-center">IP</th>
        <th class="text-center">STATUS</th>
        <th class="text-center">MIN TIME</th>
        <th class="text-center">AVERAGE TIME</th>
        <th class="text-center">MAX TIME</th>
    <tr>
        {% for result in info %}
    <tr>
        {% if result.error is not defined %}
        <td>{{ result.location|escape }}</td><td>{{ result.real_ip }}</td><td>{{ result.status|raw }}</td><td>{{ result.min_time }}</td><td>{{ result.avg_time }}</td><td>{{ result.max_time }}</td>
        {% else %}
            <td>{{ result.ip|escape }}</td></td><td colspan="4">{{ result.error|escape }}</td>
        {% endif %}
    </tr>
    {% endfor %}
</table>
