---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://192.168.1.26/Cursos/tienda.dev/public/docs/collection.json)

<!-- END_INFO -->

#Carrito de compras

API para carrito de compras
<!-- START_202aeeba9d28471d59eaf483f8f7b195 -->
## Lista

Lista de productos en el carrito de compras

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/carrito/listar" \
    -H "Content-Type: application/json" \
    -d '{"cliente_id":19}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/carrito/listar");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "cliente_id": 19
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": 200,
    "message": "Lista",
    "data": []
}
```

### HTTP Request
`GET api/carrito/listar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    cliente_id | integer |  required  | Id del cliente

<!-- END_202aeeba9d28471d59eaf483f8f7b195 -->

<!-- START_ecff5b3edf1fd68c812e8844dd5cf904 -->
## Agregar productos

Agregar productos al carrito de compras

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/carrito/agregar" \
    -H "Content-Type: application/json" \
    -d '{"cliente_id":2,"producto_id":1,"cantidad":10,"precio":"natus"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/carrito/agregar");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "cliente_id": 2,
    "producto_id": 1,
    "cantidad": 10,
    "precio": "natus"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/carrito/agregar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    cliente_id | integer |  required  | Id del cliente
    producto_id | integer |  required  | Id del producto
    cantidad | integer |  required  | Cantidad de productos
    precio | decimal |  required  | Precio calculado

<!-- END_ecff5b3edf1fd68c812e8844dd5cf904 -->

<!-- START_ed6ade0986161cc6adae9a31d0f3c828 -->
## Eliminar productos

Eliminar productos del carrito de compras

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/carrito/eliminar" \
    -H "Content-Type: application/json" \
    -d '{"id":10}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/carrito/eliminar");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 10
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/carrito/eliminar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | Id del producto

<!-- END_ed6ade0986161cc6adae9a31d0f3c828 -->

#Cliente

API's para el cliente
<!-- START_ea71a2e0bf12e55039c3666b39ec8975 -->
## Login

Inicio de sesión de usuarios

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/login" \
    -H "Content-Type: application/json" \
    -d '{"email":"ea","password":"voluptatem"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/login");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "ea",
    "password": "voluptatem"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/cliente/login`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | Email del cliente
    password | string |  required  | Password del cliente

<!-- END_ea71a2e0bf12e55039c3666b39ec8975 -->

<!-- START_ad783baef808c69801cc6def35d30f42 -->
## Registro

Registro de clientes

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/registro" \
    -H "Content-Type: application/json" \
    -d '{"nombre":"ipsa","apellido":"magni","direccion":"voluptatum","telefono":"aut","email":"reprehenderit","password":"quia"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/registro");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nombre": "ipsa",
    "apellido": "magni",
    "direccion": "voluptatum",
    "telefono": "aut",
    "email": "reprehenderit",
    "password": "quia"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/cliente/registro`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nombre | string |  required  | Nombres del cliente
    apellido | string |  required  | Apellidos del cliente
    direccion | string |  required  | Dirección del cliente
    telefono | string |  required  | Teléfono del cliente
    email | string |  required  | Email del cliente
    password | string |  required  | Password del cliente

<!-- END_ad783baef808c69801cc6def35d30f42 -->

<!-- START_363421a2cb5b2463ea954325124b576b -->
## Editar cliente

Editar datos del cliente

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/editar" \
    -H "Content-Type: application/json" \
    -d '{"id":6,"nombre":"et","apellido":"assumenda","direccion":"quidem","telefono":"necessitatibus","password":"quo"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/editar");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 6,
    "nombre": "et",
    "apellido": "assumenda",
    "direccion": "quidem",
    "telefono": "necessitatibus",
    "password": "quo"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/cliente/editar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | Id del cliente
    nombre | string |  required  | Nombres del cliente
    apellido | string |  required  | Apellidos del cliente
    direccion | string |  required  | Dirección del cliente
    telefono | string |  required  | Teléfono del cliente
    password | string |  optional  | opcional Password del cliente

<!-- END_363421a2cb5b2463ea954325124b576b -->

<!-- START_c745061a7ccca34a25385acc179adf97 -->
## Detalle del cliente

