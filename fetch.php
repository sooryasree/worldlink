
<?php
// Database Structure 


$host="localhost";
$username="root";
$password="";
$databasename="social_net_working_site";

$connect=mysql_connect($host,$username,$password);
$db=mysql_select_db($databasename);

$searchTerm = $_GET['term'];

$select =mysql_query("SELECT * FROM register WHERE fname LIKE '%".$searchTerm."%'");
while ($row=mysql_fetch_array($select)) 
{
 $data[] = $row['fname'];
}
//return json data
echo json_encode($data);
?>