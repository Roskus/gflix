<?php

namespace App\Admin\Controllers;

use App\Models\Content;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Video;

class VideoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Video';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Video());

        $grid->column('id', __('Id'));
        $grid->column('content_id', __('Content id'));
        $grid->column('src', __('Src'));
        $grid->column('lang', __('Lang'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('path', __('Path'));
        $grid->column('slug', __('Slug'));
        $grid->column('name', __('Name'));

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
        $show = new Show(Video::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('content_id', __('Content id'));
        $show->field('src', __('Src'));
        $show->field('lang', __('Lang'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('path', __('Path'));
        $show->field('slug', __('Slug'));
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
        $form = new Form(new Video());


        $form->select('content_id')->options(function ($id) {
            $content = Content::find($id);

            if ($content) {
                return [$content->id => $content->name];
            }
        })->ajax('/admin/api/content');

        //$form->number('content_id', __('Content id'));
        $form->text('src', __('Src'))->rules('required');
        $form->text('lang', __('Lang'))->rules('required|min:2|max:2');
        $form->text('path', __('Path'))->rules('required');
        $form->text('slug', __('Slug'))->rules('required');
        $form->text('name', __('Name'));

        return $form;
    }
}
