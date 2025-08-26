<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'TaDa') }}</title>
</head>
<body class="">
<header class="">

</header>
<main>
  @foreach($tasks as $task)
      <div>
          {{$task->title}}
          {{$task->status}}
      </div>
  @endforeach
</main>
<footer>

</footer>
</body>
</html>
