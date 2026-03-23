function calculateSum() {
    var zone1Value = parseFloat(document.getElementById('zone1').value) || 0;
    var zone2Value = parseFloat(document.getElementById('zone2').value) || 0;
    var zone3Value = parseFloat(document.getElementById('zone3').value) || 0;
    var zone4Value = parseFloat(document.getElementById('zone4').value) || 0;

    var sum1 = zone1Value + zone3Value +zone2Value+zone4Value;

    document.getElementById('result1').value = sum1.toFixed(2); 

}

document.getElementById('zone1').addEventListener('input', calculateSum);
document.getElementById('zone2').addEventListener('input', calculateSum);
document.getElementById('zone3').addEventListener('input', calculateSum);
document.getElementById('zone4').addEventListener('input', calculateSum);

calculateSum();

function calculateSum() {
    var zone1Value = parseFloat(document.getElementById('zone5').value) || 0;
    var zone2Value = parseFloat(document.getElementById('zone6').value) || 0;
    var zone4Value = parseFloat(document.getElementById('zone8').value) || 0;

    var sum1 = zone1Value + zone2Value+zone4Value;

    document.getElementById('result2').value = sum1.toFixed(2); 

}

document.getElementById('zone5').addEventListener('input', calculateSum);
document.getElementById('zone6').addEventListener('input', calculateSum);
document.getElementById('zone8').addEventListener('input', calculateSum);

calculateSum();