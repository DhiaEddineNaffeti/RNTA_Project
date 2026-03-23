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

/////////////////////////////////////////////////////......Les Requetes SQL....////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql = "
SELECT idL, quentiteL, retoueL, totalL, SUM(totalL) as sumTotal
FROM legere
WHERE dateL >= ? AND dateL <= ?
GROUP BY idL, quentiteL, retoueL, totalL
ORDER BY  dateL DESC
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();

////////////////////////////////////////////////////////////////
$sql1 = "SELECT count(idL) as totalCount FROM legere WHERE dateL >= ? AND dateL <= ?";
$stmt2 = $conn->prepare($sql1);
$stmt2->bind_param("ss", $start_date, $end_date);
$stmt2->execute();
$result2 = $stmt2->get_result();
$row2 = $result2->fetch_assoc();
$totalCount = $row2["totalCount"];
////////////////////////////////////////////////////////////////
$sql2 = "
SELECT quentite as totalSum
FROM stock
WHERE dateL >= ? AND dateL <= ?

";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$totalSum = $row3["totalSum"];
///////////////////////////////////////////////////////////////
$sql3 = "
SELECT sum(quentiteL) as totalSum1
FROM legere
WHERE dateL >= ? AND dateL <= ?
";
$stmt4 = $conn->prepare($sql3);
$stmt4->bind_param("ss", $start_date, $end_date);
$stmt4->execute();
$result4 = $stmt4->get_result();
$row4 = $result4->fetch_assoc();
$totalSum1 = $row4["totalSum1"];

///////////////////////////////////////////////////////////////
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
///////////////////////////////////////////////////////////////
$sql4 = "
SELECT sum(retoueL) as totalSum2
FROM legere
WHERE dateL >= ? AND dateL <= ?
";
$stmt5 = $conn->prepare($sql4);
$stmt5->bind_param("ss", $start_date, $end_date);
$stmt5->execute();
$result5 = $stmt5->get_result();
$row5 = $result5->fetch_assoc();
$totalSum2 = $row5["totalSum2"];
///////////////////////////////////////////////////////////////

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
///////////////////////////////////////////////////////////////
$cnt=$totalCount + 4 ;
$cnt2=$totalCount +  16;
///////////////////////////////////////////////////////////////
$totalSum3 = $totalSum + $totalSum2 + $totalSum1 ;
///////////////////////////////////////////////////////////////
$sql2 = "
SELECT sum(quentiteL) as totalSum
FROM tethkirl
WHERE dateL >= ? AND dateL <= ? AND adresse ='MT';
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$MT = $row3["totalSum"];
//////////////////////////////////////////////////////////////
$sql2 = "
SELECT COUNT(quentiteL) as totalSum
FROM tethkirl
WHERE dateL >= ? AND dateL <= ? AND adresse ='MT';
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$nbMT = $row3["totalSum"];
//////////////////////////////////////////////////////////////
$sql2 = "
SELECT sum(quentiteL) as totalSum
FROM tethkirl
WHERE dateL >= ? AND dateL <= ? AND adresse ='M';
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$M = $row3["totalSum"];
//////////////////////////////////////////////////////////////

