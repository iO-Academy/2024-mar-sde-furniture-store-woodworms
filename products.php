<?php

require_once 'src/Factories/PdoFactory.php';
require_once 'src/Models/ProductModel.php';
require_once 'src/Services/ProductListDisplayService.php';
require_once 'src/Models/CategoryModel.php';
require_once 'src/Entities/ProductEntity.php';

$category = false;
$productList = [];
$db = PdoFactory::connect();

if (isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) {
        $cat_id = intval($_GET['cat_id']);
        $category = CategoryModel::getCategoryById($cat_id, $db);
        if ($category){
            $categoryTitle = $category->getCategoryName();
            $productList = ProductModel::getProductByCatId($cat_id, $db);
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
<nav class="bg-slate-800 py-2 px-5 flex justify-between items-center">
    <span class="text-4xl text-white">Furniture Store</span>
    <form class="text-yellow-300 border border-yellow-300 rounded">
        <button class="border-r border-yellow-300 hover:bg-yellow-300 hover:text-slate-800 px-1 py-1" name="units" value="mm">mm</button><!--
        --><button class="border-r border-yellow-300 hover:bg-yellow-300 hover:text-slate-800 px-1 py-1" name="units" value="cm">cm</button><!--
        --><button class="border-r border-yellow-300 hover:bg-yellow-300 hover:text-slate-800 px-1 py-1" name="units" value="in">in</button><!--
        --><button class="px-1 py-1 hover:bg-yellow-300 hover:text-slate-800" name="units" value="ft">ft</button>
    </form>
</nav>
    <div class="container mx-auto md:w-2/3 mt-5">
    <?php
    if ($category) {
        echo ProductListDisplayService::displayCategoryTitle($categoryTitle);
        }
    else {
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