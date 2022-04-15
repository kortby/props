<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Maintenance extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Maintenance::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->hideFromIndex(),
            Text::make('Title')->sortable()->rules('required', 'max:100'),
            Select::make('Status')->options([
                'new' => 'New',
                'in-progress' => 'In-progress',
                'resolved' => 'Resolved',
                'closed' => 'Closed',
                'cancelled' => 'Cancelled',
            ]),
            Textarea::make('Description'),
            BelongsTo::make('Category'),
            Select::make('Proirity')->options([
                'low' => 'Low',
                'normal' => 'Normal',
                'high' => 'High',
                'critical' => 'Critical',
            ]),
            new Panel('Maintenance time', $this->maintenanceTimeFields()),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the maintenance time fields for the resource.
     *
     * @return array
     */
    protected function maintenanceTimeFields()
    {
        return [
            Date::make('Due date'),
            DateTime::make('Preferred maintenece time'),
            Select::make('Frequency')->options([
                'once' => 'One Time',
                'daily' => 'Daily',
                'weekly' => 'Weekly',
                'bi-weekly' => 'Bi-Weekly',
                'monthly' => 'Monthly',
                'quarterly' => 'Quarterly'
            ]),
            Date::make('Finished'),
        ];
    }
}
