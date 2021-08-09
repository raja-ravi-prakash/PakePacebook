<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registering..</title>
    <link rel="stylesheet" href="./styles/main.css">
</head>

<body>
    <script>
    setTimeout(function() {
        window.location.href = "https://" + document.domain + "/";
    }, 5000);
    </script>
    <?php
        try {
            class MyDB extends SQLite3
            {
                function __construct()
                {
                    $this->open('./data.db');
                }
            }
            $db = new MyDB();
        } catch (Exception $e) {
            echo $e;
        }
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $q = "INSERT INTO users values('$email','$password');";
        $res = $db->exec($q);
        sleep(5);
    ?>
    <h1>Thank Your For Registering</h1>
    <button id="click" onclick="go()">Go Back</button>
    <script>
    function go() {
        window.location.href = "https://" + document.domain + "/";
    }
    </script>
</body>

</html>