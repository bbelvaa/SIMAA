<?php

$limit = 10; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;


$query = "SELECT * FROM aset LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);


$total_rows_query = "SELECT COUNT(*) FROM aset";
$total_rows_result = mysqli_query($conn, $total_rows_query);
$total_rows = mysqli_fetch_array($total_rows_result)[0];
$total_pages = ceil($total_rows / $limit);
?>
