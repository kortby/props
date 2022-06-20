<?php

namespace App\Nova;

use App\Nova\Filters\ProspectState;
use App\Nova\Filters\WorkingWith;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Contractor extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Contractor::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'city';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'city',
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
            Text::make('First name', 'contact_firstname')->hideFromIndex(),
            Text::make('Last name', 'contact_lastname')->hideFromIndex(),
            Text::make('Phone'),
            Text::make('Job title', 'title')->hideFromIndex(),
            Text::make('email')->hideFromIndex(),
            Boolean::make('Is working with us?', 'is_working_with_us'),
            new Panel('Company information', $this->companyFields()),
            new Panel('General information', $this->generalInformationFields()),
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
            new WorkingWith,
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
     * Get the contractor time fields for the resource.
     *
     * @return array
     */
    protected function generalInformationFields()
    {
        return [
            Text::make('Address')->hideFromIndex(),
            Text::make('City')->sortable(),
            Text::make('State')->sortable(),
            Text::make('County')->hideFromIndex(),
            Text::make('Zip')->hideFromIndex(),
            Text::make('Direct phone')->hideFromIndex(),
            Text::make('Website')->hideFromIndex(),
        ];
    }

    /**
     * Get the contractor time fields for the resource.
     *
     * @return array
     */
    protected function companyFields()
    {
        return [
            Text::make('Company name'),
            Text::make('Employee count')->hideFromIndex(),
            Text::make('Annual sales')->sortable(),
            Text::make('Sic code')->hideFromIndex(),
            Text::make('Industry')->sortable(),
        ];
    }
}
