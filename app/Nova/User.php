<?php

namespace App\Nova;

use App\Services\GetParentAndChildByAuthenticated;


use Illuminate\Validation\Rules;

use KABBOUCHI\NovaImpersonate\Impersonate;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\Permission\Models\Role;
use Vyuldashev\NovaPermission\RoleSelect;
use Vyuldashev\NovaPermission\RoleBooleanGroup;
use Dniccum\PhoneNumber\PhoneNumber;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\KeyValue;

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
            //new \Coderello\LoginAs\Actions\LoginAs,
        ];
    }

    private function detailView($request)
    {

        $detail = [
            ID::make()->sortable()->hideFromDetail(),

            RoleSelect::make('Role', 'roles')
                ->options($this->getRoles()->toArray())
                ->resolveUsing(function () {
                    return $this->roles->first()->id ?? '---';
                })->displayUsing(function () {
                    return $this->roles->first()->name ?? '---';
                })->searchable()
                ->hideWhenUpdating(),

            BelongsTo::make('Prop', 'prop', 'App\Nova\Property')
            /*->hide()->dependsOn(
            ['roles'],
            function (BelongsTo $field, NovaRequest $request, FormData $formData) {
                if(in_array($formData->roles, [4,5,6])){
                    $field->show();
                }
            }
        )*/,


            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            PhoneNumber::make('Phone Number', 'phone')->textAlign('left'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),

            // KeyValue::make('answers')->rules('json'),
            Text::make('answers', 'answers[0]->answer'),
            // Code::make('answers')->json(),



        ];

        if (auth()->user()->hasAnyRole(config('roles-permissions'))) {
            array_push($detail, BelongsTo::make('Parent', 'parent', self::class)->onlyOnIndex());
        }

        return $detail;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function getRoles(): \Illuminate\Support\Collection
    {
        $query = Role::query();

        if (auth()->user()->hasAnyRole('company-owner')) {
            $query->whereIn('id', [4, 5, 6]);
        }

        if (auth()->user()->hasAnyRole('property-manager')) {
            $query->whereIn('id', [5, 6]);
        }

        if (auth()->user()->hasAnyRole('property-agent')) {
            $query->whereIn('id', [6]);
        }


        return $query->pluck('name', 'id');
    }
}
