<?php

namespace App\DataTables;
use App\Facades\UtilityFacades;
use App\Models\Event\Event;
use App\Models\Role;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EventDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */


    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function (Event $eventDetails) {
                return  UtilityFacades::dateFormat($eventDetails->created_at);
            })
            ->addColumn('action', function (Event $eventDetails) {
                return view('Show-event.action', compact('eventDetails'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\EventDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Event $model)
    {
        return $model->newQuery()->orderBy('id', 'ASC');;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
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

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::make('id'),
            Column::make('title'),
            Column::make('city'),
            Column::make('location'),
            Column::make('from_date'),
            Column::make('from_time'),
            Column::computed('action')
                ->exportable(true)
                ->printable(false)
                ->width(50)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Event_' . date('YmdHis');
    }
}
