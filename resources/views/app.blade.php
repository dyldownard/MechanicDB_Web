<!doctype html>
<html lang="{{ str_replace('_','-', app()->getLocale())}}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> MechanicDB </title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/vue-material@beta/dist/theme/default.css">
  <link href="{{ mix('css/app.css')}}" type="text/css" rel="stylesheet" />
</head>

<body>
  <div id="app"></div>
  <script src="{{ mix('js/app.js')}}" type="text/javascript"></script>
</body>

</html>
