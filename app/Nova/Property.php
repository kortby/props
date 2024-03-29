<?php

namespace App\Nova;

use App\Services\GetParentAndChildByAuthenticated;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Dniccum\PhoneNumber\PhoneNumber;

class Property extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Property::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    public static function indexQuery(NovaRequest $request, $query)
    {
        if (auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return parent::indexQuery($request, $query);
        }

        return $query->whereIn('user_id', (new GetParentAndChildByAuthenticated())->handle());
    }

    public function title()
    {
        return $this->name . ' - ' . $this->city;
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
            ID::make()->sortable()->hideFromIndex()->hideFromDetail(),
            Text::make('Property name', 'name')->rules('required', 'max:120'),
            BelongsTo::make('Company'),
            BelongsTo::make('Property Type', 'propertyType'),
            Number::make('Total Floors')->rules('required', 'max:70'),
            Number::make('Number of Units')->rules('required', 'max:20'),
            Number::make('Number of Elevators')->rules('max:10')->hideFromIndex(),
            Textarea::make('Description')->rules('max:255'),

            new Panel('Contact Information', $this->contactFields()),

            Images::make('Images', 'property_collection') // second parameter is the media collection name
                //->conversionOnPreview('medium-size') // conversion used to display the "original" image
                ->conversionOnDetailView('thumb') // conversion used on the model's view
                ->conversionOnIndexView('thumb') // conversion used to display the image on the model's index page
                ->conversionOnForm('thumb') // conversion used to display the image on the model's form
                ->fullSize() // full size column
                ->rules('required') // validation rules for the collection of images
                // validation rules for the collection of images
                ->singleImageRules('dimensions:min_width=100'),

            HasMany::make('Units'),
            HasMany::make('Amenities'),
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
            Country::make('Country')->hideFromIndex()->rules('required'),
        ];
    }
}
