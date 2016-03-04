/**
 * Created by bahrami on 1/18/2016.
 */
jQuery(function() {
    var data = jQuery('#servers-data').data('servers');
    var model = Backbone.Model.extend({
        initialize:function() {

        }
    });
    var dataModel = new model;
    var collection = Backbone.Collection.extend({
        model: model
    });
    var dataCollection = new collection();
    for(var i=0;i<data.length;i++)
    {
        dataModel = new model;
        dataModel.set('ip', data[i].ip);
        dataModel.set('id', data[i].id);
        dataModel.set('celery_username', data[i].celery_username);
        dataModel.set('celery_password', data[i].celery_password);
        dataCollection.add(dataModel);
    }
        var view = Backbone.View.extend({
            initialize: function(collection) {
            window.self = this;
            this.collection = collection;
            this.render(this.collection);
        },
        events: {

        },
        render: function(collection) {
            this.collection = collection;
            var self = this;
            var table = document.createElement('table');
            table.setAttribute('class', 'table table-bordered table-stripped table-responsive table-servers');
            var tr = document.createElement('tr');
            var th = document.createElement('th');
            th.setAttribute('class', 'text-center');
            th.setAttribute('style', 'width:300px;');
            th.innerHTML = "IP";
            tr.appendChild(th);
            var th = document.createElement('th');
            th.setAttribute('class', 'text-center');
            th.setAttribute('style', 'width:300px;');
            th.innerHTML = "Celery Username";
            tr.appendChild(th);
            var th = document.createElement('th');
            th.setAttribute('class', 'text-center');
            th.setAttribute('style', 'width:300px;');
            th.innerHTML = "Celery Password";
            tr.appendChild(th);
            table.appendChild(tr);
            jQuery("#table-container").append(table);
            var th = document.createElement('th');
            th.setAttribute('class', 'text-center');
            th.setAttribute('style', 'width:300px;');
            th.innerHTML = "ACTION";
            tr.appendChild(th);
            table.appendChild(tr);
            jQuery("#table-container").append(table);
            //console.log(instance);
            this.collection.each(function(model) {
                console.log(model);
                var tr = document.createElement('tr');
                var td = document.createElement('td');
                td.setAttribute('class', 'text-center');
                td.innerHTML = model.get('ip');
                tr.appendChild(td);
                var td = document.createElement('td');
                td.setAttribute('class', 'text-center');
                td.innerHTML = model.get('celery_username');
                tr.appendChild(td);
                var td = document.createElement('td');
                td.setAttribute('class', 'text-center');
                td.innerHTML = model.get('celery_password');
                tr.appendChild(td);
                table.appendChild(tr);
                var td = document.createElement('td');
                td.setAttribute('class', 'text-center');
                ID = 'deletebtn' + model.get('id');
              //  td.innerHTML = "<a href='' onclick='"+window.deleterow(this.id)+"' id='"+ID+"' data-id='"+model.get('id')+"'>Delete</a>&nbsp;&nbsp;<a href=''>Edit</a>";
                var a1  = document.createElement('a');
                var a2 = document.createElement('a');
                a1.innerHTML = "Delete";
                a2.innerHTML = "Edit";
                a1.setAttribute('onclick',"window.self.deleterow('"+model.get('id')+"');" );
                a2.setAttribute('onclick', "window.self.editrow('"+model.get('id')+"')" );
                td.appendChild(a1);
                td.appendChild(a2);

                tr.appendChild(td);
                table.appendChild(tr);
            });
            jQuery("#table-container").html(table);
            var a = document.createElement('a');
            a.setAttribute('href', '#');
            a.setAttribute('style', 'display:inline-block;margin-left: 20px;');
            a.innerHTML = 'Add Another Server';
            a.setAttribute('data-toggle', 'modal');
            a.setAttribute('data-target', '#myModal');
            jQuery("#table-container").append(a);
            return this;
        },
        deleterow: function(id)
        {
            window.id = id;
            jQuery.ajax({
                url : BASE_URL + "server/delete",
                type: "get",
                data: { id: window.id },
                dataType: "html",
                success: function(data) {
                    alert(data);
                    window.self.collection.remove({id: window.id});
                    window.self.render(window.self.collection);
                }
            });
        },


    });
    var dataView = new view(dataCollection);
});
function addServerValidator(form)
{
     var ip = jQuery('#server-form-ip').val();
    if(ip == '')
    {
        var p = document.createElement('p');
        p.setAttribute('class', 'alert alert-danger');
        p.innerHTML = 'IP is required .';
        var a = document.createElement('a');
        a.setAttribute('class', 'close');
        a.setAttribute('data-dismiss', 'alert');
        a.setAttribute('aria-label', 'close');
        a.innerHTML = "&times;"
        p.appendChild(a);
        jQuery(".errorHolder").append(p);
        return false;
    }
    return true;
}

































