<footer class="footer container">
    <div class="footer-container">

        <?php
        $args = array(
            'theme_location' => 'menu-principal',
            'container' => 'nav',
            'container_class' => 'menu-principal',
            'container_id' => 'menu-principal'
        );
        wp_nav_menu($args);
        ?>

        <p class="copyright">
            &copy;<?=date('Y')?> <?=get_bloginfo('description')?> - Diseño Web :: <a href="https://robertorodriguez.net" target="_blank">robertorodriguez.net</a>
        </p>

    </div>

</footer>

</body>

</html>