<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8" />
	<title><?php echo (($title)?($title):"smeoa"); ?></title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- basic styles -->
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css"  />
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css" />

	<!--[if IE 7]>
	<link rel="stylesheet" href="__PUBLIC__/css/font-awesome-ie7.min.css" />
	<![endif]-->

	<!-- page specific plugin styles -->
	<link rel="stylesheet" href="__PUBLIC__/css/jquery-ui-1.10.3.full.min.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/jquery.gritter.css" />
<?php if(!empty($widget["jquery-ui"])): ?><link rel="stylesheet" href="__PUBLIC__/css/jquery-ui-1.10.3.full.min.css" /><?php endif; ?>
<?php if(!empty($widget["date"])): ?><link rel="stylesheet" href="__PUBLIC__/css/datepicker.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-datetimepicker.css" /><?php endif; ?>


	<!-- fonts -->
	<!-- ace styles -->

	<link rel="stylesheet" href="__PUBLIC__/css/uncompressed/ace.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/uncompressed/ace-rtl.css" />
	<link rel="stylesheet" href="__PUBLIC__/css/uncompressed/ace-skins.css" />

	<!--[if lte IE 8]>
	<link rel="stylesheet" href="__PUBLIC__/css/uncompressed/ace-ie.css" />
	<![endif]-->

	<!-- inline styles related to this page -->
	<link rel="stylesheet" href="__PUBLIC__/css/style.css" />
	<!-- ace settings handler -->

	<script src="__PUBLIC__/js/ace-extra.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>
	<script src="__PUBLIC__/js/html5shiv.js"></script>
	<script src="__PUBLIC__/js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
	var upload_url = "<?php echo U('upload');?>";
	var del_url = "<?php echo U('del_file');?>";
	var _hmt = _hmt || [];
	var app_path = "__ROOT__";
	(function() {
		var hm = document.createElement("script");
		hm.src = "//hm.baidu.com/hm.js?2a935166b0c9b73fef3c8bae58b95fe4";
		var s = document.getElementsByTagName("script")[0];
		s.parentNode.insertBefore(hm, s);
	})();
</script>

</head>
<body>
	<div class="shade"></div>
	<nav class="navbar navbar-default " role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-6">
			<span class="sr-only">Toggle navigation</span>
			<i class="fa fa-bars fa-lg"></i>
      </button>
		  <div class="hidden-xs">&nbsp;</div>
          <a href="<?php echo U('home/index');?>" class="navbar-brand"><i class="fa fa-leaf"></i><?php echo get_system_config("SYSTEM_NAME");?></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-6">
          <ul class="nav navbar-nav navbar-right">
				<?php if(is_array($top_menu)): foreach($top_menu as $key=>$top_menu_vo): ?><a class="btn btn-app app-nav btn-xs nav-app"  href="#" url="<?php echo U($top_menu_vo['url']);?>" node="<?php echo ($top_menu_vo["id"]); ?>" onclick="click_top_menu(this)" >
					<i class="<?php echo ($top_menu_vo["icon"]); ?> bigger-100"></i><?php echo ($top_menu_vo["name"]); ?>
					<?php $bc_class=""; $module_count=0; $icon_class=$top_menu_vo['icon']; if(strpos($icon_class,"bc-")!==false){ $bc_class=get_bc_class($icon_class); $module_count=array_sum($new_count[$bc_class]); if($module_count>99){ $module_count="99+"; } if($module_count==0){ $module_count=null; } } ?>
						<?php if(!empty($module_count)): ?><span class="badge badge-pink"><?php echo ($module_count); ?></span><?php endif; ?>					
				</a>&nbsp;&nbsp;<?php endforeach; endif; ?><a class="btn btn-app btn-xs btn-danger" style="margin-top:15px;margin-bottom:20px;margin-left:7px;margin-right:10px;" href="<?php echo U('login/logout');?>" ><i class="fa fa-sign-out bigger-100"></i>退出</a>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
		<div class="main-container" id="main-container">
			<div class="main-container-inner">
				<div class="sidebar" id="sidebar">	
					<div id="user_info" class="text-center hidden-xs"  >
						<span >当前用户：<?php echo (session('user_name')); ?></span>
					</div>
					<div id="nav_head" class="text-center"  onclick="toggle_left_menu()">
						<span class="menu-text"><?php echo ($top_menu_name); ?></span>
						<b id="left_menu_icon" class="fa fa-angle-down pull-right"></b>
					</div>
					<?php echo W('Nav',array('tree'=>$left_menu,'new_count'=>$new_count));?>
				</div>
				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="fa fa-home home-icon"></i>
								<a href="/">Home</a>
							</li>

							<li>
								<?php echo ($top_menu_name); ?>
							</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content  <?php echo (MODULE_NAME); ?>">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									
