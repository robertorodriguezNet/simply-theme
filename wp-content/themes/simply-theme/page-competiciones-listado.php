<?php
/**
 * Template Name: Listado de competiciones
 */
get_header();
?>

<main class="container section">


    <?php
    // Obtenemos las competiciones de la base de datos
    $args = array(
        'post_type' => 'competiciones'
    );

    $competiciones = new WP_Query($args);

    if ($competiciones->have_posts()):
        ?>

        <ul class="listado-grid">

            <?php
            while ($competiciones->have_posts()):
                $competiciones->the_post();
                ?>

                <li class="card">
                    <?= the_title() ?>
                </li>

            <?php endwhile; ?>

        </ul>

        <?php
    endif;
    wp_reset_postdata();
    ?>


</main>

<?php
get_footer();
?>