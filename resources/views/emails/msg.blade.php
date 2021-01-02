@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset('img/logo.png') }}" alt="" width="150px">
        @endcomponent
    @endslot




    # {{$content['msg']}}

       

        @component('mail::button', ['url' =>'http://himalayansolution.com/','color' => 'red'])
            Himalayan Solution
        @endcomponent
    @endcomponent
    ** Thanks For Using Himalayan Solution. **


    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent

