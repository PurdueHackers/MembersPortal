<nav class="navbar navbar-default navbar-fixed-top">
	<div class="nav-container container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        	<span class="sr-only">Toggle navigation</span>
                        	<span class="icon-bar"></span>
                        	<span class="icon-bar"></span>
                        	<span class="icon-bar"></span>
                        </button>
			<a id='nav-brand' class="navbar-brand" href="/">
			<div class="nav-logo"></div>
			@if(true || session()->get('authenticated_admin') != "true")
			<span class="nav-name">{{ env('ORG_NAME') }}</span>
			@endif
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav navbar-right">
				@if (session()->get('authenticated_member') == "true")
					<li><a href="{{ action('PortalController@getMember', session()->get('member_id')) }}">Profile</a></li>
					<li><a href="{{ action('PortalController@getMembers') }}">Members</a></li>
					<li><a href="{{ action('PortalController@getProjects') }}">Projects</a></li>
				@endif
				<li><a href="{{ action('PortalController@getEvents') }}">Events</a></li>
				@if(session()->get('authenticated_member') == "true")
					<li><a href="{{ action('AuthController@getLogout') }}">Logout</a></li>
				@else
					<li><a href="{{ action('AuthController@getLogin') }}">Login</a></li>
					<li><a href="{{ action('AuthController@getJoin') }}">Join</a></li>
				@endif
			</ul>
		</div>
	</div>
</nav>
