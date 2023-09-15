
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>window.addEventListener("scroll", scrollnav);

function scrollnav() {
  var y = window.scrollY;
  if (y > 1) {
    document.getElementById("titlecar").style.backgroundColor = "#333333";
  } else {
    document.getElementById("titlecar").style.backgroundColor = "transparent";
  }
}</script>
</head>
<body> @if(session()->has('username'))
   
<div class="titlecar" id="titlecar"  scroll="scrollnav()"  style="margin-left:35px;font-size:70px;font-weight:bolder;margin-bottom:0px !important;">Global Blog</div> 
   
<div class="Allcontainer">                                                        
    @include('headerg')
    
    
@if(isset($result) && count($result) > 0)
@foreach ($result as $all)



<div class="container" >
<div class="float">

<div class="titlecard" id="{{$all->title}}">{{ $all->title }}</div>

<div class="user">{{ $all->username }}</div>
<div class="img1">
<img src="{{ asset('img/' . $all->uimage) }}" style="width: 50px; height: 50px;border-radius: 10px;" alt="No image" ></div>
   
</div>
<div class="theme">{{$all->theme}}</div>
<div class="content-container">
    <div class="content">{{$all->content}}</div>
    <div class="image"> <img src="{{ asset('img/' . $all->img) }}" style="width: 300px; height: 200px;" alt="No image"></div>
</div>


<div class="timestamp" id="div">{{ $all->timestamp }}</div>
   
<form action="{{ route('like.post') }}" method="post">
        @csrf
        <input type="hidden" name="post_id" value="{{ $all->id }}">
        <button type="submit" class="btn btn-primary">{{$all->likes}}  Likes</button>
    </form>

</div>
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
