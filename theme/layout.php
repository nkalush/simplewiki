<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Simple Wiki</title>		
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<style>
			body{margin-top:5em;}
			article, #editor{border:1px solid #d3d3d3;box-shadow:0 0 1em #d3d3d3;padding:1em;margin-bottom:1em;}
			.fullcontainer{padding:0 1em;}
			#editor {position: fixed;top: 6em;right: 50.5%;bottom: 5em;left: 1em;}
			.controls{position: fixed;bottom:1em;left:1em;right:50.5%;}
			#editor_preview {position: absolute;top: 5em;right: 1em;left: 50.5%;}			
		</style>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="<?php echo $GLOBALS['base_url'];?>">Simple Wiki</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="<?php echo $GLOBALS['base_url'];?>">Home</a></li>
			  </ul>
			  <ul class="nav navbar-nav pull-right">
				<li><a href="<?=Routes::site_url(Routes::action_uri(Routes::get_uri(),"edit"))?>">Edit</a></li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<?php echo $content;?>
	</body>
</html>