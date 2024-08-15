<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <li><a class="nav-link active" href="{{ route('main.index') }}">Main</a></li>
                    <li><a class="nav-link" href="{{ route('post.index') }}">Posts</a></li>
                    <li><a class="nav-link" href="{{ route('about.index') }}">About</a></li>
                    <li><a class="nav-link" href="{{ route('contact.index') }}">Contacts</a></li>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
</div>
</body>
</html>
