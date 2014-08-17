<!DOCTYPE html>
<html>
<head>
	<title>Administrator Login</title>
		<!-- <link href="{{asset('css/custom.css')}}" rel="stylesheet"> -->
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('css/bootstrap-social.css')}}" rel="stylesheet">
		<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

		<style>

		table, tr, td {
			width: 50%;
			text-align: center;
		}

		h2 {
			text-align: center;
		}

		body {
			margin-top: 30px;
		}

		.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12, div {
			padding-top: 9px;
		}

		</style>
</head>
<body>
<p align="center"><h2>Administrator Login</h2></p><br />
<center><table>{{ Form::open(['route' => 'sessions.store', 'class'=>'form-horizontal']) }}
<tr><td>
<form class="" role="form">
<div class="form-group">
	{{ Form::label('email', 'Email:', array('class' => 'col-sm-2 control-label'))}}
	<div class="col-sm-10">
		{{ Form::email('email', '', array('class' => 'form-control')) }}
	</div>
</div>

<div class="form-group">
	{{ Form::label('password', 'Password:', array('class' => 'col-sm-2 control-label'))}}
	<div class="col-sm-10">
		{{ Form::password('password', array('class' => 'form-control')) }}
	</div>
</div>

	<div class="form-group">
		<div class="col-sm-10">
		{{ Form::submit('Login', array('class' => 'btn btn-default')) }}
	</div>
	</div>
</td></tr></table></center>

{{ Form::close() }}

</body>
</html>