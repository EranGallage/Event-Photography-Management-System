
    <?php
    include 'connect.php';
$first_name = $_POST["first_name"];
echo "First Name: $first_name <br><br>";

$last_name = $_POST["last_name"];
echo "Last Name: $last_name <br><br>";

$email = $_POST["email"];
echo "Email: $email <br><br>";

$phone = $_POST["phone"];
echo "Phone Number: $phone <br><br>";

$position = $_POST["position"];
echo "Position: $position <br><br>";


$conn = new mysqli('localhost','root','','iwt');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into jobv  (first_name, last_name,email, phone, position) values(?, ?, ?, ?,?)");
    $stmt->bind_param("sssis", $first_name, $last_name, $email ,$phone,$position);
    $execval = $stmt->execute();
    echo $execval;
    echo " Form Details Succesfully Saved...";
    $stmt->close();
    $conn->close();
}
?>


