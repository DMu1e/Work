<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }

        .hero-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
            color: white;
            border-radius: 0 0 50px 50px;
            margin-bottom: 50px;
        }

        .get-started-btn {
            padding: 15px 40px;
            border-radius: 30px;
            font-weight: 600;
            background: white;
            color: #0d6efd;
            border: none;
            transition: transform 0.3s ease;
        }

        .get-started-btn:hover {
            transform: translateY(-3px);
            background: #f8f9fa;
            color: #0d6efd;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-code me-2"></i>My PHP App
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link btn btn-light text-primary px-4 rounded-pill" href="signup.php">Sign Up</a>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Hello World</h1>
            <p class="lead mb-5">A simple application with email verification.</p>
            <a class="btn get-started-btn" href="signup.php">
                Get Started <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </section>
</body>

</html>
