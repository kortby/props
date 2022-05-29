<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Leasing extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Leasing::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'lease_number';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'lease_number',
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
            ID::make()->sortable()->hideFromIndex()->hideFromDetail(),

            Text::make('Leasing Number', 'lease_number')->rules('required'),
            Date::make('Entered on', 'entered_on')->sortable()
                ->rules('required', 'date')->hideFromIndex(),
            // BelongsTo::make('user_id'),
            // BelongsTo::make('property_id'),

            new Panel('General Information', $this->generalInformationFields()),
            new Panel('Rent Payment', $this->rentPaymentFields()),

            Select::make('Status')->options([
                'new' => 'New',
                'in-progress' => 'In-progress',
                'resolved' => 'Resolved',
                'closed' => 'Closed',
                'cancelled' => 'Cancelled',
            ]),
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
    protected function generalInformationFields()
    {
        return [
            Select::make('Leasing term', 'leasing_term')->options([
                'weekly' => 'Weekly',
                'bi-weekly' => 'Bi-Weekly',
                'monthly' => 'Monthly',
                'quarterly' => 'Quarterly',
                'yearly' => 'Yearly',
            ])->rules('required')->hideFromIndex(),
            Date::make('Commencement date')->sortable()
                ->rules('required', 'date', 'after:today'),
            Date::make('Experation date')->sortable()
                ->rules('required', 'date', 'after:commencement_date'),
            Date::make('Termination period')->sortable()
                ->rules('required', 'date', 'after:commencement_date')->hideFromIndex(),
            Currency::make('Rent amount')->rules('required'),
            Date::make('Next due date')->sortable()
                ->rules('required', 'date', 'after:commencement_date')->hideFromIndex(),
        ];
    }

    /**
     * Get the maintenance time fields for the resource.
     *
     * @return array
     */
    protected function rentPaymentFields()
    {
        return [
            Currency::make('Late fees')->hideFromIndex(),
            Currency::make('Security deposit')->hideFromIndex(),
            Date::make('Deposit date')->sortable()
                ->rules('required', 'date', 'after:commencement_date')->hideFromIndex(),
            Currency::make('Water charges')->hideFromIndex(),
            Currency::make('Utility admin charges')->hideFromIndex(),
            Currency::make('Trash charges')->hideFromIndex(),
            Currency::make('Security deposit')->hideFromIndex(),
            Currency::make('Trash door charges')->hideFromIndex(),
        ];
    }
}
