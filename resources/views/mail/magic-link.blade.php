<x-mail::message>
# Your Magic Login Link

Click on the button bellow or follow this link {{ route('magic-link.authenticate', ['magicToken' => $magicToken]) }}

<x-mail::button :url="route('magic-link.authenticate', ['magicToken' => $magicToken])">
Login here
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
