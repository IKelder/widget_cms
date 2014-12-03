<?php 
$dbhost = "localhost";
$dbuser = "widget_cms";
$dbpass = "psroolike";
$dbname = "widget_corp";
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
  // Juhul kui veateate kood on olemas, teosta siin plokis paiknevad tegevused.
  die("Database connection failed: ") . mysqli_connect_error() . " (" . mysqli_connect_errno() . ").";
}

$query = "SELECT * FROM subjects";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<h1>" . $row['menu_name'] . "</h1>";
}
$query1 = "SELECT * FROM pages ORDER BY menu_name";
$result1 = mysqli_query($connect, $query1);
echo "<br><hr><br>";
while ($row1 = mysqli_fetch_assoc($result1)) {
echo '<article class="page" style="background-color: pink;"><header class="page-header"><h1 class="post-title">';
echo $row1['menu_name'];
echo '</h1></header><div class="page-body">';
echo $row1['content'];
echo '</div></article>';
}
echo "<br><hr><br>";
$query2 = "SELECT * FROM pages WHERE subject_id = 2";
$result2 = mysqli_query($connect, $query2);
while ($row2 = mysqli_fetch_assoc($result2)) {
    echo '<article class="page"><header class="page-header"><h1 class="post-title">';
    echo $row2['menu_name'];
    echo '</h1></header><div class="page-body">';
    echo $row2['content'];
    echo '</div></article>';
}
echo "<br><hr><br>";
?>
</body>
</html>
<?php
mysqli_free_result($result);
mysqli_close($connect);
?>