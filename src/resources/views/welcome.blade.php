<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"
    />
    @vite(['resources/css/welcome.css'])
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
    ></script>
    <title>LowPixel</title>
</head>
<body style="background-image: url('/img/main_bg.png')">
{{--<div class="mainWrapper" style="background-image: url('/img/main_bg.png')">--}}
{{--    --}}

{{--</div>--}}
<div class="mainBlock" style="background-image: url('/img/first_screen.png')">
    <div class="mainTitles">
        <h1 class="text">LowPixel</h1>
        <h3 class="text">От создателей D&M</h3>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top ">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="img/LowPixel.png" alt=""></a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse pl-5 ml-5" id="navbarNav">
            <ul class="navbar-nav w-100 justify-content-between">
                <li class="nav-item">
                    <a class="nav-link active text" aria-current="page" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text" href="{{route('rules')}}">Правила сервера</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text" href="{{route('news')}}">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text" href="{{route('login')}}">Войти</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="serversBLock">
    <div class="wrapper">
        <h3 class="title text">Доступные серверы:</h3>
        <div class="serversBlock_objects">
            <div class="table" style="background-image: url(/img/table.png);">
                <h5 class="serverName text">LowPixel</h5>
                <div class="online">
                    <img src="img/icon.svg" alt="" class="serverIcon" />
                    <div class="number text">{{count($data['users'])}}/{{$data['max']}}</div>
                </div>
            </div>
            <div class="serverDescr">
                <img src="img/server.png" alt="" class="serverDescr_img" />
            </div>
        </div>
    </div>
</div>

<div class="newsBlock">
    <div class="wrapper">
        <h3 class="text title">Последние новости:</h3>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                    $i = 0;
                @endphp
                @foreach($posts as $post)
                    <div class="carousel-item {{$i == 0 ? 'active' : ''}}">
                        <img src="{{$post->main_image}}" class="d-block w-100" alt="...">
                        <div class="itemDescription text">{!! $post->content !!}</div>
                    </div>
                    @php
                      $i++;
                    @endphp
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <a href="{{route('news')}}" class="btn">Посмотреть все новости</a>
        </div>



    </div>

</div>

<div class="aboutBLock">
    <div class="wrapper">
        <h3 class="text title">О нас:</h3>
        <div class="items">
            <div class="item">
                <img src="img/firstVi.png" alt="">
                <div class="text">Нет доната.</div>
            </div>
            <div class="item">
                <img src="img/secondVi.png" alt="">
                <div class="text">Исследуй мир с друзьями.</div>
            </div>
            <div class="item">
                <img src="img/thirdVi.png" alt="">
                <div class="text">Вайп каждые 2 месяца.</div>
            </div>
        </div>
    </div>
</div>

<footer>

    <div class="wrapper">
        <div class="company"><img src="img/GC_Project.png" alt=""></div>
        <div class="projects">
            <img src="img/LowPixel.png" class="LowPixel" alt="">
            <img src="img/DM.png" class="DM" alt="">
        </div>
        <div class="developers">
            <div class = "text">Наши сотрудники:</div>
            <div class = "text name">Тахир Латыпов</div>
            <div class = "text name">Алмаз Суфиянов</div>
            <div class = "text name">Альфред Хабибуллин</div>
            <div class = "text name">Тимур Суфиянов</div>
        </div>
    </div>
</footer>

</body>
</html>
