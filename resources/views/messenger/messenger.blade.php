<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    I have a message from some one


    <button onclick="fireEvent()">
        fire
    </button>

    <script>

        var pusher = new Pusher('5a6aacaf6af648d513c7');

        function fireEvent(){
            fetch( "{{route('fire' , ['id' => '2'])}}" , {method:"GET"} ).then(text => text.text()).then(text=>console.log(text))
        }

        var channel = pusher.subscribe('MessageChannel');

        channel.bind('MessageEvent' , function(data){
            alert("hello hther");
            console.log(data.message);
        })
    </script>
</body>
</html>