$sql2 = "
SELECT sum(totalL) as totalSum
FROM mobechirinl
WHERE dateL >= ? AND dateL <= ?
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$totalSum4 = $row3["totalSum"];
///////////////////////////////////////////////////////////////
$sql2 = "
SELECT sum(metheka) as totalSum
FROM metkadin
WHERE dateL >= ? AND dateL <= ?
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$totalSum5 = $row3["totalSum"];
///////////////////////////////////////////////////////////////
$sql2 = "
SELECT sum(totalL) as totalSum
FROM kbatha
WHERE dateL >= ? AND dateL <= ?
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$totalSum6 = $row3["totalSum"];
///////////////////////////////////////////////////////////////
$sql2 = "
SELECT sum(total) as totalSum
FROM majlech
WHERE dateL >= ? AND dateL <= ?
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$totalSum7 = $row3["totalSum"];
///////////////////////////////////////////////////////////////
$sql2 = "
SELECT sum(total) as totalSum
FROM aradhiyin
WHERE dateL >= ? AND dateL <= ?
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$totalSum8 = $row3["totalSum"];
///////////////////////////////////////////////////////////////
$sql2 = "
SELECT sum(nb) as totalSum
FROM metkadin
WHERE dateL >= ? AND dateL <= ?
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$nb = $row3["totalSum"];
///////////////////////////////////////////////////////////////
$sql2 = "
SELECT sum(nbL) as totalSum
FROM mobechirinl
WHERE dateL >= ? AND dateL <= ?
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$nbL = $row3["totalSum"];
///////////////////////////////////////////////////////////////
$sql2 = "
SELECT sum(nbL) as totalSum
FROM kbatha
WHERE dateL >= ? AND dateL <= ?
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$nbL1 = $row3["totalSum"];
///////////////////////////////////////////////////////////////
$sql2 = "
SELECT sum(nb) as totalSum
FROM majlech
WHERE dateL >= ? AND dateL <= ?
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$nbL2 = $row3["totalSum"];
///////////////////////////////////////////////////////////////
$sql2 = "
SELECT sum(nb) as totalSum
FROM aradhiyin
WHERE dateL >= ? AND dateL <= ?
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$nbL3 = $row3["totalSum"];
///////////////////////////////////////////////////////////////
$total=$totalSum8+$totalSum7+$totalSum6+$totalSum5+$totalSum4+$totalSumT;
/////////////////////////////////////////////////////////////////////////
$total1=$totalSum3 -$total;
//////////////////////////////////////////////////////////////////////////////
$sqlStock = "SELECT MAX(dateL) AS maxDate FROM stock";
$resultStock = $conn->query($sqlStock);

if ($resultStock->num_rows > 0) {
    $rowStock = $resultStock->fetch_assoc();
    $lastDateStock = $rowStock["maxDate"];

    $newQuantiteL = $totalSum3 - $total;

    $newDateL = date('Y-m-d', strtotime($lastDateStock . ' +1 month'));

    $quantityExistsSql = "SELECT COUNT(*) AS quantityCount FROM stock WHERE quentite = ?";
    $stmtQuantityExists = $conn->prepare($quantityExistsSql);
    $stmtQuantityExists->bind_param("s", $newQuantiteL);
    $stmtQuantityExists->execute();

    $resultQuantityExists = $stmtQuantityExists->get_result();
    $rowQuantityExists = $resultQuantityExists->fetch_assoc();
    $quantityExists = $rowQuantityExists["quantityCount"];

    if (!$quantityExists) {
        $insertSql = "INSERT INTO stock (quentite, dateL) VALUES (?, ?)";
        $stmtInsert = $conn->prepare($insertSql);
        $stmtInsert->bind_param("ss", $newQuantiteL, $newDateL);
        $stmtInsert->execute();
    } 

    
} else {
    echo "No records found in the stock table";

}
/////////////////////////////////////////////////////////////////////////////////////////////
$sqlCheck = "SELECT COUNT(*) as countRows 
             FROM mobechirinl 
             WHERE dateL >= ? AND dateL <= ?";
$stmtCheck = $conn->prepare($sqlCheck);
$stmtCheck->bind_param('ss', $start_date, $end_date);
$stmtCheck->execute();
$stmtCheck->bind_result($countRows);
$stmtCheck->fetch();
$stmtCheck->close();
////////////////////////////////////////////////////////////////////////////////////////////////
$sql = "SELECT mowezna1L, mowezna2L 
FROM mobechirinl 
WHERE dateL >= ? AND dateL <= ?  AND  mowezna1L !=0 AND  mowezna2L !=0 "  ;

