/**
 * Created by zxc on 16/5/13.
 */
//textarea换行
$("#publish_article").click(function(){
    var textarea = $("textarea");
    var txtcontent = textarea.val();
    var ntxt = txtcontent.replace(/\n/g,'<br>');//全局替换
    textarea.text(ntxt);
    $("#form1").submit();
});