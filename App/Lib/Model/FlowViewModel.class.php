<?php
/*---------------------------------------------------------------------------
  OA系统 - 让工作更轻松快乐 

  Copyright (c) 2013 http://www.smeoa.com All rights reserved.                                             

  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

  Author:  jinzhu.yin<smeoa@qq.com>                         

  Support: https://git.oschina.net/smeoa/smeoa               
 -------------------------------------------------------------------------*/

class FlowViewModel extends ViewModel {
	public $viewFields=array(
		'Flow'=>array('*'),
		'FlowType'=>array('name'=>'type_name','_on'=>'FlowType.id=Flow.type')
		);
}
?>