jQuery(function () {
    var info = jQuery('#table-in-pagination').data('info');
//console.log(info);
    var uptime = Backbone.Model.extend({
        defaults: {
            id: '',
            url: '',
            location: '',
            time: '',
            request_info: ''
        }
    });
    var uptimeModel = new uptime();
    var uptimeCollection = Backbone.Collection.extend({
        model: uptime
    });
    var uptimes = new uptimeCollection();
    if (typeof info != 'undefined')
    {
        var info = JSON.stringify(info);
        var infoAsArray = jQuery.parseJSON(info);
        for (var i = 0; i < infoAsArray.length; i++)
        {
            uptimeModel = {
                id: infoAsArray[i].id,
                url: infoAsArray[i].url,
                location: infoAsArray[i].location,
                time: infoAsArray[i].time.date,
                request_info: infoAsArray[i].request_info
            };
            uptimes.add(uptimeModel);
        }
    }
    var uptimeView = Backbone.View.extend({
        el: jQuery('#table-in-pagination'),
        events: {
            'click #next': "nextPage",
            'click #prev': "prevPage"
        },
        initialize: function (options) {
            this.page = options.page;
            window.tplId = options.tplId;
            window.$el = this.$el;
            this.render();
        },
        render: function () {

            var recordsCountEnd = this.page * 5;
            var recordsCountBegin = recordsCountEnd - 5;

            collection = this.collection.toJSON();
            var collectionCount = collection.length;
            var tmpCollection = [];
            for (var j = recordsCountBegin; j < recordsCountEnd; j++)
            {
                if (typeof collection[j] != 'undefined')
                {
                    request_info = jQuery.parseJSON(collection[j].request_info);
                    collection[j].request_info = request_info;
                    tmpCollection.push(collection[j]);
                }
                else {
                    break;
                }
            }
            if (tmpCollection.length == 0)
                return;
            //jQuery('#uptime-log-template').attr("class", 'uptime-log-template' + this.page);
            // console.log(jQuery(this.tplId).html());
            jQuery.ajax({
                url: BASE_URL + "index/log_template",
                type: "get",
                data: {},
                dataType: "text",
                success: function (data) {
                    var script = document.createElement('script');
                    script.id = window.tplId;
                    script.type = "text/template";
                    script.innerHTML = data;
                    document.getElementById("table-in-pagination").appendChild(script);
                    this.template = _.template(jQuery("#" + window.tplId).html());
                    window.$el.html(this.template({uptimes: tmpCollection}));
                }
            });
            return this;
        },
        nextPage: function (event)
        {
            this.page++;
            this.render();
        },
        prevPage: function (event) {
            this.page--;
            this.render();
        }
    });
    new uptimeView({collection: uptimes, tplId: 'uptime-log-template', page: 1});
/***********************************************************************************************/
    jQuery("input[type=radio]").bind('click', function() {
        if(jQuery('#port-radio-button').is(':checked')) {
            jQuery("#InstantCheckUrl").attr('placeholder', 'http://www.mysite.com:[port]');
        }
        else {
            jQuery("#InstantCheckUrl").attr('placeholder', 'http://www.mysite.com');
        }
    });
});
