<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Stare Haikusis</title>
		<!-- Bootstrap -->
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('css/bootstrap-social.css')}}" rel="stylesheet">
		<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
			html
			{
				width: 95%;
				height: 95%;
			}

			img.gavel {
				padding-top: 1.3vw;
				padding-bottom: 1.3vw;
				text-align: center;
				width: 5vw;
			}

			body {

				position: relative;
				text-align: center;
				width: 99%;
				top: 45%;
				transform: translateY(-32%);
			}

			div {
				padding-top: 0px;
				padding-bottom: 0px;
			}

			p.haiku {
				font-size: 4.6vw;
				text-align: center;
				padding-bottom: 0px;
				line-height: 10px;
				margin-bottom: 5vw;
				font-family: 'Lato', sans-serif;
				/*font-family: Arial, Helvetica, sans-serif;*/
				/*font-family: Rockwell, “Courier Bold”, Courier, Georgia, Times, “Times New Roman”, serif;*/
				/*font-family: Garamond, Baskerville, “Baskerville Old Face”, “Hoefler Text”, “Times New Roman”, serif;*/
			}

			p.casename {
				font-size: 2.6vw;
				font-style: oblique;
				padding-top: 5px;
				line-height: 3vw;
				text-align: center;
				/*font-family: "Times New Roman", Times, serif;*/
				/*font-family: “Century Gothic”, CenturyGothic, AppleGothic, sans-serif;*/
				/*font-family: Rockwell, “Courier Bold”, Courier, Georgia, Times, “Times New Roman”, serif;*/
				font-family: Garamond, Baskerville, “Baskerville Old Face”, “Hoefler Text”, “Times New Roman”, serif;


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

			.popover {
				max-width: none;
			    width: 500px;
			    height: 55px;    
			}

			code, kbd, pre, samp {
		 	   font-family: "Arial Black", Gadget, sans-serif;
			}

			pre.copyMe {
				width: 285px;
			}

			.form-horizontal .form-group {
				margin-right: 0px;
				margin-left: 0px;
			}
			.has-feedback {
				position: relative;
			}
			.form-group {
				margin-bottom: 0px;
				padding-left: 0px;
			}

			input, button, select, textarea {
			font-family: "Times New Roman";
			font-size: inherit;
			line-height: inherit;
			color: gray;
			padding-left: 10px;
			}

/*			td {
				border-style: solid;
				border-width: 1px;
			}*/

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
      <p class="haiku">
        {{ $line1 }}<br />
      </p>
      <p class="haiku">
        {{ $line2 }}<br />
      </p>
      <p class="haiku">
        {{ $line3 }}
      </p>
    </td>
    <td class="voting">
      {{ Form::open(['route' => 'haiku.up']) }}{{ Form::hidden('id', $id) }}
      <div class="upArrow" align="center">
        {{ Form::submit('', array('class' => 'arrow')) }}{{ Form::close() }}
      </div>
      @if ($voted != 'none') <img class="gavel" src=
      "{{ asset('images/gavel-lit.png') }}" align="center" />
      @else <img class="gavel" src=
      "{{ asset('images/gavel.png') }}" align="center" />
      @endif 
      @if ($id != '31337')
      <div class="downArrow" align="center">
        {{ Form::open(['route' => 'haiku.down']) }}{{
        Form::hidden('id', $id) }}{{ Form::submit('', array('class' => 'arrow')) }}{{ Form::close() }}
      </div>
      @endif
    </td>
  </tr>
  <tr>
    <td>
      <p class="casename">
        {{ $shortname }} ({{ $year }})
      </p>
    </td>
    <td>
      {{ Form::open(['route' => 'haiku.remove']) }}{{
      Form::hidden('id', $id) }}{{ Form::submit('[x]',
      array('class' => 'remove')) }}{{ Form::close() }}
    </td>
  </tr>
  <tr>
    <td>
      <a href="#" id="popover" name="popover"><button type="button"
      class="btn btn-default"><a href="#" id="popover" name=
      "popover"></a><a href="#" id="popover" name="popover"></a>
      <a href="#" id="popover" name="popover">Share</a>
      <div id="popover-content" class="hide">
        <form class="form-horizontal" role="form">
          <div class="form-group has-feedback">
            <input type="text" name="sometext" size="50" value=
            "{{url('/haiku', $parameters = array(), $secure = null) . '/' . $id}}"
            onclick='selectText(this);' /> <a class=
            "btn btn-social-icon btn-twitter"></a>
          </div>
        </form>
      </div></button></a>
    </td>
  </tr>
</table>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script>
$('#popover').popover({ 
    html : true,
    title: function() {
      return $("#popover-head").html();
    },
    content: function() {
      return $("#popover-content").html();
    }
});

$('#popover-dismiss').popover({
  trigger: 'focus'
});
</script>
<script language="JavaScript">
  function selectText(textField) 
  {
    textField.focus();
    textField.select();
  }
</script>
	</body>
</html>