$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $start_date, $end_date);
$stmt->execute();
$stmt->bind_result($mowezna1L, $mowezna2L);
//////////////////////////////////////////////////////..........END..........//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
    '>جدول مخزون المذاقة من  $dayd  $monthNamed $yeard الى  $dayf $monthNamef $yearf  </caption>
    <tr style='background-color: #f2f2f2;'>
    <th style='padding: 10px; text-align: center;' colspan='$cnt2'>مارس دولي ذهبي</th>
</tr>

<tr style='background-color: #f2f2f2;'>
<th style='padding: 10px; text-align: center;'> الفارق  </th>
<th style='padding: 10px; text-align: center;'> الجرد المادي  </th>
<th style='padding: 10px; text-align: center;'> المخزون النظري  </th>
<th style='padding: 10px; text-align: center;'> مجموع العام للخروج  </th>
<th style='padding: 10px; text-align: center;' colspan='8'>خروج</th>
    <th style='padding: 10px; text-align: center;' colspan='$cnt'>دخول</th>
   

</tr>

<tr>
<td rowspan='3' style='padding: 10px; text-align: center;'>  </td>
<td rowspan='3' style='padding: 10px; text-align: center;'>   </td>
<td rowspan='3' style='padding: 10px; text-align: center;'>" . $total1 . "</td>
<td rowspan='3' style='padding: 10px; text-align: center;'>" . $total . "</td>
<th style='padding: 10px; text-align: center;'>  تذكير  متنوع</th>
<th style='padding: 10px; text-align: center;'> العرضيين ("  .$nbL3. ")</th>
<th style='padding: 10px; text-align: center;'> تذكير مذاقة متقاعدين  ("  .$nbMT. ")</th>
<th style='padding: 10px; text-align: center;'> المتقاعدين  ("  .$nb. ")</th>
<th style='padding: 10px; text-align: center;'> القباضات المالية ("  .$nbL1. ")</th>
<th style='padding: 10px; text-align: center;'> مجلس الادارة  ("  .$nbL2. ")</th>";

if ($countRows == 0) {
echo"<th style='padding: 10px; text-align: center;'> المباشرين    ("  .$nbL. ") </th>";
}else{
    echo"
    <th  colspan='2' style='padding: 10px; text-align: center;'> المباشرين </th>
    ";
}
    echo"<th style='padding: 10px; text-align: center;'>المجموع العام للدخول</th>
    <th style='padding: 10px; text-align: center;'>بضاعة راجعة</th>
    <th style='padding: 10px; text-align: center;'>مجموع الدخول</th>";

for ($i = 1; $i <= $totalCount; $i++) {
    echo "<th style='padding: 10px; text-align: center;'>وصل رقم</th>";
}

echo "<th style='padding: 10px; text-align: center;'>مخزون البداية</th>
</tr>";

///////////////////////////////////////////////////////////////////////////////
echo "<tr>
<td rowspan='2' style='padding: 10px; text-align: center;'>" . $M . "</td>
<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSum8 . "</td>
<td rowspan='2' style='padding: 10px; text-align: center;'>" . $MT . "</td>
<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSum5 . "</td>
<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSum6 . "</td>
<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSum7 . "</td>"
;
if ($countRows == 0) {
echo"<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSum4 . "</td>";
}else{
    echo"
   
    <td  style='padding: 10px; text-align: center;'>  المذاقة السنوية الاولى   ("  .$nbL. ") </td>
    <td  style='padding: 10px; text-align: center;'>  مذاقة شهر  $monthNamed $yeard  ("  .$nbL. ") </td>

    ";
}
echo"
<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSum3 . "</td>
<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSum2 . "</td>
    <td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSum1 . "</td>";

$result->data_seek(0); 

while ($row = $result->fetch_assoc()) {
    echo "<td style='padding: 10px; text-align: center;'>" . $row["idL"] . "</td>";
}

echo "<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSum . "</td>";

echo "</tr>";
//////////////////////////////////////////////////////////////
echo "<tr> 
";


while ($stmt->fetch()) {
    echo "<td style='padding: 10px; text-align: center;'>" . $mowezna2L . "</td>";
    echo "<td style='padding: 10px; text-align: center;'>" . $mowezna1L . "</td>";
    }
    $stmt->close();

  
 $result->data_seek(0);
 
