
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body> @if(session()->has('username'))
@include('header')
<div class="titlecar" id="titlecar" style="margin-left:35px;font-size:70px;font-weight:bolder;margin-bottom:0px !important;">Edit Blog</div> 

<div class="login-container1" style="padding-top:50px;margin-top:200px !important;">
    <form action="edit" method="post">
    @csrf 
    <table> <input type="hidden" value="{{$id}}" name="id">
                <tr>
                    <td><label for="title">Title:</label></td>
                    <td><input type="text" id="title" name="title" required value="{{$title}}"></td>
                </tr>
                <tr>
                    <td><label for="theme">Theme:</label></td>
                    <td><input type="text" id="theme" name="theme" required value="{{$theme}}"></td>
                </tr>
                <tr>
                    <td><label for="content">Content:</label></td>
                    <td><textarea id="content" name="content" rows="10" cols="50" required style="font-size:20px;">{{$content}}</textarea></td>
                </tr>
                
            </table><br>
    
    <div style="padding-top:40px;"> <button type="submit">Submit</button></div>
</form>
<a class="toggle-overlay" href="\vie" style="margin-left:500px;">back</a>
</div>
@if(isset($success))
         
         <span class="success"> {{ $success }}<span>
 
 @endif










    
    @else
    <main>
 
  <h2>Please login!</h2>
  <a class="toggle-overlay" href="\login">SIGN IN</a>
</main>
    @endif
</body>
</html>
