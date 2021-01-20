@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset('img/poosak.png') }}" alt="" width="150px">
        @endcomponent
    @endslot

<h2>{{$content['name']}} is below minimum quantity.</h2>


<table class="table table-bordered border-2" border="1">
    <tbody>
    <tr>
<td>
    Name of Product
</td>
        <td>
            {{$content['name']}}
        </td>
    </tr>
    <tr>
        <td>
            XS
        </td>
        <td>
            {{$content['quantity_xs']}}
        </td>
    </tr>
 <tr>
        <td>
          S
        </td>
        <td>
            {{$content['quantity_s']}}
        </td>
    </tr>
    <tr>
        <td>
            M
        </td>
        <td>
            {{$content['quantity_m']}}
        </td>
    </tr>
    <tr>
        <td>
            L
        </td>
        <td>
            {{$content['quantity_l']}}
        </td>
    </tr>
    <tr>
        <td>
            XL
        </td>
        <td>
            {{$content['quantity_xl']}}
        </td>
    </tr>
    <tr>
        <td>
            XXL
        </td>
        <td>
            {{$content['quantity_xxl']}}
        </td>
    </tr>
    <tr>
        <td>
            XXXL
        </td>
        <td>
            {{$content['quantity_xxxl']}}
        </td>
    </tr>

    </tbody>


</table>
@slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent



