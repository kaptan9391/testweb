<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
if (!$conn) die("ไม่สามารถติดต่อกับ MySQL ได้");
$sqltxt = "SELECT * FROM book INNER JOIN statusbook ON book.StatusID = statusbook.StatusID INNER JOIN typebook ON book.TypeID = typebook.TypeID";
$result = mysqli_query($conn, $sqltxt);
echo "<html><head><title>Test database</title></head>";
echo "<body><CENTER><H3>รายชื่อหนังสือ</H3></CENTER>";
echo "<table width='100%' border='1' align='center'>";
echo "<tr><td>ลำดับที่ </td> <td>รหัสหนังสือ</td><td>ชื่อหนังสือ</td>";
echo "<td>ประเภทหนังสือ </td> <td>สถานะหนังสือ</td><td>สำนักพิมพ์</td>";
echo "<td>ราคาหนังสือ </td> <td>ราคาเช่าหนังสือ</td><td>จำนวนวัน</td>";
echo "<td>รูปภาพ </td> <td>วันที่ซื้อ</td></tr>";
$a = 1;
while ($rs = mysqli_fetch_assoc($result)) {
    echo "<tr><td> $a </td>";
    echo "<td> {$rs['BookID']} </td>";
    echo "<td> {$rs['BookName']} </td>";
    echo "<td> {$rs['TypeName']} </td>";
    echo "<td> {$rs['StatusName']} </td>";
    echo "<td> {$rs['Publish']} </td>";
    echo "<td> {$rs['UnitPrice']} </td>";
    echo "<td> {$rs['UnitRent']} </td>";
    echo "<td> {$rs['DayAmount']} </td>";
    echo "<td><a href='./preview.php?id={$rs['BookID']}'><img src='./preview.php?id={$rs['BookID']}' width='100' high='100'></a></td>";
    echo "<td> {$rs['BookDate']} </td>";
    echo "</tr>";
    $a++;
}
echo "</table></body></html>";
mysqli_close($conn);