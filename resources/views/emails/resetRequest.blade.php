@extends("email")

@section("content")

<div class="message">
	<p>Hi {{ $member->name }},</p>
	
	<p>You requested to reset your password for your Purdue Hackers account.</p>
	
	<p><b>To reset your password, click here: <a href="{{ $member->reset_url() }}">{{ $member->reset_url() }}</a></b></p>
	
	<p>If you did not make this request, you can simply ignore this email.</p>
	
	<p>Thanks,<br>Purdue Hackers</p>
	
</div>

@stop