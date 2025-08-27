<!DOCTYPE html>
<html lang="en">
@props(['title', 'description', 'keywords'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $company->name }} | {{ $title }}</title>
    <meta name="description" content="{{ $description ?? 'hellloooo' }}">
    <meta name="keywords" content="{{ $keywords ?? 'hellloooo' }}">

    <meta property="og:description" content="{{ $description ?? 'hellloooo' }}">
    <meta property="og:title" content="{{ $title ?? 'hellloooo' }}">
    <meta property="og:image" content="https://sudamhub.com/images/blogs.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('frontend/index.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
</head>

<body>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v23.0&appId=719699370879387"></script>

    <x-frontend-header />

    <main>
        {{ $slot }}
    </main>

    <footer></footer>
</body>

</html>
