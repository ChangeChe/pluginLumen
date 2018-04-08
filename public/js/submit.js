function lay_post(url,data,async,text,callback){
    $.ajax({
        url:url,
        data:data,
        method:'post',
        async:async,
        dataType:'json',
        success:function(res){
            if(res.errorCode == 0){
                layer.msg(text,{time:2000,end:function(){
                    callback();
                }});

            }else{
                var text = res.results?res.results:res.errorStr;
                layer.msg(text,{time:3000});
            }

        }
    })
}
function formSubmit(form,btn,text,callback){
    if($('form').hasClass('ing')){
        return;
    }
    $(form).addClass('ing');
    var btnTxt = $(btn).text();
    $(btn).text('...');
    $(form).ajaxSubmit({
        success:function(res){
            if(res.errorCode == 0){
                layer.msg(text,{time:2000,end:function(){
                    callback();
                }})
            }else{
                layer.msg(res.errorStr);
            }
        },
        dataType:'json',
        complete:function(){
            setTimeout(function(){
                $(form).removeClass('ing');
                $(btn).text(btnTxt);
            },3000)
        }
    })
}