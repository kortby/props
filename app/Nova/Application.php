<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Application extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Application::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'last_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'last_name',
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
            ID::make()->sortable(),
            Text::make('First name'),
            Text::make('Middle name'),
            Text::make('Last name'),
            Date::make('Date of birth'),
            Text::make('Email'),
            Number::make('SSN'),
            Boolean::make('Pets'),

            new Panel('Current address informaion', $this->contactFields()),
            new Panel('Job informaion', $this->jobFields()),
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
     * Get the address fields for the resource.
     *
     * @return array
     */
    protected function contactFields()
    {
        return [
            Text::make('Phone'),
            Text::make('Address', 'address_line_1'),
            Text::make('Address Line 2')->hideFromIndex(),
            Text::make('City'),
            Text::make('State'),
            Text::make('Postal Code')->hideFromIndex(),
            Country::make('Country')->hideFromIndex(),
            Date::make('Move in date'),
        ];
    }

    /**
     * Get the address fields for the resource.
     *
     * @return array
     */
    protected function jobFields()
    {
        return [
            Text::make('Job Type'),
            Text::make('Employer name'),
            Number::make('Employer phone'),
            Text::make('Employer email'),
            Text::make('Employer address'),
            Number::make('Annual income'),
            Number::make('Additional income'),
        ];
    }
}
