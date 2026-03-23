<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تخزين</title>
    <style>
        .wrappers {
            top: 81%;
            height: 960px;
            border-left: 2px solid #000;
            padding-left: 20px;
            position: relative;
        }

        p {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: absolute;
            top: -2cm;
            width: 100%;
            box-sizing: border-box;
        }
    </style>
    <link rel="stylesheet" href="stylee.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="page1.html" class="link active">تخزين البضاعة</a></li>
                    <li><a href="page2.html" class="link">التوزيع</a></li>
                    <li><a href="page3.html" class="link">مراقبة حركة المخزون</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="wrappers">
        <form name="f" action="Storage.php" method="post">

            <h1>التخزين :</h1>

            <!-- -------------------------------------------------------------------- -->
            <div class="two-forms">
                <div class="input-box">
                    <label>  مخزون البداية :</label>
                    <input type="text" name="stockL" placeholder="" readonly value="<?php echo isset($_GET['last_stock_value']) ? htmlspecialchars($_GET['last_stock_value']) : ''; ?>">
                </div>

                <div class="input-box">
                    <label>  مخزون البداية :</label>
                    <input type="text" placeholder="" readonly>
                </div>
            </div>
            <!-- -------------------------------------------------------------------- -->
            <div class="two-forms">
                <div class="input-box">
                    <label>وصل تسليم مارس دولي خفيف:</label>
                    <input type="text" name="idL" placeholder="">
                </div>

                <div class="input-box">
                    <label>وصل تسليم كريسطال:</label>
                    <input type="text" name="some_name" placeholder="">
                </div>
            </div>
            <!-- -------------------------------------------------------------------- -->
            <div class="two-forms">
                <div class="input-box">
                    <label>تريخ استلام مارس دولي خفيف:</label>
                    <input type="date" placeholder="DATE" name="dateL">
                </div>

                <div class="input-box">
                    <label>تريخ استلام كريسطال :</label>
                    <input type="date" placeholder="DATE" name="some_name">
                </div>
            </div>
            <!-- -------------------------------------------------------------------- -->
            <div class="two-forms">
                <div class="input-box">
                    <label>مارس دولي خفيف :</label>
                    <input type="text" name="quentiteL" placeholder="الكمية" id="zone1">
                </div>

                <div class="input-box">
                    <label>كريسطال :</label>
                    <input type="text" name="some_name" placeholder="الكمية" id="zone2">
                </div>
            </div>
            <!-- -------------------------------------------------------------------- -->

            <div class="two-forms">
                <div class="input-box">
                    <label>بضاعة راجعة :</label>
                    <input type="text" name="retoueL" placeholder="" id="zone3">
                </div>

                <div class="input-box">
                    <label>بضاعة راجعة :</label>
                    <input type="text" name="some_name" placeholder="" id="zone4">
                </div>
            </div>
            <!-- -------------------------------------------------------------------- -->
            <script>

                function calculateSum() {
                    var zone1Value = parseFloat(document.getElementById('zone1').value) || 0;
                    var zone2Value = parseFloat(document.getElementById('zone2').value) || 0;
                    var zone3Value = parseFloat(document.getElementById('zone3').value) || 0;
                    var zone4Value = parseFloat(document.getElementById('zone4').value) || 0;

                    var sum1 = zone1Value + zone3Value;
                    var sum2 = zone2Value + zone4Value;
                    var sum3 = sum1 + result3; 

                    document.getElementById('result1').value = sum1.toFixed(2);
                    document.getElementById('result2').value = sum2.toFixed(2);
                    document.getElementById('result3').value = sum3.toFixed(2);
                }

                document.getElementById('zone1').addEventListener('input', calculateSum);
                document.getElementById('zone2').addEventListener('input', calculateSum);
                document.getElementById('zone3').addEventListener('input', calculateSum);
                document.getElementById('zone4').addEventListener('input', calculateSum);

                
                

                calculateSum();
            </script>

            <!-- -------------------------------------------------------------------- -->
            <div class="two-forms">
                <div class="input-box">
                    <label>المجموع العام لدخول مارس دولي خفيف :</label>
                    <input type="text" id="result1" name="totalL" placeholder="" readonly>
                </div>

                <div class="input-box">
                    <label>المجموع العام لدخول الكريسطال :</label>
                    <input type="text" id="result2" placeholder="" readonly>
                </div>
            </div>
            <!-- -------------------------------------------------------------------- -->
            <div class="two-forms">
                <div class="input-box">
                    <label>مجموع دخول مارس دولي خفيف لهذا الشهر :</label>
                    <input type="text" id="result3" name="totalML" placeholder="" readonly>
                </div>

                <div class="input-box">
                    <label>مجموع دخول الكريسطال لهذا الشهر :</label>
                    <input type="text" name="some_name" placeholder="" readonly>
                </div>
            </div>
            <!-- -------------------------------------------------------------------- -->

            <!-- -------------------------------------------------------------------- -->

            <hr>
            <center>
                <button type="submit" class="btn">تخزين</button>
            </center>

        </form>
        <p>Dhia Eddine Naffeti</p>
    </div>
</body>

</html>
