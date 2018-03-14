<?php 
  namespace lib\desktop;  use model\desktop\DesktopUser;    class Menu {      public static function getAdminMenu($user_id,$cache=true){          $new_menusCache=cache("new_menus".$user_id);          if($cache==true&& $new_menusCache){              return $new_menusCache;          }          $DesktopUser=appModel('desktop', 'DesktopUser');          $join = [                  [config('database.prefix').'desktop_role shop_role','shop_role.role_id=user.role_id'],              ];          $role= $DesktopUser->alias('user')->join($join)->where('user.user_id='.$user_id)->find();          $where=[];          if(isset($role->role_menu)&&$role->role_menu)$where= 'menus_id in ("'.implode('","',json_decode ($role->role_menu, true)).'")';          $Menus= appModel('desktop', 'DesktopMenu')->where(['enabled'=>'1'])->where($where)->order('rank asc')->column('*');                   $permission=['desktop_admin_index','desktop_admin_main','finderexport','exportso','exportid','formbuilder','statusmsg','detail','finderdetailhtml','setfindershow','setfindershow','finderuploadFile','finderuploadimg','finderupload','detail','finderimagesbrowser','imagesbrowser','advancedsearch','setfinder'];          $new_menus=[];          if($Menus){              foreach($Menus as $k=>$v){                  if(!in_array($v['app'].'_'.$v['controller'], $permission))$permission[]=strtolower($v['app'].'_'.$v['controller']);                  if(!in_array($v['app'].'_'.$v['controller'].'_'.$v['method'], $permission))$permission[]=strtolower($v['app'].'_'.$v['controller'].'_'.$v['method']);                  if($v['parent_id']!=0) continue;                  $tmp=[];                  $tmp=$v;                  foreach($Menus as $kk=>$vv){                      if($vv['parent_id']==$k){                          $tmp['menu_list'][$kk]=$vv;                          unset($Menus[$kk]);                          foreach ($Menus as $kkk => $vvv) {                              if($vvv['parent_id']==$kk){                                  $tmp['menu_list'][$kk]['menu_list'][$kkk]=$vvv;                                  unset($Menus[$kkk]);                                  foreach ($Menus as $kkk => $vvv) {                                      if($vvv['parent_id']==$kk){                                          $tmp['menu_list'][$kk]['menu_list'][$kkk]=$vvv;                                          unset($Menus[$kkk]);                                      }                                  }                              }                          }                      }                  }                  if(isset($Menus[$k]))$new_menus[$k]=$tmp;                  unset($Menus[$k]);              }          }          cache('new_menus'.$user_id, $new_menus,3600);         cache('permission_menus'.$user_id, $permission,3600);         return $new_menus;      }  }  