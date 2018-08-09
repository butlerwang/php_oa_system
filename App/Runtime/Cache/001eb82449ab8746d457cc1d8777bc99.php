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
									
<?php echo W('PageHeader',array('name'=>$folder_name,'search'=>'M'));?>
<form method="post" name="form_adv_search" id="form_adv_search">
	<div class="adv_search panel panel-default  display-none"  id="adv_search">
		<div class="panel-heading">
			<div class="row">
				<h4 class="col-xs-6">高级搜索</h4>
				<div class="col-xs-6 text-right">
					<a  class="btn btn-sm btn-info" onclick="submit_adv_search();">搜索</a>
					<a  class="btn btn-sm " onclick="close_adv_search();">关闭</a>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="li_name">标题：</label>
				<div class="col-sm-8">
					<input  class="form-control" type="text" id="li_name" name="li_name" >
				</div>
			</div>

			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="li_content">内容：</label>
				<div class="col-sm-8">
					<input  class="form-control" type="text" id="li_content" name="li_content" >
				</div>
			</div>

			<?php if(in_array(($folder), explode(',',"darftbox,outbox"))): ?><div class="form-group col-sm-6">
					<label class="col-sm-4 control-label" for="li_to">收件人：</label>
					<div class="col-sm-8">
						<input  class="form-control" type="text" id="li_to" name="li_to" >
					</div>
				</div>
				<?php else: ?>
				<div class="form-group col-sm-6">
					<label class="col-sm-4 control-label" for="li_from">发件人：</label>
					<div class="col-sm-8">
						<input  class="form-control" type="text" id="li_from" name="li_from" >
					</div>
				</div><?php endif; ?>

			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="be_create_time">时间：</label>
				<div class="col-sm-8">
					<div class="input-daterange input-group" >
					    <input type="text" class="input-sm form-control text-center" name="be_create_time" />
						<span class="input-group-addon">-</span>
						<input type="text" class="input-sm form-control text-center" name="en_create_time" />
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<div class="operate panel panel-default">
	<div class="panel-body">
		<div class="pull-left">
			<a onclick="mark('del');" class="btn btn-sm btn-warning">删除</a>
			<a onclick="mark('del_forever');" class="btn btn-sm btn-danger">彻底删除</a>
			<a onclick="forword();" class="btn btn-sm btn-primary">转发</a>
			<a onclick="mark('spam');" class="btn btn-sm btn-primary">举报</a>
			<div class="btn-group">
				<a class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" href="#"> 标记为 <span class="fa fa-caret-down"></span> </a>
				<ul class="dropdown-menu">
					<li onclick="mark('readed');">
						<a>已读</a>
					</li>
					<li onclick="mark('unread');">
						<a>未读</a>
					</li>
				</ul>
			</div>
			<div class="btn-group" id="move_to">
				<a class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" href="#"> 转移到 <span class="fa fa-caret-down"></span> </a>
				<ul class="dropdown-menu">
					<?php echo ($folder_list); ?>
				</ul>
			</div>
		</div>
		<div class="pull-right">
			<a onclick="receve();" class="btn btn-sm btn-primary">收信</a>
		</div>
	</div>
</div>

