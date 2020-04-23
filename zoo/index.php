<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$servername = "localhost";
$username = "djurparkJanitor";
$password = "br0mmabl0cks";
$dbname = "djurpark";

$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT id, name, category, birthday FROM animals";
$result = $conn->query($sql);




?>
<!DOCTYPE html>
<html>

<body>


    <form method="post">
        <select name="zoo">
            <option value="">Välj ett djur</option>
            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    foreach ($result as $zoo) {
                        echo '<option value="' . $zoo['name'] . '">' . $zoo['name'] . '</option>';
                    }
                }
            }
            ?>
        </select>
        <input type="text" name="search"><br>

        <input type="submit" value="submit">

    </form>
    <form method="post" enctype="multipart/form-data">
        Välj bild:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <?php
    if (!empty($_POST["submit"]) && 'Upload Image' === $_POST['submit']) {
        $target_dir = "./bilder";
        $target_file = $target_dir . '/' . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);


        if ($check !== false) {
            echo "Filen är en bild - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Filen är inte en bild.";
            $uploadOk = 0;
        }
        if ($uploadOk) {
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }
    }
    ?>



    <?php

    $search_value = '';
    if (!empty($_POST['search'])) {
        $search_value = $_POST['search'];
    } else if (!empty($_POST['zoo'])) {
        $search_value = $_POST['zoo'];
    }
    if (!empty($search_value)) {
        $inp = $search_value;
        $sth = $conn->prepare("SELECT id, name, category, birthday FROM `animals` WHERE name = ?");
        $sth->bind_param('s', $inp);
        $sth->execute();
        $sth->store_result();

        if ($sth->num_rows) {
            $sth->bind_result($id, $name, $category, $birthday);
            $sth->fetch();

    ?>
            <br><br><br>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Birthday</th>
                </tr>

                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $category; ?></td>
                    <td><?php echo $birthday; ?></td>
                </tr>
            </table>
    <?php
        } else {
            echo "Detta namn finns inte";
        }
        $sth->free_result();
        $sth->close();
    }


    ?>
</body>

</html>