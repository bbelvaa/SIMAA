<?php
$limit = 10; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$search = '';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

$query = "SELECT * FROM aset";
if (!empty($search)) {
    $query .= " WHERE nama LIKE '%$search%'";
}

$query .= " LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);
?>