<?php require('partials/head.php'); ?>

<h1>My Tasks</h1>

<?php foreach ($tasks as $task) : ?>
    <li>
        <?php if ($task->is_active) : ?>
            <strike><?= $task->name; ?></strike>
        <?php else : ?>
            <?= $task->order_nr; ?>
        <?php endif; ?>
    </li>
<?php endforeach; ?>

<?php require('partials/footer.php'); ?>
