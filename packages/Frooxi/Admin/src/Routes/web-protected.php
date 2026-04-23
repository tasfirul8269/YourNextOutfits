<?php

use Frooxi\Core\Http\Middleware\NoCacheMiddleware;
use Illuminate\Support\Facades\Route;

/**
 * Protected admin routes (require authentication).
 */
Route::group(['middleware' => ['admin', NoCacheMiddleware::class], 'prefix' => config('app.admin_url')], function () {
    /**
     * Sales routes.
     */
    require 'sales-routes.php';

    /**
     * Catalog routes.
     */
    require 'catalog-routes.php';

    /**
     * Customers routes.
     */
    require 'customers-routes.php';

    /**
     * Marketing routes (On Hold).
     */
    // require 'marketing-routes.php';

    /**
     * CMS routes (REMOVED).
     */
    // require 'cms-routes.php';

    /**
     * Reporting routes (REMOVED).
     */
    // require 'reporting-routes.php';

    /**
     * Settings routes.
     */
    require 'settings-routes.php';

    /**
     * Storefront routes.
     */
    require 'storefront-routes.php';

    /**
     * Configuration routes.
     */
    require 'configuration-routes.php';

    /**
     * Remaining routes.
     */
    require 'rest-routes.php';
});
