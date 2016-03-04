{% extends "layouts/admin/main.tpl" %}
{% block title %}Server List{% endblock %}
{% block content %}
<span data-servers="{{ server_json }}" id="servers-data"></span>
{% if ((message is defined) and (message is not empty)) %}
<p class="alert alert-warning">{{ message }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
{% endif %}
<div id="table-container">

</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Server</h4>
            </div>
            <div class="modal-body">
                <p>
                <form action="{{ base_url }}index.php/server/create" id="add-server-form" method="post" onsubmit="return addServerValidator(this);">
                    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong>
                    </div>
                    <div class="form-group">
                        <label for="InputName">Enter IP Address : </label>

                        <div class="input-group">
                            <input type="text" class="form-control" name="ip" id="server-form-ip" placeholder="255.255.255.255" required/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputName">Celery Username : </label>

                        <div class="input-group">
                            <input type="text" class="form-control" name="celery_username" id="server-form-ip" placeholder="" required />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputName">Celery Password : </label>

                        <div class="input-group">
                            <input type="password" class="form-control" name="celery_password" id="server-form-ip" placeholder="" required />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    
                    <div class="form-group" style="text-align: center;">
                        <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">
                    </div>
                    <div class="errorHolder"></div>
                </form>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
{% endblock %}

