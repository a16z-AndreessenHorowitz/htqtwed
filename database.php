<?php
$host = "localhost";
$dbname = "user"; 
$username = "root"; 
$password = ""; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo " Kết nối database thành công!";

    $sql="SELECT * FROM information";
    $stmt= $conn->prepare($sql); // Chuẩn bị truy vấn
    $stmt->execute();    // Thực thi truy vấn

     // 3. Lấy kết quả ra
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

 
    foreach ($rows as $row) {
        echo "FullName: " . $row['FullName'] . "<br>";
        echo "MSSV: " . $row['MSSV'] . "<br>";
        echo "PASS: " . $row['PASS'] . "<hr>";
    }

} catch (PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}
?>
