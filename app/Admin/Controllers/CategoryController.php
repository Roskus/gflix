<?php declare(strict_types=1);

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use App\Models\Category;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Category';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));

        return $grid;
    }

     /**
     * Make a show builder.
     *
     * @param  mixed  $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category);

        $form->select('id')->options(function ($id) {
            $category = Category::find($id);

            if ($category) {
                return [$category->id => $category->name];
            }
        })->ajax('/admin/api/category');

        $form->text('name', __('Name'));

        return $form;
    }
}
