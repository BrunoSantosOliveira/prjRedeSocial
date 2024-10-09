<?php
$query = $_GET['query'];

$sql = "SELECT nome_ingrediente FROM tb_ingredientes WHERE nome_ingrediente LIKE ?";
$result = $conn->prepare($sql);
$searchTerm = "%" . $query . "%";
$result->bind_param("s", $searchTerm);
$result->execute();
$result = $result->get_result();

$ingredientes = [];
while ($row = $result->fetch_assoc()) {
    $ingredientes[] = $row['nome_ingrediente'];
}

echo json_encode($ingredientes);

$conn->close();
