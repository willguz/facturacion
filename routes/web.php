<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Auth\LoginController@index');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function () {

    // Rutas para usuarios
    Route::get('/perfil_usuarios/{user}', 'Usuarios\UsuariosController@perfil')->name('perfil_usuarios');
    Route::post('/actualizar_perfil/{user}', 'Usuarios\UsuariosController@editarPerfil')->name('actualizar_perfil');

    Route::get('/usuarios', 'Usuarios\UsuariosController@index')->name('usuarios')->middleware('can:navegar.usuario');
    Route::get('/listar_usuarios', 'Usuarios\UsuariosController@ListarUsuarios')->middleware('can:navegar.usuario');
    Route::get('/formulario_usuarios', 'Usuarios\UsuariosController@create')->name('formulario_usuarios')->middleware('can:crear.usuario');
    Route::post('/crear_usuarios', 'Usuarios\UsuariosController@store')->name('crear_usuarios')->middleware('can:crear.usuario');
    Route::get('/editar_usuarios/{user}', 'Usuarios\UsuariosController@edit')->name('editar_usuarios')->middleware('can:editar.usuario');
    Route::post('/actualizar_usuarios/{usuario}', 'Usuarios\UsuariosController@update')->name('actualizar_usuarios')->middleware('can:editar.usuario');
    Route::delete('/usuarios_eliminar/{idUser}', 'Usuarios\UsuariosController@destroy')->name('usuarios_eliminar')->middleware('can:eliminar.usuario');

    // Rutas para roles
    Route::get('/roles', 'Usuarios\RolesController@index')->name('roles')->middleware('can:navegar.rol');
    Route::get('/listar_roles', 'Usuarios\RolesController@listarRoles')->middleware('can:navegar.rol');
    Route::post('/roles_crear', 'Usuarios\RolesController@store')->name('roles_crear')->middleware('can:crear.rol');
    Route::get('/roles_editar/{rol}', 'Usuarios\RolesController@edit')->name('roles_editar')->middleware('can:editar.rol');
    Route::put('/roles_actualizar/{rol}', 'Usuarios\RolesController@update')->name('roles_actualizar')->middleware('can:editar.rol');
    Route::delete('/roles_eliminar/{rol}', 'Usuarios\RolesController@destroy')->name('roles_eliminar')->middleware('can:eliminar.rol');

    // Rutas para tipo de documentos
    Route::get('/tipo_documento', 'Usuarios\TipoDocumentoController@index')->name('tipo_documento')->middleware('can:navegar.tipo.documento');
    Route::get('/tabla_tipo_documento', 'Usuarios\TipoDocumentoController@listarTipoDocumento')->middleware('can:navegar.tipo.documento');
    Route::post('/tipo_documento_crear', 'Usuarios\TipoDocumentoController@store')->name('tipo_documento_crear')->middleware('can:crear.tipo.documento');
    Route::post('/tipo_documento_editar', 'Usuarios\TipoDocumentoController@update')->name('tipo_documento_editar')->middleware('can:editar.tipo.documento');
    Route::post('/tipo_documento_eliminar', 'Usuarios\TipoDocumentoController@destroy')->name('tipo_documento_eliminar')->middleware('can:eliminar.tipo.documento');

    // Rutas para empresas
    Route::get('/empresa', 'Usuarios\EmpresaController@index')->name('empresa')->middleware('can:navegar.empresa');
    Route::get('/listar_empresa', 'Usuarios\EmpresaController@listarEmpresa')->middleware('can:navegar.empresa');
    Route::post('/empresa_crear', 'Usuarios\EmpresaController@store')->name('empresa_crear')->middleware('can:crear.empresa');
    Route::get('/empresa_editar/{empresa}', 'Usuarios\EmpresaController@edit')->name('empresa_editar')->middleware('can:editar.empresa');
    Route::put('/empresa_actualizar{idEmpresa}', 'Usuarios\EmpresaController@update')->name('empresa_actualizar')->middleware('can:editar.empresa');
    Route::delete('/empresa_eliminar/{idEmpresa}', 'Usuarios\EmpresaController@destroy')->name('empresa_eliminar')->middleware('can:eliminar.empresa');

    // Rutas para pais
    Route::get('/pais', 'Ubicacion\PaisController@index')->name('pais')->middleware('can:navegar.pais');
    Route::get('/listar_pais', 'Ubicacion\PaisController@listarPais')->middleware('can:navegar.pais');
    Route::post('/pais_crear', 'Ubicacion\PaisController@store')->name('pais_crear')->middleware('can:crear.pais');
    Route::post('/pais_editar', 'Ubicacion\PaisController@update')->name('pais_editar')->middleware('can:editar.pais');
    Route::post('/paises_eliminar', 'Ubicacion\PaisController@destroy')->name('paises_eliminar')->middleware('can:eliminar.pais');

    //rutas para departamentos
    Route::get('/departamentos', 'Ubicacion\DepartamentosController@index')->name('departamentos')->middleware('can:navegar.departamentoo');
    Route::get('/listar_departamentos', 'Ubicacion\DepartamentosController@ListarDepartamentos')->middleware('can:navegar.departamento');
    Route::post('/departamentos_crear', 'Ubicacion\DepartamentosController@store')->name('departamentos_crear')->middleware('can:crear.departamento');
    Route::post('/departamentos_editar', 'Ubicacion\DepartamentosController@update')->name('departamentos_editar')->middleware('can:editar.departamento');
    Route::post('/departamentos_eliminar', 'Ubicacion\DepartamentosController@destroy')->name('departamentos_eliminar')->middleware('can:eliminar.departamento');

    // Rutas para municipios
    Route::get('/municipios', 'Ubicacion\MunicipiosController@index')->name('municipios')->middleware('can:navegar.municipio');
    Route::get('/listar_municipios', 'Ubicacion\MunicipiosController@listarMunicipios')->middleware('can:navegar.municipio');
    Route::post('/municipios_crear', 'Ubicacion\MunicipiosController@store')->name('municipios_crear')->middleware('can:crear.municipio');
    Route::post('/municipios_editar', 'Ubicacion\MunicipiosController@update')->name('municipios_editar')->middleware('can:editar.municipio');
    Route::post('/municipios_eliminar', 'Ubicacion\MunicipiosController@destroy')->name('municipios_eliminar')->middleware('can:eliminar.municipio');

    // Rutas para proveedores
    Route::get('/proveedores', 'Productos\ProveedoresController@index')->name('proveedores')->middleware('can:navegar.proveedores');
    Route::get('/listar_proveedor', 'Productos\ProveedoresController@listarProveedor')->middleware('can:navegar.proveedores');

    Route::post('/proveedores_crear', 'Productos\ProveedoresController@store')->name('proveedores_crear')->middleware('can:crear.proveedores');

    Route::get('/proveedores_editar/{idProveedor}', 'Productos\ProveedoresController@edit')->name('proveedores_editar')->middleware('can:editar.proveedores');
    Route::put('/proveedor_actulizar/{idProveedor}', 'Productos\ProveedoresController@update')->name('proveedor_actulizar')->middleware('can:editar.proveedores');

    Route::delete('/proveedores_eliminar/{idProveedor}', 'Productos\ProveedoresController@destroy')->name('proveedores_eliminar')->middleware('can:eliminar.proveedores');

    // Rutas para productos
    Route::get('/productos', 'Productos\ProductosController@index')->name('productos')->middleware('can:navegar.productos');
    Route::get('/listar_productos', 'Productos\ProductosController@listarProductos')->middleware('can:navegar.productos');
    Route::post('/producto_crear', 'Productos\ProductosController@store')->name('producto_crear')->middleware('can:crear.productos');
    Route::get('/editar_producto/{producto}', 'Productos\ProductosController@edit')->name('editar_producto')->middleware('can:editar.productos');
    Route::put('/producto_actualizar/{idProducto}', 'Productos\ProductosController@update')->name('producto_actualizar')->middleware('can:editar.productos');
    Route::delete('/productos_eliminar/{idProducto}', 'Productos\ProductosController@destroy')->name('productos_eliminar')->middleware('can:eliminar.productos');


    // Rutas para tipo de articulo
    Route::get('/tipo_articulo', 'Productos\TipoArticuloController@index')->name('tipo_articulo')->middleware('can:navegar.tipo_articulo');
    Route::get('/listar_tipo_articulo', 'Productos\TipoArticuloController@ListarTipoArticulo')->middleware('can:navegar.tipo.articulo');
    Route::post('/tipo_articulos_crear', 'Productos\TipoArticuloController@store')->name('tipo_articulos_crear')->middleware('can:crear.tipos.articulos');
    Route::put('/tipo_articulo_editar/{idtparticulo}', 'Productos\TipoArticuloController@update')->name('tipo_articulo_editar')->middleware('can:editar.tipo.articulo');
    Route::delete('/tipoarticulo_eliminar/{idtparticulo}', 'Productos\TipoArticuloController@destroy')->name('tipoarticulo_eliminar')->middleware('can:eliminar.tipo.articulo');

    // Rutas para formas de pago
    Route::get('/formas_pago', 'Productos\FormasPagoController@index')->name('formas_pago')->middleware('can:navegar.formas.pagos');
    Route::get('/listar_forma_pago', 'Productos\FormasPagoController@listarFormaPago')->middleware('can:navegar.formas.pagos');
    Route::post('/forma_pago_crear', 'Productos\FormasPagoController@store')->name('forma_pago_crear')->middleware('can:crear.formas.pagos');
    Route::put('/forma_pago_editar/{idFormaPago}', 'Productos\FormasPagoController@update')->name('forma_pago_editar')->middleware('can:editar.formas.pagos');
    Route::delete('/forma_pago_eliminar/{idFormaPago}', 'Productos\FormasPagoController@destroy')->name('forma_pago_eliminar')->middleware('can:eliminar.formas.pagos');

    // Rutas para iva
    Route::get('/iva', 'Productos\IvaController@index')->name('iva')->middleware('can:navegar.iva');
    Route::get('/listar_iva', 'Productos\IvaController@listarIva')->middleware('can:navegar.iva');
    Route::post('/iva_crear', 'Productos\IvaController@store')->name('iva_crear')->middleware('can:crear.iva');
    Route::put('/iva_editar/{idIva}', 'Productos\IvaController@update')->name('iva_editar')->middleware('can:editar.iva');
    Route::delete('/iva_eliminar/{idIva}', 'Productos\IvaController@destroy')->name('iva_eliminar')->middleware('can:eliminar.iva');

    // Rutas para porcentaje
    Route::get('/porcentaje', 'Productos\PorcentajeController@index')->name('porcentaje')->middleware('can:navegar.porcentaje');
    Route::get('/listar_procentaje', 'Productos\PorcentajeController@listarprocentaje')->middleware('can:navegar.porcentaje');
    Route::post('/porcentaje_crear', 'Productos\PorcentajeController@store')->name('porcentaje_crear')->middleware('can:crear.porcentaje');
    Route::put('/porcentaje_editar/{idporcentaje}', 'Productos\PorcentajeController@update')->name('porcentaje_editar')->middleware('can:editar.porcentaje');
    Route::delete('/porcentaje_eliminar/{idporcentaje}', 'Productos\PorcentajeController@destroy')->name('porcentaje_eliminar')->middleware('can:eliminar.porcentaje');


    // Rutas para tipos de factura
    Route::get('/tipo_factura', 'Productos\TipoFacturaController@index')->name('tipo_factura')->middleware('can:navegar.tipos.facturas');
    Route::get('/listar_tipo_factura', 'Productos\TipoFacturaController@listarTiposFacturas')->middleware('can:navegar.tipos.facturas');
    Route::post('/tipo_factura_crear', 'Productos\TipoFacturaController@store')->name('tipo_factura_crear')->middleware('can:crear.tipos.facturas');
    Route::put('/tipo_factura_editar/{idTipoFactura}', 'Productos\TipoFacturaController@update')->name('tipo_factura_editar')->middleware('can:editar.tipos.facturas');
    Route::delete('/tipo_factura_eliminar/{idTipoFactura}', 'Productos\TipoFacturaController@destroy')->name('tipo_factura_eliminar')->middleware('can:eliminar.tipos.facturas');

    // Rutas para tipos tributario
    Route::get('/tipo_tributario', 'Productos\TipoTributarioController@index')->name('tipo_tributario')->middleware('can:navegar.tipos.tributario');
    Route::get('/listar_tipo_tributario', 'Productos\TipoTributarioController@listarTiposTributarios')->middleware('can:navegar.tipos.tributario');
    Route::post('/tipo_tributario_crear', 'Productos\TipoTributarioController@store')->name('tipo_tributario_crear')->middleware('can:crear.tipos.tributario');
    Route::put('/tipo_tributario_editar/{idTipoTributario}', 'Productos\TipoTributarioController@update')->name('tipo_tributario_editar')->middleware('can:editar.tipos.tributario');
    Route::delete('/tipo_tributario_eliminar/{idTipoTributario}', 'Productos\TipoTributarioController@destroy')->name('tipo_tributario_eliminar')->middleware('can:eliminar.tipos.tributario');

    // Rutas para datos de empresa modulo de configuración
    Route::get('/datos_empresa', 'configuracion\DatosEmpresaController@index')->name('tipo_tributario')->middleware('can:navegar.datos.empresa');
    Route::post('/datos_empresa_crear', 'configuracion\DatosEmpresaController@store')->name('datos_empresa_crear')->middleware('can:navegar.datos.empresa');

    // Rutas para compras
    Route::get('/compra', 'Compras\CompraController@index')->name('compra')->middleware('can:navegar.compra');
    Route::get('/listar_compra', 'Compras\CompraController@listarCompras')->middleware('can:navegar.compra');
    Route::get('/compra_buscar_producto', 'Compras\CompraController@buscarProducto')->name('compra_buscar_producto')->middleware('can:navegar.compra');
    Route::post('/guardar_compra_temporal', 'Compras\CompraController@guardarCompraTemporal')->name('guardar_compra_temporal')->middleware('can:crear.compra');
    Route::delete('/descartar_producto_compra/{idCompraTemporal}', 'Compras\CompraController@descartarProducto')->name('descartar_producto_compra')->middleware('can:eliminar.compra');
    Route::post('/compra_crear', 'Compras\CompraController@store')->name('compra_crear')->middleware('can:crear.compra');
    Route::delete('/anular_compra', 'Compras\CompraController@anularCompra')->name('anular_compra')->middleware('can:eliminar.compra');
    Route::get('/consulta_compras', 'Compras\CompraController@indexconsultacompras')->name('consulta_compras')->middleware('can:navegar.articulo.compra');


    // Rutas para consultar Compras
    Route::put('/anular_compra_realizada/{idCompra}', 'Compras\ConsultaComprasController@anularCompraRealizada')->name('anular_compra_realizada')->middleware('can:anular.compra.realizada');
    Route::get('/listar_compras_realizadas', 'Compras\ConsultaComprasController@listarComprasr')->middleware('can:navegar.articulo.compra');

    // Rutas para tipo compra
    Route::get('/tipo_compra', 'Compras\TipoCompraController@index')->name('tipo_compra')->middleware('can:navegar.tipo.compra');
    Route::get('/listar_tipo_compra', 'Compras\TipoCompraController@listarTiposCompras')->middleware('can:navegar.tipo.compra');
    Route::post('/tipo_compra_crear', 'Compras\TipoCompraController@store')->name('tipo_compra_crear')->middleware('can:crear.tipo.compra');
    Route::put('/tipo_compra_editar/{idTipoCompra}', 'Compras\TipoCompraController@update')->name('tipo_compra_editar')->middleware('can:editar.tipo.compra');
    Route::delete('/tipo_compra_eliminar/{idTipoCompra}', 'Compras\TipoCompraController@destroy')->name('tipo_compra_eliminar')->middleware('can:eliminar.tipo.compra');

    // Rutas para abono compras
    Route::get('/abono_compra', 'Compras\AbonoCompraController@index')->name('abono_compra')->middleware('can:navegar.abono.compra');
    Route::get('/listar_abono_compra', 'Compras\AbonoCompraController@listarAbonosCompra')->middleware('can:navegar.abono.compra');
    Route::post('/abono_compra_crear', 'Compras\AbonoCompraController@store')->name('abono_compra_crear')->middleware('can:crear.abono.compra');
    Route::get('/editar_abono_compra/{abonoCompra}', 'Compras\AbonoCompraController@edit')->name('editar_abono_compra')->middleware('can:editar.abono.compra');
    Route::put('/abono_compra_actualizar/{idAbonoCompra}', 'Compras\AbonoCompraController@update')->name('abono_compra_actualizar')->middleware('can:editar.abono.compra');
    Route::delete('/abono_compra_eliminar/{idAbonoCompra}', 'Compras\AbonoCompraController@destroy')->name('abono_compra_eliminar')->middleware('can:eliminar.abono.compra');

    //Rutas para categoria de productos
    Route::get('/categoria_productos', 'Productos\CateriaProductosController@index')->name('categoria_productos')->middleware('can:navegar.categoria.productos');
    Route::get('/listar_categoriaProductos', 'Productos\CateriaProductosController@listarCategoriaProductos')->middleware('can:navegar.categoria.productos');


    Route::post('/categoria_producto_crear', 'Productos\CateriaProductosController@store')
    ->name('categoria_producto_crear')->middleware('can:crear.categoria.productos');
    Route::delete('/categoria_producto_eliminar/{idcategoriap}', 'Productos\CateriaProductosController@destroy')
    ->name('categoria_producto_eliminar')->middleware('can:eliminar.categoria.productos');

    Route::put('/categoria_productos_editar/{idcategoriap}', 'Productos\CateriaProductosController@update')
    ->name('categoria_productos_editar')->middleware('can:editar.categoria.productos');

});
