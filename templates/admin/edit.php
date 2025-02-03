<?php
$title = 'Edit Article - Personal Blog';
ob_start();
?>

<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-8">
        <h1 class="text-2xl font-bold mb-6">Edit Article</h1>
        
        <form action="/admin/articles/<?= $article->getId() ?>" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Title
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="title"
                       name="title"
                       type="text"
                       value="<?= htmlspecialchars($article->getTitle()) ?>"
                       required>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                    Content (Markdown)
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          id="content"
                          name="content"
                          rows="20"
                          required><?= htmlspecialchars($article->getContent()) ?></textarea>
            </div>
            
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                    Update Article
                </button>
                <a href="/admin/dashboard" 
                   class="text-blue-500 hover:text-blue-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?>
