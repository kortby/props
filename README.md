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
        -   property agent
    ###  Company
       -  only the company-owner can see Only
       -  property-manager can not see Company
       -  super-admin can see Company and edit
    ### Property
      - company-owner can create his Properties
      - property-manager can NOT see or edit Properties
      - property-agent can NOT see or edit Properties
    ### Units
      - company-owner can create and edit his own units
      - property-manager can create and edit on the property he works at
      - property-agent can see only on the property he works at
    ### Maintenance 
      - company-owner can see and edit his own
      - property-manager can see and edit on the property he works at
      - property-agent can see only on the property he works at
    ### Amenities
      - company-owner can see and edit and schedule for his own property
      - property-manager can see and edit and schedule on the property he works at
      - property-agent can see, NOT edit, but he can and schedule on the property he works at
    ### Furnitures
      - company-owner can create and edit his own
      - property-manager can create and edit on the property he works at
      - property-agent can see only on the property he works at
    ### Features  of a unit
      - company-owner can create and edit his own
      - property-manager can create and edit on the property he works at
      - property-agent can see only on the property he works at
    ### Leasing / service fee
      - company-owner can create and edit his own
      - property-manager can create and edit on the property he works at
      - property-agent can see only on the property he works at
    ### Prospects
      - company-owner can create and edit his own
      - property-manager can create and edit on the property he works at
      - property-agent can see only on the property he works at
    
    ### Contractors
      - company-owner See all and add to all
      - property-manager See all and add to all
      - property-agent can see only all
    ### our advantage to be better than others:

    -   contact service pro
    -   accounting
    -   managing units and websites

    # setup line commands just to remember for later:

    `php artisan migrate:fresh --seed `


    ## To do
    - unit feature under unit
    - application : upload file system
    - email system to communicate 
