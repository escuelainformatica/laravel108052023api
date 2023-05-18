# autenticacion mediante api
* La autenticacion mediante api se realiza por "token bearer"

## generar un nuevo token
Despues de autenticarse, se puede obtener un token nuevo con el siguiente comando:

```php
Auth::user()->createToken('name'); // el nombre del token es solo referencial.
```
Para desplegar el token, utilice lo siguiente

```php
Auth::user()->createToken('name')->plainTextToken;
```

Cuando se genera un token, se puede guardar habilidades.

```php
Auth::user()->createToken('name',['leer','escribir']);
```

## autenticarse con el token
En el encabezado de la solicitud, enviar un token bearer. 

```
Authorization: Bearer 29|NOZuH2ukfVXy1JdusuFak8Z0duAGmWXXGcE5LwTe  (donde 29|... es el token generado)
```

## En el enrutador

Para que el token sea leido, es necesario agregar un middleware en la ruta que se quiere validar.
```php
Route::middleware['auth:sanctum')->get(...);
```

## para usar un "ability".

* Cuando genero el token, debo guardar la "habilidad
* En el enrutador, agregar lo siguiente

```php
Route::middleware(['auth:sanctum','ability:leer,admin'])->get(....);
Route::middleware(['auth:sanctum','abilities:leer,escribir'])->get(...);
```

En el Kernel agregar lo siguiente:

```php
    protected $middlewareAliases = [
        // ....
        'abilities' => \Laravel\Sanctum\Http\Middleware\CheckAbilities::class,
        'ability' => \Laravel\Sanctum\Http\Middleware\CheckForAnyAbility::class,
    ];
```

> las habilidades depende de como se quiera usar. Se pueden usar como permisos o roles, ya que depende de nosotros definir su funcionamiento.
