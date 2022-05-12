<?php

namespace App\Providers;

use App\Models\User;
use App\Nova\Category;
use App\Nova\Company;
use App\Nova\Maintenance;
use App\Models\Property as PropertyModel;
use App\Models\Unit as UnitModel;
use App\Models\Company as CompanyModel;
use App\Models\UnitFeature as UnitFeatureModel;
use App\Nova\UnitFeature;
use App\Nova\PropertyAgent;
use App\Nova\PropertyType;
use App\Nova\Prospect;
use App\Nova\Property;
use App\Nova\Renter;
use App\Nova\Unit;
use App\Nova\UnitType;
use App\Nova\Dashboards\Main;
use App\Nova\FurnishingCategory;
use App\Nova\FurnishingItem;
use App\Observers\PropertyObserver;
use App\Observers\UnitObserver;
use App\Observers\UserObserver;
use App\Observers\CompanyObserver;
use App\Observers\UnitFeatureObserver;
use App\Policies\RolePolicy;
use App\Policies\PermissionPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Laravel\Nova\Observable;
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

        Observable::make(User::class, UserObserver::class);
        Observable::make(PropertyModel::class, PropertyObserver::class);
        Observable::make(UnitModel::class, UnitObserver::class);
        Observable::make(UnitFeatureModel::class, UnitFeatureObserver::class);
        Observable::make(CompanyModel::class, CompanyObserver::class);
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
        /*
        Gate::define('viewRole', function ($user) {
            return $user->can('view-roles');
        });*/
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
                MenuItem::resource(Company::class),
                MenuItem::resource(Property::class),
                MenuItem::resource(PropertyType::class),
            ])->icon('office-building')->collapsable(),

            MenuSection::make('Units', [
                MenuItem::resource(Unit::class),
                MenuItem::resource(UnitType::class),
                MenuItem::resource(UnitFeature::class),
                MenuItem::resource(FurnishingItem::class),
                MenuItem::resource(FurnishingCategory::class),
            ])->icon('document-duplicate')->collapsable(),

            MenuSection::make('Maintenance', [
                MenuItem::resource(Maintenance::class),
                MenuItem::resource(Category::class),
            ])->icon('cog')->collapsable(),

            MenuSection::make('Contacts', [
                MenuItem::resource(Prospect::class),
            ])->icon('annotation')->collapsable(),


        ];

        if (auth()->user()->hasRole('property-manager')) {

            $menuUser = MenuSection::make('Users', [
                MenuItem::resource(PropertyAgent::class),
                MenuItem::resource(Renter::class),
            ])->icon('users')->collapsable();

            array_push($menuSections, $menuUser);
        }

        if (auth()->user()->hasRole('property-agent')) {

            array_push($menuSections, MenuSection::make('Renters')
                ->path('/resources/renters')
                ->icon('users'));
        }

        if (auth()->user()->hasAnyRole(config('roles-permissions'))) {

            $users = MenuSection::make('Users')->path('/resources/users')->icon('users');

            $permissions = MenuSection::make('Permisssions')
                ->path('/resources/permissions')
                ->icon('shield-check');

            $roles = MenuSection::make('Roles')
                ->path('/resources/roles')
                ->icon('briefcase');

            array_push($menuSections, $users);
            array_push($menuSections, $roles);
            array_push($menuSections, $permissions);
        }

        return $menuSections;
    }
}
