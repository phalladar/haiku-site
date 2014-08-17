<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Stare Haikusis | {{ $line1 . '. . . .'}}</title>
		<!-- Bootstrap -->
		<link href="{{asset('css/custom.css')}}" rel="stylesheet">
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('css/bootstrap-social.css')}}" rel="stylesheet">
		<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		
		<style type="text/css">

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

			.popover {
				max-width: none;
			    width: 430px;
			    height: 55px;    
			}

			input, button, select, textarea {
			font-family: "Times New Roman";
			font-size: inherit;
			line-height: inherit;
			color: gray;
			padding-left: 10px;
			}

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
  	<td class="shareButton">
		<p align="left"><button type="button" class="btn btn-default btn" data-toggle="modal" data-target="#myModal">
		<span class="glyphicon glyphicon-info-sign"></span>
	</button>
	<a href="#" id="popover"><button type="button" class="btn btn-default btn" data-toggle="popover">
	<span class="glyphicon glyphicon-share"></span> Share
	</button>
	</a>
		<div id="popover-content" class="hide">
			<form class="form-horizontal" role="form">
				<div class="form-group has-feedback" align="center">
					<input type="text" name="sometext" size="40" value="{{url('/', $parameters = array(), $secure = null) . '/' . $id}}" onclick='selectText(this);' />
					<a target="_blank" class="btn btn-social-icon btn-twitter" href="https://twitter.com/share?url=google.com&text={{$line1 . ' / ' . $line2 . ' / ' . $line3}} (via @starehaikusis — {{url('/', $parameters = array(), $secure = null) . '/' . $id}})"><i class="fa fa-twitter"></i></a>
					<a target="_blank" href="mailto: ?subject=A Haiku For You&body=Hey there.%0A%0AI thought you'd enjoy this haiku from Stare Haikusis:%0A%0A{{$line1}}%0A{{$line2}}%0A{{$line3}}%0A— {{ $shortname }} ({{ $year }})%0A%0ASee more at {{url('/', $parameters = array(), $secure = null)}}" class="btn btn-social-icon btn-google-plus"><i class="fa fa-envelope"></i></a>
				</div>
			</form>
		</div></p>
    </td>
  </tr>
</table>

<!-- Large hidden about modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">About Stare Haikusis</h4>
      </div>
      <div class="modal-body">
        <h3>About the Site</h3>
        <p align="left" class="modal-body">When Stare Haikusis launched it was populated with approximately 9800 haikus programatically identified. These haikus were [presumably] inadvertently created by courts when writing their opinions.</p>
        <p align="left" class="modal-body">The vast majority of the difficult code that made this site possible was written by <a href="http://mrfeinberg.com/" target="_blank">Jonathan Feinberg</a>. <a href="http://www.fastcase.com" target="_blank">Fastcase</a> also provided me with the corpus of supreme court cases since the inception of the Court (and will in the future be creating an API to allow me to generate open access links to all the opinions referenced on this site).</p>
        <p align="left" class="modal-body">Because this application was developed programatically, there will be errors. The voting process is intended to correct those errors and in the future I will create a reporting feature but for now please feel free to <a href="mailto:legalgeekery@gmail.com">reach out to me</a> for questions or comments.
        <h3>About Joshua Auriemma</h3>
        <p align="left" class="modal-body">I'm an attorney currently running the outreach department at Fastcase. I write geeky legal-type stuff for my blog, <a href="http://www.legalgeekery.com" target="_blank">Legal Geekery</a>, and occasionally for TechnoLawyer.</p>
        <p align="left" class="modal-body">My background is in physics, math, and human-computer interaction. I'm into data visualization, legal informatics, data analysis, and access to justice.</p>
        <p align="left" class="modal-body">Want to stay in touch? Consider <a href="https://www.twitter.com/legalgeekery" target="_blank">adding me on twitter</a>.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script>
$('[data-toggle="popover"]').popover({
    html: true,
    content: function () {
        return $("#popover-content").html();
    }
});

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
<script language="JavaScript">
  function selectText(textField) 
  {
    textField.focus();
    textField.select();
  }
</script>

	</body>
</html>