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
    php artisan make:seeder PlanSeeder
    php artisan db:seed --class=PlanSeeder

