<?php

namespace App\Providers;

use App\Nova\Category;
use App\Nova\Maintenance;
use App\Nova\Property;
use App\Nova\PropertyType;
use App\Nova\Prospect;
use App\Nova\Unit;
use App\Nova\UnitType;
use App\Nova\Dashboards\Main;
use App\Policies\RolePolicy;
use App\Policies\PermissionPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use \Vyuldashev\NovaPermission\NovaPermissionTool;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::mainMenu(function (Request $request) {
            return $this->getMenuSections();
        });


    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, []);
        });

        Gate::define('viewRole', function ($user) {
            return $user->can('view-roles');
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            NovaPermissionTool::make()
        ];

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * @return array
     */
    private function getMenuSections(): array
    {
        $menuSections =  [
            MenuSection::dashboard(Main::class)->icon('home'),

            MenuSection::make('Properties', [
                MenuItem::resource(Property::class),
                MenuItem::resource(PropertyType::class),
            ])->icon('office-building')->collapsable(),

            MenuSection::make('Units', [
                MenuItem::resource(Unit::class),
                MenuItem::resource(UnitType::class),
            ])->icon('document-duplicate')->collapsable(),

            MenuSection::make('Maintenance', [
                MenuItem::resource(Maintenance::class),
                MenuItem::resource(Category::class),
            ])->icon('cog')->collapsable(),

            MenuSection::make('Contacts', [
                MenuItem::resource(Prospect::class),
            ])->icon('annotation')->collapsable(),


            MenuSection::make('Users')->path('/resources/users')->icon('users'),


        ];

        if(in_array(auth()->user()->id, [1])) {

            $permissions = MenuSection::make('Permisssions')
                ->path('/resources/permissions')
                ->icon('shield-check');

            $roles = MenuSection::make('Roles')
                ->path('/resources/roles')
                ->icon('briefcase');

            array_push($menuSections, $roles);
            array_push($menuSections, $permissions);
        }

        return $menuSections;
    }
}
