<!DOCTYPE html>

<?php 
    session_start();
?>

<html lang="en">
    <head>
        <title>About the erasmus program</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/menu.css"/>
        <link rel="stylesheet" href="styles/more.css"/>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="menu">
                <nav>
                    <?php
                        if(isset($_SESSION["user"]) && $_SESSION["user"] == 'root') {
                            echo('<a href="index.php">Home</a> 
                                <a href="requirements.php">Requirements</a>
                                <a href="application.php">Application</a>
                                <a href="dashboard.php">Dashboard</a>
                                <a href="log-out.php">Log-out</a>
                                <p>About</p>');
                        }
                        else if(isset($_SESSION["user"])) {
                            echo('<a href="index.php">Home</a> 
                                <a href="requirements.php">Requirements</a>
                                <a href="application.php">Application</a>
                                <a href="profile.php">Profile</a>
                                <a href="log-out.php">Log-out</a>
                                <p>About<p/>');
                        }
                        else {
                            echo('<a href="index.php">Home</a> 
                                <a href="requirements.php">Requirements</a>
                                <p>Application(Log-in)</p>
                                <a href="log-in.php">Log-in/Sign-up</a>
                                <p>About</p>');
                        }
                    ?>
                </nav>
            </div>
            <div class="content">
                <div class="header">
                    <h1>About the Erasmus program</h1>
                    <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/QILF3xDs2c0?si=-q_7ne-P98PjDbXf"
                            title="YouTube video player"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                    </iframe>
                </div>

                <div class="context">
                    <p>
                        Erasmus+ is an innovative, EU-funded program that empowers students,
                        educators, and youth to broaden their academic and cultural horizons
                        through international mobility and cooperation. At its core, Erasmus+
                        facilitates opportunities for studying, training, and volunteering
                        abroad by connecting your home institution with universities and
                        organizations across Europe—and beyond. Participants can spend anywhere
                        from two to twelve months overseas, engage in internships, take part in
                        courses and job shadowing, or even pursue joint master's degrees. The
                        program not only enhances academic development by allowing you to
                        experience diverse educational approaches and cultural environments, but
                        it also fosters personal growth, intercultural understanding, and
                        the creation of long-lasting professional networks. To get started,
                        students are typically nominated by their home institutions and provided
                        with essential financial support to cover travel, living expenses, and
                        other costs, making Erasmus+ a vital resource for experiencing transformative
                        education and building a truly global perspective.
                    </p>
                </div>

                <div class="images">
                    <img src="../media/index_background.jpeg" alt="Erasmus+ Image 1" width="200" height="200">
                    <img src="../media/more_background.jpg" alt="Erasmus+ Image 2" width="200" height="200">
                    <img src="../media/login_background.jpg" alt="Erasmus+ Image 3" width="200" height="200">
                    <img src="../media/req-background.png" alt="Erasmus+ Image 4" width="200" height="200">
                </div>

                <div class="extras">
                    <h2>Further Material</h2>
                    <ul>
                        <li><a href="https://erasmus-plus.ec.europa.eu/">Erasmus+ Official Website</a></li>
                        <li><a href="https://erasmus-plus.ec.europa.eu/the-uk-and-erasmus">Erasmus+ UK</a></li>
                        <li><a href="https://erasmus-plus.ec.europa.eu/resources-and-tools/how-to-apply">Application Guide</a></li>
                        <li><a href="https://erasmus-plus.ec.europa.eu/about-erasmus/history-funding-and-future">Funding Guide</a></li>
                        <li><a href="https://erasmus-plus.ec.europa.eu/document/higher-education-institutions-holding-an-eche-2021-2027">Partners</a></li>
                        <li><a href="https://commission.europa.eu/about/contact_en">Contacts</a></li>
                        <li><a href="https://erasmus-plus.ec.europa.eu/contacts/your-questions-answered">FAQs</a></li>
                        <li><a href="https://example.com/">Terms and Conditions</a></li>
                        <li><a href="https://commission.europa.eu/privacy-policy-websites-managed-european-commission_en">Privacy Policy</a></li>
                    </ul>
                </div>
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