<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
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

        $query = "SELECT * FROM users";
        $ret = $db->query($query);
        echo "<table>";
        echo "<tr>";
        echo "<th>Email</th>";
        echo "<th>Password</th>";
        echo "</tr>";
        
        while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        $db->close();
    ?>
</body>

</html>