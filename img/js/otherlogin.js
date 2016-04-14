/**
 * Created by zxc on 16-4-11.
 */
function toQQLogin()
{
    //以下为按钮点击事件的逻辑。注意这里要重新打开窗口
    //否则后面跳转到QQ登录，授权页面时会直接缩小当前浏览器的窗口，而不是打开新窗口
    //var A=window.open("libs/ORG/QQConnect.php?preurl="+window.location.search,"TencentLogin");
    var A=window.open("index.php?method=QQConnect&preurl="+encodeURIComponent(window.location.search),"TencentLogin");
}
