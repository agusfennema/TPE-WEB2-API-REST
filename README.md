# API REST para Gestión de Productos

Esta API proporciona funcionalidades **CRUD** (Crear, Leer, Actualizar y Eliminar) para administrar productos de una tienda. Utiliza PHP y MySQL para manejar las operaciones.

## Importar la Base de Datos
1. Crea una base de datos llamada `tienda` en MySQL.
2. Importa la estructura y datos desde el archivo `tienda.sql` mediante PHPMyAdmin u otra herramienta similar.

### Endpoints

#### Obtener Todos los Productos
- **Descripción**: Obtiene todos los productos.
- **Método**: GET
- **Endpoint**: `http://localhost/tp2-apirest/api/products`

#### Obtener Producto por ID
- **Descripción**: Obtiene un producto por su ID.
- **Método**: GET
- **Endpoint**: `http://localhost/tp2-apirest/api/products/{id}`

#### Eliminar Producto
- **Descripción**: Elimina un producto por su ID.
- **Método**: DELETE
- **Endpoint**: `http://localhost/tp2-apirest/api/products/{id}`

#### Crear Producto
- **Descripción**: Crea un nuevo producto.
- **Método**: POST
- **Endpoint**: `http://localhost/tp2-apirest/api/products`
- **Body (JSON)**: 
    ```json
    {
        "TIPO": "Tipo del producto",
        "TALLE": "Talle del producto",
        "PRECIO": "Precio del producto"
    }
    ```

#### Actualizar Producto
- **Descripción**: Actualiza un producto por su ID.
- **Método**: PUT
- **Endpoint**: `http://localhost/tp2-apirest/api/products/{id}`
- **Body (JSON)**: 
    ```json
    {
        "TIPO": "Nuevo tipo",
        "TALLE": "Nuevo talle",
        "PRECIO": "Nuevo precio"
    }
    ```

#### Ordenar Productos
- **Descripción**: Obtiene productos ordenados por columna y dirección.
- **Método**: GET
- **Endpoint**: `http://localhost/tp2-apirest/api/products/?sortby={columna}&order={ASC o DESC}`
    - Ejemplos:
        - `http://localhost/tp2-apirest/api/products/?sortby=ID_producto&order=DESC`
        - `http://localhost/tp2-apirest/api/products/?sortby=TIPO&order=ASC`
        - `http://localhost/tp2-apirest/api/products/?sortby=PRECIO&order=DESC`
