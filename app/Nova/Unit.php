<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Unit extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Unit::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'unit_heading';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'unit_heading',
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
            Number::make('Unit number')->textAlign('left')->sortable()->rules('required', 'max:7000'),
            Text::make('Title', 'unit_heading')->rules('required', 'max:70'),
            BelongsTo::make('Property')->sortable(),
            BelongsTo::make('Type')->sortable(),
            Number::make('Bedrooms', 'number_of_bedroom')->textAlign('center')->sortable()->min(0)->max(15),
            Number::make('Bathrooms', 'number_of_bathroom')->textAlign('center'),
            Number::make('Size')->displayUsing(function ($name) {
                return strtoupper($name . ' sqft');
            })->sortable(),
            Number::make('Balcony', 'number_of_balcony')->hideFromIndex(),
            Date::make('What day is going to be available?', 'date_available_from'),
            Boolean::make('Is active'),
            Textarea::make('Desription')->hideFromIndex(),
            Boolean::make('Carpet area')->hideFromIndex(),
            Number::make('Unit floor number')->hideFromIndex(),
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
}
