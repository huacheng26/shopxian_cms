<?php 
 namespace lib\base;  class Api {     use \lib\base\Reflection;     public static function run($class,$method){         $obj=new self;         $obj->__Reflection($class, $method);         $data=$obj->exec(input());         if(!in_array(true, [is_array($data),is_string($data)]))exit (abort(500, $class.'->'.$method.'()数据错误,返回结果必须是字符串或者数组'));         if(is_array($data))$data= json_encode ($data, JSON_UNESCAPED_UNICODE);         return $data;     } } 