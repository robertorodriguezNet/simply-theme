<!DOCTYPE html>
<html <?= language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>

<body>

    <header>
        <div class="container nav-bar">
            <div class="logo">
                <img src="<?= get_template_directory_uri(); ?>/img/logo-franja.svg" alt="Logo del sitio">
            </div>
            <?php
                $args = array(
                    'theme_location' => 'menu-principal',
                    'container' => 'nav',
                    'container_class' => 'menu-principal',
                    'container_id' => 'menu-principal'
                );
                wp_nav_menu($args);
            ?>
        </div>
    </header>