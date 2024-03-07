
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>test</title>
    @vite(['resources/sass/app.scss','resources/css/app.css'])
</head>
<body> 


    @yield('content')



   
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key={{env("MAP_API_KEY")}}&libraries=places&callback=initAutocomplete" async defer></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @vite(['resources/js/app.js'])

</body>
</html>