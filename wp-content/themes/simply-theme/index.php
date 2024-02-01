<!DOCTYPE html>
<html <?= language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <header class="header">
        <div class="container nav-bar">
            <div class="logo">
                <img src="<?= get_template_directory_uri(); ?>/img/logo-franja.svg" style="max-width: 150px" alt="Logo del sitio">
            </div>
            <?php
                $args = array(
                    'theme_location' => 'menu-horizontal',
                    'container' => 'nav',
                    'container_class' => 'menu-horizontal'
                );
                wp_nav_menu($args);

            ?>
        </div>
    </header>

    <main>

        <?php
        while (have_posts()):

            the_post();

            the_title();

            the_content();

        endwhile;
        ?>

    </main>

</body>

</html>