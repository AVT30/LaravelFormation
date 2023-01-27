<!-- page qui sert d'import pour les head et les footer du site pour pas qu'on ait du code qui se repete -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon super site</title>
    <link rel="stylesheet" href="resources/css/app.css">

</head>
<body>
    <!--on inclut la navbar qu'on a cree dans partials navbar -->
    @include('partials.navbar')

    <!-- la partie dynamique pour chaque page crée -->
    <div class="container mx-auto">
        @yield('content')
    </div>
   <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>