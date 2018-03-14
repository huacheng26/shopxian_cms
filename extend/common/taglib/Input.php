<?php 
  namespace common\taglib;  use think\template\TagLib;  use model\index\Region;    class Input extends TagLib{            protected $tags   =  [                   'region'     => ['attr' => 'name,required,value', 'close' => 0],          'img'     => ['attr' => 'name,required,value', 'close' => 0],          'cat'     => ['attr' => 'name,required,key_id,key_name,value', 'close' => 0],      ];           public function tagCat($tag, $content){          $required="";          if($tag['required']=='true') $required='lay-verify="required"';          $value='';          if(isset($tag['value']))$value='<?php print_r( '.$tag['value'].'); ?>';          return '<div>                  <input type="hidden" id="'.$tag['name'].'" name="'.$tag['name'].'" value='.$value.' />                  <select class="selectTop" lay-ignore  '.$required.' onchange="selectCatCommon(this)" style="padding:3px;">                    <option value="-1">请选择</option>                  </select>            </div>          <script>                   for(i in allRegion){                          if(allRegion[i].parent_id==0){                                  $(".selectTop").append(\'<option value="\'+allRegion[i].'.$tag['key_id'].'+\'">\'+allRegion[i].'.$tag['key_name'].'+"</option>");                          }                  }                  function selectCatCommon(obj,name){                          var ts=$(obj);                                                   ts1=ts.next();                          ts2=ts1.next();                          ts3=ts2.next();                          ts4=ts3.next();                          ts5=ts4.next();                          ts6=ts5.next();                          ts7=ts6.next();                          ts8=ts7.next();                          ts9=ts8.next();                          ts10=ts9.next();                                                    ts10.remove();                          ts9.remove();                          ts8.remove();                          ts7.remove();                          ts6.remove();                          ts5.remove();                          ts4.remove();                          ts3.remove();                          ts2.remove();                          ts1.remove();                                                   var select1=ts.parent().find("select");                          var json_data={};                          select1.each(function(i){                                  json_data[i]=$(this).val();                          });                          ts.parent().find(\'input[type=hidden]\').val(JSON.stringify(json_data));                          var apphtml="";                          $index=0;                          for(i in allRegion){                                  if(allRegion[i].parent_id==ts.val()){                                          if(0==$index)apphtml+=\'<option  value="-1">请选择</option>\';                                          apphtml+=\'<option value="\'+allRegion[i].'.$tag['key_id'].'+\'">\'+allRegion[i].'.$tag['key_name'].'+"</option>";                                          $index++;                                  }                          }                          if(apphtml){                                  apphtml=\'<select lay-ignore class="selectTop" '.$required.'  style="padding: 3px; display: inline; margin-left: 4px;" onchange="selectCatCommon(this)">\'+apphtml+"</select>";                                  ts.parent().append(apphtml);                          }                        }                      var select_cat=$("#'.$tag['name'].'").val();     if(select_cat!=""&&select_cat!=0){      try{       select_cat=eval("("+select_cat+")");       var select_cat_index=0;       for(j in select_cat){        if(select_cat_index==0){         $("#'.$tag['name'].'").next().find("option").each(function(k){          if($(this).val()==select_cat[j])$(this).prop("selected",true);         });        }else{             var apphtml="";         $index=0;         for(i in allRegion){          if(allRegion[i].parent_id==select_cat[j-1]){           if(0==$index)apphtml+=\'<option  value="-1">请选择</option>\';           if(select_cat[j]==allRegion[i].'.$tag['key_id'].'){            apphtml+=\'<option selected value="\'+allRegion[i].'.$tag['key_id'].'+\'">\'+allRegion[i].'.$tag['key_name'].'+"</option>";           }else{            apphtml+=\'<option value="\'+allRegion[i].'.$tag['key_id'].'+\'">\'+allRegion[i].'.$tag['key_name'].'+"</option>";           }           $index++;          }         }         if(apphtml){          apphtml=\'<select lay-ignore style="padding: 3px; display: inline; margin-left: 4px;"  '.$required.' onchange="selectCatCommon(this)">\'+apphtml+"</select>";          $("#'.$tag['name'].'").parent().append(apphtml);         }        }        select_cat_index++;       }      }catch(e){      }     }                                                 </script>                  ';      }           public function tagRegion($tag, $content){          $required="";          if($tag['required']=='true') $required='required="required"';          $value='';          if(isset($tag['value']))$value=$tag['value'];          $parseStr = '<div>          <input type="hidden" id="'.$tag['name'].'" name="'.$tag['name'].'" '.$required.' vaule='.$value.' />          <select class="selectRegionProvince" name="" onchange="selectRegionCommon(this,1,\'nextClassName\',\''.$tag['name'].'\')">            <option value="-1">请选择</option>          </select>              <select class="selectRegionCity" name="" onchange="selectRegionCommon(this,2,\'selectRegionDistrict\',\''.$tag['name'].'\')">                  <option value="-1">请选择</option>          </select>           <select class="selectRegionDistrict"  name="" onchange="selectRegionCommon(this,3,\'selectRegionStreet\',\''.$tag['name'].'\')">                  <option value="-1">请选择</option>          </select>          <select class="selectRegionStreet"  name="" onchange="selectRegionCommon(this,4,\'\',\''.$tag['name'].'\')"><option value="-1">请选择</option></select>          </div>          <script>   for(i in allRegion){   if(allRegion[i].parent_id==0){    $(".selectRegionProvince").append(\'<option value="\'+allRegion[i].region_id+\'">\'+allRegion[i].region_name+\'</option>\');   }  }  function selectRegionCommon(obj,index,nextClassName,name_id){   switch(index){    case 1:    var region_json_data={\'province\':$(obj).val()};    var last=JSON.stringify(region_json_data);    $(\'#\'+name_id).val(last);    break;    case 2:    var region_json_data=eval("("+$(\'#\'+name_id).val()+")");    region_json_data[\'city\']=$(obj).val();    delete region_json_data.district;    delete region_json_data.street;    var last=JSON.stringify(region_json_data);    $(\'#\'+name_id).val(last);    break;    case 3:    var region_json_data=eval("("+$(\'#\'+name_id).val()+")");    region_json_data[\'district\']=$(obj).val();    delete region_json_data.street;    var last=JSON.stringify(region_json_data);    $(\'#\'+name_id).val(last);    break;    case 4:    var region_json_data=eval("("+$(\'#\'+name_id).val()+")");    region_json_data[\'street\']=$(obj).val();    var last=JSON.stringify(region_json_data);    $(\'#\'+name_id).val(last);    break;   }   if(nextClassName==false)return;   if($(obj).val()==-1){    for(j=index;j<$(obj).parent().find("select").length;j++){     $($(obj).parent().find("select")[j]).html(\'<option value="-1">请选择</option>\');    }    return false;   }   for(j=index+1;j<$(obj).parent().find("select").length;j++){    $($(obj).parent().find("select")[j]).html(\'<option value="-1">请选择</option>\');   }   $($(obj).parent().find("select")[index]).html(\'<option value="-1">请选择</option>\');   for(i in allRegion){    if(allRegion[i].parent_id==$(obj).val()){     $($(obj).parent().find("select")[index]).append(\'<option value="\'+allRegion[i].region_id+\'">\'+allRegion[i].region_name+\'</option>\');    }   }   if(index>=3)$($(obj).parent().find("select")[index]).append(\'<option value="0">其他</option>\');              }              var '.$tag['name'].'_json=\''.$value.'\';              if('.$tag['name'].'_json){                  '.$tag['name'].'_json=eval("("+'.$tag['name'].'_json+")");                  var input_select0=$("#'.$tag['name'].'").parent().find("select")[0];                  for(i in $(input_select0).find("option")){                          if($(input_select0).find("option")[i].value=='.$tag['name'].'_json.province){                              $(input_select0).find("option")[i].selected = true;                              $($(input_select0).find("option")[i]).change();                          }                  }                      var input_select0=$("#'.$tag['name'].'").parent().find("select")[1];                  for(i in $(input_select0).find("option")){                          if($(input_select0).find("option")[i].value=='.$tag['name'].'_json.city){                              $(input_select0).find("option")[i].selected = true;                              $($(input_select0).find("option")[i]).change();                          }                  }                      var input_select0=$("#'.$tag['name'].'").parent().find("select")[2];                  for(i in $(input_select0).find("option")){                          if($(input_select0).find("option")[i].value=='.$tag['name'].'_json.district){                              $(input_select0).find("option")[i].selected = true;                              $($(input_select0).find("option")[i]).change();                          }                  }                  if('.$tag['name'].'_json.street){                      var input_select0=$("#'.$tag['name'].'").parent().find("select")[3];                      for(i in $(input_select0).find("option")){                              if($(input_select0).find("option")[i].value=='.$tag['name'].'_json.street){                                  $(input_select0).find("option")[i].selected = true;                                  $($(input_select0).find("option")[i]).change();                              }                      }                  }              }                  </script>  ';          return $parseStr;      }      public function tagImg($tag, $content){          $required="";          $value='';          if(isset($tag['value']))$value='<?php echo "'.$tag['value'].'"; ?>';          if($tag['required']=='true') $required='required="required"';          $str='<div>                          <input type="text" name="'.$tag['name'].'" value="'.$value.'" '.$required.' style="float: left; margin-right: 3px;width:70%;" class="form-control layer-date"  value=""  />                          <div style="position: relative;float: left;width:24%;">                                  <input type="button" value="上传" class="btn btn-warning">                                  <input type="file" style="position: absolute; left: 0px; top: 0px; opacity: 0;"  onchange="fileObj.updata(this)">                          </div>                    </div>';          $str.='<script>          var fileObj={              updata:function(obj){                                    var xhr;                                      function createXMLHttpRequest()                                      {                                          if(window.ActiveXObject)                                          {                                              xhr = new ActiveXObject("Microsoft.XMLHTTP");                                          }                                          else if(window.XMLHttpRequest)                                          {                                              xhr = new XMLHttpRequest();                                          }                                      }    var shangchuanstr=$(obj).val();    yunarr=".jpg,.jpeg,.png,.gif,.bmp";       var leixing=shangchuanstr.substr(shangchuanstr.lastIndexOf("."));   if(yunarr.indexOf(leixing.toLocaleLowerCase())=="-1"){     alert("不是一个图片");                                                      return false;    }    function handleStateChange()                                      {                                          if(xhr.readyState == 4)                                          {                                              if (xhr.status == 200 || xhr.status == 0)                                              {                                                  var result = xhr.responseText;                                                  json=eval("("+result+")");                                                  console.log(json);                                                  $(obj).parent().parent().find("input")[0].value=json.path;                                                                                                }                                          }                                      }                                         var fileObj = obj.files[0];                                      var FileController = "<{url link="imageUp"  vars="" suffix="true" domain="true"}>";                                      var form = new FormData();                                      form.append("file", fileObj);                                      createXMLHttpRequest();                                      xhr.onreadystatechange = handleStateChange;                                      xhr.open("post", FileController, true);                                      xhr.send(form);              }          }          $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});          $().ready(function() {              $("#signupForm").validate();          });      </script>';          return $str;      }  }  