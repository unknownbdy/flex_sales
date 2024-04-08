<?php

namespace App\DataTables;

use App\Facades\UtilityFacades;
use App\Models\TvShow\TVShow;
use App\Models\Role;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TvshowVideoDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function (TvShow $tvshow) {
                return  UtilityFacades::dateFormat($tvshow->created_at);
            })
            ->addColumn('action', function (TvShow $tvshow) {
                return view('tvshow-video.action', compact('tvshow'));
            });
    }

    public function query(TvShow $model)
    {
        return $model->newQuery()->orderBy('id', 'ASC');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('tv-shows-table')
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
            Column::make('topic_english'),
            Column::make('topic_arabic'),
            Column::make('channel_english'),
            Column::make('channel_arabic'),
            // Column::make('show_english'),
            // Column::make('show_arabic'),
            Column::computed('action')
                ->exportable(true)
                ->printable(false)
                ->width(50)
                ->addClass('text-center'),
        ];
    }


    protected function filename()
    {
        return 'TvShow_Videos_' . date('YmdHis');
    }
}