<input type="hidden" name="ajax" id="ajax" value="1">
<select name="dept_list" id="dept_list" class="display-none">
	<?php echo fill_option($dept_list);?>
</select>
<?php echo W('PageHeader',array('name'=>'用户管理','search'=>'S'));?>
<form method="post" id="form_adv_search" name="form_adv_search" method="post">
<input type="hidden" name="ajax" id="ajax" value="1">
	<div class="operate panel panel-default">
		<div class="panel-body">
			<div class="pull-left">
				<label  for="eq_is_del"><b>状态:</b></label>
				<select id="eq_is_del" name="eq_is_del" class="col-10" onchange="submit_adv_search();">
					<option value="0">启用</option>
					<option value="1">禁用</option>
					<option value="2">其他</option>
				</select>
			</div>
			<div class="pull-right">
				<a onclick="reset_pwd()" class="btn btn-sm btn-primary">设置密码</a>
				<a onclick="add()"  class="btn btn-sm btn-primary">新增</a>
				<a onclick="save()"  class="btn btn-sm btn-primary">保存</a>
			|
			<a onclick="del()"  class="btn btn-sm btn-danger">删除</a>
			</div>
		</div>
	</div>
</form>
<div class="row">
	<div class="col-sm-4 sub_left_menu ">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>员工编号</th>
					<th>姓名</th>
					<th>状态</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr id="<?php echo ($data["id"]); ?>">
						<td><?php echo ($data["emp_no"]); ?></td>
						<td><?php echo ($data["name"]); ?></td>
						<td><?php echo (status($data["is_del"])); ?></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</div>
	<div class="col-sm-8">
		<form id="form_data" name="form_data" method="post" class="form-horizontal">
			<input type="hidden" id="save_name" name="save_name">
			<input type="hidden" name="id" id="id">
			<input type="hidden" name="pic" id="pic" >
			<input type="hidden" name="opmode" id="opmode" value="edit">
			<table class="table table-bordered" >
				<tr>
					<th>
					<nobr>
						员工编号*
					</nobr></th>
					<td colspan="2">
					<input class="form-control" type="text" id="emp_no" name="emp_no"  check="require" msg="请输入员工编号">
					</td>
					<td rowspan="4"><img class="img-thumbnail col-12" id="emp_pic" ></td>
				</tr>
				<tr>
					<th>姓名*</th>
					<td colspan="2">
					<input  class="form-control" type="text" id="name" name="name" class="input-sm" check="require" msg="请输入姓名">
					</td>
				</tr>
				<tr>
					<th>性别</th>
					<td colspan="2">
					<select name="sex" id="sex" class="form-control col-10">
						<option  value="male">男</option>
						<option value="female">女</option>
					</select></td>
				</tr>
				<tr>
					<th>生日</th>
					<td colspan="2">
					<input data-date-format="yyyy-mm-dd" type="text" id="birthday" name="birthday" readonly="readonly" class="input-date form-control">
					</td>
				</tr>
				<tr>
					<th>部门*</th>
					<td colspan="2">
					<div class="input-group ">
						<input class="form-control" name="dept_name"  id="dept_name" type="text" msg="请选择部门" check="require" readonly="readonly" />
						<input name="dept_id" id="dept_id" type="hidden" msg="请选择部门" check="require" />
						<div class="input-group-btn">
							<a class="btn btn-sm btn-primary" onclick="select_dept();" > <i class="fa fa-search" ></i> </a>
						</div>
					</div></td>
					<td colspan="2"><a onclick="select_avatar();" class="btn btn-sm btn-primary">上传头像</a></td>
				</tr>
				<tr>
					<th>职级*</th>
					<td>
					<select name="rank_id" id="rank_id" class="form-control" msg="请选择职级" check="require">
						<option value="">选择职级</option>
						<?php echo fill_option($rank_list);?>
					</select></td>
					<th>职位*</th>
					<td>
					<select name="position_id" id="position_id" class="form-control" msg="请选择职位" check="require">
						<option value="">选择职位</option>
						<?php echo fill_option($position_list);?>
					</select></td>
				</tr>
				<tr>
					<th>
					<nobr>
						办公室电话
					</nobr></th>
					<td>
					<input type="text" id="office_tel" name="office_tel" class="form-control">
					</td>
					<th>
					<nobr>
						移动电话
					</nobr></th>
					<td>
					<input type="text" id="mobile_tel" name="mobile_tel" class="form-control">
					</td>
				</tr>
				<tr>
				<tr>
					<th>电子邮箱</th>
					<td colspan="3">
					<input type="text" id="email" name="email" class="form-control">
					</td>
				</tr>
				<tr>
					<th>
					<nobr>
						负责业务
					</nobr></th>
					<td colspan="3">
					<input type="text" id="duty" name="duty" class="form-control">
					</td>
				</tr>
				<tr>
					<th>状态</th>
					<td colspan="3">
					<select class="form-control col-10"  name="is_del" id="is_del">
						<option  value="0">启用</option>
						<option value="1">禁用</option>
					</select></td>
				</tr>
			</table>
		</form>

	</div>
	<div class="pagination">
		<?php echo ($page); ?>
	</div>
