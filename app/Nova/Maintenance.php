<?php

namespace App\Nova;

use App\Nova\Filters\StatusNew;
use App\Services\GetParentAndChildByAuthenticated;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Notifications\NovaNotification;
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

    public static function indexQuery(NovaRequest $request, $query)
    {
        if (auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return parent::indexQuery($request, $query);
        }

        return $query->whereHas('unit', function ($query) {
            $query->whereIn('user_id', (new GetParentAndChildByAuthenticated())->handle());
        });
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->hideFromIndex()->hideFromDetail(),
            Text::make('Title')->sortable()->rules('required', 'max:100'),
            BelongsTo::make('Unit Number', 'unit', 'App\Nova\Unit')->searchable(),
            Select::make('Status')->options([
                'new' => 'New',
                'in-progress' => 'In-progress',
                'resolved' => 'Resolved',
                'closed' => 'Closed',
                'cancelled' => 'Cancelled',
            ])->hideFromIndex()->hideFromDetail(),
            Badge::make('Status')->map([
                'new' => 'info',
                'in-progress' => 'warning',
                'resolved' => 'success',
                'closed' => 'info',
                'cancelled' => 'danger',
            ])->sortable(),
            Textarea::make('Description')->rules('required', 'max:250'),
            BelongsTo::make('Category')->rules('required'),
            Select::make('Proirity')->options([
                'low' => 'Low',
                'normal' => 'Normal',
                'high' => 'High',
                'critical' => 'Critical',
            ])->hideFromIndex()->hideFromDetail(),
            Badge::make('Proirity')->map([
                'low' => 'info',
                'normal' => 'info',
                'high' => 'warning',
                'critical' => 'danger',
            ])->sortable(),
            Text::make('phone'),
            Currency::make('Cost', 'cost')->rules('required')->textAlign('left'),
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
        return [
            new StatusNew,
        ];
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
            DateTime::make('Preferred maintenece time')->hideFromIndex()->rules('after:today')->sortable(),
            Select::make('Frequency')->options([
                'once' => 'One Time',
                'daily' => 'Daily',
                'weekly' => 'Weekly',
                'bi-weekly' => 'Bi-Weekly',
                'monthly' => 'Monthly',
                'quarterly' => 'Quarterly'
            ]),
            Date::make('Finished')->hideFromIndex(),
        ];
    }
}
