<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learn & Earn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo">Learn<span>WEB3 </span></div>
            <nav class="nav">
                <a href="#features">Features</a>
                <a href="#join">Join</a>
                <a href="{{ route('register') }}" class="btn-link">Register</a>
                <a href="{{ route('login') }}" class="btn-outline">Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>WEB3: The new world of digital finance. </h1>
            <p>Every lesson completed brings you closer to something valuable.</p>
            <a href="#join" class="btn-primary">Get Started</a>
        </div>
    </section>

    <!-- Features -->
    <section class="features" id="features">
        <div class="container">
            <h2>Why Choose Learn & Earn?</h2>
            <div class="feature-grid">
                <div class="feature-item">
                    <div class="icon">🎯</div>
                    <h3>Goal-Based Learning</h3>
                    <p>Set clear learning objectives and track your progress visually.</p>
                </div>
                <div class="feature-item">
                    <div class="icon">🏆</div>
                    <h3>Earn Real Rewards</h3>
                    <p>Get gift cards, points, or even crypto for your achievements.</p>
                </div>
                <div class="feature-item">
                    <div class="icon">⚡</div>
                    <h3>Quick Micro Lessons</h3>
                    <p>Short, powerful lessons designed for busy people like you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section with Signup -->
    <section class="cta" id="join">
        <div class="container">
            <h2>Start Learning. Start Earning.</h2>
            <p>Enter your email to join the waitlist or get started today.</p>

            <form action="#" method="POST" class="email-form">
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit">Join Now</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>© 2025 Learn & Earn. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>





