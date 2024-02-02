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

- **after_setup_theme**
  - Se ejecuta al activarse el tema.
- **init** ejecuta la función una vez que arranca WP.
- **wp_enqueue_style** carga scripts y hojas de estilo.
  - **wp_enqueue_style** es llamado en la función `wp_head()`;
  
---

## PLANTILLAS (para tipos de post)

### page.php

Plantilla para páginas.

---

## TEMPLATES (plantillas comunes)

Plantillas para usar en diferentes páginas.
Hay que especificar que se trata de un template con un comentario multilínea.
Cualquier página de la sección "Página" se mostrará en la plantilla *page.php*.
Al editar una página, se puede seleccionar el template que la mostrará en `Atributos de la página -> Plantilla`.

Código que debe aparecer al inicio del scritp

```php
/**
 * Template Name: Content Center (No  Sidebars)
 */
```

### page-content-center.php

Muestra el contenido del post centrado.

---

## ¿QUÉ QUIERO HACER?
  
- **footer** Incluir el footer
  - En `footer.php` se copia el *</body>* y el *</html>*.
  - Se llama desde el template con `get_footer()`.
  
- **header** Incluir el header
  - En `header.php` se copia el *head* y el *header*.
  - Se llama desde el template con `get_header()`.
  
- **Idioma** Establecer el idioma de la página `html lang`
  - Se usa la función `language_attributes()` para sustiruir el atributo `lang=""`.

- **Imagen destacada** habilitar.
  - Se habilita desde `functions.php`.
  - El hook en el que se carga el **after_setup_theme**.
  - En la función `add_theme_support('post_thumbnail');` declaramos las funcionalidades que queramos activar.
  - Se carga llamando a `the_post_thumbnail(tamaño,atributos)`.
    - Atributos:  `the_post_thumbnail('full',array('class' => 'imagen-destacada'))`.
  - Se debe comprobar la existencia de la imagen destacada con `if(have_post_thumbnail())`;

- **URL** Obtener la URL hacia el directorio del tema.
  - `<?= get_template_directory_uri(); ?>`
