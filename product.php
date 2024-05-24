<?php

require_once 'src/Factories/PdoFactory.php';
require_once 'src/Models/ProductModel.php';
require_once 'src/Services/IndividualProductDisplayService.php';
require_once 'src/Entities/ProductEntity.php';

$product = false;
$related = false;
$individualProduct = [];
$relatedProduct = [];
$db = PdoFactory::connect();
$individualProduct = ProductModel::getIndividualProduct(($_GET['id']), $db);
$relatedProduct = ProductModel::getRelatedByID(($_GET['id']), $db);
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
<header class="container mx-auto md:w-2/3 md:mt-10 py-16 px-8 bg-slate-200 rounded">
    <p>If this is not the right product for you, use the back button below to see our wide selection of other products.</p>
</header>


<div class="container mx-auto md:w-2/3 mt-5">
    <a href="products.php" class="text-blue-500">Back</a>
</div>

<section class="container mx-auto md:w-2/3 border p-8 mt-5">
    <?php
    foreach ($individualProduct as $product)
    {
        echo IndividualProductDisplayService::displayProductDetails($product);
    }
    ?>
</section>

<section class="container mx-auto md:w-2/3 border p-8 mt-10">
    <?php
    foreach ($relatedProduct as $related)
    {
        echo IndividualProductDisplayService::displayRelatedProductSummary($related);
    }
    ?>

</section>

<footer class="container mx-auto md:w-2/3 border-t mt-10 pt-5">
    <p>© Copyright iO Academy 2022</p>
</footer>

</body>
</html>