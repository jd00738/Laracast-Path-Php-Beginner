<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>






<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-4 py-6 sm:px-0">
            <div class="h-96 rounded-lg border-4 border-dashed border-gray-200">
                <p class="mb-6">
                    <a href="/notes" class="text-blue-500">Back...</a>
                </p>
                <p> <?= htmlspecialchars($note['body']) ?></p>

                <form class="mt-6" method="POST">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <button class="text-sm text-red-500">DELETE</button>
                </form>
            </div>
        </div>
        <!-- /End replace -->
    </div>
</main>
<?php require base_path('views/partials/footer.php') ?>