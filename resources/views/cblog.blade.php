<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <meta charset="UTF-8">
    <title>Create-Blog</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/css/blogcrelogo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
@if(session()->has('username'))
    @include('header')
    <div class="titlecar" id="titlecar" style="margin-left:35px;font-size:70px;font-weight:bolder;margin-bottom:0px !important;">Create Blog</div> 

    <div class="login-container1" style="padding-top:80px;margin-top:100px !important;">
    

        <form action="/cblog" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ session('username') }}" name="username">
            <table>
                <tr>
                    <td><label for="title">Title:</label></td>
                    <td><input type="text" id="title" name="title" required><br>
                    <span class="error">@error('title'){{ $message }}@enderror</span></td>
                </tr>
                
                <tr>
                    <td><label for="theme">Theme:</label></td>
                    <td><input type="text" id="theme" name="theme" required> <br><span class="error">@error('theme'){{ $message }}@enderror</span></td>
                </tr>
               
                <tr>
                    <td><label for="content">Content:</label></td>
                    <td><textarea id="content" name="content" rows="10" cols="50" required style="font-size:20px;"></textarea><br><span class="error">@error('content'){{ $message }}@enderror</span></td>
                </tr>
                
               
            </table><br>
            <button type="submit">Submit</button>
        </form>
        <br>
        <a class="toggle-overlay" href="\vie" style="margin-left:500px">back</a>
        @if(isset($success))
            <span class="success">{{ $success }}</span>
            <br>
           
        @endif
    </div>

   
@else
    <main>
        <h2>Please login!</h2>
        <a class="toggle-overlay" href="\login">SIGN IN</a>
    </main>
@endif
</body>
</html>