</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse hidden-print">
				<i class="fa fa-double-angle-up fa-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
	<div id="push_msg"></div>
	<iframe src="<?php echo U('push/client2');?>" class="push" id="push"></iframe>
	<!-- basic scripts -->

	<!--[if !IE]>
	-->
	<script type="text/javascript">
			window.jQuery || document.write("<script src='__PUBLIC__/js/jquery-2.1.0.min.js'>" + "<" + "/script>");</script>
<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
		window.jQuery || document.write("<script src='__PUBLIC__/js/jquery-1.11.0.min.js'>"+"<"+"/script>");</script>
<![endif]-->
<script type="text/javascript">
			if ("ontouchend" in document)
				document.write("<script src='__PUBLIC__/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");</script>
<script src="__PUBLIC__/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/typeahead-bs2.min.js"></script>
<script src="__PUBLIC__/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="__PUBLIC__/js/jquery.ui.touch-punch.min.js"></script>
<script src="__PUBLIC__/js/jquery.slimscroll.min.js"></script>

<?php if(!empty($widget["jquery-ui"])): ?><script src="__PUBLIC__/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="__PUBLIC__/js/jquery.ui.touch-punch.min.js"></script><?php endif; ?>

<?php if(!empty($widget["date"])): ?><script src="__PUBLIC__/js/date-time/bootstrap-datepicker.js"></script>
	<script src="__PUBLIC__/js/date-time/locales/bootstrap-datepicker.zh-CN.js"></script>
	<script src="__PUBLIC__/js/date-time/bootstrap-datetimepicker.js"></script>
	<script src="__PUBLIC__/js/date-time/locales/bootstrap-datetimepicker.zh-CN.js"></script><?php endif; ?>

<?php if(!empty($widget["uploader"])): ?><script type="text/javascript" src="__PUBLIC__/plupload/plupload.full.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/plupload/plupload.setting.js"></script><?php endif; ?>

