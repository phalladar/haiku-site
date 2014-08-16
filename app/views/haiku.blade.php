<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Stare Haikus</title>
		<!-- Bootstrap -->
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
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

			.container{ text-align: center; }

			/* Button styles: */
			i.fb,       span.fb{     	color: #3b5998; }
			i.tw,       span.tw{     	color: #00aced; }
			i.google,   span.google{ 	color: #dd4b39; }
			i.linkin,   span.linkin{ 	color: #007bb6; }
			i.vk,       span.vk{     	color: #45668e; }
			i.pinterest,span.pinterest{ color: #cb2027; }
			i.surfingbird{ max-height: 12px; min-width: 25%; }
			i.surfingbird::before{ 
			    content: url(http://bootstrap-ru.com/cdn/i/surf.png); 
			    position: relative;
			    left:0px;
			    top: -7px;
			    float: left;
			}

			.google-plus-one{
			   overflow: hidden;
			   position: relative;
			}

			.google-plus-one i{
			   position: absolute;
			   left: -4px;
			   bottom: -5px;
			}

			.google-plus-one span{
			   font-size: 16px; 
			   font-weight: 900; 
			   line-height: 10px;
			   margin-left: 15px;
			}

			.btn-sm.google-plus-one span{ font-size: 14px; }
			.btn-sm.google-plus-one i{ bottom: -3px; }
			.btn-lg.google-plus-one span{ font-size: 20px; margin-left: 18px; }
			.btn-lg.google-plus-one i{ bottom: -5px; }
			.btn-xs.google-plus-one span{ font-size: 12px;}
			.btn-xs.google-plus-one i{ bottom: -7px; }

		</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
		<tr><td></td>
			<td>{{ Form::open(['route' => 'haiku.remove']) }}{{ Form::hidden('id', $id) }}{{ Form::submit('[x]', array('class' => 'remove')) }}{{ Form::close() }}
			</td>
			</tr>
			<tr><td><button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="right" data-content='"Vivamus sagittis lacus vel augue laoreet rutrum faucibus."' data-original-title="" title="">Popover on right</button></td></tr>

	</table>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script>
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