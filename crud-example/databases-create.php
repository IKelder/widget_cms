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
if (isset($_POST['submit'])){
$menu_name = $_POST['menu_name'];;
$position = $_POST['position'];;
$visible = $_POST['visible'];;
$query = "INSERT INTO subjects (menu_name, position, visible)
            VALUES ('{$menu_name}', {$position}, {$visible})";
  $result = mysqli_query($connection, $query);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
if (isset($_POST['submit'])){
if ($result) {
    echo "Õnnestus";
} else {
    echo "Ebaõnnestus";
}
}
?>
<pre><?php print_r($_POST); ?></pre>
<form action="databases-create.php" method="post">
    <div class="form-field">
        <label for="menu-name">Pealkiri</label>
        <input id="menu-name" type="text" name="menu_name">
    </div>
    <div class="form-field">
        <label for="position">Positsioon</label>
        <select id="position" name="position">
            <?php for ($i=0; $i < 16 ; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-field">
        <label for="visible">Nähtavus</label>
        <select id="visible" name="visible">
            <option value="0">Peidetud</option>
            <option value="1">Nähtav</option>
        </select>
    </div>
    <div class="form-field">
        <input type="submit" name="submit">
    </div>
</form>
</body>
</html>
<?php mysqli_close($connection);?>