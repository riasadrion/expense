<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Admin Panel | Sign In</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('/')}}/assets/img/svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">
</head>

<body>
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            <h1 class="sign-up__title">Welcome back!</h1>
            <p class="sign-up__subtitle">Sign in to your account to continue</p>
            <form class="sign-up-form form" action="{{ route('login') }}" method="POST">
                @csrf
                <label class="form-label-wrapper">
                    <p class="form-label">Email</p>
                    <input class="form-input" name="email" type="email" placeholder="Enter your email"
                        value="test@malikseeds.com" required>
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Password</p>
                    <input class="form-input" name="password" type="password" placeholder="Enter your password"
                        value="test123" required>
                </label>

                <button type="submit" class="form-btn primary-default-btn transparent-btn">Sign in</button>
            </form>
        </article>
    </main>
</body>

</html>