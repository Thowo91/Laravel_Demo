<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;

class ChangelogController extends Controller
{
    public function index() {
        return view('backend.changelog.index');
    }

    public function indexDatatable() {

        $activity = Activity::all();

        return DataTables::of($activity)
            ->editColumn('causer_id', function($activity) {
                return $activity->causer->name;
            })
            ->addColumn('old', function ($activity) {
                $html = '';
//                var_dump($activity->changes);
                if (!empty($activity->changes['old'])) {
                    foreach ($activity->changes['old'] as $key => $value) {
                        $html .= '<p>' . $key . ': ' . $value . '</p>';
                    }
                }
                return $html;
            })
            ->addColumn('new', function ($activity) {
                $html = '';
                if (!empty($activity->changes['attributes'])) {
                    foreach ($activity->changes['attributes'] as $key => $value) {
                        $html .= '<p>' . $key . ': ' . $value . '</p>';
                    }
                }
                return $html;
            })
            ->rawColumns([
                'old',
                'new',
            ])
            ->make(true);
    }
}