Leer los datos de un cliente

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/1?id=accusantium" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/cliente/1");

    let params = {
            "id": "accusantium",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": 200,
    "message": "Cliente encontrado",
    "data": {
        "id": 1,
        "email": "imarvdt@gmail.com",
        "password": "$2y$10$6BB17D2KsDHN.bt75L7Gde73SfdpkAUT6.Riq4wul8b2dnheiOx2e",
        "nombre": "Cesar",
        "apellido": "Peres",
        "telefono": "234828422",
        "direccion": "Lima",
        "created_at": "2019-05-29 18:14:19",
        "updated_at": "2019-08-10 06:12:14",
        "deleted_at": null
    }
}
```

### HTTP Request
`GET api/cliente/{id}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  optional  | int required Id del cliente

<!-- END_c745061a7ccca34a25385acc179adf97 -->

#Dirección

API para direccion del cliente
<!-- START_4f628e4a86e26f6610c1befaa887cc70 -->
## Leer dirección

Leer la dirección de un cliente

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/direccion/1?id=ducimus" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/direccion/1");

    let params = {
            "id": "ducimus",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": 200,
    "message": "Lista",
    "data": {
        "id": 1,
        "cliente_id": 1,
        "direccion": "Lima",
        "direccion_2": "Lima",
        "distrito": "Los Olivos",
        "referencia": "Lima 2019",
        "created_at": "2019-08-14 05:50:49",
        "updated_at": "2019-08-14 05:50:49"
    }
}
```

### HTTP Request
`GET api/direccion/{id}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  optional  | int required Id del cliente

<!-- END_4f628e4a86e26f6610c1befaa887cc70 -->

<!-- START_a03190557027c01f520bdc26815473af -->
## Actualizar

Actualizar la dirección del cliente

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/direccion/actualizar?cliente_id=qui&direccion=voluptatem&distrito=blanditiis&direccion_2=voluptatem&referencia=laudantium" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/direccion/actualizar");

    let params = {
            "cliente_id": "qui",
            "direccion": "voluptatem",
            "distrito": "blanditiis",
            "direccion_2": "voluptatem",
            "referencia": "laudantium",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/direccion/actualizar`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    cliente_id |  optional  | int required Id del cliente
    direccion |  optional  | string required Dirección del cliente
    distrito |  optional  | string required Distrito
    direccion_2 |  optional  | string required Segunda linea de dirección del cliente
    referencia |  optional  | string required Referencia de la dirección

<!-- END_a03190557027c01f520bdc26815473af -->

#Otros
<!-- START_258da7584359f2059b8d3fe0d92b1f36 -->
## productos
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/productos" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/productos");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET productos`


<!-- END_258da7584359f2059b8d3fe0d92b1f36 -->

<!-- START_305ae4c2c5e7f6b212e6c8658de65456 -->
## productos/create
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/productos/create" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/productos/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET productos/create`


<!-- END_305ae4c2c5e7f6b212e6c8658de65456 -->

<!-- START_63f91e86f6b43bbe011af31d9ce6ed29 -->
## productos
> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/productos" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/productos");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST productos`


<!-- END_63f91e86f6b43bbe011af31d9ce6ed29 -->

<!-- START_72ff3e1bd785851307e73b52c2b509fc -->
## productos/{producto}/edit
> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/productos/1/edit" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/productos/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET productos/{producto}/edit`


<!-- END_72ff3e1bd785851307e73b52c2b509fc -->

<!-- START_1a75748a179d5037e8bf6e7f2d849f38 -->
## productos/{producto}
> Example request:

```bash
curl -X DELETE "http://192.168.1.26/Cursos/tienda.dev/public/productos/1" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/productos/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE productos/{producto}`


<!-- END_1a75748a179d5037e8bf6e7f2d849f38 -->

#Producto

API para productos
<!-- START_b8ae75e8490bb4b5d7b5a74048517747 -->
## Lista

