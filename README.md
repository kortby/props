# Welcome to PropsManager

-   Admin panel for users:

    -   Apartement Properties
    -   units:
    -   unit_type
    -   maintenance
    -   maintenance_category

    ## Roles and permissions

    -   super admin
        - can create Company owner
        - can access prospects
   
    -   property owner ( can edit all)
        -   property managers
            -   sales
            -   tenant ( pay bill, sign lease)
            -   contact ( plumers cleaner electris.....)

    ### our advantage to be better than others:

    -   contact service pro
    -   accounting
    -   managing units and websites

    # setup line commands just to remember for later:

    `php artisan migrate:fresh --seed `


    ## To do
        - Amenities shoud have a relationship with property some are rentable some are Not.
        - build a contact with contractors data with thier W9
          - eviction lawyers
          - plummers
          - electrisitans ..
        - building an easy rental payment plus late fees and expenses