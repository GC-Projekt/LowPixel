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
    @vite(['resources/css/style_news_index.css'])
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
    <title>LowPixel | News</title>
</head>
<body style="background-image: url(../img/main_bg.png   );">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                    <a class="nav-link text" aria-current="page" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text" href="{{route('rules')}}">Правила сервера</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text" href="{{route('news')}}">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text" href="{{route('login')}}">Войти</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <div class="main-w wrapper">
        <h1 class="text title">Последние новости</h1>
        @foreach($posts as $post)
            <div class="item" style="background-image: url({{$post->main_image}});">
                <div class="descriptionWrapper">
                    <div class="newsTitle text">{{$post->title}}</div>
                    <div class="newsDescription text">{!! $post->content !!}</div>
                    <div class="btnWrapper">
                        <a href="news/{{$post->id}}" class="newsBtn">Подробнее</a>
                    </div>
                </div>

            </div>
        @endforeach

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
