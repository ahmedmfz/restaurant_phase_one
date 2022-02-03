@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

<h2>
    name : {{ $data['name']}}
</h2>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
