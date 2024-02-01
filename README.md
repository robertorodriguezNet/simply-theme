# Tema simple para WordPress *A simply theme for WordPress*

Desarrollo de un tema para WordPress, basado en *mobile first* y *flex-box*.

---

## PÁGINAS

- Inicio
- Blog
- Competiciones
- Galería
- Contacto
- Legales
  - Política de privacidad
  - Política de cookies

---

## MENÚ

Hay que registrar el menú en `functions.php`.
Se registra en la función *simplytheme_menus* y se ejecuta en el hook *init*.

Los menús se guardan en la tabla *wp_terms*.

Registrar un nuevo menú de navegación:
El identificador para WP no tiene por qué ser igual que el nombre dado al menú en el panel al crear el menú, este identificador aparece para preguntar "Dónde se verá" al momento de crear el menú.

'' => __( 'Identificador para WP', '')
`
    register_nav_menus( array(
        'menu-horizontal' => __('Menu Horizontal', 'simplytheme')
    ));
`

### Mostrar el menú

En el lugar en el que se quiera mostrar el menú se llama a `wp_nav_menu(args)`.
A la función hay que pasarle como argumento qué menú queremos agregar.

`
    $args = array(
        'theme_location' => 'menu-horizontal',
        'container' => 'nav',
        'container_class' => 'menu-horizontal'
    );
    wp_nav_menu($args);
`

---

## HOOKS

- **init** ejecuta la función una vez que arranca WP.
  
---

## ¿QUÉ QUIERO HACER?

- Establecer el idioma de la página `html lang`
  - Se usa la función `language_attributes()` para sustiruir el atributo `lang=""`.
  
- Obtener la URL hacia el directorio del tema.
  - `<?= get_template_directory_uri(); ?>`
