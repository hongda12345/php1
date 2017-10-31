<?php

/**
 * @Author: 宏达
 * @Date:   2017-10-31 19:50:35
 * @Last Modified by:   宏达
 * @Last Modified time: 2017-10-31 19:51:34
 */
class unit{
    function __construct(){
        $this->str='';
    }
    //cateTree(0,$mysql,'fl',0)

    function  cateTree($pid,$db,$table,$flag){
        $sql="select * from {$table} where pid={$pid}";
        $data = $db->query($sql);
        $flag++;
        while($row=$data->fetch_assoc()){
            $this->str.="
              <option value={$row['pid']}>$flag{$row['cname']}</option>
            ";
            $this->cateTree($row['pid'],$db,$table,$flag);
        }
        return $this->str;
    }
}