<!DOCTYPE html>

<?php 
    session_start();
?>

<html lang="en">
    <head>
        <title>The Erasmus Program</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/menu.css"/>
        <link rel="stylesheet" href="styles/index.css"/>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="menu">
                <nav>
                    <?php
                        if((isset($_SESSION['user']) && $_SESSION['user'] == 'root')) {
                            echo('<p>Home</p>
                                <a href="requirements.php">Requirements</a>
                                <a href="application.php">Application</a>
                                <a href="dashboard.php">Dashboard</a>
                                <a href="log-out.php">Log-out</a>
                                <a href="more.php">About</a>');
                        }
                        else if(isset($_SESSION['user'])) {
                            echo('<p>Home</p>
                                <a href="requirements.php">Requirements</a>
                                <a href="application.php">Application</a>
                                <a href="profile.php">Profile</a>
                                <a href="log-out.php">Log-out</a>
                                <a href="more.php">About</a>');
                        }
                        else {
                            echo('<p>Home</p>
                                <a href="requirements.php">Requirements</a>
                                <p>Application(Log-in)</p>
                                <a href="log-in.php">Log-in/Sign-up</a>
                                <a href="more.php">About</a>');
                        }
                    ?>
                </nav>
            </div>
            <div class="context">
                <h1>Welcome to the Erasmus Program</h1>
                <main>
                    Welcome to our Erasmus Program application portal! We’re delighted you’re considering
                    applying for this exciting opportunity. This page serves as your gateway to explore
                    and submit your application for the Erasmus Program—a unique EU initiative offering
                    students the chance to study, intern, or engage in academic mobility abroad.
                    Here, you can find essential information on eligibility, the application process,
                    and helpful resources. Our goal is to guide you step by step to ensure a smooth
                    application process, from getting nominated by your home institution to submitting
                    the final documents online. Enjoy your journey toward expanding your academic horizons
                    and international experience!
                </main>
            </div>
        </div>
        <footer>
            <p>
                Contact: placeholder@email.com |
                <a href="https://erasmus-plus.ec.europa.eu/document/higher-education-institutions-holding-an-eche-2021-2027">Partners</a> |
                <a href="more.php">About</a>
            </p>
            <p>&copy; 1791 Erasmus Program. All rights reserved. (not really)</p>
        </footer>

        <?php if(isset($_SESSION['message'])): ?>
        <div id="notification" style="
            position:fixed;top:30px;left:50%;transform:translateX(-50%);
            background:#f8d7da;color:#721c24;padding:16px 32px;border-radius:8px;
            box-shadow:0 2px 8px rgba(0,0,0,0.15);z-index:9999;
            font-size:1.1em;">
            <?php echo htmlspecialchars($_SESSION['message']); ?>
        </div>
        <script>
            setTimeout(function() {
                var n = document.getElementById('notification');
                if(n) n.style.display = 'none';
            }, 4000);
        </script>
        <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
    
</body>
</html>