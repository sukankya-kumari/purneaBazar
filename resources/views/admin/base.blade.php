<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/26d4a64054.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    
    <!-- CSS only -->
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
@livewireStyles
</head>
<body style="background-color: #f3f6f7">
   <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #fab1a0">
     <div class="container">
        <a href="{{route('home')}}" class="navbar-brand">Purnea Bazaar</a>
   
    <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="{{route('home')}}" class="nav-link">Home</a></li>
        @auth
        <li class="nav-item"><a href="" class="nav-link text-light"><i class="bi bi-person-circle"></i> {{Auth::user()->name}}</a></li>
        <li class="nav-item"><a href="{{route('businessInsert')}}" class="nav-link text-light"><i class="bi bi-plus-circle-fill"></i> Add Business</a></li>
        <li class="nav-item"><a href="{{route('admin.details',['user_id'=>Auth::user()->id])}}" class="nav-link text-light"><i class="bi bi-eye-fill"></i> Your Bisuness details</a></li>
        <li class="nav-item">
            <form action="{{route('logout')}}" method="POST">
            @csrf
            <input type="submit" value="Logout" class="btn-danger btn">
        </form>
        </li>
        @endauth
        @guest
        <li class="nav-item"><a href="{{route('login')}}" class="nav-link text-light">login</a></li>
        <li class="nav-item"><a href="{{route('register')}}" class="nav-link text-light">register</a></li>
        @endguest
    </ul>
     </div>
   </nav>
    
@yield('content')
@livewireScripts
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>