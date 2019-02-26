<nav>
    <ul>

    </ul>
        <?php foreach ($categories as $category):?>
            <li>
                <a href="?category=<?= $category->category_id; ?>">
                    <?= htmlspecialchars ($category->category_name); ?>
                </a>
            </li>
        <?php endforeach; ?>
</nav>