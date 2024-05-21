<?php

require_once 'src/Factories/PdoFactory.php';
require_once 'src/Models/ProductModel.php';
require_once 'src/Services/ProductListDisplayService.php';

$db = PdoFactory::connect();

$productList = ProductModel::getProductList($db);
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
foreach ($productList as $productsInfo)
{
    echo ProductListDisplayService::displayProductList($productsInfo);
}
?>
<!--<header class="container mx-auto md:w-2/3 md:mt-10 py-16 px-8 bg-slate-200 rounded">-->
<!--    <h1 class="text-5xl mb-2">Category: Chair</h1>-->
<!--    <p>For more information about any of the below products, click on the more button.</p>-->
<!--</header>-->
<!--<div class="container mx-auto md:w-2/3 mt-5">-->
<!--    <a href="index.html" class="text-blue-500">Back</a>-->
<!--</div>-->
<!--<section class="container mx-auto md:w-2/3 grid md:grid-cols-4 gap-5 mt-5">-->
<!--    <div class="bg-slate-100 p-5">-->
<!--        <div class="flex justify-between items-center">-->
<!--            <h3 class="text-2xl">Price: £27.62</h3>-->
<!--            <span class="bg-teal-500 text-2xl px-2 py-1 rounded">54</span>-->
<!--        </div>-->
<!--        <p>Color: Yellow</p>-->
<!--    </div>-->
<!--</section>-->
<footer class="container mx-auto md:w-2/3 border-t mt-10 pt-5">
    <p>© Copyright iO Academy 2022</p>
</footer>
</body>
</html>