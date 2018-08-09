<?php
    if (!defined('THINK_PATH')) exit();
    $array=array(    	
        'LOAD_EXT_CONFIG'	=>'db,auth,wechat,ldap',
		'VAR_PAGE'	=>'p',
		'TMPL_EXCEPTION_FILE'=>APP_PATH.'/Tpl/Public/error.html',
		'TMPL_NO_HAVE_AUTH'=>APP_PATH.'/Tpl/Public/no_have_auth.html',	
		'TMPL_CACHE_ON' => false,
		'TOKEN_ON'=>false, 
		'URL_CASE_INSENSITIVE' =>   true,
		'TMPL_STRIP_SPACE'=>false,
		'URL_HTML_SUFFIX' => '',
		'DB_FIELDS_CACHE'=>false,
        'SESSION_AUTO_START'=>true,
        'USER_AUTH_KEY'	=>'auth_id',	// 用户认证SESSION标记
        'ADMIN_AUTH_KEY'			=>'administrator',        
        'USER_AUTH_GATEWAY'=>'login/index',// 默认认证网关
        'DB_LIKE_FIELDS'            =>'content|remark',
		'SAVE_PATH'=>"Data/Files/",
        'SHOW_PAGE_TRACE'=>0, //显示调试信息
        'ADMIN_MAIL_ACCOUNT'=>array('smtpsvr'=>'smtp.qq.com','email'=>'smeoa@qq.com','mail_id'=>'smeoa@qq.com','mail_pwd'=>'xxxxx','mail_name'=>'OA')
    );
    return $array;
?>