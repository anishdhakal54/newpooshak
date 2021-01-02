@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset('img/logo.png') }}" alt="" width="150px">
        @endcomponent
    @endslot


    ** Your  Order  &nbsp; #{{$content['id']}} has been {{$content['value']}},Please check the following link for details **
    @component('mail::button', ['url' => "{{trans('app.url')}}".'/my-account/orders' ,'color' => 'red'])
        Check Order
    @endcomponent

   Or <a href="{{trans('app.url')}}">Visit Our Store</a>

    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent


