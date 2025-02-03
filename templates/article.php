<?php
$title = htmlspecialchars($article->getTitle()) . ' - Personal Blog';
ob_start();
?>

<article class="bg-white overflow-hidden">
    <div class="relative mx-auto max-w-7xl py-16 px-4 sm:px-6 lg:px-8">
        <div class="absolute top-0 bottom-0 left-0 hidden w-screen bg-gray-50 lg:block"></div>
        <div class="mx-auto max-w-prose text-base lg:grid lg:max-w-none lg:grid-cols-2 lg:gap-8">
            <div>
                <h2 class="text-base font-semibold leading-6 text-indigo-600">Article</h2>
                <h1 class="mt-2 text-3xl font-bold leading-8 tracking-tight text-gray-900 sm:text-4xl">
                    <?= htmlspecialchars($article->getTitle()) ?>
                </h1>
            </div>
        </div>
        <div class="mt-8 lg:grid lg:grid-cols-2 lg:gap-8">
            <div class="relative lg:col-start-2 lg:row-start-1">
                <div class="relative mx-auto max-w-prose text-base lg:max-w-none">
                    <figure>
                        <div class="aspect-w-12 aspect-h-7 lg:aspect-none">
                            <div class="h-64 overflow-hidden rounded-lg bg-gradient-to-r from-indigo-500 to-purple-600">
                                <div class="flex h-full items-center justify-center">
                                    <svg class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <figcaption class="mt-3 flex text-sm text-gray-500">
                            <span class="ml-2">Published on <?= $article->getDate() ?></span>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="mt-8 lg:mt-0">
                <div class="mx-auto max-w-prose text-base lg:max-w-none">
                    <div class="prose prose-indigo prose-lg text-gray-500 mx-auto">
                        <?= $article->getHtmlContent() ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-8 flex justify-center">
            <a href="/" class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                ← Back to articles
            </a>
        </div>
    </div>
</article>

<?php
$content = ob_get_clean();
require 'layout.php';
?>
