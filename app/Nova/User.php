<?php

namespace App\Nova;

use App\Services\GetParentAndChildByAuthenticated;


use Illuminate\Validation\Rules;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\User::class;

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
        'id', 'name', 'email',
    ];

    public static function indexQuery(NovaRequest $request, $query)
    {
        if (auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return parent::indexQuery($request, $query);
        }

        return $query->whereIn('parent_id', (new GetParentAndChildByAuthenticated())->handle());
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return $this->detailView($request);
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
        return [
            (new \Coderello\LoginAs\Actions\LoginAs)->redirectTo(function ($user) {
                return route('nova.pages.dashboard');
            }),
        ];
    }

    private function detailView($request)
    {

        $detail = [
            ID::make()->sortable()->hideFromIndex()->hideFromDetail(),

            BelongsTo::make('Parent', 'parent' , self::class)->onlyOnIndex(),
            BelongsTo::make('Prop', 'prop' , 'App\Nova\Property' ),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Number::make('Phone Number', 'phone')->textAlign('left'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),


        ];

       /* if (auth()->user()->hasAnyRole(config('company-owner'))) {
            array_push($detail, );
        }*/


        if (auth()->user()->hasAnyRole(config('roles-permissions'))) {

            array_push($detail, MorphToMany::make('Roles', 'roles', \Vyuldashev\NovaPermission\Role::class));
            array_push($detail, MorphToMany::make('Permissions', 'permissions', \Vyuldashev\NovaPermission\Permission::class));
        }

        return $detail;
    }
}
