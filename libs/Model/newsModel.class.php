<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-14
 * Time: 下午9:19
 */
class newsModel
{
    public $table='news';

    function count(){
        $sql="select count(*) from $this->table";
        return DB::findResult($sql);
    }

    function findOne_by_id($id){
//        $sql="select * from $this->table WHERE id='$id'";
        $sql="select id, title, keywords, content, dateline, news.scate_id AS scate_id,
          scate_name AS subcategory, cate_name AS category from $this->table
          INNER JOIN subcate ON $this->table.scate_id=subcate.scate_id WHERE id='$id'";
        return DB::findOne($sql);
    }

    function insert($data){
        return DB::insert($this->table,$data);
    }

    function updateById($data,$id){
        return DB::update($this->table,$data,"id=$id");
    }

    function findAll_orderby_dateline(){
        $sql = "select * from $this->table order by dateline desc";
        return DB::findAll($sql);
    }

    function deleteById($id){
        return DB::del($this->table,"id='$id'");
    }

    function findProcessedAll(){
        $rows=$this->findAll_orderby_dateline();
        foreach($rows as $row){
            $row['content']=substr($row['content'],0,200);
        }
        return $rows;
    }

    function findLimitedNews($page_num,$limit_num){
        //$sql="select * from $this->table order by dateline desc";
        $sql="select id, title, keywords, content, dateline, news.scate_id AS scate_id,
          scate_name AS subcategory, cate_name AS category from $this->table
          INNER JOIN subcate ON $this->table.scate_id=subcate.scate_id
          order by dateline desc";
        $skip_num=($page_num-1)*$limit_num;
        $rows=DB::findLimited($sql,$skip_num,$limit_num);
        foreach($rows as $row){
            $row['content']=substr($row['content'],0,200);
        }
        return $rows;
    }

    function findLimitedNewsWithCate($page_num,$limit_num,$category){
        if($category == 0) return $this->findLimitedNews($page_num,$limit_num);
        $sqlbasic = "select id, title, keywords, content, dateline, news.scate_id AS scate_id,
          scate_name AS subcategory, cate_name AS category from $this->table
          INNER JOIN subcate ON $this->table.scate_id=subcate.scate_id";
        if($category == 10){
            $sql=$sqlbasic." WHERE $this->table.scate_id BETWEEN 1 AND 9 order by dateline desc";
        }else if($category == 20){
            $sql=$sqlbasic." WHERE $this->table.scate_id BETWEEN 11 AND 19 order by dateline desc";
        }else if($category == 30){
            $sql=$sqlbasic." WHERE $this->table.scate_id BETWEEN 21 AND 29 order by dateline desc";
        }else{
            $sql=$sqlbasic." WHERE $this->table.scate_id='$category'  order by dateline desc";
        }
        $skip_num=($page_num-1)*$limit_num;
        $rows=DB::findLimited($sql,$skip_num,$limit_num);
        foreach($rows as $row){
            $row['content']=substr($row['content'],0,200);
        }
        return $rows;
    }

    function findLimitedNewsWithKeywords($pagenum, $limit_num, $keywords){
        $searchkeyword=daddslashes($keywords);
        $skip_num=($pagenum-1)*$limit_num;
        $sphinx = new SphinxClient();
        $server = "localhost";
        $port = 9312;
        $sphinx->SetServer($server, $port);
        $sphinx->SetConnectTimeout(3);
        $sphinx->SetMaxQueryTime(2000);
        $sphinx->SetArrayResult(true);
        $sphinx->SetMatchMode(SPH_MATCH_ALL);
        $sphinx->SetLimits($skip_num, $limit_num);
        $result = $sphinx->Query($searchkeyword,"*");
        $rows = array();
        if(is_array($result['matches'])){
            $matches=$result['matches'];
            $vals=array_values($matches);

            foreach($vals as $val){
                $vid = $val['id'];
                $scate_id = $val['attrs']['scate_id'];
                $sqlbasic = "select id, title, keywords, content, dateline, news.scate_id AS scate_id,
          scate_name AS subcategory, cate_name AS category from $this->table
          INNER JOIN subcate ON $this->table.scate_id=subcate.scate_id";
                $sql = $sqlbasic." WHERE $this->table.id = $vid";
                $row = DB::findOne($sql);
                array_push($rows, $row);
            }
	    	
        }
        return $rows;
    }

}
