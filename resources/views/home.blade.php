<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<x-navbar />

<body>
   
    @auth
        <h1>Hi, {{ auth()->user()->name }}</h1>
    @endauth

    <form action="/login" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password">
        <input type="submit" value="Register">
    </form>

</body>
</html>