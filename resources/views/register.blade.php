
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <div class=logo></div>
<main>
<div class="login-container" style="padding-top:50px;">

<div class="login-title"><img src="{{ asset('/css/BLOGCRE.png') }}" style="width:389;height:64px;"></div>
  <form method="POST" action="register" enctype="multipart/form-data">
  @csrf
<table class="table">
<tr> <td><label for="img">Image:</label></td> <td>
    <input type="file" id="img" name="img"></td> </tr>
    <tr> <td><label for="name">Name</label> </td> <td><input type="text" name="name" placeholder="name"/>
           <span class="error">@error('name'){{ $message }}@enderror</span></td> </tr>
           <tr> <td><label for="username">Username</label></td> <td> <input type="text" name="username" placeholder="Username"/>
           <span class="error">@error('username'){{ $message }}@enderror</span></td> </tr>
           <tr> <td><label for="Email">Email</label> </td> <td><input type="email" name="email" placeholder="email"/>
           <span class="error">@error('email'){{ $message }}@enderror</span></td> </tr></td> </tr>
           <tr> <td><label for="DOB">DOB</label></td> <td><input type="date" name="DOB" placeholder="DOB" />
           <span class="error">@error('DOB'){{ $message }}@enderror</span>  </td> </tr>
           <tr> <td><label for="password">Password</label></td> <td><input type="password" name="password" placeholder="Password"/>
           <span class="error">@error('password'){{ $message }}@enderror</span></td> </tr>
         <tr><td> <label for="gender" id="Gender">Gender</label> </td>
          <td> <select name="gender" id="gender">
                <option value="m">Male</option>
                 <option value="f">Female</option>
          </select></td>
          </tr>

</table>

           <div style="padding-top:10px;"> <button type="submit">Register</button></div>
           @if(isset($success))
                    
                    <span class="success"> {{ $success }}<span>
            
            @endif
            
        
  <p style="paadding-buttom:30px;">Already have a account <a href="\login">Login</a></p>
</form>
  </div>
  
</main>
</body>
</html>
