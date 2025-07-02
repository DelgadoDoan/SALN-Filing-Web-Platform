<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SALN Filing Web Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible&display=swap" rel="stylesheet">
    
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Atkinson Hyperlegible', 'Nunito', sans-serif;
        }

        body {
            margin: 0;
            background-color: #F9FAFB;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            font-family: 'Atkinson Hyperlegible', sans-serif;
            font-size: 1.5rem;
            font-weight: 500;
            color: #1f2937;
            margin-bottom: 1.5rem;
        }

        .card {
            background-color: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 360px;
        }

        .card h2 {
            font-family: 'Nunito', sans-serif;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: #1f2937;
        }

        .card p {
            font-family: 'Nunito', sans-serif;
            font-size: 0.9rem;
            color: #6b7280;
            margin-bottom: 1.5rem;
        }

        input {
            width: 100%;
            padding: 0.6rem;
            font-size: 1rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            margin-bottom: 1rem;
        }

        button.signin {
            width: 100%;
            background-color: #0A66C2;
            font-family: 'Nunito', sans-serif;
            color: white;
            padding: 0.6rem;
            font-size: 1rem;
            font-weight: 500;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-bottom: 1.5rem;
        }

        .divider {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .divider hr {
            flex: 1;
            border: none;
            border-top: 1px solid #d1d5db;
        }

        .divider span {
            margin: 0 10px;
            color: #6b7280;
            font-size: 0.9rem;
        }

        .social-buttons {
            display: flex;
            justify-content: space-between;
            gap: 0.5rem;
        }

        .social-button {
            flex: 1;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 0.4rem 0;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .social-button:hover {
            background-color: #f3f4f6;
        }

        .social-button img {
            height: 20px;
            width: 20px;
        }
    </style>
    </head>
    <body>
    <h1>SALN Filing Web Platform</h1>
    <div class="card">
        <h2>Log In</h2>
        <p>Welcome back!</p>

        <form action="{{ route('magic-link.login') }}" method="POST">
            @csrf
            <input value="{{old('email')}}" name="email" id="email" placeholder="Email" />
            <div class="alert alert-danger">{{ $errors->first('email') }}</div>

            <button name="submit" type="submit" class="signin">Login</button>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </form>

    </div>
</body>
</html>
