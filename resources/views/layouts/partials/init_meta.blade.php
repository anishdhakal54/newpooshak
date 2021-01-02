<meta charset="UTF-8"/>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>{{getConfiguration('site_title')}}</title>
<meta name="robots" content="noindex, follow"/>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Favicon -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title',  getConfiguration('site_title') ? getConfiguration('site_title') : env('APP_NAME') )</title>
<meta name="description" content="@yield('site_description', getConfiguration('site_description') )">

<meta name="keywords" content="@yield('site_description', getConfiguration('site_description') )">
<link rel="manifest" href="/manifest.json"/>