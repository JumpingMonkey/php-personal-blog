<?php
$title = '404 Not Found - Personal Blog';
ob_start();
?>

<div class="text-center py-16">
    <h1 class="text-6xl font-bold text-gray-900 mb-4">404</h1>
    <p class="text-xl text-gray-600 mb-8">Page not found</p>
    <a href="/" class="text-blue-600 hover:text-blue-800">← Go back home</a>
</div>

<?php
$content = ob_get_clean();
require 'layout.php';
?>
