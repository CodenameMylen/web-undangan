<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $metaTitle ?? 'Undangan Pernikahan Digital' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Undangan pernikahan digital dengan nuansa Javanese-modern.' }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $metaTitle ?? 'Undangan Pernikahan Digital' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Undangan pernikahan digital dengan nuansa Javanese-modern.' }}">
    <meta property="og:image" content="{{ $metaImage ?? 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1200&q=80' }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cream text-textbrown antialiased">
    @yield('content')
</body>
</html>
