<?php

namespace App\Providers;

use App\Models\User;
use App\Nova\Category;
use App\Nova\Company;

use App\Nova\Maintenance;
use App\Models\Property as PropertyModel;
use App\Models\Unit as UnitModel;
use App\Models\Company as CompanyModel;
use \App\Models\PropertyType as PropertyTypeModel;
use \App\Models\UnitType as UnitTypeModel;
use \App\Models\Category as CategoryModel;
use App\Models\Amenity as AmenityModel;
use App\Models\Leasing as LeasingModel;
use App\Models\ServiceFee as ServiceFeeModel;
use App\Models\Prospect as ProspectModel;
use App\Models\Renter as RenterModel;
use App\Nova\Amenity;
use App\Nova\AmenitySchedule;
use App\Nova\PropertyType;
use App\Nova\Property;
use App\Nova\Unit;
use App\Nova\UnitType;
use App\Nova\Dashboards\Main;
use App\Nova\FurnishingItem;
use App\Nova\Leasing;
use App\Nova\ScheduleViewing;
use App\Nova\ServiceFee;
use App\Observers\PropertyObserver;
use App\Observers\UnitObserver;
use App\Observers\UserObserver;
use App\Observers\CompanyObserver;
use App\Observers\PropertyTypeObserver;
use App\Observers\UnitTypeObserver;
use App\Observers\CategoryObserver;
use App\Observers\AmenityObserver;
use App\Observers\LeasingObserver;
use App\Observers\ServiceFeeObserver;
use App\Observers\ProspectObserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Laravel\Nova\Observable;
use \Vyuldashev\NovaPermission\NovaPermissionTool;
use Illuminate\Support\Facades\Blade;

use Wdelfuego\NovaCalendar\NovaCalendar;
use Wdelfuego\NovaCalendar\Interface\CalendarDataProviderInterface;
use App\Providers\CalendarDataProvider;

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
        Observable::make(CompanyModel::class, CompanyObserver::class);
        Observable::make(PropertyTypeModel::class, PropertyTypeObserver::class);
        Observable::make(UnitTypeModel::class, UnitTypeObserver::class);
        Observable::make(CategoryModel::class, CategoryObserver::class);
        Observable::make(AmenityModel::class, AmenityObserver::class);
        Observable::make(ProspectModel::class, ProspectObserver::class);
        Observable::make(LeasingModel::class, LeasingObserver::class);
        Observable::make(ServiceFeeModel::class, ServiceFeeObserver::class);

        Nova::footer(function ($request) {
            $footer = '<div class="mt-12 border-t border-gray-200 pt-8">
            <p class="text-gray-400 text-center text-xs mt-8">&copy; ' . date("Y") . ' PropsManager, Inc. All rights reserved.</p>
            </div>';
            return Blade::render($footer);
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
            if ($user->hasRole('renter')) {
                return false;
            }
            return $user->hasRole([1, 2, 3, 4, 5]);
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
            NovaPermissionTool::make(),
            new NovaCalendar,
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CalendarDataProviderInterface::class, function ($app) {
            return new CalendarDataProvider();
        });
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
            ])->icon('office-building')->collapsible(),

            MenuSection::make('Units', [
                MenuItem::resource(Unit::class),
                MenuItem::resource(UnitType::class),
                MenuItem::resource(FurnishingItem::class),
            ])->icon('document-duplicate')->collapsible(),

            MenuSection::make('Maintenance', [
                MenuItem::resource(Maintenance::class),
                MenuItem::resource(Category::class),
            ])->icon('cog')->collapsible(),

            MenuSection::Make('Leasing', [
                MenuItem::resource(Leasing::class),
                MenuItem::resource(ServiceFee::class),
            ])->icon('paper-clip')->collapsible(),

            MenuSection::make('Calendar', [
                MenuItem::make('Calendar')->path('/wdelfuego/nova-calendar'),
                MenuItem::resource(AmenitySchedule::class),
                MenuItem::resource(ScheduleViewing::class),
            ])->icon('calendar')->collapsible(),

            MenuSection::make('Application', [
                MenuItem::resource(\App\Nova\Application::class),
                MenuItem::resource(\App\Nova\Question::class),
            ])->icon('document-add')->collapsible(),

            MenuSection::make('Amenity', [
                MenuItem::resource(Amenity::class),
            ])->icon('clipboard-list')->collapsible(),

            MenuSection::make('Email', [
                MenuItem::resource(\KirschbaumDevelopment\NovaMail\Nova\NovaMailEvent::class),
                MenuItem::resource(\KirschbaumDevelopment\NovaMail\Nova\NovaMailTemplate::class),
                MenuItem::resource(\KirschbaumDevelopment\NovaMail\Nova\NovaSentMail::class),
            ])->icon('at-symbol')->collapsible(),

            MenuSection::make('Contact', [
                MenuItem::resource(\App\Nova\Prospect::class),
                MenuItem::resource(\App\Nova\Contractor::class),
            ])->icon('phone')->collapsible(),

            $this->getUserMenuByRole(),

        ];

        ////Super Admin and app manager
        /*if (auth()->user()->hasAnyRole(config('roles-permissions'))) {

            $contacts = MenuSection::make('Contacts', [
                MenuItem::resource(Prospect::class),
            ])->icon('annotation')->collapsible();

            $users = MenuItem::make('Users')->path('/resources/users');

            $permissions = MenuItem::make('Permisssions')
                ->path('/resources/permissions');

            $roles = MenuItem::make('Roles')
                ->path('/resources/roles');

            $userMenuSection = MenuSection::make('Users', [
                $users,
                $permissions,
                $roles
            ])->icon('users')
            ->collapsible();

            array_push($menuSections, $contacts);
            array_push($menuSections, $userMenuSection);
        }*/

        return $menuSections;
    }

    private function getUserMenuByRole()
    {

        if (auth()->user()->hasAnyRole(config('roles-permissions'))) {

            $users = MenuItem::make('Users')->path('/resources/users');

            $permissions = MenuItem::make('Permisssions')
                ->path('/resources/permissions');

            $roles = MenuItem::make('Roles')
                ->path('/resources/roles');

            $userMenuSection = MenuSection::make('Users', [
                $users,
                $permissions,
                $roles
            ])->icon('users')
                ->collapsible();

            return $userMenuSection;
        }

        return MenuSection::make('Users', [
            MenuItem::resource(\App\Nova\User::class),
        ])->icon('users')->collapsible();
    }
}
