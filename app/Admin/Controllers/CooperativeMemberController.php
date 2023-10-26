<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use \App\Models\CooperativeMember;
use \Encore\Admin\Facades\Admin;


class CooperativeMemberController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'CooperativeMember';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CooperativeMember());

        //show a cooperative only members belonging to the cooperative
        $user = Admin::user()->id;
        $cooperative_id = \App\Models\Cooperative::where('user_id', $user)->first()->id;
        $grid->model()->where('cooperative_id', $cooperative_id);


        $grid->column('member_number', __('admin.form.Member number'));
        $grid->column('farmer_first_name', __('admin.form.Farmer first name'));
        $grid->column('farmer_last_name', __('admin.form.Farmer last name'));
        $grid->column('phone_number', __('admin.form.Phone number'));
        $grid->column('email_address', __('admin.form.Email address'));


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
        $show = new Show(CooperativeMember::findOrFail($id));

        $show->field('member_number', __('admin.form.Member number'));
        $show->field('farmer_first_name', __('admin.form.Farmer first name'));
        $show->field('farmer_last_name', __('admin.form.Farmer last name'));
        $show->field('gender', __('admin.form.Gender'));
        $show->field('date_of_birth', __('admin.form.Date of birth'));
        $show->field('nationality', __('admin.form.Nationality'));
        $show->field('phone_number', __('admin.form.Phone number'));
        $show->field('email_address', __('admin.form.Email address'));
        $show->field('residential_physical_address', __('admin.form.Residential physical address'));
        $show->field('agriculture_value_chains', __('admin.form.Agriculture value chain'));
       
         //disable delete button
        $show->panel()->tools(function ($tools) 
        {
            $tools->disableDelete();
            $tools->disableEdit();
        });


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CooperativeMember());

        //get the cooperative id of the user
        $user = Admin::user()->id;
        $cooperative_id = \App\Models\Cooperative::where('user_id', $user)->first()->id;
        $form->hidden('cooperative_id', __('admin.form.Cooperative id'))->default($cooperative_id)->readonly();
        $form->text('member_number', __('admin.form.Member number'))->default('member/' . date('Y/M/') . rand(1000, 100000))->readonly();
        $form->text('farmer_first_name', __('admin.form.Farmer first name'))->required();
        $form->text('farmer_last_name', __('admin.form.Farmer last name'))->required();
        $form->select('gender', __('admin.form.Gender'))->options(
            ['Male' => __('admin.form.Male'), 
            'Female' => __('admin.form.Female'), 
            'Other' => __('admin.form.Other')]);
        $form->date('date_of_birth', __('admin.form.Date of birth'))->default(date('Y-m-d'))->required();
        $form->text('nationality', __('admin.form.Nationality'))->required();
        $form->text('phone_number', __('admin.form.Phone number'))->required();
        $form->text('email_address', __('admin.form.Email address'));
        $form->text('residential_physical_address', __('admin.form.Residential physical address'));
        $form->text('agriculture_value_chains', __('admin.form.Agriculture value chain'))->required();

          //disable delete and view button
          $form->tools(function (Form\Tools $tools) 
          {
              $tools->disableDelete();
              $tools->disableView();
          });
  
          //disable bottom buttons/checkboxes
          $form->disableViewCheck();
          $form->disableEditingCheck();
          $form->disableCreatingCheck();

        return $form;
    }
}
