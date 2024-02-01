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

" "=> __( 'Identificador para WP', '')

```php
register_nav_menus( array(
    'menu-horizontal' => __('Menu Horizontal', 'simplytheme');
));
```

### Mostrar el menú

En el lugar en el que se quiera mostrar el menú se llama a `wp_nav_menu(args)`.
A la función hay que pasarle como argumento qué menú queremos agregar.

```php
    $args = array(
        'theme_location' => 'menu-horizontal',
        'container' => 'nav',
        'container_class' => 'menu-horizontal'
    );
    wp_nav_menu($args);
```

---

## ESTILOS

### Cargar los estilos

Entre las dependencias se encuentra `normalize`, que se usa para reiniciar las opciones css de los navegadores y que los estilos tengan consistencia.

Las dependencias se cargan antes que los archivo que las llaman.

Se agregan con la función `wp_enqueue_style('nombre-del-estilo','ubicación','dependencias',version);`.
Hook: `wp_enqueue_script`.

```php
function simplytheme_scripts_styles(){
    wp_enqueue_style('style', get_stylesheet_uri(), array(),'1.0.0');
}
add_action('wp_enqueue_scripts','simplytheme_scripts_styles');
```

### normalize.css

Descarga: <https://necolas.github.io/normalize.css/>

Al pulsar en *Download* se abre una ventana con la hoja de estilo.

Se copia la URL y se pega en la función `wp_enqueue_style`;

Hay que agregar *normalize* a las dependencias del estilo principal para que se cargue antes.

```php
function simplytheme_scripts_styles(){

    wp_enqueue_style('normalize','https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(),'8.0.1');
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'),'1.0.0');

}
add_action('wp_enqueue_scripts','simplytheme_scripts_styles');
```

### Google fonts

URL: <https://fonts.google.com/>

Una vez seleccionadas las fuentes, se copia el enlace *@import* y se agrega a la hoja de estilo principal.

Fuentes:

- Raleway:
  - Regular 400
  - Bold 700
  - Black 900
- Staatliches
  - Regular 400

---

## HOOKS

- **init** ejecuta la función una vez que arranca WP.
- **wp_enqueue_style** carga scripts y hojas de estilo.
  - **wp_enqueue_style** es llamado en la función `wp_head()`;
  
---

## ¿QUÉ QUIERO HACER?

- Establecer el idioma de la página `html lang`
  - Se usa la función `language_attributes()` para sustiruir el atributo `lang=""`.
  
- Obtener la URL hacia el directorio del tema.
  - `<?= get_template_directory_uri(); ?>`
