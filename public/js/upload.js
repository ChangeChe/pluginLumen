/**
 * Created by Change on 2016-6-20.
 */
$(document).on('change',"input[type='file'][ajax='true']",function(){
    var action = $(this).data('action');
    var obj = $(this);
    var options = {
        progress: function (per) {
            layer.msg(per + "%");
        },
        success: function (url) {
            preview(obj,url);


        },
        failed: function () {
            layer.msg("上传失败，请重新上传");
        },
        error: function (name) {
            layer.msg("上传失败，请重新上传");
        }
    };
    _up(this,action,options);
});
function preview(obj,url) {//根据实际情况可重写
    var container = $('.container .content .page-form .form .upload_img_container');
    $(container).append('<li><img src="'+url+'" width="50" height="50"><a class="remove" data-url="'+url+'">&times</a><input type="hidden" name="fileUpload[]" value="'+url+'"></li>');
}
function _up(elFile,action,options) {
    var file = elFile.files[0];
    var fileExtend = file.name.substring(file.name.lastIndexOf('.')).toLowerCase();
    var ext = (".gif,.jpg,.jpeg,.bmp,.png").split(',');
    if (ext.indexOf(fileExtend) < 0) {
        options.error(file.name);
        return;
    }
    var imgs = $("input[name*='fileUpload']");
    if(imgs.length >= 9){
        layer.msg("最多只能上传9张", 3000);
        return;
    }

    var fd = new FormData();
    fd.append("width", 640);
    fd.append("height", 640);
    fd.append("file", file);
    var xhr = new XMLHttpRequest();
    xhr.upload.addEventListener("progress", uploadProgress, false);
    xhr.addEventListener("load", uploadComplete, false);
    xhr.addEventListener("error", uploadFailed, false);
    xhr.addEventListener("abort", uploadCanceled, false);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var b = xhr.responseText;
            options.success(b);
        }
    };

    xhr.open("POST", action);
    xhr.send(fd);

    function uploadProgress(evt) {
        if (evt.lengthComputable) {
            var percentComplete = Math.round(evt.loaded * 100 / evt.total);
            var _percent = percentComplete;
            options.progress(_percent);
        }
    }
    function uploadComplete(evt) {
        //console.log(xhr.responseText);
        // options.complete();
    }

    function uploadFailed(evt) {
        options.failed();

    }

    function uploadCanceled(evt) {

    }
}
