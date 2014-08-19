<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="Stare Haikusis" content="Inadvertent haikus from judicial opinions.">
		<meta name="keywords" content="law, haiku, scotus, court haikus, legal haikus">
		<meta name="author" content="Joshua Auriemma">
		<title>Stare Haikusis | {{ $line1 . '. . . .'}}</title>
		<!-- Bootstrap -->
		<link href="{{asset('css/custom.css')}}" rel="stylesheet">
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('css/bootstrap-social.css')}}" rel="stylesheet">
		<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400italic' rel='stylesheet' type='text/css'>
		
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

			.glyphiconColor {
				color: red;
			}

		</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
@if (Session::get($id . "-flag") == 'yes') 
<?php $buttonClass = 'btn btn-danger'; ?>
@else
<?php $buttonClass = 'btn btn-default'; ?>
@endif

<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
<link rel="icon" href="/{{ asset('favicon.ico') }}" type="image/x-icon">

	</head>
	<body>
	<script src="{{ asset('js/vendor/jquery.js') }}"></script>
	<script src="{{ asset('js/vendor/fastclick.js') }}"></script>
	<script src="{{ asset('js/foundation.min.js') }}"></script>
  <!-- Other JS plugins can be included here -->
<table align="center">
  <tr>
    <td>
      <div class="haiku">
        {{ $line1 }}<br />
      </div>
      <div class="haiku">
        {{ '&nbsp;' . $line2 . '&nbsp;' }}<br />
      </div>
      <div class="haiku">
        {{ $line3 }}
      </div>
    </td>
    <td class="voting">
      {{ Form::open(['route' => 'haiku.up']) }}{{ Form::hidden('id', $id) }}
      <div class="upArrow" align="center">
        {{ Form::submit('', array('id' => 'up_arrow', 'class' => 'arrow')) }}{{ Form::close() }}
      </div>
      @if ($voted != 'none') <img class="gavel" src=
      "{{ asset('images/gavel-lit.png') }}" align="center" />
      @else <img class="gavel" src=
      "{{ asset('images/gavel.png') }}" align="center" />
      @endif 
      @if ($id != '31337')
      <div class="downArrow" align="center">
        {{ Form::open(['route' => 'haiku.down']) }}{{
        Form::hidden('id', $id) }}{{ Form::submit('', array('id' => 'down_arrow', 'class' => 'arrow')) }}{{ Form::close() }}
      </div>
      @endif
    </td>
  </tr>
  <tr>
    <td>
      <div class="casename">
        {{ $shortname }} ({{ $year }})
      </div>
    </td>
    <td>
    @if (Auth::check())
    <button type="button" class="btn btn-primary btn edit_button" data-toggle="modal" data-target="#myModal" data-id="{{ $id }}">Edit</button>
<!-- Modal for Edit button -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria- labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel">Edit Skill</h4>

            </div>
            @if (Auth::check())
            <form method="post" action="{{url('/', $parameters = array(), $secure = null) . '/' . $id . '/edit'}}">
                <div class="modal-body">
					  <div class="form-group">
					    {{ Form::hidden('id', $id) }}
					    <label for="editLine1" class="col-sm-2 control-label">Line 1</label>
					    <div class="col-sm-10">
					      <input name="line1" type="text" class="form-control" id="editLine1" value="{{{ $line1 }}}"><br />
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="editLine2" class="col-sm-2 control-label">Line 2</label>
					    <div class="col-sm-10">
					      <input name="line2" type="text" class="form-control" id="editLine2" value="{{{ $line2 }}}"><br />
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="editLine3" class="col-sm-2 control-label">Line 3</label>
					    <div class="col-sm-10">
					      <input name="line3" type="text" class="form-control" id="editLine3" value="{{{ $line3 }}}"><br />
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="editShortname" class="col-sm-2 control-label">Shortname</label>
					    <div class="col-sm-10">
					    <table>
					    <tr><td width="75%" border="1px" padding-right="10px" padding-left="10px">
					      <input name="shortname" type="text" class="form-control" id="editShortname" value="{{{ $shortname }}}"><br /></td>
					    <td><button id="caseButton" type="button" class="btn btn-default-sm" onclick="upperMe();">Change Case</button></td></tr>
					      </table>
					    </div>
					  </div>

                    </div>

                    <div class="modal-footer" align="center">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </form>
            @endif
            </div>
        </div>
    </div>
    </td>
    <td>
      {{ Form::open(['route' => 'haiku.remove']) }}{{ Form::hidden('id', $id) }}{{ Form::submit('[x]', array('class' => 'remove')) }}{{ Form::close() }}
    </td>
  </tr>
  @endif
  <tr>
  	<td class="shareButton">
		<p align="left"><button type="button" class="btn btn-default btn" data-toggle="modal" data-target="#myModal2">
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
  @if (Auth::check())
  <td>  
  	<a href="{{url('/', $parameters = array(), $secure = null) . '/logout'}}" id="logout"><button type="button" class="btn btn-default btn">
	Logout <span class="glyphicon glyphicon-remove"></span></button></a>
  </td>
  @else
    <td>
     {{ Form::open(['route' => 'haiku.flag']) }}{{ Form::hidden('id', $id) }}
        {{ Form::button('<span class="glyphicon glyphicon-flag glyphiconColor"></span>&nbsp;&nbsp;Flag case', 
        	array('type' => 'submit', 
        		'class' => $buttonClass)) }}
        		{{ Form::close() }}
  </td>
  @endif
</tr></table>

<!-- Large hidden about modal -->
<div class="modal fade2" id="myModal2" tabindex="-2" role="dialog" aria-labelledby="myModal2Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <h3>About the Site</h3>
        <p align="left" class="modal-body">When Stare Haikusis launched it was populated with approximately 9800 haikus programatically identified. These haikus were [presumably] inadvertently created by courts when writing their opinions.</p>
        <p align="left" class="modal-body">The vast majority of the difficult code that made this site possible was written by <a href="http://mrfeinberg.com/" target="_blank">Jonathan Feinberg</a>. <a href="http://www.fastcase.com" target="_blank">Fastcase</a> also provided me with the corpus of supreme court cases since the inception of the Court (and will in the future be creating an API to allow me to generate open access links to all the opinions referenced on this site).</p>
        <p align="left" class="modal-body">Because this application was developed programatically, there will be errors. The voting process is intended to correct those errors and in the future I will create a reporting feature but for now please feel free to <a href="mailto:legalgeekery@gmail.com">reach out to me</a> for questions or comments.</p>

        <p align="center">Hotkeys: <kbd><span class="glyphicon glyphicon-arrow-up"></span></kbd> upvote | <kbd><span class="glyphicon glyphicon-arrow-down"></span></kbd> downvote.</p><br />
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
<script>
$("body").keyup(function(event){
    if(event.keyCode == 38){
        document.forms[0].submit();
    }
});

$("body").keyup(function(event){
    if(event.keyCode == 40){
        document.forms[1].submit();
    }
});
</script>
<script type="text/javascript"> 
String.prototype.toTitleCase = function(n) {
   var s = this;
   if (1 !== n) s = s.toLowerCase();
   return s.replace(/\b[a-z]/g,function(f){return f.toUpperCase()});
}

String.prototype.fixVdot = function(n) {
	var s = this;
	return s.replace("V.", "v.");
}

function upperMe() { 
    document.getElementById("editShortname").value = document.getElementById("editShortname").value.toTitleCase().fixVdot(); 
} 

</script> 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53864732-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>
	</body>
</html>