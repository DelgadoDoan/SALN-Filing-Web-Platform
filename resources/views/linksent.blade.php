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
            background-color: #f9fafb;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            font-size: 2.25rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 2rem;
            text-align: left;
        }

        .card {
            background-color: white;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.07);
            width: 100%;
            text-align: center;
            max-width: 500px;
            min-height: 400px;
        }

        .card h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }

        .card p {
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }

        input {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1.05rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        button.signin {
            width: 100%;
            background-color: #0a66c2;
            color: white;
            padding: 0.75rem;
            font-size: 1.05rem;
            font-weight: 300;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button.signin:hover {
            background-color: #004eaa;
        }

        .header {
            position: absolute;
            top: 20px;
            left: 30px;
            }

        .header h1 {
            margin: 0;
            font-size: 1.75rem;
            color: #1f2937;
        }

        .error {
            font-family: 'Nunito', sans-serif;
            font-size: 0.9rem;
            color: #ed4337;
            margin-bottom: 1.5rem;
        }
        
        .redirect {
            font-size: 0.9rem;
            color: #6b7280;
            margin-top: 2rem;
            text-align: center;
        }
    </style>
    </head>
    <body>
    <h1>SALN Filing Web Platform</h1>
    <div class="card">
        <h2>You're almost done!</h2>
        <h5>We sent an email to</h5>
        <h3>{{ $email }}</h3>
        <p>Be sure to click the link within <b>30 minutes</b> to complete your login.</p>
    </div>
</body>
</html>
