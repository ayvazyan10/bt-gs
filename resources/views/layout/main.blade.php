<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @stack('meta')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <meta name="yandex-verification" content="ee6b4ddf7bd4587f"/>
    <meta name="yandex-verification" content="e16d32772e41ce4f"/>
    <meta name='wmail-verification' content='0c7779ab2e215a8ccbb4bac6c33aae44'/>
    <meta name="google-site-verification" content="ZDe4QvDuRWfn3YZV8G2LGmORsffrbP8CC7T7AUB2bxM"/>
    @include('layout.parts.head')

    {{ nova_get_setting('head_code') }}
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar" data-offset="100">

{!! nova_get_setting('body_code') !!}

<x-header/>

@yield('content')

<x-footer/>

<script src="{{ mix('js/all.js') }}"></script>
<script>
    window.cookieconsent.initialise({
        "palette": {
            "popup": {"background": "#216942", "text": "#b2d192"},
            "button": {"background": "#afed71"}
        },
        "theme": "edgeless",
        "position": "bottom-right",
        "content": {
            "message": "Diese Webseite verwendet Cookies, um Ihnen ein angenehmeres Surfen zu ermöglichen.",
            "dismiss": "Got it!",
            "link": "Learn more",
            "href": "https://www.cookiesandyou.com/"
        }
    });
</script>
</body>
</html>