<?php if(!empty($widget["editor"])): ?><script type="text/javascript" src="__PUBLIC__/editor/kindeditor.js"></script>
	<script type="text/javascript" src="__PUBLIC__/editor/lang/zh_CN.js"></script>
	<script type="text/javascript" src="__PUBLIC__/editor/kindeditor.setting.js"></script><?php endif; ?>
<script src="__PUBLIC__/js/jquery.gritter.min.js"></script>
<script src="__PUBLIC__/js/bootbox.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		<?php if(!empty($widget["date"])): ?>$('.input-date').datepicker({
			language : "zh-CN",
			autoclose : true
		});
		$(".input-daterange").datepicker({
			format : "yyyy-mm-dd",
			language : "zh-CN",
			keyboardNavigation : false,
			forceParse : false,
			autoclose : true,
		});
		$(".input-date-time").datetimepicker({
			format : "yyyy-mm-dd hh:ii",
			language : "zh-CN",
			weekStart : 1,
			todayBtn : 1,
			autoclose : 1,
			todayHighlight : 1,
			startView : 2,
			forceParse : 0,
			showMeridian : 1,
			minuteStep:10
		});<?php endif; ?>

		<?php if(!empty($widget["editor"])): ?>editor_init();<?php endif; ?>
	}); 
</script>

<!-- ace scripts -->
<script src="__PUBLIC__/js/ace-elements.min.js"></script>
<script src="__PUBLIC__/js/uncompressed/ace.js"></script>
<script src="__PUBLIC__/js/common.js"></script>
<script type="text/javascript">
	function add() {
		$("#opmode").val("add");
		$("#id").val("");
		if (check_form("form_data")){
			sendForm("form_data", "<?php echo U('save');?>", "__SELF__");
		}
	};

	function del() {
		var vars = $("#form_data").serialize();
		ui_confirm('确定要删除吗?',function(){
			sendAjax("<?php echo U('del');?>", vars, function(data) {
				if (data.status) {
					ui_alert(data.info,function(){
						location.reload();
					});									
				}
			});
		});
	}

	function reset_pwd() {
		if ($("#id").val().length < 1) {
			ui_error("请选择用户");
			return false;
		}
		winopen("<?php echo U('password');?>?id=" + $("#id").val(), 730, 300);
	}

	function select_dept() {
		winopen("<?php echo U('dept/winpop2');?>", 730, 500);
	}

	function select_avatar() {
		winopen("<?php echo U('popup/avatar');?>?id=" + $("#id").val(), 730, 500);
	}

	function btn_search() {
		sendForm("form_search", "__SELF__");
		$("#form_search").submit();
	}

	function key_search() {
		if (event.keyCode == 13) {
			sendForm("form_search", "__SELF__");
			return false;
		}
	}

	function save(){
		if (check_form("form_data")) {
			sendForm("form_data", "<?php echo U('save');?>");
		}
	}

	function showdata(result) {
		$("#form_data select ").each(function() {
			$(this).find('option:first').attr('selected', 'selected');
		});
		for (var s in result.data) {
			set_val(s, result.data[s]);
		}
		$("#dept_name").val($("#dept_list option[value='" + $("#dept_id").val() + "']").text());
		img_url = "<?php echo get_save_url();?>" + $("#pic").val()+"?t="+Math.random();
		$("#emp_pic").attr("src", img_url);
		$("#save_name").val("");
		$("#opmode").val("edit");
	}

	$(document).ready(function(){
		set_return_url();
		set_val('eq_is_del', "<?php echo ($eq_is_del); ?>");
		$(".sub_left_menu tbody tr").click(function() {
			$(".sub_left_menu tbody tr.active").removeClass("active");
			$(this).attr("class", "active");
			sendAjax("<?php echo U('read');?>", "id=" + $(this).attr("id"), function(data) {
				showdata(data);
			});
			return false;
		});
	});

</script>
<!-- inline scripts related to this page -->
</body>
</html>