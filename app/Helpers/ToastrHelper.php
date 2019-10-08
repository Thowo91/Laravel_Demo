<?php


namespace App\Helpers;


class ToastrHelper
{

    public static function flashSession($type, $message, $title = null) {

        if(\Session::has('toastr')) {
            $old = \Session::get('toastr');
            foreach ($old as $item) {
                $toastr[] = $item;
            }
        }

        $toastr[] = ['type' => $type, 'message' => $message, 'title' => $title];

        \Session::flash('toastr', $toastr);
    }

    public static function renderToast() {

        if(\Session::has('toastr')) {
            $toastr = \Session::get('toastr');
            $script = '';
            foreach ($toastr as $item) {
                $title = (!empty($item['title']) ? ', "' . $item['title'] . '")' : ')') . ';';
                $script .= 'toastr.' . $item['type'] . '("' . $item['message'] . '"' . $title;
            }

            return $script;
        }
    }

}
