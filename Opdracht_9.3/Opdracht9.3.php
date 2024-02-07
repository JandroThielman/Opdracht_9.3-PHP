<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport</title>
</head>
<body>

    <style type="text/css">
        table{
            border-collapse: collapse;
            border: 1px solid black;
        }

        td{
            border: 1px solid black;
            width: 100px;
        }
    </style>

    <?php

        try {
            $db = new PDO("mysql:host=localhost;dbname=cijfers", "root", "");
            $query = $db->prepare("SELECT * FROM cijfers");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            echo "<table>";
                foreach ($result as &$data) {
                    echo "<tr>";
                        echo "<td>" . $data["id"] . "</td>";
                        echo "<td>" . $data["leerlingen"] . "</td>";
                        echo "<td>" . $data["cijfers"] . "</td>";
                    echo "</tr>";
                }
            echo "</table>";
        } catch (PDOException $e) {
            die ('Error!: ' . $e->getMessage());
        }

    ?>
</body>
</html>