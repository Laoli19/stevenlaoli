<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
 body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 300px;
    width: 100%;
    box-sizing: border-box;
}

.container h1 {
    text-align: center;
    margin-bottom: 20px;
}

.container ul {
    list-style: none;
    padding: 0;
}

.container li {
    margin-bottom: 10px;
}

.container label {
    display: block;
    margin-bottom: 5px;
}

.container input[type="text"],
.container input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.container button {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: #007BFF;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    box-sizing: border-box;
}

.container button:hover {
    background-color: #0056b3;
} 
.container a{
    text-align: center;
}

    </style>
    <?php
    session_start();
    include "konek.php";

    if (isset($_POST["login"])) {
        $user = $_POST["username"];
        $pass = $_POST["password"];

        $result = mysqli_query($db, "SELECT * FROM `login` WHERE username = '$user' AND password = '$pass'");

        if(mysqli_num_rows($result) != 0){
            $row = mysqli_fetch_assoc($result);

            session_start();
            $_SESSION['role'] = $row['role'];
            $_SESSION['username'] = $row['username'];
            
            if($row['role'] == 'keuangan'){
                header("location:admin/keuangan/persembahan.php");
                exit;
            } elseif($row['role'] == 'jadwal'){
                header("location:admin/jadwal/umum.php");
                exit;
            } elseif($row['role'] == 'renungan'){
                header("location:admin/renungan/renungan.php");
                exit;
            } elseif($row['role'] == 'event'){
                header("location:admin/event/event.php");
                exit;
            }
        } 
        $error = true;
    }
    ?>
</head>
<body>
    
    <div class="container">
        <h1>Login</h1>
        <?php if(isset($error)) : ?>
            <p style= "color:red; font-syle:italic; text-align: center;">username / password salah</p>
        <?php endif;?>
        <form method="post">
            <table>
                <ul>
                    <li>
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" required title="WAJIB Mengisi Username" autofocus>
                    </li>
                    <li>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required title="WAJIB Memasukan Password">
                        
                    </li>
                    <li>
                        <button type="submit" name="login">Login</button> <br><br>
                        <a href="index.php" >BACK</a>
                    </li>
                </ul>
            </table>
        </form>
    </div>
</body>
</html>
