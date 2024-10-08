<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    echo "O ID passado é: " . $id;
} else {
    echo "Nenhum ID foi passado.";
}
?>