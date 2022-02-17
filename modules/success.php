<?php
session_start();
$actif = $_SESSION['actif'];
$operation = $_SESSION['op'];
$table = $_SESSION['table']; 
$msg = [
    'create' => 'L\'insertion',
    'update' => 'La mise à jour',
    'delete' => 'La suppression'
];



include '../modules/head.php';
include '../modules/header.php';
?>
<div class="container-fluid">
    <p class="h4">Opération réussie</p>
    <p><?=$msg[$operation]?> dans la table <?=$table?> a réussi</p>
</div>
<?php
include '../modules/footer.php';