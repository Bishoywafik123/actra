<?php

namespace Modules\Service\Http\Controllers\Trashed;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Modules\Service\Entities\Service;
use Modules\Core\Http\Controllers\AppController;

class ServiceTrashedController extends AppController
{

    public function destroy($id)
    {
        Service::withTrashed()->findOrFail($id)->forceDelete();
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-hard-deleted-row')], 200);
    }

    public function destroyMany(Request $request)
    {
        Service::withTrashed()->whereIn('id',$request->ids)->forceDelete();
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-hard-deleted-rows')],200);
    }

    public function restore($id)
    {
        Service::withTrashed()->findOrFail($id)->restore();
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-restored-row')], 200);
    }

    public function restoreMany(Request $request)
    {
        Service::withTrashed()->whereIn('id',$request->ids)->restore();
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-restored-rows')],200);
    }
}
