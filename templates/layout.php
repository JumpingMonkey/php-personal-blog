<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Personal Blog' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                        <a href="/" class="flex items-center py-4">
                            <span class="font-semibold text-gray-500 text-lg">Personal Blog</span>
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <?php if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']): ?>
                        <a href="/admin/dashboard" class="py-2 px-4 text-gray-500 hover:text-gray-700">Dashboard</a>
                    <?php else: ?>
                        <a href="/admin/login" class="py-2 px-4 text-gray-500 hover:text-gray-700">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        <?= $content ?>
    </main>

    <footer class="bg-white shadow-lg mt-8">
        <div class="container mx-auto px-4 py-6">
            <p class="text-center text-gray-500">&copy; <?= date('Y') ?> Personal Blog. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
