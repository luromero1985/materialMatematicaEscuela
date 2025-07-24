# Proyecto: Portal de Matemática Secundaria

## Objetivo

Crear un sitio web funcional y escalable que permita:

- Visualizar los contenidos trabajados en Matemática en 1ro, 3ro y 6to año.

- Acceder a los bloques por curso, y dentro de cada bloque, a sus materiales.

- Buscar contenidos por curso o bloque.

- Gestionar (agregar, editar, eliminar) materiales de cada bloque.

Este proyecto servirá como repaso práctico de los contenidos de Web 1 y 2 (TUDAI), y como una muestra funcional para entrevistas laborales.

---

## Tecnologías utilizadas

- HTML5, CSS3, JavaScript

- PHP (estilo MVC simple)

- MySQL

- Bootstrap

- Apache (usando XAMPP)

---

## Navegación de la aplicación

### Barra de navegación principal

- Cursos: 1ro, 3ro, 6to

- Botón: Administrar materiales

### Página principal

- Barra de navegación con links a:

    - 1er año

    - 3er año

    - 6to año

    - Página de gestión de materiales

- Input de búsqueda por curso o bloque

- Lista de bloques por curso

### Página por curso

- Lista de bloques

- Al hacer clic en un bloque, se abre una vista con sus contenidos y materiales (PDF, links, descripciones)

### Página de administración

- Formulario para agregar, editar y eliminar materiales

- Carga inicial de materiales desde PDF

---

## Estructura propuesta de carpetas (MVC)

```text
/sitio-matematica/
│
├── public/               # Document Root - lo que ve el navegador
│   ├── index.php         # Entrada principal
│   ├── css/
│   ├── js/
│   ├── img/
│   └── uploads/          # archivos subidos(pdf)
│
├── app/
│   ├── controllers/      # Controladores: lógica de manejo de vistas
│   ├── models/           # Modelos: acceso a datos, conexión con base
│   ├── views/            # Vistas: HTML/PHP que muestra la interfaz
│   └── core/             # Enrutador, conexión a BD, helpers
│
├── config/
│   └── config.php        # Conexión a base de datos, rutas, etc
│
├── sql/
│   └── esquema.sql       # Esquema de base de datos
│
└── README.md             # Documentación
```


---

## Base de datos

### Tabla: cursos

id_curso (PK)
nombre (ej: "1ro", "3ro", "6to")

### Tabla: bloques

id_bloque (PK)
nombre_bloque
descripcion
id_curso (FK)

### Tabla: materiales

id_material (PK)
titulo
tipo (pdf, link, actividad, etc.)
contenido (puede ser link o texto)
id_bloque (FK)

---

## Escalabilidad 

- Se puede agregar más cursos o bloques fácilmente desde la base de datos.

- La lógica de MVC permite separar presentación, lógica y persistencia.

- Se pueden agregar usuarios y roles si se desea gestionar permisos a futuro.

---

## Autor

Profesora en matemática y Licenciada en Educación Secundaria Luciana Yael Romero

---

## Licencia

Este proyecto es libre para uso educativo y personal.
