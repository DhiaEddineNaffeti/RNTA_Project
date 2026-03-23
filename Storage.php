<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rnta";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function getLastStockValue() {
    global $conn;
    $getLastStockQuery = $conn->prepare("SELECT debutL FROM legere ORDER BY dateL DESC LIMIT 1");
    $getLastStockQuery->execute();
    $getLastStockQuery->bind_result($lastStockValue);
    $getLastStockQuery->fetch();
    $getLastStockQuery->close();

    return $lastStockValue;
}

function sanitize($input) {
    global $conn;
    return $conn->real_escape_string($input);
}

$idL = sanitize($_POST["idL"]);
$dateL = sanitize($_POST["dateL"]);
$quentiteL = sanitize($_POST["quentiteL"]);
$retoueL = sanitize($_POST["retoueL"]);
$totalL = sanitize($_POST["totalL"]);
$whayL = sanitize($_POST["whayL"]);


$debutL = intval(getLastStockValue()) + intval($totalL);

if (empty($idL)) {
    $sql = "DELETE FROM legere WHERE idL = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $idL);
    $stmt->execute();
} else {
    $updateStockQueryL = $conn->prepare("INSERT INTO legere (idL, dateL, quentiteL, retoueL, totalL, whayL, debutL) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $updateStockQueryL->bind_param("sssssss", $idL, $dateL, $quentiteL, $retoueL, $totalL, $whayL, $debutL);
    $updateStockQueryL->execute();

    if ($updateStockQueryL->affected_rows > 0) {
        echo "<div style='margin-top: 20px; text-align: center;'>";
        echo "<p style='color: green; font-size: 38px; font-weight: bold;'>تم التخزين بنجاح</p>";
        echo "<form action='page1.html' method='get'>
                  <button type='submit' style='padding: 15px 20px; background-color: #536878; color: white; border-radius: 5px; cursor: pointer;'>العودة إلى الصفحة الرئيسية</button>
              </form>";
    } else {
        echo "<div style='margin-top: 20px; text-align: center;'>";
        echo "<p style='color: red; font-size: 38px; font-weight: bold;'>خطأ في عملية التخزين ... الرجاء التحقق من رقم الوصل</p>";
        echo "<form action='page1.html' method='get'>
                  <button type='submit' style='padding: 15px 20px; background-color: #536878; color: white; border-radius: 5px; cursor: pointer;'>العودة إلى الصفحة الرئيسية</button>
              </form>";
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getLastStockValueC() {
    global $conn;
    $getLastStockQuery = $conn->prepare("SELECT debutC FROM cristal ORDER BY dateC DESC LIMIT 1");
    $getLastStockQuery->execute();
    $getLastStockQuery->bind_result($lastStockValue);
    $getLastStockQuery->fetch();
    $getLastStockQuery->close();

    return $lastStockValue;
}

$debutC = intval(getLastStockValueC()) + intval($totalC);


$idC = sanitize($_POST["idC"]);
$dateC = sanitize($_POST["dateC"]);
$quentiteC = sanitize($_POST["quentiteC"]);
$retoueC = sanitize($_POST["retoueC"]);
$totalC = sanitize($_POST["totalC"]);
$whayC = sanitize($_POST["whayC"]);



if (empty($idC)) {

    $sqC = "DELETE FROM cristal WHERE idC = ?";
    $stmt = $conn->prepare($sqC);
    $stmt->bind_param("s", $idC);
    $stmt->execute();

} else {
   
    
    $updateStockQueryC = $conn->prepare("INSERT INTO cristal (idC, dateC, quentiteC, retoueC, totalC, whayC,debutC) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $updateStockQueryC->bind_param("sssssss", $idC, $dateC, $quentiteC, $retoueC, $totalC, $whayC,$debutC);
    $updateStockQueryC->execute();

    if ($updateStockQueryC->affected_rows > 0) {
        echo "<div style='margin-top: 20px; text-align: center;'>";
        echo "<p style='color: green; font-size: 38px; font-weight: bold;'>تم التخزين بنجاح</p>";
        echo "<form action='page1.html' method='get'>
                  <button type='submit' style='padding: 15px 20px; background-color: #536878; color: white;  border-radius: 5px; cursor: pointer;'>العودة إلى الصفحة الرئيسية</button>
              </form>";
    } else {
        echo "<div style='margin-top: 20px; text-align: center;'>";
        echo "<p style='color: red; font-size: 38px; font-weight: bold;'>خطأ في عملية التخزين ... الرجاء التحقق من رقم الوصل</p>";
        echo "<form action='page1.html' method='get'>
                  <button type='submit' style='padding: 15px 20px; background-color: #536878; color: white;  border-radius: 5px; cursor: pointer;'>العودة إلى الصفحة الرئيسية</button>
              </form>";
    }
}

$conn->close();
?>
