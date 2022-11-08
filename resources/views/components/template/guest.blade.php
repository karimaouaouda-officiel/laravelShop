<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('./css/favicon.ico')}}" type="image/x-icon">
    <x-assets.libs/>
    <link rel="stylesheet" href="{{asset('./css/custom/main.css')}}">
    <title>{{env('APP_NAME')}} - the best place to open your market</title>
</head>
<body>
    <div id="app">
        {{$slot}}
    </div>
</body>
</html>