@extends('layouts.app')

@section('content')
    </div>
    <div class="privacy-image">
      <img src="{{asset('assets/images/return-policy-banner.png')}}" alt="">
    </div>
    <div class="container">
      <h3 class="text-center">Return and Privacy Policy </h3>

        @if(Session::get('applocale')=='ne')
            {{$page->nepali_content}}
        @else
            {!!$page->content!!}
        @endif
{{--      <h4 class="privacy-title"><i class="fa fa-arrow-circle-right"></i>&nbsp;&nbsp;Introduction </h4>--}}
{{--      <p class="second-part">--}}
{{--        poosak.com is a massive platform for booking and purchasing dress online. We are manufacturers of--}}
{{--        uniform/costume/garment. We produce readymade high quality office, uniforms, where the uniform are available for--}}
{{--        hospitals, security guards, chef and other occupation. Moreover, we are your ideal place for your office and--}}
{{--        other duty uniform.--}}
{{--      </p>--}}

{{--      <h4 class="privacy-title"><i class="fa fa-arrow-circle-right"></i>&nbsp;&nbsp;--}}
{{--        Our Privacy Policy--}}
{{--      </h4>--}}
{{--      <p class="second-part">--}}
{{--        poosak.com is a responsible platform run by a group of experienced and wise individuals. As we represent ourself--}}
{{--        as one of the leading and accountable manufacturers and distributors of clothes (uniforms) in the country. We--}}
{{--        totally, respect your privacy and keep our best effort in protecting every piece of information that you provide--}}
{{--        us. We are extremely strict about protecting your privacy and we instruct our employees as well about doing so.--}}
{{--        In case, if we have to use any information, that would be done with your consent and permission.--}}
{{--      </p>--}}

{{--      <p class="second-part">--}}
{{--        1. Data Collected:<br> We may collect different pieces of information, for the sake of our record or during the--}}
{{--        creation of your account.The data we collect form you is store in our database and preserved for the future use.--}}
{{--        The entire data that we collect from you users are kept confidential and used only while needed in a must case,--}}
{{--        that too is done by taking your consent.--}}
{{--        <br><br>--}}
{{--        2. The Cookies: Cookies are the small files that are kept in the site after taking your profession. The cookies--}}
{{--        that are kept in the site are kept in order to improvise the user experience and customize the site in--}}
{{--        accordance to your taste.--}}
{{--        <br><br>--}}
{{--        3. Security: The data that we collect from you in our site are kept confidential and secret and only used after--}}
{{--        your consent. The data is collected, compiled and stored in our most secure database that can be used in further--}}
{{--        future.--}}
{{--      </p>--}}



{{--      <h4 class="privacy-title"><i class="fa fa-arrow-circle-right"></i>&nbsp;&nbsp;--}}
{{--        Our Return Policy--}}
{{--      </h4>--}}

{{--      <p class="second-part">--}}
{{--        Poosak being one of the leading pioneers in the cloth manufacturing business, we mainly focus and aim on--}}
{{--        producing ready made uniforms in large scale. We clearly state, we do not work for custom clothing hence, making--}}
{{--        it clear that we manufacture, only readymade office clothing that are suitable for different occupations.--}}
{{--        <br><br>--}}
{{--        All the clothes manufactured from Poosak meet the international quality standards which may include the quality,--}}
{{--        size, designs, etc. Each and every elements of our manufactured clothing is very applicable in the day to day--}}
{{--        occupation, speaking of size and quality of the uniforms, we mass-produce uniforms that meet and collide with--}}
{{--        international size which is globally accepted (S, M, L, XL etc.)--}}
{{--        <br><br>--}}
{{--        Further, it is stated that “The ordered uniforms will not be returned or refunded” as the sizes of clothing is--}}
{{--        internationally accepted and every other aspects of our clothing is suitable for you. Thus, all our customers--}}
{{--        are requested to re-view there order once before checking out and giving the confirmed order after full--}}
{{--        assurance.--}}
{{--        For any further inquiry, you may directly contact the poosak team.--}}
{{--      </p>--}}

{{--      </p>--}}
    </div>

@endsection
