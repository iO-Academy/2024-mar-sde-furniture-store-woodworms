<?php

require_once 'src/Factories/PDO_Factory.php';
require_once 'src/Models/CategoriesModel.php';
require_once 'src/Entities/Categories.php';
require_once 'src/Entities/Products.php';

$db = PDO_Factory::connect();
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
<header class="container mx-auto md:w-2/3 md:mt-10 py-16 px-8 bg-slate-200 rounded">
    <h1 class="text-5xl">Furniture Categories</h1>
    <p>We have a wide range of products in the below categories, start by selecting the kind of product you are looking for</p>
</header>
<section class="container mx-auto md:w-2/3 grid md:grid-cols-4 gap-5 mt-10">
    <div class="flex justify-between items-center bg-slate-100 p-5">
        <h3 class="text-2xl">Chair</h3>
        <span class="bg-teal-500 text-2xl px-2 py-1 rounded">54</span>
    </div>
    <div class="flex justify-between items-center bg-slate-100 p-5">
        <h3 class="text-2xl">Table</h3>
        <span class="bg-teal-500 text-2xl px-2 py-1 rounded">42</span>
    </div>
    <div class="flex justify-between items-center bg-slate-100 p-5">
        <h3 class="text-2xl">Sofa</h3>
        <span class="bg-teal-500 text-2xl px-2 py-1 rounded">33</span>
    </div>
    <div class="flex justify-between items-center bg-slate-100 p-5">
        <h3 class="text-2xl">Desk</h3>
        <span class="bg-teal-500 text-2xl px-2 py-1 rounded">67</span>
    </div>
    <div class="flex justify-between items-center bg-slate-100 p-5">
        <h3 class="text-2xl">Office Chair</h3>
        <span class="bg-teal-500 text-2xl px-2 py-1 rounded">54</span>
    </div>
    <div class="flex justify-between items-center bg-slate-100 p-5">
        <h3 class="text-2xl">Bookcase</h3>
        <span class="bg-teal-500 text-2xl px-2 py-1 rounded">42</span>
    </div>
    <div class="flex justify-between items-center bg-slate-100 p-5">
        <h3 class="text-2xl">Chest</h3>
        <span class="bg-teal-500 text-2xl px-2 py-1 rounded">33</span>
    </div>
    <div class="flex justify-between items-center bg-slate-100 p-5">
        <h3 class="text-2xl">Drawers</h3>
        <span class="bg-teal-500 text-2xl px-2 py-1 rounded">67</span>
    </div>
</section>
<footer class="container mx-auto md:w-2/3 border-t mt-10 pt-5">
    <p>© Copyright iO Academy 2022</p>
</footer>
</body>
</html>