<?php
$title = 'Home - Personal Blog';
ob_start();
?>

<div class="bg-white">
    <div class="relative px-4 pt-16 pb-20 sm:px-6 lg:px-8 lg:pt-24 lg:pb-28">
        <div class="absolute inset-0">
            <div class="h-1/3 bg-white sm:h-2/3"></div>
        </div>
        <div class="relative mx-auto max-w-7xl">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Latest Articles</h2>
                <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">
                    Discover my thoughts, experiences, and insights on various topics.
                </p>
            </div>
            
            <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
                <?php foreach ($articles as $article): ?>
                    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg transition hover:shadow-xl">
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <a href="/article/<?= $article->getId() ?>" class="block mt-2">
                                    <p class="text-xl font-semibold text-gray-900 hover:text-indigo-600 transition">
                                        <?= htmlspecialchars($article->getTitle()) ?>
                                    </p>
                                    <p class="mt-3 text-base text-gray-500 line-clamp-3">
                                        <?= substr(strip_tags($article->getHtmlContent()), 0, 150) ?>...
                                    </p>
                                </a>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="sr-only">Author</span>
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600"></div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Admin</p>
                                    <div class="flex space-x-1 text-sm text-gray-500">
                                        <time datetime="<?= $article->getDate() ?>"><?= $article->getDate() ?></time>
                                        <span aria-hidden="true">&middot;</span>
                                        <span>5 min read</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'layout.php';
?>
