
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('/css/app1.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>

    <div class="navbar">
        <div class="logo">
        <img src="{{ asset('/css/BLOGCRE.png') }}"  alt="">
        </div>
        <div class="nav-icons">
           
          







            <div class="home-icon"><a href="vie"><img src="{{ asset('/css/home.png') }}"></a></div>
            <div class="global-icon"><a href="global"><img src="{{ asset('/css/global.png') }}"></a></div>
            <div class="edit-icon"><a href="cblog"><img src="{{ asset('/css/edit.png') }}"></a></div>
            <div class="drop"> <p class="toggle-overlay1">{{session('username')}}</p><div class="drop1">
             <div class="profile-icon"><a href="profile"><img src="{{ asset('/css/profile1.png') }}"></a></div>
             <div class="logout-icon"><a href="logout"><img src="{{ asset('/css/logout.png') }}"></a></div>
             </div></div>
             <script>
            
const dropdown = document.querySelector('.drop1');


function hideDropdown() {
    setTimeout(() => {
        dropdown.style.display = 'none';
    }, 800); 
}


dropdown.parentElement.addEventListener('mouseenter', () => {
    dropdown.style.display = 'block';
    hideDropdown();
});

dropdown.parentElement.addEventListener('mouseleave', () => {
    setTimeout(() => {
        dropdown.style.display = 'none';
    }, 800);
    
});</script>

        </div>
    </div>
    
</body>
</html>

</body>
</html>
