
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('/css/app1.css') }}">
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/css/blogcrelogo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>

    <div class="navbar">
        <div class="logo">
        <img src="{{ asset('/css/BLOGCRE.png') }}"  alt="">
        </div>
        <div class="nav-icons">
            <div id="searchform">
        <table >
            <td><form action="vietitle" method="post">
                @csrf
                <input type="text"  placeholder="Search by title" name="title" style="width:500px;padding-right:400px;">
            </form></td>
        </table></div>
            <div class="search-icon" id="search"><img src="{{ asset('/css/search.png') }} "></div>
            <script>document.getElementById("search").addEventListener("click", function() {
            var searchicon=document.getElementById("search");
    var searchForm = document.getElementById("searchform");
    if (searchForm.style.display === "none") {
        searchForm.style.display = "block";
        searchicon.style.display="none";

    } else {
        searchForm.style.display = "none";
    }
});
</script>







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
    }, 3000); 
}


dropdown.parentElement.addEventListener('mouseenter', () => {
    dropdown.style.display = 'block';
    hideDropdown();
});

dropdown.parentElement.addEventListener('mouseleave', () => {
    setTimeout(() => {
        dropdown.style.display = 'none';
    }, 3000);
    
});</script>

        </div>
    </div>
    
</body>
</html>

</body>
</html>
