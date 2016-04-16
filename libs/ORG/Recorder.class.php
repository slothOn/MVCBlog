<?php
/* PHP SDK
 * @version 2.0.0
 * @author connect@qq.com
 * @copyright © 2013, Tencent Corporation. All rights reserved.
 */

require_once(QQCLASS_PATH . "ErrorCase.class.php");
class Recorder{
    private static $data;
    private $inc;
    private $error;

    public function __construct(){
        $this->error = new ErrorCase();
        session_start();
        //-------读取配置文件
//        $incFileContents = file(ROOT."comm/inc.php");
//        $incFileContents = $incFileContents[1];
//        $this->inc = json_decode($incFileContents);
        $this->inc->appid = "101303083";
        $this->inc->appkey = "611daeb278b4aabe32f181c61eaf92d0";
//        $this->inc->callback = "http://127.0.0.1/MVCLearn/index.php";
        $this->inc->callback = "http://www.xczhou.cn/Blog/index.php";
        $this->inc->scope = "get_user_info";
        $this->inc->errorReport = "true";
        $this->inc->storageType = "file";
        $this->inc->host = "localhost";
        $this->inc->user = "root";
        $this->inc->password = "root";
        $this->inc->database = "test";

        if(empty($this->inc)){
            $this->error->showError("20001");
        }

        if(empty($_SESSION['QC_userData'])){
            self::$data = array();
        }else{
            self::$data = $_SESSION['QC_userData'];
        }
    }

    public function write($name,$value){
        self::$data[$name] = $value;
        $_SESSION['QC_userData'] = self::$data;
    }

    public function read($name){
        if(empty(self::$data[$name])){
            return null;
        }else{
            return self::$data[$name];
        }
    }

    public function readInc($name){
        if(empty($this->inc->$name)){
            return null;
        }else{
            return $this->inc->$name;
        }
    }

    public function delete($name){
        unset(self::$data[$name]);
    }

    function __destruct(){
        $_SESSION['QC_userData'] = self::$data;
    }
}
