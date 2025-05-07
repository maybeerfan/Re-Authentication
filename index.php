<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - AuthSystem</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            min-height: 100vh;
            width: 100vw;
            background: linear-gradient(120deg, #f8fafc 0%, #f1f5f9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }
        .container {
            padding: 0;
            margin: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
        }
        .hero {
            margin: 0;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: transparent;
            box-shadow: none;
            color: #1a1a1a;
            text-align: center;
            max-width: 800px;
        }
        .hero h1 {
            color: #1a1a1a;
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }
        .hero .subtitle {
            color: #666666;
            font-size: 1.25rem;
            max-width: 600px;
            text-align: center;
            margin-bottom: 3rem;
            line-height: 1.6;
            font-weight: 400;
        }
        .cta-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        .btn {
            padding: 0.875rem 2rem;
            font-size: 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-weight: 500;
            letter-spacing: -0.01em;
        }
        .btn-primary {
            background: #2563eb;
            color: white;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .btn-secondary {
            background: #f3f4f6;
            color: #1a1a1a;
            border: 1px solid #e5e7eb;
        }
        .btn:hover {
            transform: translateY(-1px);
        }
        .btn-primary:hover {
            background: #1d4ed8;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .btn-secondary:hover {
            background: #e5e7eb;
        }
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
                padding: 0 1rem;
            }
            .hero .subtitle {
                font-size: 1.125rem;
                padding: 0 1rem;
            }
            .cta-buttons {
                flex-direction: column;
                width: 100%;
                padding: 0 1rem;
            }
            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="hero">
            <h1>Welcome to AuthSystem</h1>
            <p class="subtitle">A secure and modern authentication system that helps you manage your users with ease and confidence.</p>
            <div class="cta-buttons">
                <a href="login.php" class="btn btn-primary">Get Started</a>
                <a href="register.php" class="btn btn-secondary">Create Account</a>
            </div>
        </div>
    </div>
</body>
</html>