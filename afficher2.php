<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rnta";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

$sql = "
SELECT quentiteL, dateL, idL
FROM legere
WHERE dateL >= ? AND dateL <= ?
ORDER BY dateL DESC
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();

$monthd = date("m", strtotime($start_date));
$monthf = date("m", strtotime($end_date));
$arabicMonthNames = [
    'جانفي', 'فيفري', 'مارس', 'إفريل', 'ماي', 'جوان',
    'جويلية', 'اوت', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'
];
$yeard = date("Y", strtotime($start_date));
$yearf = date("Y", strtotime($end_date));

$dayd = date("d", strtotime($start_date));
$dayf = date("d", strtotime($end_date));

$monthIndexd = max($monthd, min($monthd, 12)) - 1;
$monthIndexf = max($monthf, min($monthf, 12)) - 1;

$monthNamed = $arabicMonthNames[$monthIndexd];
$monthNamef = $arabicMonthNames[$monthIndexf];

echo "<form method='post' action=''>
        <input type='hidden' name='start_date' value='$start_date'>
        <input type='hidden' name='end_date' value='$end_date'>
        <input type='submit' name='print_button' value='Imprimer' style='
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        '>
      </form>";

      

echo "<table style='border-collapse: collapse; width: 100%;' border='1'>
<caption style='
        caption-side: top;
        font-size: 1.5em;
        padding: 10px;
        border-radius: 5px;
    '>جدول الوصولات  من  $dayd  $monthNamed $yeard الى  $dayf $monthNamef $yearf  </caption>
    <tr style='background-color: #f2f2f2;'>
    <th style='padding: 10px; text-align: center;'>الكمية</th>
    <th style='padding: 10px; text-align: center;'>تاريخ الاستلام </th>
    <th style='padding: 10px; text-align: center;'>رقم الوصل</th>
    </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td style='padding: 10px; text-align: center;'>" . $row["quentiteL"] . "</td>";
    echo "<td style='padding: 10px; text-align: center;'>" . $row["dateL"] . "</td>";
    echo "<td style='padding: 10px; text-align: center;'>" . $row["idL"] . "</td>";
    echo "</tr>";
}

echo "</table>";

if(isset($_POST['print_button'])){
    echo "<script>window.print();</script>";
}
?>
