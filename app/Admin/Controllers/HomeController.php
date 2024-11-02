<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use OpenAdmin\Admin\Admin;
use OpenAdmin\Admin\Layout\Content;
use OpenAdmin\Admin\Widgets\InfoBox;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Proveedor;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        // Calcular el stock total sumando el stock de cada producto
        $totalStock = Producto::sum('stock');

        // Contar los registros de cada modelo
        $totalProductos = Producto::count();
        $totalCategorias = Categoria::count();
        $totalClientes = Cliente::count();
        $totalProveedores = Proveedor::count();

        return $content
            ->css_file(Admin::asset("open-admin/css/pages/dashboard.css"))
            ->title('Dashboard')
            ->description('Resumen general')
            ->row(function ($row) use ($totalStock, $totalProductos, $totalCategorias, $totalClientes, $totalProveedores) {
                // Cuadro de Productos
                $infoBoxProductos = new InfoBox(
                    'Productos',                  // Título del InfoBox
                    'archive',                    // Ícono (archive)
                    'info',                       // Color azul
                    '/admin/productos',           // Enlace a la lista de productos
                    $totalProductos               // Contenido del InfoBox: Total de productos
                );
                $infoBoxProductos->description("Total de productos");

                // Cuadro de Stock
                $infoBoxStock = new InfoBox(
                    'Stock Total',                // Título del InfoBox
                    'box',                        // Ícono (box)
                    'warning',                    // Color amarillo
                    '/admin/productos',           // Enlace a la lista de productos
                    $totalStock                   // Contenido del InfoBox: Total del stock
                );
                $infoBoxStock->description("Total en inventario");

                // Cuadro de Categorías
                $infoBoxCategorias = new InfoBox(
                    'Categorías',                 // Título del InfoBox
                    'th-list',                    // Ícono (th-list)
                    'success',                    // Color verde
                    '/admin/categorias',          // Enlace a la lista de categorías
                    $totalCategorias              // Contenido del InfoBox: Total de categorías
                );
                $infoBoxCategorias->description("Total de categorías");

                // Cuadro de Clientes
                $infoBoxClientes = new InfoBox(
                    'Clientes',                   // Título del InfoBox
                    'users',                      // Ícono (users)
                    'primary',                    // Color azul
                    '/admin/clientes',            // Enlace a la lista de clientes
                    $totalClientes                // Contenido del InfoBox: Total de clientes
                );
                $infoBoxClientes->description("Total de clientes");

                // Cuadro de Proveedores
                $infoBoxProveedores = new InfoBox(
                    'Proveedores',                // Título del InfoBox
                    'truck',                      // Ícono (truck)
                    'danger',                     // Color rojo
                    '/admin/proveedors',         // Enlace a la lista de proveedores
                    $totalProveedores             // Contenido del InfoBox: Total de proveedores
                );
                $infoBoxProveedores->description("Total de proveedores");

                // Agregar los InfoBoxes a la fila
                $row->column(3, function ($column) use ($infoBoxProductos) {
                    $column->append($infoBoxProductos);
                });
                $row->column(3, function ($column) use ($infoBoxStock) {
                    $column->append($infoBoxStock);
                });
                $row->column(3, function ($column) use ($infoBoxCategorias) {
                    $column->append($infoBoxCategorias);
                });
                $row->column(3, function ($column) use ($infoBoxClientes) {
                    $column->append($infoBoxClientes);
                });
                $row->column(3, function ($column) use ($infoBoxProveedores) {
                    $column->append($infoBoxProveedores);
                });
            });
    }
}

