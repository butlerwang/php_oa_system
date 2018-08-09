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
									
<input type="hidden" name="ajax" id="ajax" value="0">
<?php echo W('PageHeader',array('name'=>$folder_name,'search'=>'N'));?>
<div class="operate panel panel-default">
	<div class="panel-body">
		<div class="pull-right">
			<a onclick="add()" class="btn btn-sm btn-primary">新增</a>
			<a onclick="save()" class="btn btn-sm btn-primary">保存</a>
			|
			<a onclick="del()" class="btn btn-sm btn-danger">删除</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-4 sub_left_menu ">
		<div class="well">
			<?php echo $menu ?>
		</div>
	</div>
	<div class="col-sm-8">
		<form id="form_data" name="form_data" method="post" class="well form-horizontal clearfix">
			<input type="hidden" name="id" id="id" >
			<input type="hidden" name="opmode" id="opmode" value="">
			<input type="hidden" name="admin" id="admin">
			<input type="hidden" name="write" id="write">
			<input type="hidden" name="read" id="read">
			<select name="folder_list" id="folder_list" class="display-none">
				<option value="0">根节点</option>
				<?php echo fill_option($folder_list);?>
			</select>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="name">名称*：</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" id="name" name="name" check="require" msg="请输入名称">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="folder_name">父节点*：</label>
				<div class="col-sm-9">
					<div class="input-group">

						<input class="form-control" type="text" id="folder_name" name="folder_name" readonly="readonly" check="require" msg="请选择父节点">
						<input type="hidden" name="pid" id="pid" value="0" check="require" msg="请选择父节点">
						<span class="input-group-btn">
							<button class="btn btn-sm btn-primary" onclick="select_pid()" type="button">
								选择
							</button> </span>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="folder_name">管理：</label>
				<div class="col-sm-9">
					<div id="admin_list" class="inputbox">
						<a class="pull-right btn btn-link text-center" onclick="select_auth();"> <i class="fa fa-user"></i> </a>
						<div class="wrap" >
							<span class="address_list"></span>
							<span class="text" >
								<input class="letter" type="text"  >
							</span>
						</div>
						<div class="search dropdown ">
							<ul class="dropdown-menu"></ul>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="folder_name">写入 / 修改：</label>
				<div class="col-sm-9">
					<div id="write_list" class="inputbox">
						<a class="pull-right btn btn-link text-center" onclick="select_auth();"> <i class="fa fa-user"></i> </a>
						<div class="wrap" >
							<span class="address_list"></span>
							<span class="text" >
								<input class="letter" type="text"  >
							</span>
						</div>
						<div class="search dropdown ">
							<ul class="dropdown-menu"></ul>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="folder_name">读取：</label>
				<div class="col-sm-9">
					<div id="read_list" class="inputbox">
						<a class="pull-right btn btn-link text-center" onclick="select_auth();"> <i class="fa fa-user"></i> </a>
						<div class="wrap" >
							<span class="address_list"></span>
							<span class="text" >
								<input class="letter" type="text"  >
							</span>
						</div>
						<div class="search dropdown ">
							<ul class="dropdown-menu"></ul>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="sort">排序：</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" id="sort" name="sort" >
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="sort">状态：</label>
				<div class="col-sm-9">
					<select class="form-control"  name="is_del" id="is_del">
						<option  value="0">启用</option>
						<option value="1">禁用</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label" for="remark" >备注：</label>
				<div class="col-sm-9" >
					<textarea class="form-control" name="remark" rows="5" class="col-xs-12" ></textarea>
				</div>
			</div>
		</form>
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
		$("#admin").val("");
		$("#admin_list span.address_list span").each(function(){			
			$("#admin").val($("#admin").val() + $(this).text().replace(';', '') + '|' + $(this).attr("data") + ";");
		});

		$("#write").val("");
		$("#write_list span.address_list span").each(function() {
			$("#write").val($("#write").val() + $(this).text().replace(';', '') + '|' + $(this).attr("data") + ";");
		});

		$("#read").val("");
		$("#read_list span.address_list span").each(function() {
			$("#read").val($("#read").val() + $(this).text().replace(';', '') + '|' + $(this).attr("data") + ";");
		});
		if (check_form("form_data")){
			sendForm("form_data", "<?php echo U('save');?>","<?php echo U('index');?>");
		};
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

	function save(){
		if ($("#opmode").val() == "") {
			ui_error("请选择要保存的数据");
			return false;
		}
		$("#admin").val("");
		$("#admin_list span.address_list span").each(function() {
			$("#admin").val($("#admin").val() + $(this).text().replace(';', '') + '|' + $(this).attr("data") + ";");
		});

		$("#write").val("");
		$("#write_list span.address_list span").each(function() {
			$("#write").val($("#write").val() + $(this).text().replace(';', '') + '|' + $(this).attr("data") + ";");
		});

		$("#read").val("");
		$("#read_list span.address_list span").each(function() {
			$("#read").val($("#read").val() + $(this).text().replace(';', '') + '|' + $(this).attr("data") + ";");
		});
		
		if (check_form("form_data")) {
			sendForm("form_data","<?php echo U('save');?>");
		}
	};

	function showdata(result) {
		for (var s in result.data) {
			set_val(s, result.data[s]);
		}
		$("#admin_list span.address_list").html(contact_conv($("#admin").val()));
		$("#write_list span.address_list").html(contact_conv($("#write").val()));
		$("#read_list span.address_list").html(contact_conv($("#read").val()));
		$("#folder_name").val($("#folder_list option[value='" + $("#pid").val() + "']").text());
		$("#opmode").val("edit");
	}

	function popup_auth() {
		winopen("<?php echo U('popup/auth');?>", 730, 574);
	}

	function select_auth() {
		winopen("<?php echo U('popup/auth');?>", 730, 574);
	}

	function select_pid() {
		winopen("<?php echo U('winpop');?>", 730, 400);
	}

	$(document).ready(function() {
		set_return_url();

		$(document).on("click", ".inputbox .address_list a.del", function() {
			$(this).parent().parent().remove();
		});

		$(".sub_left_menu .tree_menu  a").click(function() {
			$(".sub_left_menu .tree_menu  a").attr("class", "");
			$(this).attr("class", "active");
			sendAjax("<?php echo U('read');?>", "id=" + $(this).attr("node"), function(data) {
				showdata(data);
			});
			return false;
		});
		// 双击添加到收件人 因后添加的数据 所以需要用live函数
		$(".address_list span").on("dblclick", function() {
			$(this).remove();
		});
	}); 
</script>
<!-- inline scripts related to this page -->
</body>
</html>