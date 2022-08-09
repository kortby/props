<?php

namespace App\Nova;

use App\Nova\Filters\ContactWith;
use App\Services\GetParentAndChildByAuthenticated;
use App\Nova\Filters\ProspectState;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Dniccum\PhoneNumber\PhoneNumber;

class Prospect extends Resource
{
    public static $globallySearchable = false;
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

    public static function indexQuery(NovaRequest $request, $query)
    {
        if (auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return parent::indexQuery($request, $query);
        }

        return $query->whereIn('user_id', (new GetParentAndChildByAuthenticated())->handle());
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
            ID::make()->sortable()->hideFromIndex(),
            Text::make('First name', 'contact_firstname')->hideFromIndex(),
            Text::make('Last name', 'contact_lastname')->hideFromIndex(),
            PhoneNumber::make('Phone'),
            Text::make('Job title', 'title')->hideFromIndex(),
            Text::make('email')->hideFromIndex(),
            Boolean::make('Is client'),
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
            new ContactWith,
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
     * Get the prospect time fields for the resource.
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
            PhoneNumber::make('Direct phone')->hideFromIndex(),
            Text::make('Website')->hideFromIndex(),
        ];
    }

    /**
     * Get the prospect time fields for the resource.
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
