<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Encore\Admin\Auth\Database\Administrator;

class Utils extends Model
{
    use HasFactory;

    public static function apiSuccess($data = null, $message = 'Success')
    {
        header('Content-Type: application/json');

        die(json_encode([
            'code' => 1,
            'message' => $message,
            'data' => $data
        ]));
    }
    public static function apiError($message = 'Error', $data = null)
    {
        header('Content-Type: application/json');
        die(json_encode([
            'code' => 0,
            'message' => $message,
            'data' => $data
        ]));
    }



    public static function tell_status($status)
    {

        if (!$status)
            return '<span class="label label-warning">Pending</span>';
        if ($status == 'pending')
            return '<span class="label label-warning">Pending</span>';
    
        if ($status == 'recommended')
           return '<span style="background-color: purple; color: white;" class="label">Recommended</span>';
        if ($status == 'inspection assigned')
            return '<span class="label label-warning">Inspection assigned</span>';
        if ($status == 'halted')
            return '<span class="label label-warning">Halted</span>';
        if ($status == 'rejected')
            return '<span class="label label-danger">Rejected</span>';
        if ($status == 'accepted')
            return '<span class="label label-success">Accepted</span>';
        if ($status == 'lab test assigned')
            return '<span class="label label-success">Lab Test Assigned</span>';
        if ($status == 'printed')
            return '<span class="label label-success">Printed</span>';
        if ($status == 'marketable')
            return '<span class="label label-success">Marketable</span>';
        if ($status == 'not marketable')
            return '<span class="label label-danger">Not Marketable</span>';
        if ($status == 'processing')
            return '<span class="label label-warning">Processing</span>';
        if ($status == 'shipping')
            return '<span class="label label-warning">Shipping</span>';
        if ($status == 'delivered')
            return '<span class="label label-success">Delivered</span>';
        if ($status == 'cancelled')
            return '<span class="label label-danger">Cancelled</span>';
        if ($status == 'inspector assigned')
            return '<span class="label" style="background-color: yellow; color: black;">Inspection Assigned</span>';




        return $status;
    }

    //get session or getting an id
    public static function start_session()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    //get chat labels

    public static function month($max_date)
    {
        $label = Carbon::parse($max_date);
        if ($max_date == null) {
            return $max_date;
        }
        return $label->format('M - Y');
    }

    //get all inspectors
    public static function get_inspectors()
    {
        $users = Administrator::whereHas('roles', function ($query) {
            $query->where('name', 'inspector');
        })->pluck('name', 'id');
        return $users;
    }

    //disable action buttons depending on the status of the form
    public static function disable_buttons($model, $grid)
    {
        $user = auth('admin')->user();
        if ($user->inRoles(['commissioner', 'inspector','labosem'])) 
        {
                //disable create button and delete
                $grid->disableCreateButton();
                $grid->actions(function ($actions) {
                    $actions->disableView();
                    $actions->disableDelete();
                });
        }

        if ($user->inRoles(['basic-user', 'cooperative','grower','agro-dealer']))
        {
                 
            $grid->actions(function ($actions) 
            {
                if ($actions->row->status == 'halted' || $actions->row->status == 'pending') {
                    $actions->disableDelete();
                }
                if($actions->row->status == 'rejected' || 
                 $actions->row->status == 'accepted' || 
                 $actions->row->status == 'inspector assigned' ||
                 $actions->row->status == 'lab test assigned' || 
                 $actions->row->status == 'printed' || 
                 $actions->row->status == 'marketable' || 
                 $actions->row->status == 'not marketable' ||
                 $actions->row->status == 'processing' || 
                 $actions->row->status == 'shipping' || 
                 $actions->row->status == 'delivered' || 
                 $actions->row->status == 'cancelled')
                {
                    $actions->disableDelete();
                    $actions->disableEdit();
                }
         
            });
                    
                
        }
    
    
    }

    //delete notification after the form has been viewed
    public static function delete_notification($model_name, $id)
    {
       
        $model = "App\\Models\\" .ucfirst($model_name);
        $user =auth('admin')->user();
        $form = $model::findOrFail($id);
        //delete the notification from the database once a user views the form
        if(!$user->inRoles(['developer','commissioner','inspector']) )
        {
            
            if($form->status == 'pending'|| $form->status =='halted' || $form->status == 'rejected' || 
               $form->status == 'accepted' || $form->status == 'inspector assigned' || 
               $form->status == 'lab test assigned' || $form->status == 'printed' || 
               $form->status == 'marketable' || $form->status == 'not marketable' || $form->status == 'processing'
               || $form->status == 'shipping' || $form->status == 'delivered' || $form->status == 'cancelled')
            {
                
                \App\Models\Notification::where(['receiver_id' => $user->id, 'model_id' => $id, 'model' => $model_name])->delete();
        
            }

        }

        if($model_name == 'Order'){
            \App\Models\Notification::where(['receiver_id' => $user->id, 'model_id' => $id, 'model' => $model_name])->delete();
        }
    }
}
