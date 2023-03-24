<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Middleware\RedirectIfAuthenticated;

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\AdminUserController;

use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeBlogController;

use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CompareController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\OnlinePaymentController;

use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\Frontend\ShopController;
use App\Models\Cart;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Auth\FacebookController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Role;


// Vendor controllers
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorOrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

require __DIR__.'/auth.php';

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware('throttle:3,1');
Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login')->middleware('throttle:3,1');
Route::get('/become/vendor', [VendorController::class, 'BecomeVendor'])->name('become.vendor');
Route::post('/vendor/register', [VendorController::class, 'VendorRegister'])->name('vendor.register');


// start Middleware Admin
Route::middleware(['auth','role:admin'])->group(function(){

// Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
//     return view('admin.index');
// })->name('dashboard')->middleware('auth:admin');
//Admin-related routes
Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
Route::get('/admin/calendar', [AdminProfileController::class, 'AdminCalendar'])->name('admin.calendar');




});

Route::middleware(['auth','role:admin'])->group(function() {

Route::controller(AdminController::class)->group(function(){
    Route::get('/inactive/vendor' , 'InactiveVendor')->name('inactive.vendor');
    Route::get('/active/vendor' , 'ActiveVendor')->name('active.vendor');

    Route::get('/inactive/vendor/details/{id}' , 'InactiveVendorDetails')->name('inactive.vendor.details');
    Route::post('/active/vendor/approve' , 'ActiveVendorApprove')->name('active.vendor.approve');
    Route::get('/active/vendor/details/{id}' , 'ActiveVendorDetails')->name('active.vendor.details');
    Route::post('/inactive/vendor/approve' , 'InActiveVendorApprove')->name('inactive.vendor.approve');

//ADMIN Brand-related routes
Route::prefix('brand')->group(function(){
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');

}); //end brand routes

// Admin Category all Routes
Route::prefix('category')->group(function(){
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
    // Admin Sub Category All Routes
    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
    // Admin Sub->Sub Category All Routes
    Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
    Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
    }); //end category routes


//ADMIN Product-related routes




    Route::prefix('product')->group(function(){

    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');
    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
    Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
    Route::post('/thumbnail/update', [ProductController::class, 'ThumbnailImageUpdate'])->name('update-product-thumbnail');
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
}); //end product routes

// Admin Slider All Routes

    Route::prefix('slider')->group(function(){

    Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');

    Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
}); //end slider routes


// Admin Coupons All Routes

Route::prefix('coupons')->group(function(){

    Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');
    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
    Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');


});

// Admin Shipping All Routes

Route::prefix('shipping')->group(function(){

    // Ship Division
    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');

    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');

    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');

    Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');

    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');

    // Ship District
    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');

    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');

    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');

    Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');

    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');

    // Ship State
    Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('manage-state');

    Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');

    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');

    Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');

    Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');

});


   // Admin Manage Review Routes
   Route::prefix('review')->group(function(){

    Route::get('/pending', [ReviewController::class, 'PendingReview'])->name('pending.review');

    Route::get('/admin/approve/{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');

    Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');

    Route::get('/publish', [ReviewController::class, 'PublishReview'])->name('publish.review');


    });


    // Admin Manage Stock Routes
    Route::prefix('stock')->group(function(){

    Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');


    });


 // Admin Order All Routes
 Route::prefix('orders')->group(function(){
    Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');
    Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');
    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');
    Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');
    Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');
    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');
    Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');
    Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');

    // Update Status
    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');
    Route::get('/reject/orders/{order_id}', [OrderController::class, 'RejectOrders'])->name('reject-orders');
    Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');
    Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');
    Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');
    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');
    Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');

    });

    // Admin Reports Routes
    Route::prefix('reports')->group(function(){

    Route::get('/view', [ReportController::class, 'ReportView'])->name('all-reports');

    Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');

    Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');

    Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');


    });


    // Admin Get All User Routes
    Route::prefix('alluser')->group(function(){

    Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');


    });


    // Admin Blog category Routes
    Route::prefix('blog')->group(function(){

    Route::get('/category', [BlogController::class, 'BlogCategory'])->name('blog.category');

    Route::post('/store', [BlogController::class, 'BlogCategoryStore'])->name('blogcategory.store');

    Route::get('/category/edit/{id}', [BlogController::class, 'BlogCategoryEdit'])->name('blog.category.edit');


    Route::post('/update', [BlogController::class, 'BlogCategoryUpdate'])->name('blogcategory.update');

    // Admin View Blog Post Routes

    Route::get('/list/post', [BlogController::class, 'ListBlogPost'])->name('list.post');

    Route::get('/add/post', [BlogController::class, 'AddBlogPost'])->name('add.post');

    Route::post('/post/store', [BlogController::class, 'BlogPostStore'])->name('post-store');



    //< added routes

    Route::get('/post/edit/{id}', [BlogController::class, 'BlogPostEdit'])->name('blogpost.edit');

    Route::post('/post/update/{id}', [BlogController::class, 'BlogPostUpdate'])->name('blogpost.update');

    Route::get('/delete/post/{id}', [BlogController::class, 'BlogPostDelete'])->name('blogpost.delete');

    //added routes />




    });



       // Admin Site Setting Routes
       Route::prefix('setting')->group(function(){

        Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');

        Route::post('/site/update', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');

        Route::get('/seo', [SiteSettingController::class, 'SeoSetting'])->name('seo.setting');

        Route::post('/seo/update', [SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seosetting');

        });


        // Admin Return Order Routes
        Route::prefix('return')->group(function(){

        Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return.request');

        Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');

        Route::get('/admin/return/view/{order_id}', [ReturnController::class, 'ReturnRequestView'])->name('return.view');

        Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');

        });




           // Admin User Role Routes
    Route::prefix('adminuserrole')->group(function(){

        Route::get('/all', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');

        Route::get('/add', [AdminUserController::class, 'AddAdminRole'])->name('add.admin');

        Route::post('/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');

        Route::get('/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');

        Route::post('/update', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');

        Route::get('/delete/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');

        });


        Route::get('/delete/user/{id}', [AdminProfileController::class, 'DeleteUser'])->name('delete.user');


});  // end Middleware admin

});



// Route::middleware(['auth:user'])->group(function(){

// });



//User-related routes

// Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
//     $id = Auth::user()->id;
//     $user = User::find($id);
//     return view('dashboard',compact('user'));

// })->name('dashboard');          //GO TO DASHBOARD AFTER SIGN IN

Route::get('/', [IndexController::class, 'index']); //GO TO HOME PAGE
Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [IndexController::class, 'UserDashboard'])->name('dashboard');

Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');
}); // Gorup Milldeware End





// SOCIAL LOGIN ROUTES
/** GOOGLE **/
Route::get('login/google', [IndexController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [IndexController::class, 'handleGoogleCallback']);

/** FACEBOOK **/
Route::get('login/facebook', [IndexController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [IndexController::class, 'handleFacebookCallback']);

/** GITHUB **/
Route::get('login/github', [IndexController::class, 'redirectToGithub'])->name('login.github');
Route::get('login/github/callback', [IndexController::class, 'handleGithubCallback']);

/** Twitter **/
Route::get('login/twitter', [IndexController::class, 'redirectToTwitter'])->name('login.twitter');
Route::get('login/twitter/callback', [IndexController::class, 'handleTwitterCallback']);



Route::get('/auth/facebook/redirect', [FacebookController::class, 'handleFacebookRedirect']);



Route::get('/contact', [IndexController::class, 'ContactPage']);
Route::get('/about', [IndexController::class, 'AboutPage']);
Route::get('/help', [AllUserController::class, 'HelpCenter']);


// Front-end related routed
// Multi Language All Routes

Route::get('/language/filipino', [LanguageController::class, 'Filipino'])->name('filipino.language');

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');

//end language routes




// Frontend Product Details Page url
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

// Frontend Product Tags Page
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);

// Frontend SubCategory wise Data
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);

// Frontend Sub-SubCategory wise Data
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);

// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

// Add to Cart Store Data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
Route::post('/dcart/data/store/{id}', [CartController::class, 'AddToCartDetails']);


// Get Data from mini cart
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

// Remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// Add to Wishlist
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);

