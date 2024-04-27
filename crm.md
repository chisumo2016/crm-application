#   CRM APPLICATION
    - Installation with jetstream

# CHANGE THE WELCOME PAGE
    . Nav bar
    . Hero section

# ROUTE CHANGES
    https://laravel.com/docs/11.x/routing#main-content
# CREATE MODEL VIEW  CONTROLLER
            https://laravel.com/docs/11.x/migrations#main-content
        php artisan make:model Lead -mrc

# CREATE VALIDATE  READ /LIST
        https://laravel.com/docs/11.x/validation

# EDIT , DELETE 
    <a href="{{ route('leads.edit', $lead->id ) }}">Edit</a>
    <a href="{{ route('leads.edit', ['id' => $lead->id] ) }}">Edit</a>
    <a href="{{ route('leads.edit', ['lead' => $lead->id] ) }}">Edit</a>

# ER DIAGRAM FOR Saas CRM
    users
        .id
        .name
        .email
    business_user
        bussinessId
        userId
    business
        .id
         .name
         .planId

    Roles  
        .id
        .name
    user_role
        .id
        .userId
        .roleId
    permissions
        .id
        .name
    plans
        .name
        .features
        .price
        .id
    
    permission_plan
        .id
        .planeId
        .permissionId   
    permission_role
        .id
        .roleId
        .permissionId
    
# SAAS PLANS SEEDER MIGRATION , VIEW
    php artisan make:model Plan -mrc
    php artisan migrate
    php artisan make:seeder PlanSeeder
    php artisan db:seed --class=PlanSeeder

# LIVEWIRE COMPOONENT FOR PLAN
    php artisan make:livewire plans.pricing

# LIVEWIRE EVENTS AND MODAL
    https://livewire.laravel.com/docs/events
    php artisan make:livewire business.register
    https://jetstream.laravel.com/stacks/livewire.html
    https://livewire.laravel.com/docs/events#dispatching-events

# REGISTER STEPS LIVEWIRE WIZARD 
    UII
# REGISTER  VALIDATIONS  FOR BUSINESS /USER 
    Validation each steps 

# BUSINESS  USER SIGUP MODEL MIGRATION RELATION
    php artisan make:model Business -m
    php artisan make:migration create_business_user_pivot_table
    php artisan make:model Role -m
    php artisan make:model Permission -m
        

    modified:   app/Livewire/Business/Register.php
	modified:   app/Models/Plan.php
	modified:   app/Models/User.php

    app/Models/Business.php
	app/Models/Permission.php
	app/Models/Role.php
	database/migrations/2024_04_23_161827_create_businesses_table.php
	database/migrations/2024_04_23_183253_create_roles_table.php
	database/migrations/2024_04_23_183343_create_permissions_table.php

# ROLES PERMISSION
    USERS
    id      name    
    1       John        
    2       ben         

    ROLES
    id      name        business_id
    1       admin           1

    ROLE_USER
    id      role_id  user_id
    1           1        2


    BUSINESS
    id      name        plan_id
    1       IT              2
    2       CYBER           2

      BUSINESS_USER
    id     user_id        business_id
    1       2                    2

    PERMISSION
    id      name  
    1       Test1  
    2       Test2 

    PERMISSION_ROLE
    id      role_id  permission_id
    1           1        1
    2           2        2

    

# ROLES AND  PERMISSION
    1: check permission on blade ON PARTICULAR  USER
         @can('test')
                test
          @endcan

    user has roles()
    Add authServiceProvider

        //dd($this->roles->map->permissions->flatten()->pluck('name')->unique());
        //dd($this->roles->map->permissions);
        //dd($this->roles);

#  PLANS AND PERMISSIONS

    
# MAIL INVITE USER , FORGOT PASSWORD
    php artiisan make:mail  InviteUser
    php artisan make:livewire business.invite

    modified:   resources/views/dashboard.blade.php
    app/Livewire/Business/Invite.php
	app/Mail/InviteUser.php
	resources/views/livewire/business/invite.blade.php
	resources/views/mails/

