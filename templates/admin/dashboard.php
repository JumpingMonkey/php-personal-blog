<?php
$title = 'Admin Dashboard - Personal Blog';
ob_start();
?>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Articles</h1>
            <a href="/admin/articles/create" 
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                New Article
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    <?= htmlspecialchars($article->getTitle()) ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                    <?= $article->getDate() ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="/admin/articles/<?= $article->getId() ?>/edit" 
                                   class="text-blue-600 hover:text-blue-900 mr-4">Edit</a>
                                <form action="/admin/articles/<?= $article->getId() ?>/delete" 
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this article?')">
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?>
