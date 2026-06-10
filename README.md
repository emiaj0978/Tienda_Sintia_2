# Sistema de Gestión de Inventario - Tienda Sintia
Sistema web para la gestión de inventario de productos de primera necesidad, controlando stock, fechas de vencimiento y niveles de reposición. Desarrollado como proyecto final del curso de Java Web en SENATI.

## Descripcion del negocio
Nombre: Tienda Sintia <br>
Giro: Comercialización de productos de primera necesidad <br>
Tamaño: Pequeña empresa, negocio local familiar <br>
Contexto: Negocio muy comun en el Peru donde se venden productos como bebidas, abarrotes, snacks, limpieza e higiene personal, abasteciendo a clientes del barrio. <br>
Justificacion: Se necesita un sistema digital para reemplazar el registro manual del inventario, evitar errores y tener un control claro del stock disponible, productos por vencer y faltantes.

## Identificar el problema y solución
Problema: El dueño de la Tienda Sintia lleva el registro de productos y stock en un cuaderno o en papel, lo que genera errores, pérdida de información, dificultad para saber qué productos están por agotarse, cuáles están en exceso o cuáles podrían vencerse. <br>
Solucion tecnologica: Desarrollar un sistema web con Java Spring Boot y MySQL que permita registrar productos, categorías, controlar stock en tiempo real, mostrar alertas de vencimiento y niveles mínimos de reposición.

## Requerimientos Funcionales

### Gestión de Productos
| Código | Descripción |
|--------|-------------|
| RF01 | El sistema debe permitir registrar nuevos productos asociados a una categoría |
| RF02 | El sistema debe permitir modificar la información de un producto |
| RF03 | El sistema debe permitir eliminar productos del sistema |
| RF04 | El sistema debe permitir visualizar los productos filtrados por categoría |
| RF05 | El sistema debe mostrar el stock actual de cada producto |

### Gestión de Categorías
| Código | Descripción |
|--------|-------------|
| RF06 | El sistema debe permitir registrar nuevas categorías de productos |
| RF07 | El sistema debe permitir editar la información de una categoría existente |
| RF08 | El sistema debe permitir eliminar categorías |
| RF09 | El sistema debe mostrar el listado de categorías registradas |

### Gestión de Entradas de Productos
| Código | Descripción |
|--------|-------------|
| RF10 | El sistema debe permitir registrar entradas de productos al almacén indicando fecha y cantidad |
| RF11 | El sistema debe actualizar automáticamente el stock al registrar una entrada |
| RF12 | El sistema debe mostrar el historial de entradas por producto |

### Gestión de Salidas de Productos
| Código | Descripción |
|--------|-------------|
| RF13 | El sistema debe permitir registrar salidas de productos indicando fecha y cantidad |
| RF14 | El sistema debe actualizar automáticamente el stock al registrar una salida |
| RF15 | El sistema debe mostrar el historial de salidas por producto |

### Control de Stock
| Código | Descripción |
|--------|-------------|
| RF16 | El sistema debe generar una alerta cuando el stock de un producto sea igual o menor al nivel mínimo establecido |
| RF17 | El sistema debe permitir visualizar un listado de productos con bajo stock |
| RF18 | El sistema debe mostrar productos con exceso de existencias |
| RF19 | El sistema debe mostrar alertas de productos próximos a vencer (7 días o menos) |

---

## Requerimientos No Funcionales

### Rendimiento
| Código | Descripción |
|--------|-------------|
| RNF01 | El sistema debe responder a las consultas de productos en un tiempo máximo de 3 segundos |
| RNF02 | El sistema debe actualizar el stock inmediatamente después de registrar una entrada o salida |

### Seguridad
| Código | Descripción |
|--------|-------------|
| RNF03 | El sistema debe contar con autenticación mediante usuario y contraseña para acceder a la plataforma |
| RNF04 | Solo el usuario administrador podrá registrar, editar o eliminar productos y categorías |
| RNF05 | La información almacenada en la base de datos debe estar protegida contra accesos no autorizados |

### Usabilidad
| Código | Descripción |
|--------|-------------|
| RNF06 | El sistema debe contar con una interfaz sencilla e intuitiva para facilitar su uso |
| RNF07 | El sistema debe mostrar mensajes claros de confirmación o error al realizar operaciones |

### Integridad de Datos
| Código | Descripción |
|--------|-------------|
| RNF08 | El sistema debe garantizar que no se registren salidas de productos con cantidad mayor al stock disponible |
| RNF09 | La base de datos debe mantener la consistencia e integridad de la información almacenada |

### Disponibilidad
| Código | Descripción |
|--------|-------------|
| RNF10 | El sistema debe estar disponible durante el horario de atención de la tienda |

### Escalabilidad
| Código | Descripción |
|--------|-------------|
| RNF11 | El sistema debe permitir futuras ampliaciones, como la integración con facturación electrónica o generación de reportes estadísticos |

---

