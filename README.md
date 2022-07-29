# pruebaVirtualLlantas
1. En el archivo de comandos se encuentra la creación de cada una de las tablas requeridas para la prueba.
2. Al final del archivo se encuentran comentariados los dos Query solicitados al final del archivo de word.
3. Para el correcto funcionamiento del proyecto es necesario que se ejecute primero el archivo de comandos en la base de datos deseada.
4. Es necesario que en la carpeta api/models en el archivo db.php sean reempazados los datos de conexión a la base de datos.
5. Al igual que en el paso anterior, en la carpera pagina/php en el archivo conexion.php sean reemplazados los datos de conexión a la base de datos.
6. La carpeta principal debe llamarse pruebaVirtualLlantas, en caso de que al descargar el directorio quede pruebaVirtualLlantas-main, se debe renombrar la carpeta a pruebaVirtualLlantas.
7. El usuario y contraseña para acceder a la página web son: usuario: root, contraseña: 12345

SQL
Los comandos para la segunda parte de la prueba técnica serían:
Primer query: SELECT sku as codigo,SUM(cantidad) AS totalcantidad,SUM(costo_unitario) as valorventa, SUM(costo_unitario) as totalcosto FROM facturacion_detalle GROUP BY sku ORDER BY totalcantidad DESC;

Segundo Query: SELECT facturacion.fecha_realizacion AS fechaventa,tercero.documento AS documento,tercero.nombre AS nombre,GROUP_CONCAT(CONCAT(facturacion.fact_prefijo,'-',facturacion.fact_consecutivo) ORDER BY facturacion.fact_prefijo ASC) AS consecutivosventa,SUM(facturacion_detalle.precio_unitario) AS totalventa,SUM(facturacion_detalle.cantidad) AS totalcantidad,SUM(facturacion_detalle.iva) AS totaliva FROM tercero INNER JOIN facturacion ON facturacion.id_tercero = tercero.id_tercero INNER JOIN facturacion_detalle ON facturacion_detalle.id_factura=facturacion.id_factura GROUP BY tercero.documento ORDER BY tercero.fecha_registro DESC, facturacion.fecha_realizacion DESC;