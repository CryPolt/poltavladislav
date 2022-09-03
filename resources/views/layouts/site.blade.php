<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Все посты блога</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/style.css', 'resources/js/main.js'])
    @vite(['resources/css/skill.css', 'recources/js/skill.js'])
    @vite(['recources/css/contact.css'])
    @vite(['recources/css/blog-home.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible mt-4" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $message }}
    </div>
@endif

@include('inc.header')



<div class="container">
    <nav class="navbar navbar-expand-lg ">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form class="form-inline my-20 my-lg-6" action="{{ route('post.search') }}">
                <input class="form-control mr-sm-2" type="search" name="search"
                       placeholder="Найти пост..." aria-label="Поиск">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
            </form>
        </div>
    </nav>

    @yield('content')


</div>
</body>
</html>
