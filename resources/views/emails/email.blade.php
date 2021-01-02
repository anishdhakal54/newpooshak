@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset('img/logo.png') }}" alt="" width="150px">
        @endcomponent
    @endslot
Dear Customer.You are welcome to the Himalayan Solution online store. To use our service, first you need to confirm your email. 
   Click the following link to verify your email
  
@component('mail::button', ['url' => url('/verifyemail/'.$content['email_token']) ,'color' => 'red'])
        Verify
    @endcomponent
  


    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent