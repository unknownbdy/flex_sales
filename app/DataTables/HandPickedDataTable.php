<?php

namespace App\DataTables;

use App\Facades\UtilityFacades;
use App\Models\handpicked\HandPicked;
// use App\Models\Article\Article;
use App\Models\Article\Article;
use App\Models\Role;
use App\Models\Preference;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;

class HandPickedDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function (Article $Article) {
                return  UtilityFacades::dateFormat($Article->created_at);
            })
            // ->addColumn('tags', function (Article $Article) {
            //     $tagIDs = json_decode($Article->tag_id, true);
            //     if (!is_array($tagIDs)) {
            //         // Handle the case when tags_ids is not properly formatted as JSON
            //         return '';
            //     }

            //     $preferences = DB::table('preferences')->whereIn('id', $tagIDs)->pluck('preferences_name')->toArray();
            //     return implode(', ', $preferences);
            // })
            ->addColumn('tags', function (Article $Article) {
                $tagIDs = explode(',', $Article->tag_id);
                if (!is_array($tagIDs)) {
                    return '';
                }

                $preferences = DB::table('preferences')->whereIn('id', $tagIDs)->pluck('preferences_name')->toArray();

                // Limit to three preference names and add '...' if there are more
                $maxPreferencesToShow = 3;
                $preferencesToShow = array_slice($preferences, 0, $maxPreferencesToShow);
                $tagsColumnValue = implode(', ', $preferencesToShow);

                if (count($preferences) > $maxPreferencesToShow) {
                    $tagsColumnValue .= ' ...';
                }

                return $tagsColumnValue;
            })
            ->addColumn('action', function (Article $Article) {
                return view('HandPicked.action')->with ('HandPicked',$Article);
            });
    }

    public function query(Article $model)
    {
        return $model->newQuery()->where('id','!=','admin')->orderBy('id', 'ASC');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->language([
                "paginate" => [
                    "next" => '<i class="fas fa-angle-right"></i>',
                    "previous" => '<i class="fas fa-angle-left"></i>'
                ]
            ])
            ->parameters([
                "dom" =>  "
                                <'row'<'col-sm-12'><'col-sm-9'B><'col-sm-3'f>>
                                <'row'<'col-sm-12'tr>>
                                <' row mt-3 container-fluid'<'col-sm-5'i><'col-sm-7'p>>
                                ",

                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-primary btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-primary btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-primary btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-primary btn-sm no-corner',],
                    ['extend' => 'pageLength', 'className' => 'btn btn-primary btn-sm no-corner',],
                ],

                "scrollX" => true
            ])
            ->language([
                'buttons' => [
                    'create' => __('Create'),
                    'export' => __('Export'),
                    'print' => __('Print'),
                    'reset' => __('Reset'),
                    'reload' => __('Reload'),
                    'excel' => __('Excel'),
                    'csv' => __('CSV'),
                    'pageLength' => __('Show %d rows'),

                ]
            ]);
    }

    // public function html()
    // {
    //     return $this->builder()
    //         ->setTableId('roles-table')
    //         ->columns($this->getColumns())
    //         ->minifiedAjax()
    //         ->dom('Bfrtip')
    //         ->orderBy(1)
    //         ->buttons(
    //             Button::make('create')->className('btn-primary btn-md no-corner ti ti-plus'),
    //             Button::make('export')->className('btn-light btn-md no-corner ti ti-download'),
    //             Button::make('print')->className('btn-light btn-md no-corner ti ti-printer'),
    //             Button::make('reset')->className('btn-light btn-md no-corner ti ti-arrow-back-up'),
    //             Button::make('reload')->className('btn-light btn-md no-corner ti ti-refresh'),
    //             Button::make('pageLength')->className('btn-light btn-md no-corner')
    //         ) ->language([
    //             'buttons'=>[
    //                 'create'=>__('Create'),
    //                 'export'=>__('Export'),
    //                 'print'=>__('Print'),
    //                 'reset'=>__('Reset'),
    //                 'reload'=>__('Reload'),
    //                 'excel'=>__('Excel'),
    //                 'csv'=>__('CSV'),
    //                 'pageLength'=>__('Show %d rows'),
    //             ]
    //         ]);
    // }


    protected function getColumns()
    {
        return [

            Column::make('id'),
            Column::make('title_english'),
            Column::make('title_arabic'),
            Column::computed('tags') // Rename the column to 'preference_names'
            ->exportable(true)
            ->printable(false)
            ->width(200)
            ->addClass('text-center'),
            Column::computed('action')
                ->exportable(true)
                ->printable(false)
                ->width(50)
                ->addClass('text-center'),
        ];
    }


    protected function filename()
    {
        return 'HandPicked_Videos_' . date('YmdHis');
    }
}
