<?php 
 
namespace app\contents\lib\finder; 
 
 
class contents_channel_type { 
    public $tags_rank = [ 
        '100'=>'column_operation', 
    ]; 
    public $tags = [ 
        'column_operation'=>'操作', 
    ]; 
    public $detail=[ 
         
    ]; 
    public function column_operation($row){ 
        $str='<a class="layui-btn layui-btn-xs alert_iframe" lay-event="finder_edit"  data-title="编辑" data-url="'.url('finderAdd', 'id='.str_replace('-', '@', $row['id']).'&app_name=contents&db_name=contents_channel_type&element_id=channeltype_id', true, true).'" data-height="100%"  data-width="100%"   href="javascript:void(0);">编辑</a>'; 
        return $str; 
    } 
}