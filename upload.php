<?php
if (isset($_POST['submit'])) {
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 700000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {

if ($_FILES["file"]["error"] > 0) {
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
} else {
move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
echo "<span>Your File Uploaded Succesfully...!!</span><br/>";

}
} else {
echo "<span>***Invalid file Size or Type***<span>";
}
}
?>