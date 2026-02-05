=====================================
JUEGO DE MEMORIA - README
=====================================

DESCRIPCIÓN:
------------
Juego de memoria (Memory Game) desarrollado en PHP, MySQL, HTML, CSS y JavaScript.
El objetivo es encontrar todas las parejas de emojis en el menor número de movimientos y tiempo posible.

CARACTERÍSTICAS:
---------------
- Interfaz visual atractiva y responsive
- Sistema de puntuaciones con ranking
- Contador de movimientos y tiempo
- Animaciones suaves
- Base de datos para guardar puntuaciones
- Compatible con dispositivos móviles

REQUISITOS DEL SISTEMA:
-----------------------
- PHP 7.4 o superior
- MySQL 5.7 o superior (o MariaDB 10.3+)
- Servidor web (Apache, Nginx, etc.)
- Navegador web moderno

ESTRUCTURA DE ARCHIVOS:
-----------------------
memory-game/
├── index.php           # Página principal del juego
├── leaderboard.php     # Tabla de clasificación
├── config.php          # Configuración de base de datos
├── style.css           # Estilos CSS
├── script.js           # Lógica del juego en JavaScript
├── database.sql        # Script SQL para crear la base de datos
└── README.txt          # Este archivo

INSTRUCCIONES DE INSTALACIÓN:
------------------------------

1. CONFIGURAR EL SERVIDOR WEB:
   - Instala XAMPP, WAMP, MAMP o similar
   - Copia la carpeta 'memory-game' en el directorio htdocs/ (o www/)
   
2. CREAR LA BASE DE DATOS:
   - Abre phpMyAdmin (http://localhost/phpmyadmin)
   - Haz clic en "Nuevo" para crear una base de datos
   - Importa el archivo database.sql:
     * Selecciona la base de datos 'memory_game'
     * Ve a la pestaña "Importar"
     * Selecciona el archivo database.sql
     * Haz clic en "Continuar"
   
   ALTERNATIVA (vía línea de comandos):
   mysql -u root -p < database.sql

3. CONFIGURAR LA CONEXIÓN:
   - Abre el archivo config.php
   - Modifica las credenciales si es necesario:
     * DB_HOST: normalmente 'localhost'
     * DB_NAME: 'memory_game'
     * DB_USER: tu usuario de MySQL (por defecto 'root')
     * DB_PASS: tu contraseña de MySQL (por defecto vacío '')

4. ACCEDER A LA APLICACIÓN:
   - Abre tu navegador
   - Ve a: http://localhost/memory-game/
   - ¡Disfruta del juego!

CONFIGURACIÓN PERSONALIZADA:
----------------------------
Para cambiar las credenciales de la base de datos:
1. Abre config.php
2. Modifica las constantes:
   define('DB_HOST', 'tu_host');
   define('DB_NAME', 'tu_base_de_datos');
   define('DB_USER', 'tu_usuario');
   define('DB_PASS', 'tu_contraseña');

CÓMO JUGAR:
-----------
1. Haz clic en una carta para voltearla
2. Haz clic en otra carta para encontrar su pareja
3. Si coinciden, permanecerán visibles
4. Si no coinciden, se voltearán de nuevo
5. Encuentra todas las parejas para ganar
6. Al finalizar, guarda tu puntuación ingresando tu nombre

RESOLUCIÓN DE PROBLEMAS:
-------------------------
- Error de conexión a la base de datos:
  * Verifica que MySQL esté corriendo
  * Comprueba las credenciales en config.php
  * Asegúrate de que la base de datos existe

- Página en blanco:
  * Activa la visualización de errores en PHP
  * Verifica los logs de error del servidor
  * Comprueba que PHP esté instalado correctamente

- Las puntuaciones no se guardan:
  * Verifica que la tabla 'scores' existe
  * Comprueba los permisos de la base de datos

TECNOLOGÍAS UTILIZADAS:
-----------------------
- Backend: PHP 7+
- Base de datos: MySQL
- Frontend: HTML5, CSS3, JavaScript (ES6+)
- Diseño: CSS Grid, Flexbox, Animaciones CSS

AUTOR:
------
Aplicación desarrollada para fines educativos

LICENCIA:
---------
Uso libre para fines educativos y personales

CONTACTO Y SOPORTE:
-------------------
Para reportar problemas o sugerencias, puedes crear un issue en el repositorio.

=====================================
¡Gracias por usar el Juego de Memoria!
=====================================
