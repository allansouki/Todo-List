<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{$page ?? 'Projeto Todo'}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
           <img src="/assets/images/logo.png" alt="" srcset="">
        </div>
        <div class="content">
            <nav>
                {{$btn ?? null}}
            </nav>
            <main class="{{ $mainClass ?? '' }}">
    {{ $slot }}
</main>
        </div>
    </div>

</body>

</html>
