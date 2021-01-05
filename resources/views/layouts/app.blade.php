<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.partials.init_meta')
  @include('layouts.partials.init_styles')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  @livewireStyles
  @stack('styles')
</head>

<body>


<!--====== PRELOADER PART ENDS ======-->
<div class="main-wrapper bg-graying">
  @livewire('partials.header')
  @yield('content')
  @livewire('partials.footer')

</div>

@include('layouts.partials.init_scripts')


@livewireScripts
@stack('scripts')
<script>

  document.addEventListener('DOMContentLoaded', function () {
    window.livewire.on('notification', response => {

      var message = response.original;

      $.iGrowl({
        type: message.type,
        title: message.title,
        message: message.message,
        icon: message.icon,
        animShow: message.anim,
        placement: {
          x: message.x,
          y: message.y
        }
      })
    });

    window.livewire.on('reload', message => {
      setTimeout(function () {
        window.location.href = "{{url('/')}}";
      }, 1000)

    });
  });


</script>

</body>
</html>