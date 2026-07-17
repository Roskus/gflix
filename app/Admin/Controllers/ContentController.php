<?php

declare(strict_types=1);

namespace App\Admin\Controllers;

use App\Models\Content;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

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
        $grid = new Grid(new Content);

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('cover', __('Poster'))->image('', 50, 50);
        $grid->column('wallpaper', __('Wallpaper'))->image('', 80, 45);
        $grid->column('category.name', __('Category'));
        $grid->column('type', __('Type'));
        $grid->column('year', __('Year'));
        $grid->column('trailer_url', __('Trailer url'));
        $grid->column('url', __('Url'));
        $grid->column('created_at', __('Created at'))->datetime();
        $grid->column('updated_at', __('Updated at'))->datetime();
        $grid->column('type', __('Type'));

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
        $form = new Form(new Content);

        $form->text('name', __('Name'))->rules('required');
        $form->select('category_id', __('Category'))->options(
            \App\Models\Category::pluck('name', 'id')->toArray()
        );
        $form->image('cover', __('Poster'))->disk('public');
        $form->image('wallpaper', __('Wallpaper'))->disk('public');
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
