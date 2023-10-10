<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <title>Profile</title>
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/css/blogcrelogo.png') }}">
</head>
<body>
    @if(session()->has('username'))
        @include('headerpro')
        <div class="titlecar" id="titlecar" style="margin-left:35px;font-size:70px;font-weight:bolder;margin-bottom:0px !important;">Profile</div> 

        <div class="login-container1" style="padding-top:50px; ">

        @foreach($data as $dat)
         <div id="profileimg"><img src="{{ asset('img/' . $dat->img) }}" alt="" style="width: 200px;height: 200px;border-radius: 50%;object-fit: cover;margin: 0 auto 20px;overflow: hidden;" ></div>
        <form action="editprofile" method="post" enctype="multipart/form-data">
                @csrf
               
                <table > <input type="hidden" value="{{$dat->id}}" name="id">
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type="text" id="username" name="username" required value="{{$dat->username}}" readonly></td>
                </tr>
                <tr>
                    <td><label for="name">Name</label></td>
                    <td><input type="text" id="name" name="name" required value="{{$dat->name}}" readonly></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" id="email" name="email" required value="{{$dat->email}}" readonly></td>
                </tr>
               
                <tr>
                    <td><label for="mobile">Mobile</label></td>
                    <td><input type="tel" id="mobile" name="mob" required value="{{$dat->mobile}}" readonly></td>
                </tr>
                <tr>
                    <td><label for="DOB">DOB</label></td>
                    <td><input type="date" id="DOB" name="DOB" required value="{{$dat->DOB}}" readonly></td>
                </tr>
               
                
    
            </table>
    
                <div class="button-container" style="margin-bottom:10px !important;">
                    <button type="submit" id="save" >Save</button>
                   
                </div>
            </form>  
               <table>
            <tr>
            <td><button id="editButton" >Edit</button></td>
        
            <td><button id="changeButton" >Change Password</button></div></td><td><a class="toggle-overlay" href="\vie" >back</a></td>
</td></tr></table> 
        <div>
            <form action="changepass" method="post" id="changeform" onsubmit="return validateForm()">
                @csrf
<table><input type="hidden" name="username" value="{{$dat->username}}">
            <tr>
                    <td><label for="curr">Current Pass</label></td>
                    <td><input type="password" id="curr" name="curr" ></td>
                </tr>
                <tr>
                    <td><label for="change">Change pass</label></td>
                    <td><input type="password" id="change" name="change" ></td>
                </tr>

                </table>
            <button type="submit">Submit</button>
            </form>



            <script>
                const correctPassword = "{{$dat->password}}"; 
        function validateForm() {
            var currentPassword = document.getElementById("curr").value;
              if (currentPassword === correctPassword) {
                return true;
                
            }else{alert("Incorrect current password");return false; }
           
        }
    </script>
</div>    
    
    
    </div>
            <script>
                const usernameField = document.getElementById('username');
                const nameField = document.getElementById('name');
                const emailField = document.getElementById('email');
                const mobField = document.getElementById('mobile');
                const DOBField = document.getElementById('DOB');
                const imgField = document.getElementById('img1');
                const editButton = document.getElementById('editButton');
                const saveButton = document.getElementById('save');
                const changeform = document.getElementById('changeform');
                const changeButton = document.getElementById('changeButton');
                editButton.addEventListener('click', function () {
                    const enteredPassword = prompt("Enter password:");
                   
                    const correctPassword = "{{$dat->password}}"; 

                    if (enteredPassword === correctPassword) {
                        editButton.style.display="none";
                        saveButton.style.display = "block";
                        usernameField.removeAttribute('readonly');
                        nameField.removeAttribute('readonly');
                        emailField.removeAttribute('readonly');
                        mobField.removeAttribute('readonly');
                        DOBField.removeAttribute('readonly');
                        imgField.removeAttribute('readonly');
                    } else {
                        alert("Incorrect password. Editing is not allowed.");
                    }
                });
                changeButton.addEventListener('click', function () {
                    changeButton.style.display="none";
                    changeform.style.display="block";


                });
            </script>
        @endforeach
    @else
        <main>
            <h2>Please login!</h2>
            <a class="toggle-overlay" href="\login">SIGN IN</a>
        </main>
    @endif
</body>
</html>
