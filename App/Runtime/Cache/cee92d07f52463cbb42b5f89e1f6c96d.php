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
									
<div class="page-header clearfix">
	<div class="dropdown col-sm-8">
		<span class="title">全部</span>
		<b class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-caret-down"></span></b>
		<ul class="dropdown-menu">
			<li gid="">
				<a>全部</a>
			</li>
			<?php if(is_array($tag_list)): foreach($tag_list as $key=>$vo): ?><li gid="<?php echo ($key); ?>">
					<a><?php echo ($vo); ?></a>
				</li><?php endforeach; endif; ?>
		</ul>
	</div>
	<div class="col-sm-4 pull-right">
		<div class="search_box">
			<div class="input-group ">
				<input type="hidden" value="abc" >
				<input  class="form-control" type="text"  name="keyword" id="keyword" onkeydown="key_local_search();"/>
				<div class="input-group-btn">
					<a class="btn btn-sm btn-info" onclick="btn_local_search();"><i class="fa fa-search" ></i> </a>
				</div>
			</div>
		</div>
	</div>
</div>

<form id="form_data" name="form_data" method='post'>
	<div class="operate panel panel-default">
		<div class="panel-body">
			<div class="pull-left">
				<div class="btn-group">
					<a class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" href="#"> 管理 <b class="fa fa-caret-down"></b></a>
					<ul class="dropdown-menu">
						<li>
							<a onclick="manage_tag();">管理组</a>
						</li>
						<li>
							<a onclick="import_contact();">导入</a>
						</li>
						<li>
							<a onclick="export_contact();">导出</a>
						</li>
					</ul>
				</div>
				<a class="btn btn-sm btn-danger" onclick="del();" >删除</a>
				<div class="btn-group">
					<a class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" href="#"> 组 <span class="fa fa-caret-down"></span> </a>
					<ul class="dropdown-menu tag_list">
						<li class="dropdown-header">
							添加到
						</li>
						<?php if(is_array($tag_list)): foreach($tag_list as $key=>$vo): ?><li>
								<label class="clearfix">
									<input class="ace" type="checkbox" name="tag[]" value="<?php echo ($key); ?>"/>
									<span class="lbl"></span><span class="text"><?php echo ($vo); ?></span></label>
							</li><?php endforeach; endif; ?>
						<li class="new_tag">
							<input type="text" name="new_tag" class="col-20">
						</li>
						<li class="divider"></li>
						<li class="apply">
							<input class="btn btn-sm btn-primary" type="button" value="应用" onclick="apply();">
						</li>
						<li class="cmd">
							<input class="btn btn-sm btn-primary" type="button" onclick="create_new_tag();" value="新组">
						</li>
					</ul>
				</div>
			</div>
			<div class="pull-right">
				<a class="btn btn-sm btn-primary" onclick="add();">新建</a>
			</div>
		</div>
	</div>
	<div class="ul_table border-top border-bottom">
		<?php if(empty($list)): ?><ul>
				<li class="no-data">
					没找到数据
				</li>
			</ul>
			<?php else: ?>
			<ul class="col-xs-12 border">
				<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li class="tbody">
						<div class="row">
							<div class="data" style="display:none">
								<?php echo ($vo["letter"]); ?>
							</div>
							<div class="tag" style="display:none">
								<?php echo($tag_data[$vo["id"]]) ?>
							</div>
							<div class="col-sm-6 col-xs-12">
								<label class="inline pull-left col-3">
									<input class="ace" type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>"/>
									<span class="lbl"></span></label>
								<a href="<?php echo U('edit','id='.$vo['id']);?>" class="data wrap"> <?php echo ($vo["name"]); ?>&nbsp;
								<?php if(!empty($vo["dept"])): ?>/ <?php echo ($vo["dept"]); ?>&nbsp;<?php endif; ?>
								<?php if(!empty($vo["position"])): ?>/ <?php echo ($vo["position"]); endif; ?> </a>
							</div>
							<div class="col-sm-6 col-xs-12" >
								<nobr style="padding-left:30px;">
									公司：
								</nobr>
								<nobr class="data">
									<?php echo ($vo["company"]); ?>
								</nobr>
							</div>
						</div>
						<div class="row">
							<div  class="col-sm-6 col-xs-12" >
								<nobr style="padding-left:30px;">
									邮箱：
								</nobr>
								<nobr class="data">
									<?php echo ($vo["email"]); ?>
								</nobr>
							</div>
							<div  class="col-sm-6 col-xs-12">
								<nobr style="padding-left:30px;">
									电话：
								</nobr>
								<nobr class="data">
									<?php echo ($vo["office_tel"]); ?>
									<?php if(!empty($vo["mobile_tel"])): ?>/ <?php echo ($vo["mobile_tel"]); endif; ?>
								</nobr>
							</div>
						</div>
					</li><?php endforeach; endif; ?>
			</ul><?php endif; ?>
	</div>
