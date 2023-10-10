
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/css/blogcrelogo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <div class=logo></div>
<main>
<div class="login-container" style="padding-top:50px;">

    <div class="login-title"><img src="{{ asset('/css/BLOGCRE.png') }}" style="width:389;height:64px;"></div>
    <form method="POST" action="/login">
    @csrf
               
               <table style="padding-left:100px !important;padding-top:100px !important">
               <tr>
                   <td><label for="username">Username</label></td>
                   @if(isset($username))
                   <td><input type="text" id="username" name="username" required value={{$username}} readonly>
                   @else
                   <td><input type="text" id="username" name="username" required > 
                   @endif
                   <span class="error">@error('username'){{ $message }}@enderror</span></td>
               </tr>
              
             
              
              
               <tr>
                   <td><label for="password">Password</label></td>
                   <td><input type="password" id="password" name="password" required>
                   <span class="error">@error('password'){{ $message }}@enderror</span></td>
               </tr>
               
              
   
           </table>
    <div style="padding-top:60px;"> <button type="submit">login</button></div>
   
    @if(isset($success))
         
         <span class="error"> {{ $success }}<span>
 
 @endif
</form>
<p><a href="/forgetpass">Forgetten password </a></p>
<p>Create an Account <a href="/register">Register</a></p>

  </div>
  
</main>
</body>
</html>
