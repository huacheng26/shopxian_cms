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

            * 时间: 2018-03-11 16:08:53
            */
           return [      'Stru'=>          [          'menus_id'=>[              'type'=>'int',              'length'=>'10',              'default'=>null,              'unsigned'=>'true',              'not_null'=>'true',              'comment'=>'菜单id',              'zerofill'=>'true',              'auto_increment'=>true,              'label'=>'菜单id',              'in_list' => true,              'input_type'=>'hidden',          ],          'name'=>[              'type'=>'varchar',              'length'=>'60',              'default'=>'',              'charset'=>'utf8_unicode_ci',              'label'=>'菜单名称',              'comment'=>'菜单名称',              'input_type'=>'text',          ],              'parent_id'=>[              'type'=>'varchar',              'length'=>'60',              'default'=>'0',              'not_null'=>'true',              'charset'=>'utf8_unicode_ci',              'attribute'=>'',              'label'=>'父级id',              'comment'=>'父级id',              'input_type'=>'text',          ],          'app'=>[              'type'=>'varchar',              'length'=>'60',              'charset'=>'utf8_unicode_ci',              'label'=>'所属app',              'comment'=>'所属app',              'input_type'=>'text',          ],          'controller'=>[              'type'=>'varchar',              'length'=>'60',              'charset'=>'utf8_unicode_ci',              'attribute'=>'',              'label'=>'所属控制器',              'comment'=>'所属控制器',              'input_type'=>'text',          ],          'method'=>[              'type'=>'varchar',              'length'=>'60',              'charset'=>'utf8_unicode_ci',              'attribute'=>'',              'label'=>'所属方法',              'comment'=>'所属方法',              'input_type'=>'text',          ],          'arg'=>[              'type'=>'varchar',              'length'=>'255',              'charset'=>'utf8_unicode_ci',              'attribute'=>'',              'label'=>'方法参数',              'comment'=>'方法参数',              'input_type'=>'text',          ],          'rank'=>[              'type'=>'int',              'length'=>'11',              'default'=>'50',              'charset'=>'utf8_unicode_ci',              'label'=>'排序值',              'comment'=>'排序值',              'input_type'=>'text',          ],          'display'=>[              'type'=>'TINYINT',              'length'=>'1',              'default'=>'1',             'not_null'=>'true',              'charset'=>'utf8_unicode_ci',              'attribute'=>'',              'label'=>'显示状态',              'in_list' => true,              'comment'=>'显示状态',              'input_type'=>'text',          ],              'enabled'=>[              'type'=>'TINYINT',              'length'=>'1',              'default'=>'1',             'not_null'=>'true',              'charset'=>'utf8_unicode_ci',              'attribute'=>'',              'label'=>'启用状态',              'in_list' => true,              'comment'=>'启用状态',              'input_type'=>'text',          ],      ],       'Charset'=>'utf8',      'Collate'=>'utf8_unicode_ci',      'Engine'=>'InnoDB',      'Annotation'=>'',      'primary'=>[          'menus_id',      ],    ];