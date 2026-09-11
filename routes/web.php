    <?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\LeadController;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\SitemapController;
    use App\Http\Controllers\TechTypeController;
    use App\Http\Controllers\WebPagesController;
    use App\Http\Controllers\ClientLogoController;
    use App\Http\Controllers\TeamMemberController;
    use App\Http\Controllers\TechnologyController;
    use App\Http\Controllers\Admin\AdminController;
    use App\Http\Controllers\MainServiceController;
    use App\Http\Controllers\ProjectImageController;
    use App\Http\Controllers\ServiceReviewController;
    use App\Http\Controllers\WebHeaderLinkController;
    use App\Http\Controllers\WebsiteSettingController;
    use App\Http\Controllers\HomeHeroSectionController;
    use App\Http\Controllers\ServiceCategoryController;
    use App\Http\Controllers\packages\PackageController;
    use App\Http\Controllers\locations\LocationController;
    use App\Http\Controllers\packages\PackageFormController;
    use App\Http\Controllers\HomeControllers\HomeMetaController;
    use App\Http\Controllers\packages\PackageCategoryController;
    use App\Http\Controllers\HomeControllers\HomeFaqSecController;
    use App\Http\Controllers\HomeControllers\HomeContentController;
    use App\Http\Controllers\HomeControllers\WhyChooseUsController;
    use App\Http\Controllers\packages\PkgCategoryContentController;
    use App\Http\Controllers\HomeControllers\HomeTabContentController;
    use App\Http\Controllers\HomeControllers\HomeSliderContentController;
    use App\Http\Controllers\HomeControllers\CompanySpecializingController;
    use App\Http\Controllers\service_form_controller\ServiceFormController;
    use App\Http\Controllers\ProposalController;
    use App\Http\Controllers\BlogController;
    use App\Http\Controllers\BlogCommentController;
    use App\Http\Controllers\BlogCategoryController;


    // Admin routes
    Route::get('/sitemap.xml', [SitemapController::class, 'generateSitemap'])->name('sitemap');


    Route::get('/storage-link', function () {
        Artisan::call('storage:link');
        return 'Storage link created!';
    });

    Route::middleware('auth')->prefix('admin')->group(function () {
        Route::get('/panel', function () {
            return view('admin_panel.index');
        })->name('admin.panel'); // naming the route here

        Route::get('/proposals', [ProposalController::class, 'index'])->name('admin.proposals.index');
        Route::post('/proposals/{proposal}/status', [ProposalController::class, 'updateStatus'])->name('admin.proposals.updateStatus');
        Route::get('/proposals/{proposal}', [ProposalController::class, 'show'])->name('admin.proposals.show');

        Route::post('service/autosave', [MainServiceController::class, 'autosaveDraft'])->name('service.autosave');
        Route::delete('service/draft/{draftUuid}', [MainServiceController::class, 'destroyDraft'])->name('service.draft.destroy');
        Route::resource('service', MainServiceController::class);

        Route::resource('categories', ServiceCategoryController::class);
        Route::resource('team', TeamMemberController::class);
        Route::resource('web_pages', WebPagesController::class);
        Route::resource('reviews', ServiceReviewController::class);
        Route::resource('project-images', ProjectImageController::class);
        Route::resource('home_hero_section', HomeHeroSectionController::class);
        Route::resource('clients', ClientLogoController::class);
        Route::resource('home-page', HomeController::class);
        Route::resource('web-header-links', WebHeaderLinkController::class);
        Route::prefix('settings')->group(function () {
            Route::resource('website-settings', WebsiteSettingController::class);
        });


        Route::prefix('company-specializing')->group(function () {
            Route::get('/', [CompanySpecializingController::class, 'index'])->name('company.specializing.index');
            Route::post('/store', [CompanySpecializingController::class, 'store'])->name('company.specializing.store');
            Route::put('/update', [CompanySpecializingController::class, 'update'])->name('company.specializing.update');
            Route::delete('/destroy/{id}', [CompanySpecializingController::class, 'destroy'])->name('company.specializing.destroy');
        });


        Route::prefix('why-choose-us')->group(function () {
            Route::get('/', [WhyChooseUsController::class, 'index'])->name('whychooseus.index');
            Route::post('/store', [WhyChooseUsController::class, 'store'])->name('whychooseus.store');
            Route::put('/update', [WhyChooseUsController::class, 'update'])->name('whychooseus.update');
            Route::delete('/delete/{id}', [WhyChooseUsController::class, 'destroy'])->name('whychooseus.destroy');
        });

        Route::get('/homecontent/main-content', [HomeContentController::class, 'index'])->name('homecontent.index');
        Route::post('/homecontent/store', [HomeContentController::class, 'store'])->name('homecontent.store');
        Route::put('/homecontent/{id}/update', [HomeContentController::class, 'update'])->name('homecontent.update');
        Route::delete('/homecontent/{id}/destroy', [HomeContentController::class, 'destroy'])->name('homecontent.destroy');

        Route::prefix('home/tab-content')->name('home.tab.content.')->group(function () {
            Route::get('/', [HomeTabContentController::class, 'index'])->name('index');
            Route::post('/store', [HomeTabContentController::class, 'store'])->name('store');
            Route::put('/update', [HomeTabContentController::class, 'update'])->name('update');
            Route::delete('/{id}', [HomeTabContentController::class, 'destroy'])->name('destroy');
        });


        Route::prefix('home/faq-section')->name('home.faq.')->group(function () {
            Route::get('/', [HomeFaqSecController::class, 'index'])->name('index');
            Route::post('/store', [HomeFaqSecController::class, 'store'])->name('store');
            Route::put('/update', [HomeFaqSecController::class, 'update'])->name('update');
            Route::delete('/{id}', [HomeFaqSecController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('update-seo')->group(function () {
            Route::get('/home-meta', [HomeMetaController::class, 'index'])->name('homeMeta.index');
            Route::post('/home-meta', [HomeMetaController::class, 'store'])->name('homeMeta.store');
            Route::put('/home-meta/{homeMeta}', [HomeMetaController::class, 'update'])->name('homeMeta.update');
        });


        // Home Slider Content Routes
        Route::prefix('homeslidercontent')->group(function () {
            Route::get('/', [HomeSliderContentController::class, 'index'])->name('homeslidercontent.index'); // View the form
            Route::match(['POST', 'PUT'], '/storeOrUpdate', [HomeSliderContentController::class, 'storeOrUpdate'])->name('homeslidercontent.storeOrUpdate');
            Route::delete('/destroy', [HomeSliderContentController::class, 'destroy'])->name('homeslidercontent.destroy'); // Delete slider content
        });

        Route::prefix('packages-category')->group(function () {
            Route::get('/', [PackageCategoryController::class, 'index'])->name('packages.category.index'); // Show category list
            Route::post('/store', [PackageCategoryController::class, 'store'])->name('packages.category.store'); // Add category
            Route::get('/edit/{id}', [PackageCategoryController::class, 'edit'])->name('packages.category.edit'); // Get category for editing
            Route::put('/update/{id}', [PackageCategoryController::class, 'update'])->name('packages.category.update');        // Update category
            Route::delete('/delete/{id}', [PackageCategoryController::class, 'destroy'])->name('packages.category.delete'); // Delete category
        });


        Route::prefix('package-service')->group(function () {
            Route::get('/packages/create', [PackageController::class, 'create'])->name('service.packages.create');
            Route::get('/packages/edit/{id}', [PackageController::class, 'edit'])->name('service.packages.edit'); // Change 'create' to 'edit'
            Route::post('/packages/store', [PackageController::class, 'store'])->name('service.packages.store');
            Route::put('/packages/update/{id}', [PackageController::class, 'update'])->name('service.packages.update'); // Add the update route
            Route::get('/packages', [PackageController::class, 'index'])->name('service.packages.index');
            Route::delete('/packages/{id}', [PackageController::class, 'destroy'])->name('service.packages.destroy');
        });


        Route::prefix('packages-category')->group(function () {
            Route::get('/add-content', [PkgCategoryContentController::class, 'create'])->name('pkg.cat.content.create');
            Route::get('/get-category-content/{categoryId}', [PkgCategoryContentController::class, 'fetchCategoryContent']);
            Route::post('/store-content', [PkgCategoryContentController::class, 'store'])->name('pkg.cat.content.store');
            Route::get('/get-category-content/{id}', [PkgCategoryContentController::class, 'getCategoryContent'])->name('pkg.cat.content.delete');
        });

       Route::get('/locations', [LocationController::class, 'index'])
            ->name('locations.index');

        Route::get('/locations/create', [LocationController::class, 'create'])
            ->name('locations.create');

        Route::post('/locations', [LocationController::class, 'store'])
            ->name('locations.store');

        Route::delete('/locations/delete/{id}', [LocationController::class, 'destroy'])
            ->name('locations.destroy');

        Route::delete('locations/delete/{id}', [LocationController::class, 'destroy'])->name('locations.destroy');

        Route::get('inquiries/{id}', [PackageFormController::class, 'showInquiryDetails'])->name('admin.inquiries.view');
        Route::get('inquiries/{id}/download-pdf', [PackageFormController::class, 'downloadPdf'])->name('inquiry.downloadPdf');
        Route::get('inquiries', [PackageFormController::class, 'showAllInquiries'])->name('admin.inquiries.index');

    // User management routes (only accessible by super admin)
            Route::middleware([\App\Http\Middleware\CheckSuperAdmin::class])->group(function () {
                Route::get('users', [AdminController::class, 'index'])->name('index.users');
                Route::get('add-user', [AdminController::class, 'create'])->name('admin.add-user-form');
                Route::post('add-user', [AdminController::class, 'store'])->name('admin.add-user');
                Route::get('edit-user/{id}', [AdminController::class, 'edit'])->name('admin.edit-user');
                Route::put('admin/update-user/{id}', [AdminController::class, 'update'])->name('admin.update-user');
                Route::delete('delete-user/{id}', [AdminController::class, 'destroy'])->name('admin.delete-user');
            });

            Route::resource('tech_types', TechTypeController::class);
            Route::resource('technologies', TechnologyController::class);

        Route::post('blog/autosave', [BlogController::class, 'autosaveDraft'])->name('blog.autosave');
        Route::post('blog/upload-image', [BlogController::class, 'uploadEditorImage'])->name('blog.upload-image');
        Route::resource('blog-categories', BlogCategoryController::class)->except(['show']);
        Route::resource('blog', BlogController::class)->except(['show']);

         Route::prefix('blog-comments')->name('admin.blog-comments.')->group(function () {
            Route::get('/', [BlogCommentController::class, 'index'])->name('index');
            Route::post('/{comment}/status', [BlogCommentController::class, 'updateStatus'])->name('updateStatus');
            Route::delete('/{comment}', [BlogCommentController::class, 'destroy'])->name('destroy');
        });
        


        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });



    // routes/web.php
    // Route::get('/send-test-email', function () {
    //     Mail::to('digitalpartner56@gmail.com')->send(new TestEmail());

    //     return 'Email sent successfully!';
    // });

    // Email verification routes
    // Route to show the email verification prompt
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');


    // Resend the verification link if needed
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');




    Route::get('category/{cat_slug}', [ServiceCategoryController::class, 'catServices'])->name('cat_show_services.show');
    // Routes requiring login (authentication)
    Route::get('/page/{slug}', [WebPagesController::class, 'show'])->name('header_web_page.show');

    Route::get('/', [HomeController::class, 'showContent'])->name('home');
    Route::get('/admin-panel/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');


    Route::get('/quote/now', [ServiceFormController::class, 'showForm'])->name('serviceform.show');
    Route::post('/service-form/store', [ServiceFormController::class, 'store'])->name('service-form.store');

    // More specific routes should come first
    Route::get('service/{category_slug}/{service_slug}', [MainServiceController::class, 'show'])->name('header_service.show');

    Route::get('/team/members', [TeamMemberController::class, 'showTeam'])->name('showTeam');

    Route::get('/our/clients', [ClientLogoController::class, 'showClients'])->name('show_clients');

    Route::get('/pricing/{pkg_cat}/{city?}', [PackageController::class, 'showPkg'])
        ->where(['pkg_cat' => '[a-z0-9\-]+', 'city' => '[a-z0-9\-]*'])
        ->name('show_pkg');

    Route::get('/trigger-500', function () {
        abort(500);  // This will trigger the 500 error page
    });


    Route::post('/proposals/store', [ProposalController::class, 'store'])->name('proposals.store');


    Route::get('/reviews/testimonials', [ServiceReviewController::class, 'showReviews'])->name('show_reviews');

    Route::post('/pkg-inquery/submit', [PackageFormController::class, 'pkgFormSubmit'])->name('pkg.form.submit');

    // Contact Us Page Route
    Route::get('/contact-us', function () {
        return view('contact_us');
    })->name('contact_us');



    Route::get('/pricing', [PackageController::class, 'pricingIndex'])
        ->name('pricing.index');

    Route::get('/blog/{slug}', [BlogController::class, 'show'])
    ->where('slug', '[a-z0-9\-]+')
    ->name('blog.show');

    // 3) PUBLIC route — add this near your other public blog routes
    //    (next to Route::get('/blog/{slug}', ...)->name('blog.show')):
 
Route::post('/blog-comments/{blog}', [BlogCommentController::class, 'store'])
    ->name('blog.comments.store');