// Add to Compare
Route::post('/add-to-compare/{product_id}', [CartController::class, 'AddToCompare']);


// Wishlist page
//  User Must Login

Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){


Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');

Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

// COMPARE PAGE
Route::get('/compare', [CompareController::class, 'ViewCompare'])->name('compare');
Route::get('/get-compare-product', [CompareController::class, 'GetCompareProduct']);
Route::get('/compare-remove/{id}', [CompareController::class, 'RemoveCompareProduct']);

//STRIPE

Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');

// COD

Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');

// ANCHOR Online payment
Route::post('/online/order', [OnlinePaymentController::class, 'OnlineOrder'])->name('online.order');





//My Orders (AllUserController Routes)

Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');

Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);

Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);

Route::post('/return/order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');

Route::get('/cancel/order/{order_id}', [AllUserController::class, 'CancelOrder'])->name('cancel.order'); //new

Route::get('/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');

Route::get('/cancel/orders/list', [AllUserController::class, 'CancelOrderList'])->name('cancel.orders.list'); //new

/// Order Tracking Route
Route::post('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking');

// Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

// Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);

// Route::get('/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);

});

 // My Cart Page All Routes
 Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

 Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);

 Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);

 Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);

 Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);





    // Frontend Coupon Option

    Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
    Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
    Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);


     // Checkout Routes

    Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
    Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);
    Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);
    Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');

    //Payment Route
    Route::post('/payment/store', [CheckoutController::class, 'PaymentStore'])->name('payment.store');





    //  Frontend Blog Show Routes

    Route::get('/blog', [HomeBlogController::class, 'AddBlogPost'])->name('home.blog');
    Route::get('/post/details/{id}', [HomeBlogController::class, 'DetailsBlogPost'])->name('post.details');
    Route::get('/blog/category/post/{category_id}', [HomeBlogController::class, 'HomeBlogCatPost']);





    /// Frontend Product Review Routes

    Route::post('/review/store', [ReviewController::class, 'ReviewStore'])->name('review.store');
    Route::get('/delete/review/{id}', [ReviewController::class, 'DeleteReviews'])->name('delete.reviews');






    /// Product Search Route
    Route::post('/search', [IndexController::class, 'ProductSearch'])->name('product.search');

    //['get','post']
    // Route::match(['get','post'],'/search', [IndexController::class, 'ProductSearch'])->name('product.search');


    // Advance Search Routes
    Route::post('/search-product', [IndexController::class, 'SearchProduct']);


    // NEW ADVANCE SEARCH
    Route::get('product-list', [IndexController::class, 'productlistAjax']);
    Route::post('searchproduct', [IndexController::class, 'searchProd']);


    // Shop Page Route
    Route::get('/shop', [ShopController::class, 'ShopPage'])->name('shop.page');

    Route::post('/shop/filter', [ShopController::class, 'ShopFilter'])->name('shop.filter');


    //Delete User


    // VENDOR CONTROLLERS






    Route::middleware(['auth','role:vendor'])->group(function() {

    Route::get('vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');
    Route::get('/vendor/logout', [VendorController::class, 'VendorDestroy'])->name('vendor.logout');
    Route::get('/vendor/profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');

    Route::post('/vendor/profile/store', [VendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');

    Route::get('/vendor/change/password', [VendorController::class, 'VendorChangePassword'])->name('vendor.change.password');

    Route::post('/vendor/update/password', [VendorController::class, 'VendorUpdatePassword'])->name('vendor.update.password');


// Vendor Add Product All Route
Route::controller(VendorProductController::class)->group(function(){
    Route::get('/vendor/all/product' , 'VendorAllProduct')->name('vendor.all.product');
    Route::get('/vendor/add/product' , 'VendorAddProduct')->name('vendor.add.product');

    Route::post('/vendor/store/product' , 'VendorStoreProduct')->name('vendor.store.product');
    Route::get('/vendor/edit/product/{id}' , 'VendorEditProduct')->name('vendor.edit.product');

    Route::post('/vendor/update/product' , 'VendorUpdateProduct')->name('vendor.update.product');
    Route::post('/vendor/update/product/thumbnail' , 'VendorUpdateProductThumbnail')->name('vendor.update.product.thumbnail');

    Route::post('/vendor/update/product/multiimage' , 'VendorUpdateProductmultiImage')->name('vendor.update.product.multiimage');

    Route::get('/vendor/product/multiimg/delete/{id}' , 'VendorMultiimgDelete')->name('vendor.product.multiimg.delete');

    Route::get('/vendor/product/inactive/{id}' , 'VendorProductInactive')->name('vendor.product.inactive');
    Route::get('/vendor/product/active/{id}' , 'VendorProductActive')->name('vendor.product.active');

    Route::get('/vendor/delete/product/{id}' , 'VendorProductDelete')->name('vendor.delete.product');

    Route::get('/vendor/subcategory/ajax/{category_id}' , 'VendorGetSubCategory');
    Route::get('/vendor/sub-subcategory/ajax/{subcategory_id}', 'VendorGetSubCategory');




}); //end group vendor product controller

Route::controller(VendorOrderController::class)->group(function(){
    Route::get('/vendor/order' , 'VendorOrder')->name('vendor.order');

    Route::get('/vendor/return/order' , 'VendorReturnOrder')->name('vendor.return.order');

    Route::get('/vendor/complete/return/order' , 'VendorCompleteReturnOrder')->name('vendor.complete.return.order');
    Route::get('/vendor/order/details/{order_id}' , 'VendorOrderDetails')->name('vendor.order.details');


}); //end group vendor order controller

Route::controller(ReviewController::class)->group(function(){

    Route::get('/vendor/all/review' , 'VendorAllReview')->name('vendor.all.review');

   });


});


// Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);
Route::get('/vendor/details/{id}', [IndexController::class, 'VendorDetails'])->name('vendor.details');
Route::get('/vendor/all', [IndexController::class, 'VendorAll'])->name('vendor.all');
