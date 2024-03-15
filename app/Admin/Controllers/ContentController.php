<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Content;

class ContentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Content';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Content());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('cover', __('Cover'));
        $grid->column('wallpaper', __('Wallpaper'));
        $grid->column('description', __('Description'));
        $grid->column('year', __('Year'));
        $grid->column('trailer_url', __('Trailer url'));
        $grid->column('url', __('Url'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('type', __('Type'));

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
        $show = new Show(Content::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('cover', __('Cover'));
        $show->field('wallpaper', __('Wallpaper'));
        $show->field('description', __('Description'));
        $show->field('year', __('Year'));
        $show->field('trailer_url', __('Trailer url'));
        $show->field('url', __('Url'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('type', __('Type'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Content());

        $form->text('name', __('Name'))->rules('required');
        $form->text('cover', __('Poster'));
        $form->text('wallpaper', __('Wallpaper'));
        $form->textarea('description', __('Description'))->rules('max:255');
        $form->number('year', __('Year'))->rules('required')->min(1895);
        $form->text('trailer_url', __('Trailer url'));
        $form->text('url', __('Url'));
        $form->select('type', __('Type'))->options(
            [
                '' => '',
                'movies' => 'movies',
                'series' => 'series',
            ])->rules('required');

        return $form;
    }
}
