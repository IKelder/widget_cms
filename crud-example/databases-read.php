<?php 
/*$dbhost = "localhost";
$dbuser = "widget_cms";
$dbpass = "psroolike";
$dbname = "widget_corp";
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); */

$dbhost ="localhost";
$dbuser ="widget_cms";
$dbpass ="psroolike";
$dbname ="widget_corp";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ").");
}
$query = "SELECT * FROM subjects";
  $result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<ul>
<?php while ($subject = mysqli_fetch_assoc($result)){ ?>
    <li> . <?php echo $subject["menu_name"]; ?>
        <?php echo $subject["id"]; ?>
        <a href="databases-update.php?id=<?php echo $subject['id']; ?>">Muuda</a>
        </li>
<?php } ?>
</ul>
<?php mysqli_free_result($result);?>
</body>
</html>
<?php mysqli_close($connection);?>