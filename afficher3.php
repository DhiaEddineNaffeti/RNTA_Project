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
SELECT nomL, matriculeL, dateL, quentiteL
FROM tethkirl
WHERE dateL >= ? AND dateL <= ? AND  quentiteL !=0
ORDER BY dateL ASC";

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

$totalRows = $result->num_rows;
$counter = 1;
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql4 = "
SELECT sum(quentiteL) as totalSum2
FROM tethkirl
WHERE dateL >= ? AND dateL <= ?
";
$stmt5 = $conn->prepare($sql4);
$stmt5->bind_param("ss", $start_date, $end_date);
$stmt5->execute();
$result5 = $stmt5->get_result();
$row5 = $result5->fetch_assoc();
$totalSumT = $row5["totalSum2"];
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
    '>جدول التذاكير  من  $dayd  $monthNamed $yeard الى  $dayf $monthNamef $yearf  </caption>
    <tr style='background-color: #f2f2f2;'>
    
   
    <th style='padding: 10px; text-align: center;'>المجموع</th>
    <th style='padding: 10px; text-align: center;'>الكمية</th>
    <th style='padding: 10px; text-align: center;'>التريخ</th>
    <th style='padding: 10px; text-align: center;'>الرقم الالي</th>
    <th style='padding: 10px; text-align: center;'>الاسم </th>
    <th style='padding: 10px; text-align: center;'>ع/ر</th>
    </tr>";
    echo "<tr>";
echo "<td style='padding: 10px; text-align: center;' rowspan='$totalRows'>$totalSumT</td>";
$counter = 1;

while ($row = $result->fetch_assoc()) {
    echo "<td style='padding: 10px; text-align: center;'>" . $row["quentiteL"] . "</td>";
    echo "<td style='padding: 10px; text-align: center;'>" . $row["dateL"] . "</td>";
    echo "<td style='padding: 10px; text-align: center;'>" . $row["matriculeL"] . "</td>";
    echo "<td style='padding: 10px; text-align: center;'>" . $row["nomL"] . "</td>";
    echo "<td style='padding: 10px; text-align: center;'>". $counter . "</td>";
    echo "</tr>";
    $counter++;
}

echo "</table>";

if(isset($_POST['print_button'])){
    echo "<script>window.print();</script>";
}
?>
