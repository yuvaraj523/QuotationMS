<?php
include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $productName = $con->real_escape_string($_POST['productName']);
    $productDescription = $con->real_escape_string($_POST['productDescription']);
    $productCategory = $con->real_escape_string($_POST['productCategory']);
    $keyword = $con->real_escape_string($_POST['keyword']);
    $priceAmount = $con->real_escape_string($_POST['priceAmount']);

    
    $target_dir = "uploads/";
    $productImage = ""; 

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    if (isset($_FILES["productImage"]) && $_FILES["productImage"]["error"] == 0) {
        $target_file = $target_dir . basename($_FILES["productImage"]["name"]);
        $productImage = basename($_FILES["productImage"]["name"]);  

        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars($productImage) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file was uploaded or there was an error uploading the file.";
    }

  $sql = "INSERT INTO list ( product_image, product_name, product_description, product_category, keyword, price_amount)
            VALUES ('$productImage', '$productName', '$productDescription', '$productCategory', '$keyword', '$priceAmount')";

    if ($con->query($sql) === TRUE) {
        header("Location: list.php");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

$con->close();
?>
