# Implementación de Funcionalidad de Edición para Todos los Modelos

## Descripción del Problema

Actualmente, el sistema de gestión de flota de vehículos tiene implementadas las vistas de listado ([index](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#19-27)) y creación ([create](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#28-38)) para todos los modelos, pero **falta la funcionalidad de edición**. Los botones de "Editar" ya están presentes en las vistas index (línea 229 en [vehiculos/index.blade.php](file:///c:/xampp/htdocs/FlotaVehiculo/resources/views/vehiculos/index.blade.php)), pero los métodos [edit()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#111-118) y [update()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#119-126) en los controladores están vacíos.

El objetivo es implementar la funcionalidad completa de edición para todos los modelos del sistema, permitiendo:
- Cargar los datos existentes en un formulario de edición
- Actualizar los registros en la base de datos
- Manejar validaciones y errores apropiadamente
- Mantener la consistencia de diseño con las vistas existentes

## Cambios Propuestos

### Controladores

Implementaré los métodos [edit()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#111-118) y [update()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#119-126) en los siguientes controladores:

---

#### [MODIFY] [VehiculoController.php](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php)

**Método [edit()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#111-118)** (líneas 114-117):
- Buscar el vehículo por ID
- Cargar las relaciones necesarias (marcas y tipos de vehículo)
- Retornar la vista `vehiculos.edit` con los datos

**Método [update()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#119-126)** (líneas 122-125):
- Validar datos usando [VehiculoRequest](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Requests/VehiculoRequest.php#8-59) (ya configurado para PUT/PATCH)
- Manejar actualización de imagen (mantener la anterior si no se sube nueva)
- Eliminar imagen anterior si se sube una nueva
- Actualizar el registro en la base de datos
- Redirigir con mensaje de éxito

---

#### [MODIFY] [Tipo_VehiculoController.php](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/Tipo_VehiculoController.php)

**Método [edit()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#111-118)**:
- Buscar el tipo de vehículo por ID
- Retornar la vista `tipo_vehiculos.edit` con los datos

**Método [update()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#119-126)**:
- Validar datos usando `Tipo_VehiculoRequest`
- Actualizar el registro
- Redirigir con mensaje de éxito

---

#### [MODIFY] [ConductorController.php](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/ConductorController.php)

**Método [edit()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#111-118)**:
- Buscar el conductor por ID
- Retornar la vista `conductores.edit` con los datos

**Método [update()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#119-126)**:
- Validar datos usando `ConductorRequest`
- Actualizar el registro
- Redirigir con mensaje de éxito

---

#### [MODIFY] [ContratoController.php](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/ContratoController.php)

**Método [edit()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#111-118)**:
- Buscar el contrato por ID
- Retornar la vista `contratos.edit` con los datos

**Método [update()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#119-126)**:
- Validar datos usando `ContratoRequest`
- Actualizar el registro
- Redirigir con mensaje de éxito

---

#### [MODIFY] [EmpresaController.php](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/EmpresaController.php)

**Método [edit()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#111-118)**:
- Buscar la empresa por ID
- Retornar la vista `empresas.edit` con los datos

**Método [update()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#119-126)**:
- Validar datos usando `EmpresaRequest`
- Actualizar el registro
- Redirigir con mensaje de éxito

---

#### [MODIFY] [LicenciaController.php](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/LicenciaController.php)

**Método [edit()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#111-118)**:
- Buscar la licencia por ID
- Retornar la vista `licencias.edit` con los datos

**Método [update()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#119-126)**:
- Validar datos usando `LicenciaRequest`
- Actualizar el registro
- Redirigir con mensaje de éxito

---

#### [MODIFY] [MarcaController.php](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/MarcaController.php)

**Método [edit()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#111-118)**:
- Buscar la marca por ID
- Retornar la vista `marcas.edit` con los datos

**Método [update()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#119-126)**:
- Validar datos usando `MarcaRequest`
- Actualizar el registro
- Redirigir con mensaje de éxito

---

#### [MODIFY] [Recarga_CombustibleController.php](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/Recarga_CombustibleController.php)

**Método [edit()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#111-118)**:
- Buscar la recarga de combustible por ID
- Cargar relaciones necesarias (vehículos)
- Retornar la vista `recarga_combustibles.edit` con los datos

**Método [update()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#119-126)**:
- Validar datos usando `Recarga_CombustibleRequest`
- Actualizar el registro
- Redirigir con mensaje de éxito

---

#### [MODIFY] [RutaController.php](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/RutaController.php)

**Método [edit()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#111-118)**:
- Buscar la ruta por ID
- Retornar la vista `rutas.edit` con los datos

**Método [update()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#119-126)**:
- Validar datos usando `RutaRequest`
- Actualizar el registro
- Redirigir con mensaje de éxito

---

#### [MODIFY] [ViajeController.php](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/ViajeController.php)

**Método [edit()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#111-118)**:
- Buscar el viaje por ID
- Cargar relaciones necesarias (vehículos, conductores, rutas)
- Retornar la vista `viajes.edit` con los datos

**Método [update()](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#119-126)**:
- Validar datos usando `ViajeRequest`
- Actualizar el registro
- Redirigir con mensaje de éxito

---

### Vistas

Crearé archivos `edit.blade.php` para cada módulo, basándome en los archivos [create.blade.php](file:///c:/xampp/htdocs/FlotaVehiculo/resources/views/vehiculos/create.blade.php) existentes:

#### [NEW] [edit.blade.php](file:///c:/xampp/htdocs/FlotaVehiculo/resources/views/vehiculos/edit.blade.php)
- Formulario pre-llenado con datos del vehículo
- Método `@method('PUT')` para actualización
- Action apuntando a `route('vehiculos.update', $vehiculo->id)`
- Vista previa de imagen actual (si existe)
- Opción para cambiar imagen

#### [NEW] [edit.blade.php](file:///c:/xampp/htdocs/FlotaVehiculo/resources/views/tipo_vehiculos/edit.blade.php)
- Formulario pre-llenado con datos del tipo de vehículo
- Método `@method('PUT')`
- Action apuntando a `route('tipo_vehiculos.update', $tipo_vehiculo->id)`

#### [NEW] [edit.blade.php](file:///c:/xampp/htdocs/FlotaVehiculo/resources/views/conductores/edit.blade.php)
- Formulario pre-llenado con datos del conductor
- Método `@method('PUT')`
- Action apuntando a `route('conductores.update', $conductor->id)`

#### [NEW] [edit.blade.php](file:///c:/xampp/htdocs/FlotaVehiculo/resources/views/contratos/edit.blade.php)
- Formulario pre-llenado con datos del contrato
- Método `@method('PUT')`
- Action apuntando a `route('contratos.update', $contrato->id)`

#### [NEW] [edit.blade.php](file:///c:/xampp/htdocs/FlotaVehiculo/resources/views/empresas/edit.blade.php)
- Formulario pre-llenado con datos de la empresa
- Método `@method('PUT')`
- Action apuntando a `route('empresas.update', $empresa->id)`

#### [NEW] [edit.blade.php](file:///c:/xampp/htdocs/FlotaVehiculo/resources/views/licencias/edit.blade.php)
- Formulario pre-llenado con datos de la licencia
- Método `@method('PUT')`
- Action apuntando a `route('licencias.update', $licencia->id)`

#### [NEW] [edit.blade.php](file:///c:/xampp/htdocs/FlotaVehiculo/resources/views/marcas/edit.blade.php)
- Formulario pre-llenado con datos de la marca
- Método `@method('PUT')`
- Action apuntando a `route('marcas.update', $marca->id)`

#### [NEW] [edit.blade.php](file:///c:/xampp/htdocs/FlotaVehiculo/resources/views/recarga_combustibles/edit.blade.php)
- Formulario pre-llenado con datos de la recarga de combustible
- Método `@method('PUT')`
- Action apuntando a `route('recarga_combustibles.update', $recarga_combustible->id)`

#### [NEW] [edit.blade.php](file:///c:/xampp/htdocs/FlotaVehiculo/resources/views/rutas/edit.blade.php)
- Formulario pre-llenado con datos de la ruta
- Método `@method('PUT')`
- Action apuntando a `route('rutas.update', $ruta->id)`

#### [NEW] [edit.blade.php](file:///c:/xampp/htdocs/FlotaVehiculo/resources/views/viajes/edit.blade.php)
- Formulario pre-llenado con datos del viaje
- Método `@method('PUT')`
- Action apuntando a `route('viajes.update', $viaje->id)`

---

## Plan de Verificación

### Pruebas Manuales

Verificaré la funcionalidad de edición en **Vehículos** y **Tipo de Vehículos** como casos de prueba representativos:

#### 1. Prueba de Edición de Vehículo

**Pasos:**
1. Navegar a `http://localhost:8000/vehiculos` (o el puerto configurado)
2. Hacer clic en el botón de editar (ícono de lápiz) de cualquier vehículo
3. Verificar que se cargue el formulario con todos los datos actuales del vehículo
4. Modificar al menos 3 campos (ej: modelo, color, kilometraje)
5. Opcionalmente, cambiar la imagen
6. Hacer clic en "Actualizar Vehículo"
7. Verificar que se redirija a la lista de vehículos con mensaje de éxito
8. Confirmar que los cambios se reflejen en la tabla

**Resultado esperado:**
- Formulario carga correctamente con datos existentes
- Validaciones funcionan (ej: placa única, año válido)
- Actualización exitosa con mensaje de confirmación
- Datos actualizados visibles en la lista

#### 2. Prueba de Edición de Tipo de Vehículo

**Pasos:**
1. Navegar a `http://localhost:8000/tipo_vehiculos`
2. Hacer clic en el botón de editar de cualquier tipo de vehículo
3. Verificar que se cargue el formulario con los datos actuales
4. Modificar el nombre y/o descripción
5. Hacer clic en "Actualizar"
6. Verificar redirección y mensaje de éxito
7. Confirmar cambios en la lista

**Resultado esperado:**
- Formulario carga correctamente
- Validaciones funcionan
- Actualización exitosa
- Cambios reflejados en la lista

#### 3. Prueba de Validación

**Pasos:**
1. Editar un vehículo
2. Intentar cambiar la placa a una que ya existe en otro vehículo
3. Intentar poner un año inválido (ej: 1800 o 2050)
4. Intentar dejar campos obligatorios vacíos
5. Verificar que se muestren mensajes de error apropiados

**Resultado esperado:**
- Validaciones previenen datos inválidos
- Mensajes de error claros y específicos
- Formulario mantiene los datos ingresados

### Verificación de Rutas

Las rutas ya están configuradas correctamente usando `Route::resource()` en [web.php](file:///c:/xampp/htdocs/FlotaVehiculo/routes/web.php), lo cual automáticamente incluye las rutas [edit](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#111-118) y [update](file:///c:/xampp/htdocs/FlotaVehiculo/app/Http/Controllers/VehiculoController.php#119-126). Verificaré con:

```bash
php artisan route:list --name=vehiculos
```

Esto debe mostrar las rutas:
- `vehiculos.edit` → GET `/vehiculos/{vehiculo}/edit`
- `vehiculos.update` → PUT/PATCH `/vehiculos/{vehiculo}`

### Pruebas de Navegación

Verificaré que los botones de editar en todas las vistas index funcionen correctamente:
- Vehículos ✓
- Tipo de Vehículos ✓
- Conductores ✓
- Contratos ✓
- Empresas ✓
- Licencias ✓
- Marcas ✓
- Recarga de Combustibles ✓
- Rutas ✓
- Viajes ✓
