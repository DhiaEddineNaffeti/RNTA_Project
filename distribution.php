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
$mowezna1L = sanitize($_POST["mowezna1L"]);
$mowezna2L = sanitize($_POST["mowezna2L"]);
$nbL = sanitize($_POST["nbL"]);
$totalL = sanitize($_POST["totalL"]);

$dateL = date("Y-m-d H:i:s");



  
    $updateStockQueryL = $conn->prepare("INSERT INTO mobechirinl (dateL, methekaL, mowezna1L, mowezna2L, nbL, totalL) VALUES (?, ?, ?, ?, ?, ?)");
    $updateStockQueryL->bind_param("ssssss", $dateL, $methekaL, $mowezna1L, $mowezna2L, $nbL, $totalL);
    $updateStockQueryL->execute();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$nomL = sanitize($_POST["nomL"]);
$matriculeL = sanitize($_POST["matriculeL"]);
$quentiteL = sanitize($_POST["quentiteL"]);



$updateStockQueryL = $conn->prepare("INSERT INTO tethkirl (dateL, nomL, matriculeL, quentiteL,adresse) VALUES (?, ?, ?, ?,'M')");
$updateStockQueryL->bind_param("ssss", $dateL, $nomL, $matriculeL, $quentiteL);
$updateStockQueryL->execute();



/////////////////////////////////////////////////////////////////.......cristal.............////////////////////////////////////////////////////////////////////////////////////////////////////////


$methekaC = sanitize($_POST["methekaC"]);
$horas = sanitize($_POST["horas"]);
$nbC= sanitize($_POST["nbC"]);
$totalC = sanitize($_POST["totalC"]);

$dateL = date("Y-m-d H:i:s");



  
    $updateStockQueryL = $conn->prepare("INSERT INTO mobechirinc (dateL, methekaC, horas, nbC, totalC) VALUES (?, ?, ?, ?, ?)");
    $updateStockQueryL->bind_param("sssss", $dateL, $methekaC, $horas, $nbC, $totalC);
    $updateStockQueryL->execute();

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$nomC = sanitize($_POST["nomC"]);
$matriculeC = sanitize($_POST["matriculeC"]);
$quentiteC = sanitize($_POST["quentiteC"]);


$updateStockQueryL = $conn->prepare("INSERT INTO tethkirc (dateL, nomC, matriculeC, quentiteC) VALUES (?, ?, ?, ?)");
$updateStockQueryL->bind_param("ssss", $dateL, $nomC, $matriculeC, $quentiteC);
$updateStockQueryL->execute();



if ($updateStockQueryL->affected_rows > 0) {
    echo "<div style='margin-top: 20px; text-align: center;'>";
    echo "<p style='color: green; font-size: 38px; font-weight: bold;'>تم توزيع مذاقة المباشرين بنجاح</p>";
    echo "<form action='page2.html' method='get'>
              <button type='submit' style='padding: 15px 20px; background-color: #536878; color: white; border-radius: 5px; cursor: pointer;'>العودة إلى الصفحة الرئيسية</button>
          </form>";
} else {
    echo "<div style='margin-top: 20px; text-align: center;'>";
    echo "<p style='color: red; font-size: 38px; font-weight: bold;'>خطأ في عملية التوزيع ... الرجاء التحقق من رقم الوصل</p>";
    echo "<form action='page2.html' method='get'>
              <button type='submit' style='padding: 15px 20px; background-color: #536878; color: white; border-radius: 5px; cursor: pointer;'>العودة إلى الصفحة الرئيسية</button>
          </form>";
}



$conn->close();
?>
