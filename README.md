1. Project setup complete
> install laravel-> breeze intall -> vue with inertia
2. Homepage creation:
    i. Controller: HomeController create
    ii. Route: home route create
    iii. write function within HomeController
    iv. vue.JS: Home/Homepage
3. Admin and User Dashboard create
    i. Controller Create: Controllers -> Admin -> AdminController and 
                          Controllers -> User -> UserController

    ii. Route Create: route url: "/admin/dashboard"
                             and "/user/daashboard"

    iii. admin and user dashboard page create: Vue file create
    
4. i. Edit user model and migration: role add: $table->enum('role', ['admin','user'])->default('user');
                                     rollback command: php artisan migrate:rollback

                                    set admin in the database manually
5. middleware create: php artisan make:middleware role
                    public function handle(Request $request, Closure $next, $role): Response
    {
        if($request ->user()->role !== $role){
            return redirect('/');
           }
           return $next($request); 
    }

    bind middleware in web.php: 
    Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get("/admin/dashboard", [AdminController::class, "adminDashboard"])->name("admin.dashboard");


});

Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get("/user/dashboard", [UserController::class, "UserDashboard"])->name("user.dashboard");


});

BIND MIDDLEWARE IN BOOTSTRAP app.php

->alias([
            'role'=> role::class
        ]);;


    AauthinticatedSessionController









                