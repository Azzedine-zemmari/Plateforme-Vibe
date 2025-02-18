<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>{{$title ?? 'Vibe'}}</title>
</head>
<body>
    <nav>
        <a href="/Home">Home</a>
        <a href="/About">About</a>
        <a href="/Contact">Contact</a>
    </nav>
    <main>
        {{$slot}} 
    </main>
</body>
</html>