Lista de productos

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/producto/listar" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/producto/listar");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": 200,
    "message": "Lista",
    "data": [
        {
            "id": 1,
            "nombre": "Arroz",
            "descripcion": "Arroz",
            "precio": 20,
            "ruta_imagen": "{\"thumb\":\"\\\/public\\\/productos\\\/foto-producto-10082019062814-thumb.jpg\",\"medium\":\"\\\/public\\\/productos\\\/foto-producto-10082019062814-medium.jpg\",\"full\":\"\\\/public\\\/productos\\\/foto-producto-10082019062814-full.jpg\"}",
            "created_at": "2019-08-10 06:28:14",
            "updated_at": "2019-08-14 20:02:46",
            "deleted_at": null
        }
    ]
}
```

### HTTP Request
`GET api/producto/listar`


<!-- END_b8ae75e8490bb4b5d7b5a74048517747 -->

<!-- START_dee856aece8ab6b7fadb207e8245681c -->
## Detalle

Detalle del producto

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/producto/detalle/1?id=delectus" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/producto/detalle/1");

    let params = {
            "id": "delectus",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": 200,
    "message": "Producto encontrado",
    "data": {
        "id": 1,
        "nombre": "Arroz",
        "descripcion": "Arroz",
        "precio": 20,
        "ruta_imagen": "{\"thumb\":\"\\\/public\\\/productos\\\/foto-producto-10082019062814-thumb.jpg\",\"medium\":\"\\\/public\\\/productos\\\/foto-producto-10082019062814-medium.jpg\",\"full\":\"\\\/public\\\/productos\\\/foto-producto-10082019062814-full.jpg\"}",
        "created_at": "2019-08-10 06:28:14",
        "updated_at": "2019-08-14 20:02:46",
        "deleted_at": null
    }
}
```

### HTTP Request
`GET api/producto/detalle/{id}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    id |  optional  | int required Id del producto

<!-- END_dee856aece8ab6b7fadb207e8245681c -->

<!-- START_4fc46f94e24ba4d9a823482db33e94d2 -->
## Buscar

Buscar un producto por alguna coincidencia

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/producto/buscar?query=maxime" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/producto/buscar");

    let params = {
            "query": "maxime",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": 200,
    "message": "Lista",
    "data": []
}
```

### HTTP Request
`GET api/producto/buscar`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    query |  optional  | string required Texto a buscar

<!-- END_4fc46f94e24ba4d9a823482db33e94d2 -->

#Tarjetas

API para tarjetas
<!-- START_267d767ba5bc725b6b38e7e362afe9c1 -->
## Listar

Listar las tarjetas de un cliente

> Example request:

```bash
curl -X GET -G "http://192.168.1.26/Cursos/tienda.dev/public/api/tarjeta/listar?cliente_id=est" 
```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/tarjeta/listar");

    let params = {
            "cliente_id": "est",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": 200,
    "message": "Lista",
    "data": []
}
```

### HTTP Request
`GET api/tarjeta/listar`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    cliente_id |  optional  | int required Id del cliente

<!-- END_267d767ba5bc725b6b38e7e362afe9c1 -->

<!-- START_8016137207c2cf08488ba59850177a7f -->
## Agregar

Agregar nuevas tarjetas

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/tarjeta/agregar" \
    -H "Content-Type: application/json" \
    -d '{"cliente_id":4,"titular":"est","numero_final":"optio","tipo":"nemo"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/tarjeta/agregar");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "cliente_id": 4,
    "titular": "est",
    "numero_final": "optio",
    "tipo": "nemo"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/tarjeta/agregar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    cliente_id | integer |  required  | Id del cliente
    titular | string |  required  | Nombre del dueño de la tarjeta
    numero_final | string |  required  | Cuatro últimos dígitos de la tarjeta
    tipo | string |  required  | Marca de la tarjeta (Ej. Visa, Mastercard)

<!-- END_8016137207c2cf08488ba59850177a7f -->

<!-- START_a407600e2bc6381d0a16d870d3aae15a -->
## Eliminar

Eliminar tarjetas del cliente

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/tarjeta/eliminar" \
    -H "Content-Type: application/json" \
    -d '{"id":9}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/tarjeta/eliminar");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 9
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/tarjeta/eliminar`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | Id de la tarjeta

<!-- END_a407600e2bc6381d0a16d870d3aae15a -->

#Ventas

API para ventas
<!-- START_8661847ddb0a6eb6fda402c5292b5b13 -->
## Agregar

Crear nueva venta

> Example request:

```bash
curl -X POST "http://192.168.1.26/Cursos/tienda.dev/public/api/venta/crear" \
    -H "Content-Type: application/json" \
    -d '{"cliente_id":10,"tarjeta_id":4,"total":"doloribus"}'

```

```javascript
const url = new URL("http://192.168.1.26/Cursos/tienda.dev/public/api/venta/crear");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "cliente_id": 10,
    "tarjeta_id": 4,
    "total": "doloribus"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/venta/crear`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    cliente_id | integer |  required  | Id del cliente
    tarjeta_id | integer |  required  | Id de la tarjeta
    total | decimal |  required  | Precio total de venta realizada

<!-- END_8661847ddb0a6eb6fda402c5292b5b13 -->


