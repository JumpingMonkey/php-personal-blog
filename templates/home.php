<?php
$title = 'Home - Personal Blog';
ob_start();
?>

<div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
    <?php foreach ($articles as $article): ?>
        <article class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2">
                    <a href="/article/<?= $article->getId() ?>" class="text-gray-900 hover:text-blue-600">
                        <?= htmlspecialchars($article->getTitle()) ?>
                    </a>
                </h2>
                <time class="text-gray-500 text-sm"><?= $article->getDate() ?></time>
                <div class="mt-4 text-gray-600 line-clamp-3">
                    <?= substr(strip_tags($article->getHtmlContent()), 0, 150) ?>...
                </div>
                <a href="/article/<?= $article->getId() ?>" class="inline-block mt-4 text-blue-600 hover:text-blue-800">
                    Read more →
                </a>
            </div>
        </article>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
require 'layout.php';
?>
