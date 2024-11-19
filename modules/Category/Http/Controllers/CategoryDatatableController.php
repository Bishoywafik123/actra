<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Modules\Category\Entities\Category;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Support\Renderable;

class CategoryDatatableController extends Controller
{
    public function __invoke(Request $request)
    {

        if (!$request->ajax()) {
            abort(403);
        }

        if($request->category_id){
            $model = Category::where('parent_id',$request->category_id)->get();    
        }else{
            $model = Category::where('parent_id',null)->get();
        }
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
                        'action'      => 'sub categories',
                        'actionType'  => 'link',
                        'actionMethod'  => 'GET',
                        'url'         => route('category.index', ['category_id'=>$row->id]),
                        'title'       => "sub categories",
                        'icon'        => 'fas fa-eye',
                        'classes'     => 'btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1',
                        'permissions' => true,
                        'conditions'    =>  true,
                        'tooltip' => [
                            'disabled' => false,
                            'placement' => 'top',
                            'color' => 'dark'
                        ]
                    ]),
                    
                    _dt_btn_factory([
                        'action'      => 'edit',
                        'actionType'  => 'modal',
                        'actionMethod'  => 'GET',
                        'url'         => route('category.edit', [$row->id]),
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
                        'url'         => route('category.destroy', [$row->id]),
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
            })->make(true);
    }
}
