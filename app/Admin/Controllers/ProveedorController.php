<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Proveedor;

class ProveedorController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Proveedor';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Proveedor());

        $grid->column('id', __('Id'));
        $grid->column('nombre', __('Nombre'));
        $grid->column('contacto', __('Contacto'));
        $grid->column('telefono', __('Telefono'));
        $grid->column('email', __('Email'));
        $grid->column('direccion', __('Direccion'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Proveedor::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nombre', __('Nombre'));
        $show->field('contacto', __('Contacto'));
        $show->field('telefono', __('Telefono'));
        $show->field('email', __('Email'));
        $show->field('direccion', __('Direccion'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Proveedor());

        $form->text('nombre', __('Nombre'));
        $form->text('contacto', __('Contacto'));
        $form->text('telefono', __('Telefono'));
        $form->email('email', __('Email'));
        $form->text('direccion', __('Direccion'));

        return $form;
    }
}
