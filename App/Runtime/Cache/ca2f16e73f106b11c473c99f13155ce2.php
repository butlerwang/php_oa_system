<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset='utf-8' />
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
			var flag = true;
			var runing = false;
			var $url="<?php echo U('push/server2');?>";
			push_start();

			function sendPush($url, vars, callback) {
				return $.ajax({
					type : "POST",
					url : $url,
					data : vars + "&ajax=1",
					dataType : "json",
					success : callback
				});
			}

			function push_start() {
				sendPush($url, '', function(data) {
					if (data.info != "no-data") {
						window.parent.ui_info(data.info);
					}
					if (flag) {
						push_start();
					}
				});
			}

			function push_stop() {
				flag = false;
			}

			function test(){
				window.parent.ui_info("abcsdfsdfsfd");
			}

		</script>
	</head>
	<body>
		<input type="button" value="abc" onclick="test()">
	</body>
</html>