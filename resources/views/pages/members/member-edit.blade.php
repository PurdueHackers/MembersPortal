@extends("app")

@section("page-title")
{{ $member->name }} -
@stop

@section("content")

<div class="section"><div class='section-container'>
	<h3>Member - {{ $member->name }}
		<a href="{{ action('MemberController@getMember', $member->username) }}" class="pull-left"><button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Profile</button></a>
	</h3>

	<div class="panel panel-default">
		<form method="post" action="{{ $member->profileURL() }}" enctype="multipart/form-data" class="panel-body validate">
			<p class="text-muted text-center">Fields marked with an * are required</p>
			{!! csrf_field() !!}
			<label for="memberName">Full Name *
				<div class="text-right pull-right"><span style="font-size: 8px;">(Restrict your profile to only members)</span> Private Profile</div>
			</label>
			<div class="input-group">
				<input type="text" name="memberName" id="memberName" placeholder="Full Name" value="{{ $member->name }}" class="form-control" data-bvalidator="required" data-bvalidator-msg="Please enter your full name">
				<span class="input-group-addon" id="privateProfileGroup">
					<input type="checkbox" name="privateProfile" id="privateProfile" value="true" {{ $member->privateProfile ? "checked" : "" }}>
				</span>
			</div>
			<br>
			<label for="username">Username *</label>
			<input type="text" name="username" id="username" placeholder="Username" value="{{ $member->username }}" class="form-control" data-bvalidator="required,alphanum,regex[^\S+$]" data-bvalidator-msg="Your username must be alphanumeric">
			<br>
			<label for="picture">Profile Picture (JPG or PNG)</label>
			@if ($member->picture)
			<a href="{{ $member->picturePath() }}" class="form-control">{{ $member->picture }}</a>
			@endif
			<input type="file" name="picture" id="picture" class="form-control">
			<br>
			<label for="email">Account Email *
				<div class="text-right pull-right"><span style="font-size: 8px;">(Stop receiving auto-generated emails)</span> Unsubscribe</div>
			</label>
			<div class="input-group">
				<input type="email" name="email" id="email" placeholder="Email" value="{{ $member->email }}" class="form-control" data-bvalidator="required,email" data-bvalidator-msg="An email is required for your account.">
				<span class="input-group-addon" id="unsubscribedGroup">
					<input type="checkbox" name="unsubscribed" id="unsubscribed" value="true" {{ $member->unsubscribed ? "checked" : "" }}>
				</span>
			</div>
			<br>
			<br>
			@if (isset($setPassword))
			<label for="password">Password *</label>
			<input type="password" name="password" id="password" placeholder="Password" class="form-control" data-bvalidator="required" data-bvalidator-msg="A password is required">
			<br>
			<label for="confirmPassword">Confirm Password *</label>
			<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" class="form-control" data-bvalidator="required,equalto[password]" data-bvalidator-msg="Password does not match">
			<br>
			@endif
			<label for="phone">Cell Phone Number (private, only for text notifications)</label>
			<input type="text" name="phone" id="phone" placeholder="Cell Phone Number" value="{{ $member->phone }}" class="form-control" data-bvalidator="minlength[10]" data-bvalidator-msg="Please enter a valid cell phone # (with area code)">
			<br>
			<label for="email_public">Public Email</label>
			<input type="text" name="email_public" id="email_public" placeholder="Public Email" value="{{ $member->email_public }}" class="form-control" data-bvalidator="email" data-bvalidator-msg="Please enter a valid email address. (Optional)">
			<br>
			<label for="description">Public Message</label>
			<textarea name="description" id="description" class="form-control" placeholder="Public Message">{{ $member->description }}</textarea>
			<br>
			<label for="gradYear">Year of Graduation *</label>
			<input type="number" name="gradYear" id="gradYear" placeholder="Graduation Year" value="{{ $member->graduation_year}}" class="form-control" data-bvalidator="required,number,between[1900:2100]" data-bvalidator-msg="A graduation year is required">
			<br>
			<label for="major">Major</label>
			<select name="major" id="major" class="form-control" {!! $member->major_id ? 'data-bvalidator="required"' : "" !!}>
				<option value="">Select</option>
				@foreach ($majors as $major)
				<option value="{{ $major->id }}" {{ $member->major_id==$major->id ? "selected":"" }}>{{ $major->name }}</option>
				@endforeach
			</select>
			<br>
			<label for="gender">Gender</label>
			<select name="gender" id="gender" class="form-control" {!! $member->gender != "" ? 'data-bvalidator="required"' : "" !!}>
				<option value="">Select</option>
				<option value="Female" {{ $member->gender=="Female" ? "selected":"" }}>Female</option>
				<option value="Male" {{ $member->gender=="Male" ? "selected":"" }}>Male</option>
				<option value="Other" {{ $member->gender=="Other" ? "selected":"" }}>Other</option>
				<option value="No" {{ $member->gender=="No" ? "selected":"" }}>Prefer Not To Answer</option>
			</select>
			<br>
			<label for="facebook">Facebook Profile</label>
			<input type="text" name="facebook" id="facebook" placeholder="Facebook Profile" value="{{ $member->facebook }}" class="form-control" data-bvalidator="url" data-bvalidator-msg="Please enter a valid URL to your Facebook Profile.">
			<br>
			<label for="github">Github Profile</label>
			<input type="text" name="github" id="github" placeholder="Github Profile" value="{{ $member->github }}" class="form-control" data-bvalidator="url" data-bvalidator-msg="Please enter a valid URL to your Github Profile.">
			<br>
			<label for="linkedin">LinkedIn Profile</label>
			<input type="text" name="linkedin" id="linkedin" placeholder="LinkedIn Profile" value="{{ $member->linkedin }}" class="form-control" data-bvalidator="url" data-bvalidator-msg="Please enter a valid URL to your LinkedIn Profile.">
			<br>
			<label for="devpost">Devpost Profile</label>
			<input type="text" name="devpost" id="devpost" placeholder="Devpost Profile" value="{{ $member->devpost }}" class="form-control" data-bvalidator="url" data-bvalidator-msg="Please enter a valid URL to your Devpost Profile.">
			<br>
			<label for="website">Personal Website</label>
			<input type="text" name="website" id="website" placeholder="Personal Website" value="{{ $member->website }}" class="form-control" data-bvalidator="url" data-bvalidator-msg="Please enter a valid URL to your Personal Website.">
			<br>
			<label for="resume">Resume (PDF)</label>
			@if ($member->resume)
			<a href="{{ $member->resumePath() }}" class="form-control">{{ $member->resume }}</a>
			@endif
			<input type="file" name="resume" id="resume" class="form-control">
			<br>
			<label for="linktoresume">Link to Resume</label>
			<input type="text" name="linktoresume" id="linktoresume" placeholder="Link to Resume" value="{{ $member->linktoresume }}" class="form-control" data-bvalidator="url" data-bvalidator-msg="Please enter a valid URL to your Resume.">
			<br>
			@if (!isset($setPassword))
				@if (Gate::allows('permission', 'members'))
				<a href="{{ $member->reset_url() }}" class="btn btn-warning pull-left">Reset Password</a>
				@elseif (Gate::allows('member-matches',$member))
				<a href="{{ $member->reset_url() }}" class="btn btn-warning pull-left">Change Password</a>
				@endif
			@endif
			<input type="submit" value="Update Profile" class="btn btn-primary pull-right">
		</form>
	</div>
</div></div>

@stop
