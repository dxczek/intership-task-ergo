<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>db web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #4caf50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista Użytkowników</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Email</th>
                <th>Data utworzenia</th>
            </tr>
            <?php
            $servername = "db"; 
            $username = "user";
            $password = "user_password";
            $dbname = "my_database";

     // (( TO DO ))   
            $conn = new mysqli($servername, $username, $password, $dbname);

       
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // 
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["created_at"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Brak użytkowników</td></tr>";
            }

         
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>

