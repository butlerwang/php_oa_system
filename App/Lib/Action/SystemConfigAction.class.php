<?php
/*---------------------------------------------------------------------------
  OA系统 - 让工作更轻松快乐 

  Copyright (c) 2013 http://www.smeoa.com All rights reserved.                                             

  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

  Author:  jinzhu.yin<smeoa@qq.com>                         

  Support: https://git.oschina.net/smeoa/smeoa               
 -------------------------------------------------------------------------*/


class SystemConfigAction extends CommonAction {
	//过滤查询字段
	protected $config=array('app_type'=>'master');
	
	function _search_filter(&$map) {
		if (!empty($_POST['keyword'])) {
			$map['val|name|code'] = array('like', "%" . $_POST['keyword'] . "%");
		}
	}
	
	function del(){
		$id=$_POST['id'];
		$this->_destory($id);		
	}
}
?>