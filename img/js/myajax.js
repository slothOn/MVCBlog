/**
 * Created by zxc on 16-3-28.
 */
$(function(){
    var winH=$(window).height();//页面可视区域
    var pagei=2;
    var preaa=1;//辅助判断滚动条方向

    var uniqueArr = [];
    $(window).scroll(function () {
        var pageH=$(document.body).height();//page height,随着加载动态变化
        var scrollT=$(window).scrollTop();//滚动条top
        var aa=(pageH-winH-scrollT)/winH;
        if(aa<0.02 && aa<=preaa){
            preaa=aa;
            $("#no_more_data").css("display","none");
            $("#news_loading").css("display","block");
            setTimeout(function(){
                //ajax加载新的内容 jquery.getJSON相当于GET方法,参数追加到URL后,并且data是已经解析完成的json字符串
                $.getJSON($(window).attr('location'),{"page":pagei},function(data){
                    $("#news_loading").css("display","none");
                    pagei++;
                    if(data){
                        if(data.num != 0){
                            for(var j=0;j<data.list.length;j++){
                                var objj=data.list[j];
                                if($.inArray(objj.id, uniqueArr) === -1){
                                    uniqueArr.push(objj.id);
                                    assembleNews(objj.id,objj.title,objj.keywords,objj.category,objj.subcategory,objj.content);
                                }
                            }
                        }else{
                            //已经加载至底部
                            $("#no_more_data").css('display','block');
                        }
                    }
                });
            },2000);
        }
    });
});

function assembleNews(id,title,keywords,category,subcategory,content){
    //markdown支持
    var converter=new showdown.Converter();
    content=converter.makeHtml(content.substr(0,250));
    console.log(id+","+title+","+keywords);
    var newarticle=$(".news").clone().first();
    newarticle.find(".media-heading").html(title+"&nbsp;&nbsp;");
    //newarticle.find(".keyword").html(keywords);
    var keystr="";
    for(var i=0;i<keywords.length;i++){
        keystr += '<span class="label label-success">'+keywords[i]+'</span>';
    }
    newarticle.find(".keyword").html(keystr);
    newarticle.find(".mycategory").html('<span class="glyphicon glyphicon-tag"></span>'+category);
    newarticle.find(".mysubcategory").html('<span class="glyphicon glyphicon-tag"></span>'+subcategory);
    newarticle.find("p").first().html(content);
    newarticle.find("a").attr('href','index.php?controller=index&method=detail&id='+id);
    $(".news").last().after(newarticle);
}
