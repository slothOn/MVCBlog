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
//            var converter = new showdown.Converter(),
//            text      = '#hello, markdown!',
//            html      = converter.makeHtml(text);
}
addLoadEvent(compile);