<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
         namespace common\taglib;  use think\template\TagLib;    class Layui extends TagLib{            protected $tags   =  [                   'loadcss'     => ['attr' => '', 'close' => 0],           'loadjs'     => ['attr' => '', 'close' => 0],           'loaddatejs'     => ['attr' => '', 'close' => 0],           'input'     => ['attr' => 'name,required,value', 'close' => 0],           'datetime'     => ['attr' => 'name,required,value', 'close' => 0],           'year'     => ['attr' => 'name,required,value', 'close' => 0],          'month'     => ['attr' => 'name,required,value', 'close' => 0],          'time'     => ['attr' => 'name,required,value', 'close' => 0],          'yearrange'     => ['attr' => 'name,required,value', 'close' => 0],          'monthrange'     => ['attr' => 'name,required,value', 'close' => 0],          'timerange'     => ['attr' => 'name,required,value', 'close' => 0],          'datetimerange'     => ['attr' => 'name,required,value', 'close' => 0],          'rtf'     => ['attr' => 'name,required,value', 'close' => 0],          'switch'     => ['attr' => 'name,required,value', 'close' => 0],          'checkbox'     => ['attr' => 'name,required,value', 'close' => 0],          'radio'     => ['attr' => 'name,required,value', 'close' => 0],          'textarea'     => ['attr' => 'name,required,value', 'close' => 1],      ];      public function tagLoadcss($tag, $content){          return '<link rel="stylesheet" href="'. root_path().'/static/layui-v2.1.1/layui/css/layui.css'.'"  media="all">';      }      public function tagLoadjs($tag, $content){          return '<script src="'. root_path().'/static/layui-v2.1.1/layui/layui.all.js'.'"></script><script src="'. root_path().'/static/layui-v2.1.1/layui/layui.js'.'"></script>';      }      public function tagLoaddatejs($tag, $content){          return '<script src="'. root_path().'/static/layui-v2.1.1/laydate/laydate.js'.'"></script>';      }      public function tagInput($tag, $content){          $required=isset($tag['required'])&&$tag['required']=='true'?'required="required" ':'';          $placeholder=isset($tag['placeholder'])?' placeholder="'.$tag['placeholder'].'" ':'';          $value     = isset($tag['value'])?$tag['value']:'';          $label     = isset($tag['label'])?$tag['label']:'';          return '<div class="layui-form-item">              <label class="layui-form-label">'.$label.'</label>              <div class="layui-input-block">                <input autocomplete="off" '.$placeholder.$required.' class="layui-input" type="text" id="'.$tag['name'].'" name="'.$tag['name'].'" value="<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        echo "'.$value.'" ?>">              </div>            </div>';      }      public function tagDatetime($tag, $content){          $required=isset($tag['required'])&&$tag['required']=='true'?'required="required" ':'';          $placeholder=isset($tag['placeholder'])?' placeholder="'.$tag['placeholder'].'" ':'';          $value     = isset($tag['value'])?$tag['value']:'';          $label     = isset($tag['label'])?$tag['label']:'';          return '<div class="layui-form-item">              <label class="layui-form-label">'.$label.'</label>              <div class="layui-input-block">                <input autocomplete="off" '.$placeholder.$required.' class="layui-input" type="text" id="'.$tag['name'].'" name="'.$tag['name'].'" value="<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        echo "'.$value.'" ?>">              </div>            </div>'.             '<script>var laydate = layui.laydate;laydate.render({  elem: "#'.$tag['name'].'"  ,type: "datetime"});</script>';      }      public function tagYear($tag, $content){          $required=isset($tag['required'])&&$tag['required']=='true'?'required="required" ':'';          $placeholder=isset($tag['placeholder'])?' placeholder="'.$tag['placeholder'].'" ':'';          $value     = isset($tag['value'])?$tag['value']:'';          return '<div class="layui-form-item">              <label class="layui-form-label">'.$label.'</label>              <div class="layui-input-block">                <input autocomplete="off" '.$placeholder.$required.' class="layui-input" type="text" id="'.$tag['name'].'" name="'.$tag['name'].'" value="<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        echo "'.$value.'" ?>">              </div>            </div>'. '<script>var laydate = layui.laydate;laydate.render({elem: "#'.$tag['name'].'",type: "year"});</script>';      }      public function tagMonth($tag, $content){          $required=isset($tag['required'])&&$tag['required']=='true'?'required="required" ':'';          $placeholder=isset($tag['placeholder'])?' placeholder="'.$tag['placeholder'].'" ':'';          $value     = isset($tag['value'])?$tag['value']:'';          return '<div class="layui-form-item">              <label class="layui-form-label">'.$label.'</label>              <div class="layui-input-block">                <input autocomplete="off" '.$placeholder.$required.' class="layui-input" type="text" id="'.$tag['name'].'" name="'.$tag['name'].'" value="<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        echo "'.$value.'" ?>">              </div>            </div>'. '<script>var laydate = layui.laydate;laydate.render({elem: "#'.$tag['name'].'",type: "month"});</script>';      }      public function tagTime($tag, $content){          $required=isset($tag['required'])&&$tag['required']=='true'?'required="required" ':'';          $placeholder=isset($tag['placeholder'])?' placeholder="'.$tag['placeholder'].'" ':'';          $value     = isset($tag['value'])?$tag['value']:'';          return '<div class="layui-form-item">              <label class="layui-form-label">'.$label.'</label>              <div class="layui-input-block">                <input autocomplete="off" '.$placeholder.$required.' class="layui-input" type="text" id="'.$tag['name'].'" name="'.$tag['name'].'" value="<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        echo "'.$value.'" ?>">              </div>            </div>'. '<script>var laydate = layui.laydate;laydate.render({elem: "#'.$tag['name'].'",type: "time"});</script>';      }      public function tagYearrange($tag, $content){          $required=isset($tag['required'])&&$tag['required']=='true'?'required="required" ':'';          $placeholder=isset($tag['placeholder'])?' placeholder="'.$tag['placeholder'].'" ':'';          $value     = isset($tag['value'])?$tag['value']:'';          return '<div class="layui-form-item">              <label class="layui-form-label">'.$label.'</label>              <div class="layui-input-block">                <input autocomplete="off" '.$placeholder.$required.' class="layui-input" type="text" id="'.$tag['name'].'" name="'.$tag['name'].'" value="<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        echo "'.$value.'" ?>">              </div>            </div>'. '<script>var laydate = layui.laydate;laydate.render({elem: "#'.$tag['name'].'",type: "year",range: true});</script>';      }      public function Monthrange($tag, $content){          $required=isset($tag['required'])&&$tag['required']=='true'?'required="required" ':'';          $placeholder=isset($tag['placeholder'])?' placeholder="'.$tag['placeholder'].'" ':'';          $value     = isset($tag['value'])?$tag['value']:'';          return '<div class="layui-form-item">              <label class="layui-form-label">'.$label.'</label>              <div class="layui-input-block">                <input autocomplete="off" '.$placeholder.$required.' class="layui-input" type="text" id="'.$tag['name'].'" name="'.$tag['name'].'" value="<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        echo "'.$value.'" ?>">              </div>            </div>'. '<script>var laydate = layui.laydate;laydate.render({elem: "#'.$tag['name'].'",type: "month",range: true});</script>';      }      public function tagDatetimerange($tag, $content){          $required=isset($tag['required'])&&$tag['required']=='true'?'required="required" ':'';          $placeholder=isset($tag['placeholder'])?' placeholder="'.$tag['placeholder'].'" ':'';          $value     = isset($tag['value'])?$tag['value']:'';          return '<input autocomplete="off" '.$placeholder.$required.' class="layui-input" type="text" id="'.$tag['name'].'" name="'.$tag['name'].'" value="<?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        echo "'.$value.'" ?>">'                  . '<script>var laydate = layui.laydate;laydate.render({elem: "#'.$tag['name'].'",type: "datetime",range: true});</script>';      }      public function tagRtf($tag, $content){          $required=isset($tag['required'])&&$tag['required']=='true'?'required="required" ':'';          $placeholder=isset($tag['placeholder'])?' placeholder="'.$tag['placeholder'].'" ':'';          $value     = isset($tag['value'])?$tag['value']:'';          return '<textarea '.$placeholder.$required.' class="layui-textarea  layui-hide" id="'.$tag['name'].'" name="'.$tag['name'].'"><?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        echo "'.$value.'" ?></textarea>'                  . '<script>var edit'.$tag['name'].' = layedit.build("'.$tag['name'].'");</script>';      }      public function tagSwitch($tag, $content){          return '<div class="layui-input-block">        <input name="close" lay-skin="switch" lay-text="ON|OFF" type="checkbox"><div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>OFF</em><i></i></div>      </div>';              }      public function tagCheckbox($tag, $content){          $required=isset($tag['required'])&&$tag['required']=='true'?'required="required" ':'';          $value     = isset($tag['value'])?$tag['value']:'';          return '        <input type="checkbox" id="'.$tag['name'].'" name="'.$tag['name'].'[]" value="'.$value.'">'.$tag['title'].'&nbsp;';           }      public function tagRadio($tag, $content){          $required=isset($tag['required'])&&$tag['required']=='true'?'required="required" ':'';          $value     = isset($tag['value'])?$tag['value']:'';          $checked=isset($tag['checked'])&&$tag['checked']=='true'?'checked" ':'';          $label     = isset($tag['label'])?$tag['label']:'';          return '  <div class="layui-form-item">          <label class="layui-form-label">'.$label.'</label>          <div class="layui-input-block">            <input type="radio" name="sex" value="男" title="男">            <input type="radio" name="sex" value="女" title="女" checked>          </div>        </div>';          return '<input name="'.$tag['name'].'" value="'.$value.'" '.$checked.' type="radio">'.$tag['title'].'&nbsp;';      }      public function tagTextarea($tag, $content){          $required=isset($tag['required'])&&$tag['required']=='true'?'required="required" ':'';          $placeholder=isset($tag['placeholder'])?' placeholder="'.$tag['placeholder'].'" ':'';          $value     = isset($tag['value'])?$tag['value']:'';          return '<textarea '.$placeholder.$required.' class="layui-textarea" id="'.$tag['name'].'" name="'.$tag['name'].'"><?php 

           /**
            * 秀仙系统 shopxian_release/3.0.0
            * ============================================================================
            * * 版权所有 2017-2018 上海秀仙网络科技有限公司，并保留所有权利。
            * 网站地址: http://www.shopxian.com；
            * ----------------------------------------------------------------------------
            * 本软件只能免费使用  不允许对程序代码以任何形式任何目的再发布或者出售。
            * ============================================================================
            * 作者: 张启全 

            * 时间: 2018-03-11 16:08:28
            */
        echo "'.$value.'" ?></textarea>';      }  }  