while ($row = $result->fetch_assoc()) {
    echo "<td style='padding: 10px; text-align: center;'>" . $row["quentiteL"] . "</td>";
}



//////////////////////////////////////////////////////////////////////////////


echo "</table>";
if(isset($_POST['print_button'])){
    echo "<script>window.print();</script>";
}
///////////////////////////////////////////////////////////////////
$req = "SELECT whayL FROM legere WHERE dateL >= ? AND dateL <= ?";
$stmt1 = $conn->prepare($req);
$stmt1->bind_param("ss", $start_date, $end_date);
$stmt1->execute();
$result1 = $stmt1->get_result();

echo "<div style='margin-top: 20px; text-align: right;'>";
while ($row1 = $result1->fetch_assoc()) {
    echo "<p style='margin-bottom: 5px;'>" . $row1["whayL"] . "</p>";
}

echo "</div>";



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$sqlC = "
SELECT idC, quentiteC, retoueC, totalC, SUM(totalC) as sumTotalC
FROM cristal
WHERE dateC >= ? AND dateC <= ?
GROUP BY idC, quentiteC, retoueC, totalC
ORDER BY  dateC DESC
";

$stmtC = $conn->prepare($sqlC);
$stmtC->bind_param("ss", $start_date, $end_date);
$stmtC->execute();
$resultC = $stmtC->get_result();

////////////////////////////////////////////////////////////////

$sql1 = "SELECT count(idC) as totalCountC FROM cristal WHERE dateC >= ? AND dateC <= ?";
$stmtC1 = $conn->prepare($sql1);
$stmtC1->bind_param("ss", $start_date, $end_date);
$stmtC1->execute();
$resultC1 = $stmtC1->get_result();
$rowC1 = $resultC1->fetch_assoc();
$totalCountC = $rowC1["totalCountC"];


////////////////////////////////////////////////////////////////


$sql2 = "
SELECT quentite as totalSum
FROM stock1
WHERE dateL >= ? AND dateL <= ?
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$totalSumC = $row3["totalSum"];

///////////////////////////////////////////////////////////////

$sql3 = "
SELECT sum(quentiteC) as totalSumC1
FROM cristal
WHERE dateC >= ? AND dateC <= ?
";
$stmtC4 = $conn->prepare($sql3);
$stmtC4->bind_param("ss", $start_date, $end_date);
$stmtC4->execute();
$resultC4 = $stmtC4->get_result();
$rowC4 = $resultC4->fetch_assoc();
$totalSumC1 = $rowC4["totalSumC1"];

///////////////////////////////////////////////////////////////

$sql4 = "
SELECT sum(retoueC) as totalSumC2
FROM cristal
WHERE dateC >= ? AND dateC <= ?
";
$stmt5 = $conn->prepare($sql4);
$stmt5->bind_param("ss", $start_date, $end_date);
$stmt5->execute();
$result5 = $stmt5->get_result();
$row5 = $result5->fetch_assoc();
$totalSumC2 = $row5["totalSumC2"];
///////////////////////////////////////////////////////////////

$totalSumC3 = $totalSumC + $totalSumC2 + $totalSumC1 ;
//////////////////////////////////////////////////////////////////
$sql2 = "
SELECT sum(nbC) as totalSum
FROM mobechirinc
WHERE dateL >= ? AND dateL <= ?
";
$stmt3 = $conn->prepare($sql2);
$stmt3->bind_param("ss", $start_date, $end_date);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
$nbC = $row3["totalSum"];



////////////////////////////////////////////////////////////////..........END........../////////////////////////////////////////////////////////////////////////////////////////////////////////

$cntc=$totalCountC + 4 ;
$cntC2=$totalCount +  11;




echo "<table style='border-collapse: collapse; width: 100%;' border='1'>


    <tr style='background-color: #f2f2f2;'>
    <th style='padding: 10px; text-align: center;' colspan='$cntC2'> كريسطال</th>
