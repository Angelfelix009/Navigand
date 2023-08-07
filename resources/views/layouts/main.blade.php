<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Navigand Nigeria Limited - Best Place to get your Agric Product</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('public/images/ico/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('public/images/ico/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('public/images/ico/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/images/ico/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('public/images/ico/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('public/images/ico/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('public/images/ico/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('public/images/ico/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/images/ico/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/images/ico/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('public/images/ico/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/images/ico/favicon-16x16.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('public/images/ico/android-icon-192x192.png')}}">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- CSS
    ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/plugins.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/font-awesome/css/font-awesome.min.css')}}" />
</head>

<body>
@include('inc.navbar')
@yield('content')
@include('inc.footer')

<!-- JS
============================================ -->
<!-- Start of Tawk chat (www.tawk.to) code -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/60171daca9a34e36b9725ed7/1etd4ns9l';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<!-- End of TawkChat code -->

<!-- Plugins JS -->
<script src="{{asset('public/assets/js/plugins.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('public/assets/js/main.js')}}"></script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
    $("#country").change(function() {
        var country = $(this).val();
        if(country){
            $.ajax({
                type: "GET",
                url:"{{url('/select-state')}}?country="+country,
                success: function (res) {
                    $("#state").empty();
                    $('#state').html(res);

                }
            });
        }
        else
        {
            $("#state").html('<option value="">Select Country first</option>');
        }
    });
</script>
<script>
    $(document).ready(function(){
    $("#country").change(function() {
        var country = $(this).val();
        if(country){
            $.ajax({
                type: "GET",
                url:"{{url('/select-state')}}?country="+country,
                success: function (res) {
                    $("#state").empty();
                    $('#state').html(res);

                }
            });
        }
        else
        {
            $("#state").html('<option value="">Select Country first</option>');
        }
    });
    });
</script>
@yield('extra-js')
</body>

</html>