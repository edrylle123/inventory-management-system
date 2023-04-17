<?php
// include "./phpqrcode/qrlib.php";
include "../phpqrcode/qrlib.php";
require_once('../../inc/config/constants.php');
require_once('../../inc/config/db.php');
require_once('../../inc/header.html');

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "shop_inventory";

// // Create connection
// $conn = mysqli_connect($localhost, $root, $shop_inventory);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// SQL query to fetch specific data
// $sql = "SELECT itemName FROM items WHERE productID = :productID";
// $result = mysqli_query($conn, $sql);

// // Generate QR code for specific data
// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         $data = $row["itemName"];
//         QRcode::png($data, "qrcode.png");
//         echo '<img src="qrcode.png"/>';
//     }
// } else {
//     echo "0 results";
// }

// // Close the database connection
// mysqli_close($conn);
// 


    
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shop_inventory";
    
    try {
        $conn = new PDO("mysql:host=localhost;dbname=shop_inventory", $root, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    
    // Prepare and execute the SELECT query
    $id = 1; // the id of the data you want to retrieve
    $stmt = $conn->prepare('SELECT itemName FROM item WHERE productID = :productID');
    $stmt->execute(['productID' => $productID]);
    $item = $stmt->fetch();
    
    // Generate the QR code
    require_once './phpqrcode/qrlib.php';
    ob_start();
    QRcode::png($item['itemName']);
    $image = ob_get_contents();
    ob_end_clean();
    
    // Print the QR code
    header('Content-Type: image/png');
    print $image;
    
    // Close the database connection
    $conn = null;
    


?>
