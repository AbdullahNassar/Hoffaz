@component('mail::message')
# United Plast Mail Services

{{$subject}}

@component('mail::button', ['url' => ''])
Visit Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}.
@endcomponent
