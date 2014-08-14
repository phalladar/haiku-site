<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>The HTML5 Herald</title>
		<style type="text/css">
			html
			{
				width: 99%;
				height: 100%;
			}

			img.gavel {
				padding-top: 1.3vw;
				padding-bottom: 1.3vw;
				text-align: center;
				width: 5vw;
				hwifhr: 5vw;
			}

			body {

				position: relative;
				text-align: center;
				width: 99%;
				top: 45%;
				transform: translateY(-50%);
			}

			div {
				padding-top: 0px;
				padding-bottom: 0px;
			}

			p.haiku {
				font-size: 5vw;
				padding-bottom: 0px;
				line-height: 10px;
			}

			p.casename {
				font-size: 2.6vw;
				font-style: oblique;
				padding-top: 5px;
				line-height: 3vw;
				text-align: center;
			}
			td.voting {
				padding-left: 1.35vw;
			}

			div.upArrow input {
				@if ($voted == 'up')
				background:url({{ asset('images/up-arrow-lit.png') }}) no-repeat center;
				@else
				background:url({{ asset('images/up-arrow.png') }}) no-repeat center;
				@endif				background-size: cover;
				cursor:pointer;
				text-align: center;
				border: none;
				width: 2vw;
				height: 2vw;
			}

			div.upArrow:hover input {
				background:url({{ asset('images/up-arrow-lit.png') }}) no-repeat center;
				background-size: cover;
				cursor:pointer;
				text-align: center;
				border: none;
				width: 2vw;
				height: 2vw;
			}

			div.downArrow input {
				@if ($voted == 'down')
				background:url({{ asset('images/down-arrow-lit.png') }}) no-repeat center;
				@else
				background:url({{ asset('images/down-arrow.png') }}) no-repeat center;
				@endif
				background-size: cover;
				cursor:pointer;
				text-align: center;
				border: none;
				width: 2vw;
				height: 2vw;
			}

			div.downArrow:hover input {
				background:url({{ asset('images/down-arrow-lit.png') }}) no-repeat center;
				background-size: cover;
				cursor:pointer;
				text-align: center;
				border: none;
				width: 2vw;
				height: 2vw;
			}

			input[type=submit].remove {
				border:0 none;
				cursor:pointer;
				font-style: inherit;
				font-size: 1.5vw;
			}


		</style>
		<meta name="description" content="The HTML5 Herald">
		<meta name="author" content="SitePoint">

		<link rel="stylesheet" href="css/styles.css?v=1.0">

		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	</head>
	<body>
	<table align="center">
		<tr>
			<td>
			<p class="haiku">{{ $line1 }}<br /></p>
			<p class="haiku">{{ $line2 }}<br /></p>
			<p class="haiku">{{ $line3 }}</p>
			<p class="casename">{{ $shortname }} ({{ $year }})</p><br />
			</td>
			<td class="voting">{{ Form::open(['route' => 'haiku.up']) }}{{ Form::hidden('id', $id) }}
			<div class="upArrow">{{ Form::submit('', array('class' => 'arrow')) }}{{ Form::close() }}</div>
			@if ($voted != 'none')
			<img class="gavel" src="{{ asset('images/gavel-lit.png') }}">
			@else
			<img class="gavel" src="{{ asset('images/gavel.png') }}">
			@endif
			@if ($id != '31337')
			<div class="downArrow">{{ Form::open(['route' => 'haiku.down']) }}{{ Form::hidden('id', $id) }}{{ Form::submit('', array('class' => 'arrow')) }}{{ Form::close() }}</div>
			@endif
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>{{ Form::open(['route' => 'haiku.remove']) }}{{ Form::hidden('id', $id) }}{{ Form::submit('[x]', array('class' => 'remove')) }}{{ Form::close() }}
			</td>

	</table>
	</body>
</html>