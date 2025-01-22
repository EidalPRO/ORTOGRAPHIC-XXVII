<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>LUN DEV</title>
    <link rel="shortcut icon" href="{{asset('assets/img/logo-ortographic.webp')}}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/auth/style.css')}}">
</head>

<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="">
        </div>
        <h1>Hi, welcome back!</h1>
        <p>First time here? <span class="text-white">Sign up for free</span></p>
    </header>
    <form action="login.html">

        <input
            type="email"
            name="email"
            placeholder="Your email"
            required>

        <input
            type="password"
            name="password"
            placeholder="Password"
            minlength="6"
            required>
        <p>Password must be at least 6 characters</p>

        <button type="submit">Sign in</button>

        <p class="text-white">Sign in using magic link</p>
        <div class="or">or</div>
        <button class="sso" type="button">Login with phone number</button>
        <p>
            You acknowledge that you read, and agree, to our <a>Terms of Service</a> and our <a>Privacy Policy</a>.
        </p>
    </form>
</body>

</html>