<?php

if (isset($_POST) && !empty($_FILES['image']['name'])) {


    $name = $_FILES['image']['name'];
    list($txt, $ext) = explode(".", $name);
    $image_name = time() . "." . $ext;
    $tmp = $_FILES['image']['tmp_name'];
    $st = $_POST["status"];

    if (move_uploaded_file($tmp, 'upload/' . $image_name)) {
        echo "<img width='300px' src='upload/" . $image_name . "' class='be-post'>";
        echo "<p>$st</p>";
    } else {
        echo "image uploading failed";
    }
} else {
    echo "Please select image";
}
?>