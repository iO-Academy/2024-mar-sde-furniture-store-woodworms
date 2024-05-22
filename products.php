<?php

require_once 'src/Factories/PdoFactory.php';
require_once 'src/Models/ProductModel.php';
require_once 'src/Services/ProductListDisplayService.php';
require_once 'src/Models/CategoryModel.php';
require_once 'src/Entities/Product.php';

$db = PdoFactory::connect();

$productList = ProductModel::getProductList($_GET['cat_id'], $db);

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
<?php
    echo ProductListDisplayService::displayCategoryTitle($productList[0]);
    ?>
    <div class="container mx-auto md:w-2/3 mt-5">
    <a href="index.php" class="text-blue-500">Back</a>
    </div>
    <?php
    foreach ($productList as $productsInfo)
{
    echo ProductListDisplayService::displayProductList($productsInfo);
}
?>
<footer class="container mx-auto md:w-2/3 border-t mt-10 pt-5">
    <p>© Copyright iO Academy 2022</p>
</footer>
</body>
</html>