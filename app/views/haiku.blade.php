<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Stare Haikus</title>
		<link rel="stylesheet" href="{{asset('css/foundation.css')}}" />
		<script src="{{asset('/js/vendor/modernizr.js')}}"></script>
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
				transform: translateY(-19%);
			}

			div {
				padding-top: 0px;
				padding-bottom: 0px;
			}

			p.haiku {
				font-size: 5vw;
				text-align: center;
				padding-bottom: 0px;
				line-height: 10px;
				margin-bottom: 5vw;
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

			table {
				border: 0px;
			}

		</style>

		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->



	</head>
	<body>
		<script src="{{ asset('js/vendor/jquery.js') }}"></script>
		<script src="{{ asset('js/vendor/fastclick.js') }}"></script>
		<script src="{{ asset('js/foundation.min.js') }}"></script>
  <!-- Other JS plugins can be included here -->


	<table align="center">
		<tr>
			<td>
			<p class="haiku">{{ $line1 }}<br /></p>
			<p class="haiku">{{ $line2 }}<br /></p>
			<p class="haiku">{{ $line3 }}</p>
			<p class="casename">{{ $shortname }} ({{ $year }})</p><br />
			</td>
			<td class="voting">{{ Form::open(['route' => 'haiku.up']) }}{{ Form::hidden('id', $id) }}
			<div class="upArrow" align="center">{{ Form::submit('', array('class' => 'arrow')) }}{{ Form::close() }}</div>
			@if ($voted != 'none')
			<img class="gavel" src="{{ asset('images/gavel-lit.png') }}" align="center">
			@else
			<img class="gavel" src="{{ asset('images/gavel.png') }}" align="center">
			@endif
			@if ($id != '31337')
			<div class="downArrow" align="center">{{ Form::open(['route' => 'haiku.down']) }}{{ Form::hidden('id', $id) }}{{ Form::submit('', array('class' => 'arrow')) }}{{ Form::close() }}</div>
			@endif
			</td>
		</tr>
		<tr>
		<tr>
			<td>
			<span data-tooltip class="has-tip" data-options="show_on:large" title="Large Screen Sizes">show on</span>
			</tr>
			<tr>
			<td>{{ Form::open(['route' => 'haiku.remove']) }}{{ Form::hidden('id', $id) }}{{ Form::submit('[x]', array('class' => 'remove')) }}{{ Form::close() }}
			</td>
			<tr>
			<td>
						<a href="#" data-reveal-id="myModal">Click Me For A Modal</a> 
			<div id="myModal" style="display: none" class="reveal-modal" data-reveal>Awesome. I have it.<p class="lead">Your couch. It is mine.</p> <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p> <a class="close-reveal-modal">&#215;</a> </div>	
			</td>
			<td></td>
			<tr><td><button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" title="">Popover on right</button></td></tr>
		</tr>

	</table>

<script>
$(document).foundation();

$('[data-toggle="popover"]').popover();

$('body').on('click', function (e) {
    $('[data-toggle="popover"]').each(function () {
        //the 'is' for buttons that trigger popups
        //the 'has' for icons within a button that triggers a popup
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
});
</script>
	</body>
</html>