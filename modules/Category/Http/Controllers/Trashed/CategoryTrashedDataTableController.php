<?php

namespace Modules\Category\Http\Controllers\Trashed;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Modules\Category\Entities\Category;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Support\Renderable;

class CategoryTrashedDataTableController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $model = Category::onlyTrashed();
            return DataTables::of($model)

            
                ->addColumn('selectRow', function ($row) {
                    return $row->id;
                })
    
                ->editColumn('photo', function($row){
                    $path=asset($row->photo_path);
                    return view('dashboard::widgets.dt_photo',compact('path'));
                })
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('description', function ($row) {
                    return Str::limit(strip_tags($row->description), 40, '...');
                })
                ->addColumn('action', function ($row) {
                    $buttons = [
                        _dt_btn_factory([
                            'action'      => 'restore',
                            'actionType'  => 'alert',
                            'actionMethod'  => 'POST',
                            'url'         => route('category.trashed.restore', [$row->id]),
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
                                'cancelButtonText' => 'swal-restore-btn-discard',
                                'cancelButtonClasses' => 'btn-active-light-primary',
                            ]
                        ]),
                        _dt_btn_factory([
                            'action'      => 'delete',
                            'actionType'  => 'alert',
                            'actionMethod'  => 'DELETE',
                            'url'         => route('category.trashed.destroy', [$row->id]),
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
                                'cancelButtonText' => 'swal-delete-btn-discard',
                                'cancelButtonClasses' => 'btn-active-light-primary',
                            ]
                        ])
                    ];
                    return $buttons;
                })
                ->make(true);
        } else {
            abort(404);
        }
    }
}
