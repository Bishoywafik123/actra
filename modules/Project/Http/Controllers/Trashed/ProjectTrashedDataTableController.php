<?php

namespace Modules\Project\Http\Controllers\Trashed;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Modules\Project\Entities\Project;
use Yajra\DataTables\Facades\DataTables;

class ProjectTrashedDataTableController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $model = Project::onlyTrashed();
            return DataTables::of($model)
                    ->addColumn('selectRow', function($row){
                        return $row->id;
                    })
                    ->addColumn('main_photo', function ($row) {
                        $path = asset('system/storage/app/public/project/img/'.$row->main_photo);
                        return view('dashboard::widgets.dt_photo', compact('path'));
                    })
                     ->addColumn('category', function ($row) {
                        if($row->category_id!=null){
                            return $row->category->name;
                        }
                     })
                   
                     ->addColumn('title', function ($row) {
                        return $row->title;
                     })
         
                     ->addColumn('description', function ($row) {
                         return $row->description;
                      })
               
                    ->addColumn('action', function($row){
                        $buttons = [
                            _dt_btn_factory([
                                'action'      => 'restore',
                                'actionType'  => 'alert',
                                'actionMethod'  => 'POST',
                                'url'         => route('project.trashed.restore', [$row->id]),
                                'title'       => Lang::get("core::global.datatable.actions.restore"),
                                'icon'        => 'fas fa-trash-undo-alt',
                                'classes'     => 'btn btn-icon btn-light-success btn-sm me-1',
                                'conditions'    => true,
                                'tooltip' => [
                                    'disabled' => false,
                                    'placement' => 'top',
                                    'color' => 'dark'
                                ],
                                'alertOptions' => [
                                    'title' => 'swal-restore-prompt-single',
                                    'icon' => 'warning',
                                    'showCancelButton' => 'true',
                                    'buttonsStyling' => 'false',
                                    'confirmButtonText' => 'swal-restore-btn-confirm',
                                    'confirmButtonClasses' => 'btn-warning',
                                    'cancelButtonText' => 'swal-restore-btn-disProjectd',
                                    'cancelButtonClasses' => 'btn-active-light-primary',
                                ]
                            ]),
                            _dt_btn_factory([
                                'action'      => 'delete',
                                'actionType'  => 'alert',
                                'actionMethod'  => 'DELETE',
                                'url'         => route('project.trashed.destroy', [$row->id]),
                                'title'       => Lang::get("core::global.datatable.actions.delete"),
                                'icon'        => 'fas fa-trash',
                                'classes'     => 'btn btn-icon btn-light-danger btn-sm',
                                'conditions'    => true,
                                'tooltip' => [
                                    'disabled' => false,
                                    'placement' => 'top',
                                    'color' => 'dark'
                                ],
                                'alertOptions' => [
                                    'title' => 'swal-hard-delete-prompt-single',
                                    'icon' => 'error',
                                    'showCancelButton' => 'true',
                                    'buttonsStyling' => 'false',
                                    'confirmButtonText' => 'swal-delete-btn-confirm',
                                    'confirmButtonClasses' => 'btn-danger',
                                    'cancelButtonText' => 'swal-delete-btn-disProjectd',
                                    'cancelButtonClasses' => 'btn-active-light-primary',
                                ]
                            ])
                        ];
                        return $buttons;
                    })
                    ->make(true);
        }else{
            abort(404);
        }
    }
}
