<?php while (have_posts()):
    the_post(); ?>

    <h1 class="text-center text-primary">
        <?= the_title() ?>
    </h1>

    <?= the_content(); ?>

<?php endwhile; ?>