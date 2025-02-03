<?php
$title = 'Edit Article - Personal Blog';
ob_start();
?>

<div class="bg-white">
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form action="/admin/articles/<?= $article->getId() ?>" method="POST" class="space-y-8 divide-y divide-gray-200">
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div class="space-y-6 sm:space-y-5">
                    <div>
                        <h3 class="text-2xl font-semibold leading-6 text-gray-900">Edit Article</h3>
                        <p class="mt-2 max-w-2xl text-sm text-gray-500">
                            Edit your article using Markdown formatting.
                        </p>
                    </div>

                    <div class="space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">
                                Title
                            </label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input type="text" 
                                       name="title" 
                                       id="title"
                                       value="<?= htmlspecialchars($article->getTitle()) ?>"
                                       class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xl sm:text-sm sm:leading-6"
                                       required>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                            <label for="content" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">
                                Content
                                <p class="mt-1 text-sm text-gray-500">Write in Markdown format.</p>
                            </label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <textarea id="content"
                                          name="content"
                                          rows="20"
                                          class="block w-full max-w-2xl rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                          required><?= htmlspecialchars($article->getContent()) ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end gap-x-3">
                    <a href="/admin/dashboard"
                       class="rounded-md bg-white py-2 px-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        Cancel
                    </a>
                    <button type="submit"
                            class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Update Article
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?>
