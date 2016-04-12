/**
 * Created by zxc on 16-3-30.
 */
function addLoadEvent(func){
    var oldload = window.onload;
    if(typeof oldload != "function"){
        window.onload=func;
    }else{
        window.onload=function(){
            try{
                oldload();
            }catch(e){
                //alert(e.message);
            }
            finally{
                func();
            }

        }
    }
}

function compile(){
    var converter=new showdown.Converter();
    var all_news=document.getElementsByClassName('news');
    for(var i=0;i<all_news.length;i++){
        var raw_content=all_news[i].getElementsByTagName("p")[0].innerHTML;
        //alert(raw_content);
        var htmlcontent = converter.makeHtml(raw_content);
        all_news[i].getElementsByTagName("p")[0].innerHTML = htmlcontent;
    }
}
addLoadEvent(compile);

function getGetParams(name){
    var queryurl = window.location.search, param;
    var pos1 =queryurl.search(name);
    if(pos1 == -1) return null;
    var pos2 = queryurl.substr(pos1).search("&");
    if(pos2 == -1) param = queryurl.substr(pos1);
    else param = queryurl.substr(pos1, pos2 - pos1);
    if(param != null) return decodeURI(param.split("=")[1]);
    return null;
}

function sendcomment(){
    //alert(getGetParams(1));
    var newsid = getGetParams("id");
    var comuser = $("#curt_user").html();
    var comicon = $("#curt_icon").attr("src");
    var comcontent = $("textarea").val();
    //alert(newsid+','+comuser+','+comicon+','+comcontent);
    $.ajax({
        url:"index.php?method=addcomment",
        data:{
            news_id:newsid,
            com_user:comuser,
            com_icon:comicon,
            com_content:comcontent
        },
        type:"post",
        success:function($data){
            if($data == 0){
                appendNewComment(comuser, comicon, comcontent);
            }else{
                alert('评论提交失败');
            }
        }
    });
}