# LIVEWIRE  ALERT
    mail is sent
    https://github.com/jantinnerezo/livewire-alert

# HONEYPOT WITH JETSTREAM , LIVEWIRE
    https://github.com/spatie/laravel-honeypot
    - Add middleware  in register

        modified:   app/Actions/Fortify/CreateNewUser.php
        modified:   app/Livewire/Business/Register.php
        modified:   composer.json
        modified:   composer.lock
        modified:   crm.md
        modified:   resources/views/auth/register.blade.php
        modified:   resources/views/livewire/business/register.blade.php

# MIDDLEWARE TO SELECT BUSINESS
    https://laravel.com/docs/11.x/middleware#main-content
     https://laravel.com/docs/11.x/middleware#defining-middleware   
    php artisan make:middleware SelectBusiiness
        modified:   app/Actions/Fortify/CreateNewUser.php
        modified:   app/Livewire/Business/Register.php
        modified:   app/Providers/AppServiceProvider.php
        modified:   crm.md
        modified:   resources/views/livewire/business/register.blade.php
        modified:   routes/web.php
    
         app/Http/Middleware/

# SESSION TOO SWITCH BUSINESS
    https://laravel.com/docs/11.x/session#interacting-with-the-session
    https://laravel.com/docs/11.x/session#storing-data

    php artisan make:livewire business.select

            if($user->businesses->isNotEmpty() && $user->businesses[0]->plan->permissions->flatten()->pluck('name')->unique()->contains($permission)) {
                return $user->permissions()->contains($permission);

            }else{
                //abort('403', 'This feature not available');
                return  false;
            }

    modified:   app/Http/Middleware/SelectBusiness.php
	modified:   app/Providers/AppServiceProvider.php
	modified:   crm.md
	modified:   resources/views/dashboard.blade.php
	modified:   resources/views/layouts/guest.blade.php

    app/Livewire/Business/Select.php
	resources/views/livewire/business/select.blade.php

# GLOBAL SCOPE FOR BUSINESS
    https://laravel.com/docs/11.x/eloquent#global-scopes
    php artisan make:scope BusinessScope

         modified:   app/Models/Role.php
        modified:   app/Providers/AppServiceProvider.php
        modified:   crm.md
        modified:   resources/views/dashboard.blade.php
        modified:   resources/views/livewire/business/select.blade.php

        app/Models/Scopes/

# GIT REPOSIITORY PROJECT
    - Add into github

     Main   -  development
        branch -  featured
        release -
        production -

# LEFT  SIDEBAR RESPONSIVE  admin1234
    - Add left bar to our appplicatiin
            modified:   resources/views/layouts/app.blade.php

# MOBILE NAVIGATION MENU
    php artisan make:livewire sidebar
     app/Livewire/Sidebar.php
	 resources/views/livewire/sidebar.blade.php
    modified:   resources/views/layouts/app.blade.php

# SUBMENU NAV LINKS USING ALPINE  JS
        app/Livewire/Sidebar.php
	resources/views/livewire/sidebar.blade.php

# SECURITY SERVER SIDE VALIDATION
    Register business validation
    set session to business check first

    modified:   app/Livewire/Business/Register.php
	modified:   app/Livewire/Business/Select.php
	modified:   crm.md
     modified:   resources/views/livewire/business/register.blade.php

# CRUD LIVEWIRE FOR ROLES
    https://livewire.laravel.com/docs/components#layout-files
    - Roles for businness
        php artisan make:livewire business.roles
    - Livewire can be used as a page .
    -Publishing the configuration file
        php artisan livewire:publish --config
    https://livewire.laravel.com/docs/pagination#basic-usage
            modified:   routes/web.php
            app/Livewire/Business/Roles.php
	        config/livewire.php
	        resources/views/livewire/business/roles.blade.php





    

































    
