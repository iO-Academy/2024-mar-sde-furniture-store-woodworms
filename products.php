<?php

require_once 'src/Factories/PdoFactory.php';
require_once 'src/Models/ProductModel.php';
require_once 'src/Services/ProductListDisplayService.php';
require_once 'src/Models/CategoryModel.php';
require_once 'src/Entities/Product.php';

$category = false;
$productList = [];
$db = PdoFactory::connect();

if (isset($_GET['category_id']) && is_numeric($_GET['category_id'])) {
    $category_id = intval($_GET['category_id']);
    $category = CategoryModel::getCategoryById($category_id, $db);
    if ($category){
        $categoryTitle = $category->getCategoryName();
        $productList = ProductModel::getProductByCategoryId($category_id, $db);
    }
}

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
    if ($category) {
        echo ProductListDisplayService::displayCategoryTitle($categoryTitle);
    } else {
        echo "<p class='text-5xl text-black my-2'>This is not a valid product page</p>";
    }
    ?>
    <a href="index.php" class="text-blue-500">Back</a>
    </div>
    <section class="container mx-auto md:w-2/3 grid md:grid-cols-4 gap-5 mt-5">
    <?php
    foreach ($productList as $productsInfo) {
        echo ProductListDisplayService::displayProductSummary($productsInfo);
    }
    ?>
    </section>
    <footer class="container mx-auto md:w-2/3 border-t mt-10 pt-5">
    <p>© Copyright iO Academy 2022</p>
    </footer>
</body>
</html>