### DIAGRAMA DE FIGMA UI/UX
![FIGMA](https://www.figma.com/design/BhCK6tHBD2xM2IzBFCgQyl/Sin-t%C3%ADtulo?node-id=0-1&p=f&t=biuAk1qIKtQNHJ7L-0)

## Base de datos

El sistema cuenta con 4 tablas principales:

| Tabla | Descripcion |
|-------|-------------|
| CATEGORIA | Clasificación de los productos |
| PRODUCTO | Registro de cada producto del inventario |
| ENTRADA | Registro de entradas de productos al almacén |
| SALIDA | Registro de salidas de productos del almacén |

### Diagrama Entidad-Relacion (DER)
![Diagrama Entidad Relacion](https://github.com/emiaj0978/TiendaSintia/blob/main/frontend/imagen/relacional(der).png)

### Modelo Relacional (MR)
![Modelo Relacional](https://github.com/emiaj0978/TiendaSintia/blob/main/frontend/imagen/entidadrelacion(mr).png)

### Cardinalidades
CATEGORIA — PRODUCTO (1:N) <br>
Una categoría puede tener muchos productos, pero un producto pertenece a una sola categoría. <br>
PRODUCTO — ENTRADA (1:N) <br>
Un producto puede tener muchas entradas, pero una entrada pertenece a un solo producto. <br>
PRODUCTO — SALIDA (1:N) <br>
Un producto puede tener muchas salidas, pero una salida pertenece a un solo producto.

| Entidad A | Relacion | Entidad B | Cardinalidad |
|-----------|----------|-----------|--------------|
| CATEGORIA | contiene | PRODUCTO | 1:N |
| PRODUCTO | genera | ENTRADA | 1:N |
| PRODUCTO | genera | SALIDA | 1:N |


### Script de Base de datos

```sql
CREATE DATABASE tienda_sintia_2;
USE tienda_sintia_2;

create table usuario(
id_usuario int auto_increment primary key,
roles enum('admin', 'superadmin') default 'admin',
nombre_usuario varchar (150) not null,
clave varchar(250) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE Categoria (
    IDcategoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre_categoria VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE Producto (
    IDproducto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) not null,
    precio_compra varchar(20),
    precio_venta varchar(20),
    stock_actual int not null,
    qrs varchar(13) unique not null,
    IDcategoria INT NOT NULL,
    FOREIGN KEY (IDcategoria) REFERENCES Categoria(IDcategoria)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE Salida (
    IDsalida INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    cantidad INT NOT NULL,
    IDproducto INT NOT NULL,
    FOREIGN KEY (IDproducto) REFERENCES Producto(IDproducto) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO Categoria (nombre_categoria, descripcion) VALUES 
('Bebidas', 'Productos líquidos'),
('Snacks', 'Comida rápida'),
('Lácteos', 'Productos derivados de la leche'),
('Abarrotes', 'Productos envasados no perecibles'),
('Limpieza', 'Productos de limpieza del hogar'),
('Bebidas Alcohólicas', 'Bebidas con contenido alcohólico'),
('Carnes', 'Productos cárnicos'),
('Verduras', 'Productos vegetales frescos'),
('Frutas', 'Frutas frescas'),
('Panadería', 'Productos de panadería y pastelería');


INSERT INTO Producto (nombre, descripcion, precio_compra, precio_venta, stock_actual, fecha_vencimiento, IDcategoria) VALUES
('Coca Cola', 'Bebida gaseosa', 2.50, 4.00, 100, '2026-12-31', 1),
('Papas Lays', 'Snack salado', 1.00, 2.00, 50, '2026-12-31', 2),
('Leche Gloria', 'Leche entera pasteurizada', 3.50, 5.00, 80, '2026-12-15', 3),
('Yogur Natural', 'Yogur sin azúcar', 2.00, 3.50, 60, '2026-11-20', 3),
('Arroz Costeño', 'Arroz extra grano', 4.00, 6.00, 200, '2027-06-01', 4),
('Fideos Don Vittorio', 'Fideos spaghetti', 2.50, 4.00, 150, '2027-05-01', 4),
('Aceite Primor', 'Aceite vegetal 1L', 5.00, 8.00, 100, '2027-03-01', 4),
('Lavavajillas Marsella', 'Líquido lavavajillas', 4.00, 6.50, 40, '2027-12-31', 5),
('Lejía Clorox', 'Blanqueador de ropa', 3.00, 5.00, 60, '2027-12-31', 5),
('Cerveza Cristal', 'Cerveza rubia 650ml', 3.00, 5.00, 120, '2026-12-31', 6),
('Vino Tinto', 'Vino tinto chileno', 15.00, 25.00, 30, '2028-03-01', 6),
('Pollo Entero', 'Pollo fresco', 8.00, 12.00, 40, '2026-12-10', 7),
('Carne Molida', 'Carne de res molida', 12.00, 18.00, 25, '2026-12-08', 7),
('Lechuga', 'Lechuga fresca', 1.50, 2.50, 50, '2026-12-05', 8),
('Tomate', 'Tomate riñón', 2.00, 3.50, 60, '2026-12-06', 8),
('Manzana Delicia', 'Manzana roja', 3.00, 5.00, 45, '2026-12-12', 9),
('Plátano de seda', 'Plátano dulce', 1.50, 2.80, 80, '2026-12-09', 9),
('Pan Francés', 'Pan blanco', 1.00, 2.00, 100, '2026-12-03', 10),
('Queque', 'Queque marmolado', 4.00, 7.00, 30, '2026-12-15', 10);

INSERT INTO usuario (id_usuario, roles, nombre_usuario, clave) VALUES
('1', 'admin', 'emi2', 1234),
('2', 'superadmin', 'emi', 12345);

```

---

### Análisis de requisitos

El sistema debe:

- Ser intuitivo.
- Evitar errores en ventas.
- Mostrar información clara.
- Permitir futuras mejoras.

---

## Imágenes del problema

---

## Imágenes del negocio

---