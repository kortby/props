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
use Dniccum\PhoneNumber\PhoneNumber;
use Laravel\Nova\Fields\Currency;

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
     * Phonenumber github. com/dniccum/nova-phone-number
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('First name')->rules('required', 'max:70'),
            Text::make('Middle name'),
            Text::make('Last name')->rules('required', 'max:70'),
            Date::make('Date of birth')->rules('required'),
            Text::make('Email')->rules('required', 'max:70'),
            Number::make('SSN')->max(999999999),
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
            PhoneNumber::make('Phone')->rules('required'),
            Text::make('Address', 'address_line_1')->rules('required'),
            Text::make('Address Line 2')->hideFromIndex(),
            Text::make('City')->rules('required'),
            Text::make('State')->rules('required'),
            Text::make('Postal Code')->hideFromIndex()->rules('required'),
            Country::make('Country')->hideFromIndex(),
            Date::make('Move in date')->rules('required'),
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
            Text::make('Job Type')->rules('required'),
            Text::make('Employer name')->rules('required'),
            PhoneNumber::make('Employer phone'),
            Text::make('Employer email'),
            Text::make('Employer address'),
            Currency::make('Annual income')->textAlign('left')->rules('required'),
            Currency::make('Additional income')->textAlign('left'),
        ];
    }
}
