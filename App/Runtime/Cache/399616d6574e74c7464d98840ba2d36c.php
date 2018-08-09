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
									
<?php echo W('PageHeader',array('name'=>'写邮件','search'=>'N'));?>
<div class="operate panel panel-default">
	<div class="panel-body">
		<div class="left">
			<a class="btn btn-sm btn-primary" onclick="send(true);">发送</a>
			<a class="btn btn-sm btn-default" onclick="send(false);" >临时保管</a>
		</div>
	</div>
</div>
<form class="well form-horizontal" method='post' id="form_send" name="form_send" enctype="multipart/form-data">
	<input type="hidden" id="ajax" name="ajax" value="0">
	<input type="hidden" id="add_file" name="add_file">
	<input type="hidden" id="to" name="to"/>
	<input type="hidden" id="cc" name="cc"/>
	<input type="hidden" id="bcc" name="bcc"/>

	<div class="form-group">
		<label class="col-sm-2 control-label" for="recever">收件人*：</label>
		<div class="col-sm-10">
			<div id="recever" class="inputbox">
				<a class="pull-right btn btn-link text-center" onclick="popup_contact();"> <i class="fa fa-user"></i> </a>
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
		<div class="col-sm-2 control-label">
			<label for="carbon_copy"> 抄送：</label>
			<a onclick="toggle_bcc();"><i id="toggle_bcc_icon" class="fa fa-chevron-down"></i></a>
		</div>
		<div class="col-sm-10">
			<div id="carbon_copy" class="inputbox">
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

	<div id="bcc_wrap" class="form-group display-none">
		<label class="col-sm-2 control-label" for="blind_carbon_copy"> 密送： </label>
		<div class="col-sm-10">
			<div id="blind_carbon_copy" class="inputbox">
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
		<label class="col-sm-2 control-label" for="mail_title"> 标题*： </label>
		<div class="col-sm-10">
			<input class="form-control"  type="text" name="name" id="mail_title"  check="require" msg="请输入标题">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" > 附件： </label>
		<div class="col-sm-10">
			<?php echo W('File',array('add_file'=>$vo['add_file'],'mode'=>'add'));?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-12">
			<textarea  class="editor" id="content" name="content" class="col-xs-12"></textarea>
		</div>
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
	$(document).ready(function() {
		/*单击删除已选联系人*/
		$(document).on("click", ".inputbox .address_list a.del", function() {
			$(this).parent().parent().remove();
		});

		/* 查找联系人input 功能*/
		$(document).on("click", ".inputbox .search li",function() {
			name = $(this).text().replace(/<.*>/, '');
			email = $(this).find("a").attr("title");
			html = conv_inputbox_item(email, name, email, email);

			inputbox = $(this).parents(".inputbox");
			inputbox.find("span.address_list").append(html);
			inputbox.find("input.letter").val("");
			inputbox.find(".search ul").html("");
			inputbox.find(".search ul").hide();
			inputbox.find(".search").hide();
		});
		
		/* 查找联系人input 功能*/
		$(".inputbox .letter").keyup(function(e) {
			switch(e.keyCode) {
				case 40:
					var $curr = $(this).parents(".inputbox").find(".search li.active").next();
					if ($curr.html() != null) {
						$(this).parents(".inputbox").find(".search li").removeClass("active");
						$curr.addClass("active");
					}
					break;
				case 38:
					var $curr = $(this).parents(".inputbox").find(".search li.active").prev();
					if ($curr.html() != null) {
						$(this).parents(".inputbox").find(".search li").removeClass("active");
						$curr.addClass("active");
					}
					break;
				case 13:
					if ($(this).parents(".inputbox").find(".search ul").html() != "") {
						name = $(".search li.active").text().replace(/<.*>/, '');
						email = $(".search li.active a").attr("title");
						html = conv_inputbox_item(email, name, email, email);
						$(this).parents(".inputbox").find("span.address_list").append(html);
						$(this).parents(".inputbox").find(".search ul").html("");
						$(this).val("");
						$(this).parents(".inputbox").find(".search ul").hide();
					} else {
						email = $(this).val();
						if (validate(email, 'email')) {
							name = email;
							html = conv_inputbox_item(email, name, email, email);
							$(this).parents(".inputbox").find("span.address_list").append(html);
							$(this).val("");
						} else {
							ui_error("邮件格式错误");
							return false;
						}
					}
					break;
				default:
					var search = $(this).parents(".inputbox").find("div.search ul");
					if ($(this).val().length > 1) {
						$.getJSON("<?php echo U('popup/json','type=all');?>", {
							key : $(this).val()
						}, function(json) {
							if (json != "") {
								if (json.length > 0) {
									search.html("");
									$.each(json, function(i) {
										search.append('<li><a title="' + json[i].email + '">' + json[i].name + '&lt;' + json[i].email + '&gt;</a></li>');
									});
									search.children("li:first").addClass("active");
									search.show();
								}
							} else {
								search.html("");
								search.hide();
							}
						});
					} else {
						search.hide();
					}
			}
		});
	});

	function send(flag){
		window.onbeforeunload=null;
		$("#to").val("");
		$("#recever .address_list span").each(function(){
			$("#to").val($("#to").val() + $(this).find("b").text() + '|' + $(this).attr("data") +'|' + $(this).attr("id") + ";");
		});

		$("#cc").val("");
		$("#carbon_copy .address_list span").each(function() {
			$("#cc").val($("#cc").val() + $(this).find("b").text() + '|' + $(this).attr("data") +'|' + $(this).attr("id") + ";");
		});
	
		$("#bcc").val("");
		$("#blind_carbon_copy .address_list span").each(function() {
			$("#bcc").val($("#bcc").val() + $(this).find("b").text() + '|' + $(this).attr("data") +'|' + $(this).attr("id") + ";");
		});

		if ($("#to").val().indexOf("@") < 1) {
			ui_error("请选择收件人");
			$("#recever .letter").focus();
			return false;
		}
		if (check_form("form_send")) {
			if (flag) {
				sendForm("form_send", "<?php echo U('send');?>");
			} else {
				sendForm("form_send", "<?php echo U('save_darft');?>");
			}
		}
	}

	function toggle_bcc() {
		if ($("#bcc_wrap").attr("class").indexOf("display-none") < 0) {
			$("#bcc_wrap").addClass("display-none");
			$("#toggle_bcc_icon").addClass("fa-chevron-down");
			$("#toggle_bcc_icon").removeClass("fa-chevron-up");
		} else {
			$("#bcc_wrap").removeClass("display-none");
			$("#toggle_bcc_icon").addClass("fa-chevron-up");
			$("#toggle_bcc_icon").removeClass("fa-chevron-down");
		}
	}

	function popup_contact() {
		winopen("<?php echo U('popup/contact');?>", 730, 570);
	}
</script>
<!-- inline scripts related to this page -->
</body>
</html>