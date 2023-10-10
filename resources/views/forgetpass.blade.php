
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/css/blogcrelogo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget pass</title>
</head>
<body>
<div class="login-container" style="padding-top:10px;margin-top:100px !important">
<main>
<div class="login-title"><h2>Forgetton Password</h2></div>
           <form action="forgetpass" method="post" >
                @csrf
               
                <table style="padding-left:50px !important">
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type="text" id="username" name="username" required >
                    <span class="error">@error('username'){{ $message }}@enderror</span></td>
                </tr>
               
              
                <tr>
                    <td><label for="DOB">DOB</label></td>
                    <td><input type="date" id="DOB" name="DOB" required>
                    <span class="error">@error('DOB'){{ $message }}@enderror</span></td>
                </tr>
               
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" id="password" name="password" required>
                    <span class="error">@error('password'){{ $message }}@enderror</span></td>
                </tr>
                <tr>
                    <td><label for="confirm">Confirm Password</label></td>
                    <td><input type="password" id="confirm" name="confirm" required></td>
                </tr>
               
    
            </table>
            @if(isset($success))
         
         <span class="error"> {{ $success }}<span>
 
 @endif
                
                <div class="button-container" style="margin-bottom:10px !important;">
                    <button type="submit" id="save1" >Submit</button>
                   
                </div>
            </form> 
            <div style="padding-left: 530px;padding-bottom:0 !important">
            <a class="toggle-overlay" href="\login" >back</a>
            </div>

           


         
                <script>
   
    function validatePassword() {
        var password = document.getElementById("password").value;
        var confirm = document.getElementById("confirm").value;
        
        if (password !== confirm) {
           alert("check password");
            return false;
        } else {
            
            return true;
        }
    }

   
    document.getElementById("save1").addEventListener("click", function (e) {
        if (!validatePassword()) {
            e.preventDefault(); 
        }
    });
</script>

</div>    
    
    

            <script>
               
            </script>
</main>
</body>
</html>
