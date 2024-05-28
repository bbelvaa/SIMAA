<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SIMAA</title>
        <link rel="stylesheet" type="text/css" href="styles/homelogin.css">
    </head>
    <body>
        <header>
            <h1>SIMAA</h1>
        </header>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="login.php">Log in</a></li>
                <li class="icon">
                    <img src="img/user.svg" alt="Icon">
                    <i class="arrow down"></i>
                </li>
            </ul>
        </nav>
        <h2 style="justify-content: center; display: flex;">Sistem Informasi Manajemen Aset ADSI</h2>
        <div class="login">
            
        <form action="autentikasi.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Login</button>
        </form>
        </div>

    </body>
    </html>