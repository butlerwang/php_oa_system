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
									
<?php echo W('PageHeader',array('name'=>'记账明细','search'=>'M'));?>
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
				<label class="col-sm-4 control-label" for="li_name">项目名称：</label>
				<div class="col-sm-8">
					<input  class="form-control" type="text" id="li_name" name="li_name" >
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="li_content">项目内容：</label>
				<div class="col-sm-8">
					<input  class="form-control" type="text" id="li_content" name="li_content" >
				</div>
			</div>

			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="eq_level">项目级别：</label>
				<div class="col-sm-8">
					<select id="eq_level" name="eq_level" class="form-control">
						<option value="">请选择</option>
						<?php echo fill_option(get_system_config("XMK_LEVEL"));?>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-4 control-label" for="eq_status">项目状态：</label>
				<div class="col-sm-8">
					<select id="eq_status" name="eq_status" class="form-control">
						<option value="">请选择</option>
						<?php echo fill_option(get_system_config("XMK_STATUS"));?>
					</select>
				</div>
			</div>
		</div>
	</div>
</form>
<div class="space-8"></div>
<?php if($auth['write']): ?><div class="operate panel panel-default">
		<div class="panel-body">
			<div class="pull-right">
				<a class="btn btn-sm btn-primary" onclick="add_income()">记收入</a>
				<a class="btn btn-sm btn-primary" onclick="add_payment()">记支出</a>
				<a class="btn btn-sm btn-primary" onclick="add_transfer()">记转账</a>
			</div>
		</div>
	</div><?php endif; ?>
<div class="ul_table">
	<ul>
		<li class="thead">
			<span class="col-8 text-center">单据编号</span>
			<span class="col-8 text-center">日期</span>
			<div class="pull-right">
				<span class="col-8 text-center">账户</span>
				<span class="col-10 text-center">收入</span>
				<span class="col-10 text-center">支出</span>
				<span class="col-10 text-center">合计</span>
				<span class="col-15 text-center">类别</span>
				<span class="col-15  text-center">客户/供应商</span>
				<span class="col-9  text-center">经办</span>
				<span class="col-9  text-center">录入</span>
			</div>
			<span class="auto autocut">摘要 </span>
		</li>
		<?php if(empty($list)): ?><li class="no-data">
				没找到数据
			</li>
			<?php else: ?>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li class="tbody data_item">
					<span class="col-8 text-center"><?php echo ($vo["doc_no"]); ?></span>
					<span class="col-8 text-center"><?php echo ($vo["input_date"]); ?></span>
					<div class="pull-right">
						<span class="col-8 text-center"><?php echo ($vo["account_name"]); ?></span>
						<span class="col-10 text-right data data_1"><?php echo (($vo["income"])?($vo["income"]):0); ?></span>
						<span class="col-10 text-right data data_2"><?php echo (($vo["payment"])?($vo["payment"]):0); ?></span>
						<span class="col-10 text-right data data_3"><?php echo (($vo['income']-$vo['payment'])?($vo['income']-$vo['payment']):0); ?></span>
						<span class="col-15 text-center"><?php echo ($vo["type"]); ?>&nbsp;</span>
						<span class="col-15 text-center"><?php echo ($vo["partner"]); ?>&nbsp;</span>
						<span class="col-9 text-center"><?php echo ($vo["actor_user_name"]); ?></span>
						<span class="col-9 text-center"><?php echo ($vo["user_name"]); ?></span>
					</div>
					<span class="auto autocut"><?php echo ($vo["remark"]); ?> </span>
				</li><?php endforeach; endif; ?>
			<li class="tbody data_total">
				<span class="col-8 text-center">合计</span>
				<span class="col-18 text-center">&nbsp;</span>
				<div class="pull-right">
					<span class="col-10 text-right data data_1"></span>
					<span class="col-10 text-right data data_2"></span>
					<span class="col-10 text-right data data_3"></span>
					<span class="col-40 text-center">&nbsp;</span>
					<span class="col-8 text-center">&nbsp;</span>
				</div>
			</li>
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
	$(document).ready(function() {
		set_return_url();
		total_init();
	});

	function total_init() {
		for (var i = 1; i < 11; i++) {
			total = 0;
			item_selecter = ".data_item .data_" + i;

			$(item_selecter).each(function() {
				total = dec_add(total, $(this).text());
			});
			total_selecter = ".data_total .data_" + i;
			$(total_selecter).text(total);
		}
		$(".ul_table .data").each(function() {
			$(this).text(formatMoney($(this).text()));
		});
	}
	
	function dec_add(num1, num2) {
		var reg = /\./i;
		if (!reg.test(num1) && !reg.test(num2)) {
			return parseInt(num1) + parseInt(num2);
		}
		var r1 = 0, r2 = 0, m;
		var str1 = num1.toString(), str2 = num2.toString();
		if (str1.indexOf('.') > -1) {
			r1 = str1.split('.')[1].length;
		}
		if (str2.indexOf('.') > -1) {
			r2 = str2.split('.')[1].length;
		}
		m = Math.pow(10, Math.max(r1, r2));
		return (dec_mul(num1, m) + dec_mul(num2, m)) / m;
	}

	function formatMoney(numStr, separator) {
		s = numStr;
		if (/[^0-9\.\-]/.test(s))
			return "　";
		s = s.replace(/^(-)?(\d*)$/, "$1$2.");
		s = (s + "00").replace(/(-)?(\d*\.\d\d)\d*/, "$1$2");
		s = s.replace(".", ",");
		var re = /(\d)(\d{3},)/;
		while (re.test(s))
		s = s.replace(re, "$1,$2");
		s = s.replace(/,(\d\d)$/, ".$1");
		return s.replace(/^\./, "0.");
	}

	function formatQty(numStr, separator) {
		s = numStr;
		if (/[^0-9\.\-]/.test(s))
			return "　";
		s = s.replace(/^(-)?(\d*)$/, "$1$2.");
		s = (s + "00").replace(/(-)?(\d*\.\d\d)\d*/, "$1$2");
		s = s.replace(".", ",");
		var re = /(\d)(\d{3},)/;
		while (re.test(s))
		s = s.replace(re, "$1,$2");
		s = s.replace(/,(\d\d)$/, ".$1");
		s = s.replace(/^\./, "0.");
		if (s.split(".")[1] == "00")
			s = s.split(".")[0];
		return s;
	}
	
	function add_income() {
		window.open("<?php echo U('add_income');?>", "_self");
	}

	function add_payment() {
		window.open("<?php echo U('add_payment');?>", "_self");
	}

	function add_transfer() {
		window.open("<?php echo U('add_transfer');?>", "_self");
	}
</script>
<!-- inline scripts related to this page -->
</body>
</html>