# Welcome to PropsManager

-   Admin panel for users:

    -   Apartement Properties
        -   id
        -   name
        -   total_floors
        -   number_of_units
        -   has_fitness_center
        -   has_swimming_pool
        -   has_laundry
        -   has_wheelchair_accessibilty
        -   has_intercom_facility
        -   has_power_backup
        -   has_main_door_security
        -   number_of_elevators
        -   street_name
        -   city_name
        -   state_name
        -   county_name
        -   zip_code
        -   phone
        -   photos
    -   units:
        -   id
        -   unit_heading
        -   unit_type_id (hasOne)
        -   number_of_bedroom
        -   number_bathroom
        -   number_of_balcony
        -   leasing_info_id ( hasOne )
        -   date_of_posting
        -   date_available_from
        -   posted_by
        -   is_active
        -   unit_desription
        -   carpet_area
        -   unit_number
        -   unit_floor_number
        -   proberty_id (hasOne)
        -   photos
    -   unit_type
        -   id
        -   unit_type
    -   maintenance
        -   title
        -   property
        -   maintenance_category_id
        -   requested_by
        -   status ( New, In-Progress, Resolved, Closed, Cancelled)
        -   description
        -   assigned_to
        -   priority ( Low, Normal, High, Critical)
        -   due_date
        -   preferred_maintenece_time
        -   start_due_date
        -   frequency (Daily, Weekly, Bi-Weekly, Monthly, Quarterly, Yearly, Semi-Annual)
        -   finished
    -   maintenance_category

        -   name
        -   sub_type
        -   notes

    ## Roles and permissions

    -   super admin
        -   app manager
        -   contact ( plumers cleaner electris.....)
    -   property owner
        -   property managers
            -   sales
            -   tenant ( pay bill, sign lease)
            -   contact ( plumers cleaner electris.....)

    ### our advantage to be better than others:

    -   contact service pro
    -   accounting
    -   managing units and websites

    # setup line commands just to remember for later:

    `php artisan make:policy UnitPolicy -m Unit`
    `php artisan db:seed --class=PermissionsSeeder`
