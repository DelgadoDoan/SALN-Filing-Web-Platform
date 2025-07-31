<x-mail::message>
# Your Magic Login Link

<p>
Click on the button below or follow this 
<a href="{{ route('magic-link.authenticate', ['magicToken' => $magicToken, 'randomStr' => $randomStr]) }}">link</a> 
to complete your login.
</p>

<br>

<x-mail::button :url="route('magic-link.authenticate', ['magicToken' => $magicToken, 'randomStr' => $randomStr])">
Login here
</x-mail::button>

<p style="text-align:center">This link will expire in <b>30 minutes</b>.</p>

<br>
<div style="text-align:right">{{ config('app.name') }}</div>
</x-mail::message>
