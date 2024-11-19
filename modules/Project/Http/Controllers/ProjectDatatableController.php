<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Modules\Project\Entities\Project;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Support\Renderable;

class ProjectDatatableController extends Controller
{
    public function __invoke(Request $request)
    {

        if (!$request->ajax()) {
            abort(403);
        }

        $model = Project::all();
        return DataTables::of($model)
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
       
            ->addColumn('action', function ($row) {
                $buttons = [
                    _dt_btn_factory([
                        'action'      => 'edit',
                        'actionType'  => 'modal',
                        'actionMethod'  => 'GET',
                        'url'         => route('project.edit', [$row->id]),
                        'title'       => Lang::get("core::global.datatable.actions.edit"),
                        'icon'        => 'fas fa-edit',
                        'classes'     => 'btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1',
                        'conditions'    => true,
                        'tooltip' => [
                            'disabled' => false,
                            'placement' => 'top',
                            'color' => 'dark'
                        ]
                    ]),
                    _dt_btn_factory([
                        'action'      => 'delete',
                        'actionType'  => 'alert',
                        'actionMethod'  => 'DELETE',
                        'url'         => route('project.destroy', [$row->id]),
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
                            'title' => 'swal-delete-prompt-single',
                            'icon' => 'error',
                            'showCancelButton' => 'true',
                            'buttonsStyling' => 'false',
                            'confirmButtonText' => 'swal-delete-btn-confirm',
                            'confirmButtonClasses' => 'btn-danger',
                            'cancelButtonText' => 'swal-delete-btn-discard',
                            'cancelButtonClasses' => 'btn-active-light-primary',
                        ]
                    ])
                ];
                return $buttons;
            })

            ->make(true);
    }
}
