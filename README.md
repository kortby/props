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
        - Fix Amenities permission view. ---fixed just change seeder
        - Fixing leasing creation --fixed just look at fees water
        - Display furnitures on unit view -- later
        - Fix amenities renter on small screen
        - how to get auth-user unit-number on requesting maintenance --- fixed
        - Adding more filters to prospects and contractors -- later
        - Fix contractors and prospects permission.
        - building an easy rental payment plus late fees and expenses