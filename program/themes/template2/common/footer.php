<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- Always force latest IE rendering engine & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title><?php echo $template['title']; ?></title>

	<script type="text/javascript">
		var APPPATH_URI = "<?php echo APPPATH_URI;?>";
		var BASE_URL = "<?php echo rtrim(site_url(), '/').'/';?>";
		var SITE_URL = "<?php echo rtrim(site_url(), '/').'/';?>";
		var BASE_URI = "<?php echo BASE_URI;?>";
	</script>

</head>
<body>
	<?php echo $template['body']; ?>
</body>
</html>	
