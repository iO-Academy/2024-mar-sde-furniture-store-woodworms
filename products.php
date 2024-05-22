<?php

require_once 'src/Factories/PdoFactory.php';
require_once 'src/Models/ProductModel.php';
require_once 'src/Services/ProductListDisplayService.php';
require_once 'src/Models/CategoryModel.php';
require_once 'src/Entities/Product.php';


$categoryTitle = 'Oops! Invalid product ID';
$productList = [];

$db = PdoFactory::connect();
//$NoC = ProductModel::getNumberOfCategories($_GET['cat_id'], $db);

if (isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) {
    if ($_GET['cat_id'] <= 11 && $_GET['cat_id'] > 0) {
        $cat_id = intval($_GET['cat_id']);
        $productList = ProductModel::getProductList($cat_id, $db);
        $categoryTitle = ProductModel::getProductTitle($cat_id, $db);
    }
}

$categoryDetails = CategoryModel::getCategories($db);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Furniture Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav class="bg-slate-800 py-2 px-5">
    <span class="text-4xl text-white">Furniture Store</span>
</nav>
    <div class="container mx-auto md:w-2/3 mt-5">
    <?php
    if ($productList !== []) {
        echo "<p class='text-5xl text-black my-2'>$categoryTitle</p>";
        }
    else{
        echo "<p class='text-5xl text-black my-2'>Out of range</p>";
    }
    ?>
    <a href="index.php" class="text-blue-500">Back</a>
    </div>
    <?php

    foreach ($productList as $productsInfo) {
        echo ProductListDisplayService::displayProductList($productsInfo);
    }
?>
<footer class="container mx-auto md:w-2/3 border-t mt-10 pt-5">
    <p>© Copyright iO Academy 2022</p>
</footer>
</body>
</html>