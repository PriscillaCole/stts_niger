<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use \Encore\Admin\Facades\Admin;


class HomeController extends Controller
{
    public function index(Content $content)
    {
        $user = Admin::user();
        return $content
            ->title(__('admin.form.Dashboard'))
            ->row(function (Row $row) use($user) {
                if($user->inRoles(['commissioner', 'developer',])){
                $row->column(12, function (Column $column) {
                    $column->append(Dashboard::cards());
                });
            }
            })
            ->row(function (Row $row) use($user){
                if($user->inRoles(['inspector'])){
                $row->column(12, function (Column $column) {
                    $column->append(Dashboard::inspectorCards());
                });
             
            }
            })
            ->row(function (Row $row) use($user){
                if($user->inRoles(['lab_technician'])){
                $row->column(12, function (Column $column) {
                    $column->append(Dashboard::labCards());
                });
             
            }
            })
            ->row(function (Row $row) use($user){
                if($user->inRoles(['labosem'])){
                $row->column(12, function (Column $column) {
                    $column->append(Dashboard::labosemCards());
                });
             
            }
            })
            ->row(function (Row $row) use($user) {
                if($user->inRoles(['commissioner', 'developer'])){
                $row->column(8, function (Column $column) {
                    $column->append(Dashboard::crops());
                });
                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::inspectionsChart());
                });
            }
               
            })
            ->row(function (Row $row) use($user){
                if($user->inRoles(['inspector'])){
                $row->column(12, function (Column $column) {
                    $column->append(Dashboard::inspectionsChart());
                });
             
            }
            })
        
            ->row(function (Row $row) use($user) {
                if($user->inRoles(['commissioner', 'developer','basic-user','agro-dealer','cooperative','lab_technician','labosem'])){
              
                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::getPreOrders());
                });
                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::getOrders());
                });
            }
              
               })

             ->row(function (Row $row)  use($user){
                if($user->inRoles(['commissioner', 'developer','basic-user','inspector','agro-dealer','cooperative','lab_technician','labosem'])){
                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::getProcessedAndUnprocessedSeedsPerCrop());
                });
                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::compareCropsByPackage());
                });
            }
            })
            ->row(function (Row $row) use($user){
                if($user->inRoles(['cooperative', 'grower','agrodealers'])){
                $row->column(12, function (Column $column) {
                    $column->append(Dashboard::userCards());
                });
             
            }
            })
           

            ->row(function (Row $row) use($user){
                if($user->inRoles(['cooperative', 'grower','agrodealers'])){
                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::getMySales());
                });
                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::getMyStock());
                });
            }   
            })
            ->row(function (Row $row) use($user){
                if($user->inRoles(['cooperative', 'grower','agrodealers'])){
                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::getMyInspections());
                });
                $row->column(6, function (Column $column) {
                    $column->append(Dashboard::compareCropsByPackage());
                });
            }
            });
        
    }
}
