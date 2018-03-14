<?php 

namespace app\desktop\controller;
use lib\base\BaseController;
use lib\desktop\Menu;

class AdminRolea extends BaseController{
    use \lib\base\Finder;
    public function index(){
        return $this->finder(
                'desktop',
                'desktop_role', 
                [],
                [
                    'title'=>'用户角色', 
                    'is_detail'=>false,
                    'detail_url'=> '',
                    'finder_path'=> '',
                    'actions'=>[
                        ['type'=>'href','url'=>url('Add','',true,true),'val'=>'添加','iclass'=>'alert_iframe','width'=>'100%','height'=>'100%'],
                    ]    
            ],'role_id',[],'role_id desc'
        );
    }
    
    public function add($id=''){
        $new_menus=Menu::getAdminMenu(0, false);
        $data=[];
        if($id)$data=appModel('desktop', 'DesktopRole')->get($id);
        return $this->showTpl('',['menus'=>$new_menus,'shop_role'=>$data]);
    }
    
    public function toAdd(){
        
        
        if(isset($_POST['menus'])==false||$_POST['menus']==false)return $this->statusMsg(false, '请勾选至少一个权限菜单');
        $save_menus=[];
        $desktopmenu=appModel('desktop', 'DesktopMenu')->column('*','menus_id');
        if($_POST['menus']&& is_array($_POST['menus'])){
            foreach ($_POST['menus'] as $k => $v) {
                if(isset($desktopmenu[$desktopmenu[$v]['parent_id']])&&$desktopmenu[$desktopmenu[$v]['parent_id']]['parent_id']!=0)$save_menus[$desktopmenu[$desktopmenu[$v]['parent_id']]['parent_id']]=$desktopmenu[$desktopmenu[$v]['parent_id']]['parent_id'];
                
                if(isset($desktopmenu[$v]['parent_id'])&&$desktopmenu[$v]['parent_id']!=0)$save_menus[$desktopmenu[$v]['parent_id']]=$desktopmenu[$v]['parent_id'];
                $save_menus[$v]=$v;
            }
        }
        unset($_POST['menus']);
        $_POST['role_menu']= json_encode($save_menus);
        $Role=appModel('desktop', 'DesktopRole');
        $Role->isUpdate(isset($_POST['role_id'])&&$_POST['role_id'])->save($_POST);
        return $this->statusMsg(true, '操作成功了',url('role','',true,true));
    }
}
