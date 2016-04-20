<!doctype html>

<html>
	<head>
		<title>JUMO FRESH - BACK OFFICE | Fresh Homemade Juices, Smoothies, Raw Mylk, dan Rujak</title>		
	</head>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="" class="navbar-brand">JUMOFRESH</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li> <a href="{{ URL::to('admin-logout') }}">Logout</a> </li>
					<!--<li> <a href="">ADMIN</a> </li>-->
				</ul>
			</div>	
		</div>
	</nav>
	<body>
		<div class="row">
			<div class="col-xs-6 col-md-2">
                <div class="nav jm-sidebar">
                    <li><a class="sidebar-item" href="{{ URL::to('admin/user') }}">User</a></li>
                    <li><a class="sidebar-item" href="{{ URL::to('admin/role') }}">Role</a></li>
                    <li><a class="sidebar-item" href="#">Product</a></li>
                    <li><a class="sidebar-item" href="#">Type</a></li>
                </div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-9">
				@yield('content')
			</div>
			<div class="col-xs-12 col-sm-6 col-md-1">
			</div>
		</div>


		<link rel="stylesheet" href="/assets/css/admin/masteradmin.css" />
		<link rel="stylesheet" href="/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="/assets/js/jquery.min.js" />		
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<!-- Latest compiled and minified CSS 
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
		 Latest compiled and minified JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
		<!--<script src="/assets/js/admin/admin.user.js" type="text/javascript"></script>-->
		<style type="text/css">
			html, body{
				height: 100%;				
			}
			body{
				padding-top: 50px;
			}
		</style>

		@yield('javascript')

	</body>

</html>