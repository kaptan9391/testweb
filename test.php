<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได้");
$sqltxt = "SELECT * FROM book";
$result = mysqli_query($conn, $sqltxt);
echo "<html><head><title>Test database</title></head>";
echo "<body><CENTER><H3>รายชื่อหนังสือ</H3></CENTER>";
echo "<table width='100%' border='1' align='center'>";
echo "<tr><td>ล าดับที่ </td> <td>รหัสหนังสือ</td><td>ชื่อหนังสือ</td>";
echo "<td>ประเภทหนังสือ </td> <td>สถานะหนังสือ</td><td>ส านักพิมพ์</td>";
echo "<td>ราคาหนังสือ </td> <td>ราคาเช่าหนังสือ</td><td>จ านวนวัน</td>";
echo "<td>รูปภาพ </td> <td>วันที่ซื้อ</td></tr>";
$a = 1;
while ($rs = mysqli_fetch_array($result)) {
    echo "<tr><td> $a </td>";
    for ($n = 0; $n < 10; $n++) {
        if ($n == 2) echo "<td>" . CheckType($conn, $rs[$n]) .

            "</td>";

        else if ($n == 3) echo "<td>" . CheckStatus($conn, $rs[$n])

            . "</td>";
        else if ($n == 8) echo "<td><img src='./preview.php?id={$rs[0]}' width='100' high='100'></td>";

        else echo "<td>" . $rs[$n] . "</td>";
    }
    echo "</tr>";
    $a++;
}
echo "</table></body></html>";
mysqli_close($conn);
function CheckType($conn, $code)
{
    $sqltxt = "SELECT * FROM typebook";
    $result1 = mysqli_query($conn, $sqltxt);
    while ($rs1 = mysqli_fetch_array($result1)) {
        if ($rs1[0] == $code) return $rs1[1];
    }
    return "";
}
function CheckStatus($conn, $code)
{
    $sqltxt = "SELECT * FROM statusbook";
    $result2 = mysqli_query($conn, $sqltxt);
    while ($rs2 = mysqli_fetch_array($result2)) {
        if ($rs2[0] == $code) return $rs2[1];
    }
    return "";
}
