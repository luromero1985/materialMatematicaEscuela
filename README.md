# Proyecto: Portal de Matemática Secundaria

## Objetivo

Crear un sitio web funcional y escalable que permita:

- Visualizar los contenidos trabajados en Matemática en 1ro, 3ro y 6to año.  
- Acceder a los bloques por curso, y dentro de cada bloque, a sus materiales (PDFs).  
- Buscar contenidos por curso o bloque (pendiente de implementación).  
- Gestionar (agregar y listar) materiales de cada bloque (subida de PDFs, con título, descripción y año).  
- Servir como repaso práctico de contenidos de Web 1 y 2 (TUDAI) y como muestra funcional para entrevistas.

---

## Tecnologías utilizadas

- HTML5, CSS3, JavaScript  
- PHP puro (estructura simple, sin frameworks)  
- MySQL (base de datos `escuela`)  
- Bootstrap (planificado para mejoras de UI)  
- Servidor Apache (XAMPP en entorno local)  

---

## Navegación de la aplicación

### Barra de navegación principal

- Cursos: 1ro, 3ro, 6to  
- Botón: Subir material (página para cargar PDFs)  

### Página principal (`index.php`)

- Barra de navegación con enlaces a:  
  - 1er año  
  - 3er año  
  - 6to año  
  - Subir material  
- Presentación general (en desarrollo)  

### Páginas por curso (`primero.php`, `tercero.php`, `sexto.php`)

- Listado simple de materiales para cada curso (próximamente mostrar PDFs ordenados por fecha o bloque)  

### Página para subir material (`editar.php`)

- Formulario para subir archivos PDF, asignar año y agregar descripción  
- Validación básica y guardado del archivo en carpeta `uploads/`  
- Inserción de metadatos en tabla `materiales` de la base de datos  

---

## Estructura actual de carpetas

 ```
 /proyectoPaginaEscuela/
│
├── public/ # Document root accesible por navegador
│ ├── index.php # Página principal
│ ├── primero.php
│ ├── tercero.php
│ ├── sexto.php
│ ├── editar.php # Formulario y lógica para subir material
│ ├── css/
│ ├── js/
│ ├── img/
│ └── uploads/ # Archivos PDF subidos
│
├── includes/ # Fragmentos comunes (ej. navbar.php)
│
├── config/
│ └── config.php # Configuración de conexión a BD
│
├── sql/
│ └── esquema.sql # Esquema de base de datos
│
└── README.md # Documentación 
  ``` 
  
---

## Base de datos

### Tabla: materiales

| Campo          | Tipo           | Comentario                    |
|----------------|----------------|------------------------------|
| id             | INT AUTO_INCREMENT PRIMARY KEY | Identificador único          |
| titulo         | VARCHAR(255)   | Nombre original del archivo   |
| descripcion    | TEXT           | Descripción opcional          |
| nombre_archivo | VARCHAR(255)   | Nombre guardado en uploads/   |
| ruta           | VARCHAR(255)   | Ruta relativa en el servidor  |
| anio           | INT            | Año al que corresponde (1,3,6)|
| fecha_subida   | TIMESTAMP      | Fecha de subida automática    |

---

## Próximos pasos / Escalabilidad

- Implementar vista para listar materiales filtrados por curso y bloque.  
- Añadir búsqueda y filtrado por descripción o título.  
- Mejorar interfaz con Bootstrap o framework CSS.  
- Agregar manejo de usuarios y permisos para administrar contenidos.  
- Considerar migración a frameworks PHP o bases de datos más escalables.  

---

## Autor

Profesora en matemática y Licenciada en Educación Secundaria  
Luciana Yael Romero  

---

## Licencia

Este proyecto es libre para uso educativo y personal.