</form>

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
		window.open("<?php echo U('add');?>", "_self");
		return false;
	}

	function edit() {
		id = $("li.tbody.selected :checkbox").val();
		if (id == undefined) {
			ui_error("请选择要编辑的联系人");
			return false;
		} else {
			window.open(fix_url("<?php echo U('edit');?>?id=" + id), "_self");
		}
	}

	function del() {
		id = $("li.tbody.selected :checkbox").val();
		if (id == undefined) {
			ui_error("请选择要删除的数据");
			return false;
		}
		ui_confirm('确定要删除吗?',function(){
			if ($("#form_data .ul_table input:checked").length == 0) {
				$("li.tbody.active :checkbox").attr("checked", true);
			}
			sendForm("form_data", "<?php echo U('del');?>");
			$("#form_data input:checked").each(function() {
				$(this).parents("li").remove();
			});
		});
	}

	function apply() {
		if ($("#form_data .ul_table input:checked").length == 0) {
			ui_error("请选择数据");
			return false;
		}
		sendForm("form_data", "<?php echo U('set_tag');?>", "__URL__");
	}

	function create_new_tag() {
		$(".cmd").hide();
		$(".new_tag").css("display", "block");
		$(".apply").show();
	}

	function key_local_search() {
		if (event.keyCode == 13) {
			$(".ul_table li").hide();
			val = $("#keyword").val().toUpperCase();
			if (val.length == 0) {
				$(".page-header .title").html("全部");
			} else {
				$(".page-header .title").html("搜索结果");
			}
			$(".ul_table li .data").each(function() {
				if ($(this).text().indexOf(val) >= 0) {
					$(this).parents("li").show();
				};
			});
		}
	}

	function btn_local_search() {
		$(".ul_table li").hide();
		val = $("#keyword").val().toUpperCase();
		if (val.length == 0) {
			$(".title nobr").html("全部");
		} else {
			$(".title nobr").html("搜索结果");
		}
		$(".ul_table li .data").each(function() {
			if ($(this).text().indexOf(val) >= 0) {
				$(this).parents("li").show();
			};
		});
		return false;
	}

	function export_contact() {
		window.open("<?php echo U('export');?>", "_blank");
		return false;
	}

	function import_contact() {
		window.open("<?php echo U('import');?>", "_self");
		return false;
	}

	function manage_tag() {
		window.open("<?php echo U('tag_manage');?>", "_self");
		return false;
	}


	$(document).ready(function() {
		set_return_url();

		$(".page-header .dropdown-menu li").click(function() {
			$("#keyword").val("");
			$(".ul_table li").hide();
			gid = $(this).attr("gid");
			$(".page-header .title").html($(this).text());
			$(".ul_table li div.tag").each(function() {
				if ($(this).text().indexOf(gid) >= 0) {
					$(this).parents("li").show();
				};
			});
		});

		$('.tag_list li').click(function(event) {
			event.stopPropagation();
		});
		
		$("li.tbody").click(function(){
			$(".table input:checkbox").attr("checked", false);
			$(".tag_list input[name='tag[]']").attr("checked", false);
			str=trim($(this).find(".tag").text());
			
			strs=str.split(","); 
			for (i=0;i<strs.length;i++)    
			 {  
				 $(".tag_list input[name='tag[]'][value='"+strs[i]+"']").prop("checked",true);
			}
		});
		
		$('.tag_list input').on('change', function(event) {
			if (($('.tag_list input:checked').length == 0) && ($(".tag_list input[name='new_tag']").val() == "")) {
				$(".cmd").show();
				$(".apply").hide();
			} else {
				$(".cmd").hide();
				$(".apply").show();
			}
		});
	}); 
</script>
<!-- inline scripts related to this page -->
</body>
</html>