<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Page</title>
    <style>
        
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #e5ecf1;
        }
    </style>
</head>
<body>
<div class="image"> <img src="{{ asset('img/alt.png') }}" style="width: 100px; height: 100px;" alt="No image"></div><break>
    <h1>Loading...</h1>

    <script>
       
        setTimeout(function() {
            window.location.href = "/welcome"; 
        }, 1000);
    </script>
</body>
</html>
