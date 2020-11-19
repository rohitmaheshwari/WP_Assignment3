
<?PHP
$connection = mysqli_connect('localhost', 'root', '', 'passwordManagement');
if ($connection) {
    $FeetchingData = "SELECT * FROM passwords where 1";
    $result = mysqli_query($connection, $FeetchingData);
    if (!$result)
        echo "Failed to fetch Results ";
} else {
    echo "Connection Failed ";
}



?>