<div class="ul_table">
	<ul>
		<li class="thead" >
			<label class="inline pull-left col-3">
				<input class="ace" type="checkbox" name="id-toggle-all" id="id-toggle-all" />
				<span class="lbl"></span></label>
			<span class="col-20 pull-left">
				<?php if(in_array(($folder), explode(',',"darftbox,outbox"))): ?>收件人
					<?php else: ?>
					发件人<?php endif; ?></span>
			<span class="col-9 pull-right " >时间</span>
			<span class="autocut auto">标题</span>
		</li>
		<?php if(empty($list)): ?><li class="no-data">
				没找到数据
			</li>
			<?php else: ?>
			<form method="post" action="" name="form_data" id="form_data">
				<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li class="tbody <?php if(($vo["read"]) == "1"): ?>normal<?php endif; if(($vo["read"]) == "0"): ?>bold<?php endif; ?>" >
						<label class="inline pull-left col-3">
							<input class="ace" type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" />
							<span class="lbl"></span></label>
						<span class="col-20 autocut pull-left">
							<?php if(in_array(($folder), explode(',',"darftbox,outbox"))): echo (show_contact($vo["to"])); ?>
								<?php else: ?>
								<?php echo (show_contact($vo["from"])); endif; ?> </span>
						<span  class="col-9 pull-right" ><?php echo (todate($vo["create_time"],'Y-m-d')); ?></span>
						<span class="autocut auto">
							<?php if(!empty($vo['add_file'])): ?><i class="fa fa-paperclip"></i>
								<?php else: ?>
								<i class="fa fa-paperclip" style="text-indent:-9999px;"></i><?php endif; ?>
							<?php if(in_array(($folder), explode(',',"darftbox"))): ?><a  title="<?php echo (htmlspecialchars($vo["name"])); ?>" href="<?php echo U('edit','id='.$vo['id']);?>"> <?php echo ($vo["name"]); ?>&nbsp;&nbsp;&nbsp;
								<?php if((strlen($vo["name"])) == "0"): ?>无标题<?php endif; ?></a>
								<?php else: ?>
								<a title="<?php echo (htmlspecialchars($vo["name"])); ?>" href="<?php echo U('read','id='.$vo['id']);?>"> <?php echo ($vo["name"]); ?>&nbsp;&nbsp;&nbsp;
								<?php if((strlen($vo["name"])) == "0"): ?>无标题<?php endif; ?> </a><?php endif; ?> </span>
					</li><?php endforeach; endif; ?>
			</form>
			<div class="pagination">
				<?php echo ($page); ?>
			</div><?php endif; ?>
	</ul>
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
	function mark(action) {
		var vars = $("#form_data").serialize();
		switch (action) {
			case "readed":
				sendAjax("<?php echo U('mark','action=readed');?>", vars, function(data) {
					if (data.status){
						$("input[name='id[]']:checked").each(function() {
							$(this).parents("li").removeClass("bold");
							$(this).parents("li").addClass("normal");
						});
						$("input[name='id[]']:checked").prop('checked', false);
						$("#id-toggle-all").prop('checked', false);
					}
				});
				break;
			case "unread":
				sendAjax("<?php echo U('mark','action=unread');?>", vars, function(data) {
					if (data.status) {
						$("input[name='id[]']:checked").each(function() {
							$(this).parents("li").removeClass("normal");
							$(this).parents("li").addClass("bold");
						});
						$("input[name='id[]']:checked").prop('checked', false);
						$("#id-toggle-all").prop('checked', false);
					}
				});
				break;
			case "del":
				sendAjax("<?php echo U('mark','action=del');?>", vars, function(data) {
					if (data.status) {
						ui_alert(data.info,function(){
							location.reload();
						});	
					}
				});
				break;
			case "del_forever":
				ui_confirm('确定要删除吗?',function(){
					sendAjax("<?php echo U('mark','action=del_forever');?>", vars, function(data) {
						if (data.status) {
							ui_alert(data.info,function(){
								location.reload();
							});	
						}
					});
				});
				break;
			case "spam":
				sendAjax("<?php echo U('mark','action=spam');?>", vars, function(data) {
					if (data.status) {
						ui_alert(data.info,function(){
							location.reload();
						});	
					}
				});
				break;
			default:
		}
	}

	function forword() {
		if ($("input[name='id[]']:checkbox:checked").length == 1) {
			window.open('<?php echo U("reply");?>?id="' + $("input[name='id[]']:checkbox:checked:first").val() + "&type=forward", "_self");
		} else {
			ui_error("请选择一封要转发的邮件");
			return false;
		};
	}
	
	function receve(){
		sendAjax("<?php echo U('receve');?>");
	}

	function move_to(val) {
		var vars = $("#form_data").serialize();
		sendAjax("<?php echo U('mark','action=move_folder');?>", 'val=' + val + '&' + vars);
		$("input[name='id[]']:checkbox:checked").each(function() {
			$(this).parents("li").hide();
		});
	}


	$(document).ready(function() {
		$("#move_to li").click(function() {
			move_to($(this).attr("id"));
		});
		set_return_url();
	}); 
</script>
<!-- inline scripts related to this page -->
</body>
</html>