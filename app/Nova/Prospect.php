<?php

namespace App\Nova;

use App\Nova\Filters\ProspectState;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Prospect extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Prospect::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'company_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'company_name',
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
            ID::make()->sortable()->hideFromIndex(),
            Text::make('company_name'),
            Text::make('address')->hideFromIndex(),
            Text::make('city')->sortable(),
            Text::make('state')->sortable(),
            Text::make('county')->hideFromIndex(),
            Text::make('zip')->hideFromIndex(),
            Text::make('phone'),
            Text::make('contact_firstname')->hideFromIndex(),
            Text::make('contact_lastname')->hideFromIndex(),
            Text::make('title')->hideFromIndex(),
            Text::make('direct_phone')->hideFromIndex(),
            Text::make('email')->hideFromIndex(),
            Text::make('website')->hideFromIndex(),
            Text::make('employee_count')->hideFromIndex(),
            Text::make('annual_sales')->sortable(),
            Text::make('sic_code')->hideFromIndex(),
            Text::make('industry')->sortable(),
            // Boolean::make('is_client'),
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
            new ProspectState,
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
}