</tr>

<tr style='background-color: #f2f2f2;'>
<th style='padding: 10px; text-align: center;' colspan='4'>خروج</th>
    <th style='padding: 10px; text-align: center;' colspan='$cntc'>الدخول</th>
</tr>

<tr>
<th style='padding: 10px; text-align: center;'> مجموع العام للخروج </th>
<th style='padding: 10px; text-align: center;'> التذكير </th>
<th style='padding: 10px; text-align: center;'> القباضات المالية ("  .$nbL1. ")</th>
<th style='padding: 10px; text-align: center;'> المباشرين    ("  .$nbC. ") </th>
    <th style='padding: 10px; text-align: center;'>المجموع العام للدخول</th>
    <th style='padding: 10px; text-align: center;'>بضاعة راجعة</th>
    <th style='padding: 10px; text-align: center;'>مجموع الدخول</th>";

for ($i = 1; $i <= $totalCountC; $i++) {
    echo "<th style='padding: 10px; text-align: center;'>وصل رقم</th>";
}

echo "<th style='padding: 10px; text-align: center;'>مخزون البداية</th>
</tr>";

///////////////////////////////////////////////////////////////////////////////
echo "<tr>
<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSum5 . "</td>
<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSum4 . "</td>
<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSum3 . "</td>
<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSum2 . "</td>
<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSumC3 . "</td>
<td rowspan='2' style='padding: 10px; text-align: center;'>" .  $totalSumC2 . "</td>
    <td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSumC1  . "</td>";

$result->data_seek(0); 

while ($row = $resultC->fetch_assoc()) {
    echo "<td style='padding: 10px; text-align: center;'>" . $row["idC"] . "</td>";
}
echo "<td rowspan='2' style='padding: 10px; text-align: center;'>" . $totalSumC . "</td>";

echo "</tr>";
//////////////////////////////////////////////////////////////
echo "<tr> 
";

$resultC->data_seek(0); 

while ($row = $resultC->fetch_assoc()) {
    echo "<td style='padding: 10px; text-align: center;'>" . $row["quentiteC"] . "</td>";
}

echo "</tr>";
//////////////////////////////////////////////////////////////////////////////


echo "</table>";

///////////////////////////////////////////////////////////////////
$req = "SELECT whayC FROM cristal WHERE dateC >= ? AND dateC <= ?";
$stmt1 = $conn->prepare($req);
$stmt1->bind_param("ss", $start_date, $end_date);
$stmt1->execute();
$resultC1 = $stmt1->get_result();

echo "<div style='margin-top: 20px; text-align: right;'>";
while ($row1 = $resultC1->fetch_assoc()) {
    echo "<p style='margin-bottom: 5px;'>" . $row1["whayC"] . "</p>";
}

echo "</div>";

echo "<div style='margin-top: 20px; text-align: right; font-family: Arial, sans-serif;'>";
echo "<p style='font-size: 18px; font-weight: bold;'>الامضاءات</p>";

echo "<table style='border-collapse: collapse; width: 100%;' border='1'>
<tr style='background-color: #f2f2f2;'>
<th  style='font-size: 18px; font-weight: bold;'>فريق الجرد</th>
<th  style='text-align: center; font-size: 18px; font-weight: bold;'>فريق وحدة التدقيق الداخلي</th>
<th  style='text-align: left; font-size: 18px; font-weight: bold;'>المكلف بالارشراف على خلية المذاقة</th>
";
echo "<tr>";



/*echo "<p style='font-size: 18px; font-weight: bold;'>فريق الجرد</p>" .
     "<p style='text-align: center; font-size: 18px; font-weight: bold;'>فريق وحدة التدقيق الداخلي</p>" .
     "<p style='text-align: left; font-size: 18px; font-weight: bold;'>المكلف بالارشراف على خلية المذاقة</p>" .
     "</div>";*/






$stmt1->close();
$conn->close();
?>
