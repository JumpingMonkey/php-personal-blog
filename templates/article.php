<?php
$title = htmlspecialchars($article->getTitle()) . ' - Personal Blog';
ob_start();
?>

<article class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-8">
        <h1 class="text-3xl font-bold mb-4"><?= htmlspecialchars($article->getTitle()) ?></h1>
        <time class="text-gray-500"><?= $article->getDate() ?></time>
        <div class="prose max-w-none mt-8">
            <?= $article->getHtmlContent() ?>
        </div>
    </div>
</article>

<?php
$content = ob_get_clean();
require 'layout.php';
?>
