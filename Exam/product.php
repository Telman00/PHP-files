<?php
$host = 'localhost'; 
$dbname = 'product'; 
$user = 'root';
$pass = ''; 


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Veritabanı bağlantısı uğursuz: " . $e->getMessage();
    exit;
}

$records_per_page = 10;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = ($page > 0) ? $page : 1; 
$offset = ($page - 1) * $records_per_page;

try {
    $total_query = "SELECT COUNT(*) FROM new_products";
    $total_result = $pdo->query($total_query)->fetchColumn();
    $total_pages = ceil($total_result / $records_per_page);
} catch (PDOException $e) {
    echo "Ümumi qeydlərin sayını əldə etmək uğursuz oldu: " . $e->getMessage();
    exit;
}

try {
    $query = "SELECT * FROM new_products LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Məlumatları əldə etmək uğursuz oldu: " . $e->getMessage();
    exit;
}
?>
