<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rnta";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitize($input) {
    global $conn;
    return $conn->real_escape_string($input);
}

$methekaL = sanitize($_POST["methekaL"]);
$nbL = sanitize($_POST["nbL"]);
$totalL = sanitize($_POST["totalL"]);

$dateL = date("Y-m-d H:i:s");



  
    $updateStockQueryL = $conn->prepare("INSERT INTO kbatha (dateL, methekaL, nbL, totalL) VALUES (?, ?, ?, ?)");
    $updateStockQueryL->bind_param("ssss", $dateL, $methekaL, $nbL, $totalL);
    $updateStockQueryL->execute();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$nomL = sanitize($_POST["nomL"]);
$matriculeL = sanitize($_POST["matriculeL"]);
$quentiteL = sanitize($_POST["quentiteL"]);


$updateStockQueryL = $conn->prepare("INSERT INTO tethkirl (dateL, nomL, matriculeL, quentiteL,adresse) VALUES (?, ?, ?, ?,'K')");
$updateStockQueryL->bind_param("ssss", $dateL, $nomL, $matriculeL, $quentiteL);
$updateStockQueryL->execute();


if ($updateStockQueryL->affected_rows > 0) {
    echo "<div style='margin-top: 20px; text-align: center;'>";
    echo "<p style='color: green; font-size: 38px; font-weight: bold;'>تم توزيع مذاقة القباضات المالية بنجاح</p>";
    echo "<form action='zone2.html' method='get'>
              <button type='submit' style='padding: 15px 20px; background-color: #536878; color: white; border-radius: 5px; cursor: pointer;'>العودة إلى الصفحة الرئيسية</button>
          </form>";
} else {
    echo "<div style='margin-top: 20px; text-align: center;'>";
    echo "<p style='color: red; font-size: 38px; font-weight: bold;'>خطأ في عملية التوزيع ... الرجاء التحقق من رقم الوصل</p>";
    echo "<form action='zone2.html' method='get'>
              <button type='submit' style='padding: 15px 20px; background-color: #536878; color: white; border-radius: 5px; cursor: pointer;'>العودة إلى الصفحة الرئيسية</button>
          </form>";
}

$conn->close();
?>
