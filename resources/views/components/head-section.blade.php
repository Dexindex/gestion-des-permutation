@props(['title'])

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Gestion Des Permutation | {{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('./images/favicon.png') }}" />
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com/') }}" />
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com/') }}" crossorigin />
    <link
        href="{{ asset('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&amp;display=swap') }}"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/css/perfect-scrollbar.min.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/css/style.css') }}" />
    <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/vendor/dataTables.dataTables.min.css') }}">
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/tippy-bundle.umd.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('./assets/vendor/tailwind/jquery-3.7.1.js') }}"></script>
    <style>
        .dt-search {
            display: flex;
            justify-content: end;
            align-items: center;
        }
    </style>

</head>
