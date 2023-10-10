
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/css/blogcrelogo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>window.addEventListener("scroll", scrollnav);

function scrollnav() {
  var y = window.scrollY;
  if (y > 1) {
    document.getElementById("titlecar").style.backgroundColor = "#e5ecf1";
  } else {
    document.getElementById("titlecar").style.backgroundColor = "transparent";
  }
}</script>
</head>
<body> @if(session()->has('username'))
   @include('header')
<div class="titlecar" id="titlecar"  scroll="scrollnav()" style="margin-left:35px;;font-size:70px;font-weight:bolder;margin-bottom:0px !important;">View Blog</div> 

    <div class="Allcontainer">   
    
   
    @if(isset($result) && count($result) > 0)
@foreach ($result as $all)



<div class="container" >   
  <div class="titlecard" id="{{$all->title}}">{{ $all->title }}</div>
<div class="theme">{{$all->theme}}</div>
<div class="content-container">
    <div class="content">{{$all->content}}</div>
    <div class="image"> <img src="{{ asset('img/' . $all->img) }}" style="width: 260px; height: 200px;" alt="No image"></div>
</div>


<div class="timestamp" id="div">{{ $all->timestamp }}</div>
<p class="toggle-overlay1">{{$all->likes}}  Likes</p>
   <div id="div">
    <form action="ed" >
        <input type="hidden" value="{{ $all->id }}" name='id'>
        <input type="hidden" value="{{ $all->theme }}" name='theme'>
        <input type="hidden" value="{{ $all->content }}" name='content'>
        <input type="hidden" value="{{ $all->title }}" name='title'>
        <button type="submit" >Edit</button>
    </form>
    </div>

<div id="div">
    <form action="delete" ><input type="hidden" value="{{ $all->id }}" name='id'><button type="submit">Delete</button></form></div>
    </div>



    @endforeach

    </div>
@else

<div class="errormsg" >
<div class="login-title"><h2>No Blog found</h2></div>
</div>
@endif

    @else
    <main>
 
  <h2>Please login!</h2>
  <a class="toggle-overlay" href="\login">SIGN IN</a>
</main>
    @endif
</body>
</html>
