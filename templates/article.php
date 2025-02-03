<?php
$title = htmlspecialchars($article->getTitle()) . ' - Personal Blog';
ob_start();
?>

<article class="bg-white">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
        <!-- Article Header -->
        <div class="py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                    <?= htmlspecialchars($article->getTitle()) ?>
                </h1>
                <p class="mt-4 text-base text-gray-500">
                    Published on <?= $article->getDate() ?>
                </p>
            </div>
        </div>

        <!-- Article Content -->
        <div class="prose prose-lg prose-indigo mx-auto pb-16">
            <?= $article->getHtmlContent() ?>
        </div>

        <!-- Back Link -->
        <div class="border-t border-gray-200 py-8">
            <div class="flex justify-center">
                <a href="/" class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                    ← Back to articles
                </a>
            </div>
        </div>
    </div>
</article>

<?php
$content = ob_get_clean();
require __DIR__ . '/../templates/layout.php';
?>
