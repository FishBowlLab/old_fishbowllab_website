@component('mail::message')
# Welcome, {{$firstname}}!

Thanks for signing up to keep in touch with {{config('app.name')}}.  From now on, you'll be the first to know about new developments on our projects.  
<br>
Can't wait? Come explore what we are currently working on!

@component('mail::button', ['url' => url('/products')])
Explore
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team <br>
![logo>]({{asset('/storage/images/email-logo.png')}})

@endcomponent
