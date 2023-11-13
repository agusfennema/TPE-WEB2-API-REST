API REST para el recurso de products
Una API REST sencilla para manejar un CRUD de products

Importar la base de datos
importar desde PHPMyAdmin (o cualquiera) database/tienda.sql
Pueba con postman
El endpoint de la API es: http://localhost/tp2-apirest/api/products

Endpoint GET por id
El endpoint por ID es: http://localhost/tp2-apirest/api/products/id

Endpoint DELETE
Verbo DELETE: http://localhost/tp2-apirest/api/products

Endpoint POST
Verbo POST: http://localhost/tp2-apirest/api/products
(no es necesario agregar un ID_producto ya que al ser autoincremental lo hace automaticamente)

Endpoint PUT
Verbo PUT: http://localhost/tp2-apirest/api/products/id

Obtener por ASC o DESC
http://localhost/tp2-apirest/api/products/?sortby=ID_producto&order=DESC

http://localhost/tp2-apirest/api/products/?sortby=ID_producto&order=ASC

Obtener por ASC o DESC de TIPO
http://localhost/tp2-apirest/api/products/?sortby=TIPO&order=ASC
http://localhost/tp2-apirest/api/products/?sortby=TIPO&order=DESC

Obtener por ASC o DESC de TALLE
http://localhost/tp2-apirest/api/products/?sortby=TALLE&order=ASC
http://localhost/tp2-apirest/api/products/?sortby=TALLE&order=DESC

Obtener por ASC o DESC de PRECIO
http://localhost/tp2-apirest/api/products/?sortby=PRECIO&order=ASC
http://localhost/tp2-apirest/api/products/?sortby=PRECIO&order=DESC