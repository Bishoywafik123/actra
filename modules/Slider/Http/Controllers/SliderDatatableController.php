<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Modules\Slider\Entities\Slider;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Support\Renderable;

class SliderDatatableController extends Controller
{
    public function __invoke(Request $request)
    {

        if (!$request->ajax()) {
            abort(403);
        }

        $model = Slider::orderBy('id','desc')->get();
        return DataTables::of($model)
        
            ->addColumn('selectRow', function($row){
                return $row->id;
            })
       
            ->editColumn('photo', function($row){
                $path=asset('system/storage/app/public/slider/img/'.$row->photo);
                return view('dashboard::widgets.dt_photo',compact('path'));
            })
            
            ->addColumn('title', function ($row) {
               return $row->title;
            })

            ->addColumn('content', function ($row) {
                return Str::limit($row->content,50,'...');
             })
            ->addColumn('action', function ($row) {
                $buttons = [
     
                    _dt_btn_factory([
                        'action'      => 'delete',
                        'actionType'  => 'alert',
                        'actionMethod'  => 'DELETE',
                        'url'         => route('slider.destroy', [$row->id]),
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
