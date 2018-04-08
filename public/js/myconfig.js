var version = +new Date();
var myconfig = {
    path: '/plugins/',
    alias: {
        'jquery.contextMenu': 'jquery/contextMenu/jquery.contextMenu'
    },
    map: {
        'js': '.js',
        'css': '.css'
    },
    css: {
        'jquery.contextMenu': 'jquery/contextMenu/jquery.contextMenu'
    }

};

var myrequire = function (arr, callback) {
    var newarr = [];
    $.each(arr, function () {
        var js = this;

        if (myconfig.css[js]) {
            var css = myconfig.css[js].split(',');
            $.each(css, function () {
                newarr.push( myconfig.path + this + myconfig.map['css']);
            });


        }

        var jsitem = this;
        if (myconfig.alias[js]) {
            jsitem = myconfig.alias[js];

        }
        newarr.push(myconfig.path + jsitem + myconfig.map['js']);
    });
    require(newarr, callback);
}
