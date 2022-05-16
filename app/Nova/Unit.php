<?php

namespace App\Nova;

use App\Nova\Actions\AvailableUnit;
use App\Nova\Actions\NotAvailableUnit;
use App\Nova\Filters\UnitActive;
use App\Services\GetParentAndChildByAuthenticated;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

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
    public static $title = 'unit_number';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'unit_number',
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
            ID::make()->hideFromIndex()->hideFromDetail(),
            Number::make('Unit number')->textAlign('left')->sortable()->rules('required')->min(1)->max(1000)->help(
                'What is the unit number ?'
            ),
            Text::make('Title', 'unit_heading')->rules('required', 'max:70'),
            BelongsTo::make('Property')->sortable(),
            BelongsTo::make('Unit Type', 'UnitType'),
            Date::make('Available date', 'date_available_from')->help(
                'When this is going to be available?'
            ),
            Currency::make('Price', 'price')->rules('required')->textAlign('left'),
            Boolean::make('Active', 'is_active'),
            Textarea::make('Desription')->hideFromIndex()->rules('required', 'max:650'),
            Number::make('Unit floor number')->hideFromIndex()->min(0)->max(80),
            new Panel('Unit details', $this->detailsFields()),

            Images::make('Images', 'units_collection') // second parameter is the media collection name
                //->conversionOnPreview('medium-size') // conversion used to display the "original" image
                ->conversionOnDetailView('thumb') // conversion used on the model's view
                ->conversionOnIndexView('thumb') // conversion used to display the image on the model's index page
                ->conversionOnForm('thumb') // conversion used to display the image on the model's form
                ->fullSize() // full size column
                ->rules('required') // validation rules for the collection of images
                // validation rules for the collection of images
                ->singleImageRules('dimensions:min_width=100')->hideFromIndex(),
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
            new UnitActive,
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
        return [
            (new AvailableUnit)->canSee(function ($request) {
                return true;
            })->canRun(function ($request, $post) {
                return true;
            }),
            (new NotAvailableUnit)->canSee(function ($request) {
                return true;
            })->canRun(function ($request, $post) {
                return true;
            }),
        ];
    }

    /**
     * Get the maintenance time fields for the resource.
     *
     * @return array
     */
    protected function detailsFields()
    {
        return [
            Number::make('Bedrooms', 'number_of_bedroom')->textAlign('center')->sortable()->min(0)->max(15)->help(
                'How many bedrooms?'
            )->hideFromIndex(),
            Number::make('Bathrooms', 'number_of_bathroom')->textAlign('center')->sortable()->min(0)->max(15)->help(
                'How many bedrooms?'
            )->hideFromIndex(),
            Number::make('Size')->displayUsing(function ($name) {
                return strtoupper($name . ' sqft');
            })->sortable()->sortable()->min(0)->max(10000)->help(
                'How many square feet?'
            ),
            Number::make('Balcony', 'number_of_balcony')->hideFromIndex(),
            Boolean::make('Carpet area')->hideFromIndex(),
            HasOne::make('Unit Feature'),
        ];
    }
}
