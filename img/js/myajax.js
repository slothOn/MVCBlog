/**
 * Created by zxc on 16-3-28.
 */
$(function(){
    var winH=$(window).height();//页面可视区域
    var i=2;
    $(window).scroll(function () {
        var pageH=$(document.body).height();//page height,随着加载动态变化
        var scrollT=$(window).scrollTop();//滚动条top
        var aa=(pageH-winH-scrollT)/winH;
        if(aa<0.02){
            $.ajaxStart(function(){
                
            });
            //ajax加载新的内容 jquery.getJSON相当于GET方法,参数追加到URL后,并且data是已经解析完成的json字符串
            $.getJSON('index.php',{"page":i},function(data){
                i++;
                if(data){
                    console.log(data.num);
                    if(data.num == 0){
                        //已经加载至底部
                        $("#no_more_data").css('display','block');
                    }else{
                        for(var j=0;j<data.list.length;j++){
                            var objj=data.list[j];
                            assembleNews(objj.id,objj.title,objj.author,objj.content);
                        }
                    }
                }
            });
        }
    });
});

function assembleNews(id,title,author,content){
    //console.log(id+','+title+','+author+','+content);
    var newarticle=$(".news").clone().first();
    newarticle.find("media-heading").html(title+"&nbsp;&nbsp;");
    newarticle.find(".label").html(author);
    newarticle.find("p").first().html(content);
    newarticle.find("a").attr('href','index.php?controller=index&method=detail&id='+id);
    $(".news").last().after(newarticle);
    //console.log(newarticle.text());
}