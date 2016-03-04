
    <table class="table table-responsive table-bordered table-hover table-striped text-center">
    <thead>
    <tr><th class="text-center">Time</th><th class="text-center">LOCATION</th><th class="text-center">NAMELOOKUP TIME</th><th class="text-center">PRETRANSFER TIME</th><th class="text-center">TOTAL TIME</th></tr>
    </thead>
    <tbody>
    <% _.each(uptimes, function(item) { %>
    <tr>
    <td><%= item.time %></td>
    <td><%= item.location %></td>
    <td><%= item.request_info.time_namelookup %></td>
    <td><%= item.request_info.time_pretransfer %></td>
    <td><%= item.request_info.time_total %></td>
    </tr>
    <% }); %>
    </tbody>
    </table>
    <ul class = "pager">
    <li><a href = "javascript:void(0);" id="prev">Previous</a></li>
    <li><a href = "javascript:void(0);" id="next">Next</a></li>
    </ul>

