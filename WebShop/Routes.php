<?php
    return [
        App\Core\Route::get('|^user/register/?$|',                  'Main',                   'getRegister'),
        App\Core\Route::post('|^user/register/?$|',                 'Main',                   'postRegister'),
        App\Core\Route::get('|^user/login/?$|',                     'Main',                   'getLogin'),
        App\Core\Route::post('|^user/login/?$|',                    'Main',                   'postLogin'),
        App\Core\Route::get('|^user/logout/?$|',                    'Main',                   'getLogout'),
        
        App\Core\Route::get('|^item/([0-9]+)/?$|',                  'Item',                   'show'),
        App\Core\Route::get('|^categories/?$|',                     'Category',               'show'),
        App\Core\Route::get('|^category/([0-9]+)/?$|',              'Item',                   'showAll'),
        App\Core\Route::get('|^item/([0-9]+)/?$|',                  'Item',                   'show'),

        App\Core\Route::get('|^auction/([0-9]+)/?$|',               'Item',                   'show'),
        App\Core\Route::post('|^search/?$|',                        'Item',                   'postSearch'),

        App\Core\Route::get('|^handle/([a-z]+)/?$|',                'EventHandler',           'handle'),
        
        # API rute:
        App\Core\Route::get('|^api/bookmarks/?$|',                  'ApiBookmark',            'getBookmarks'),
        App\Core\Route::get('|^api/bookmarks/add/([0-9]+)/?$|',     'ApiBookmark',            'addBookmark'),
        App\Core\Route::get('|^api/bookmarks/clear/?$|',            'ApiBookmark',            'clear'),
        \App\Core\Route::get('|^checkout/?$|',                      'Main',                   'checkout'),
        \App\Core\Route::post('|^checkout/?$|',                     'ApiBookmark',            'checkout'),

        # User API routes:
        App\Core\Route::post('|^api/offer/make/?|',                 'ApiUserOffer',           'postMakeOffer'),
        App\Core\Route::get('|^admin/?$|',                    'AdminDashboard',         'index'),

        # User role routes:
        App\Core\Route::get('|^user/profile/?$|',                   'UserDashboard',          'index'),

        App\Core\Route::get('|^user/categories/?$|',                'UserCategoryManagement', 'categories'),
        App\Core\Route::get('|^user/categories/edit/([0-9]+)/?$|',  'UserCategoryManagement', 'getEdit'),
        App\Core\Route::post('|^user/categories/edit/([0-9]+)/?$|', 'UserCategoryManagement', 'postEdit'),
        App\Core\Route::get('|^user/categories/add/?$|',            'UserCategoryManagement', 'getAdd'),
        App\Core\Route::post('|^user/categories/add/?$|',           'UserCategoryManagement', 'postAdd'),

        App\Core\Route::get('|^user/auctions/?$|',                  'UserAuctionManagement',  'auctions'),
        App\Core\Route::get('|^user/auctions/edit/([0-9]+)/?$|',    'UserAuctionManagement',  'getEdit'),
        App\Core\Route::post('|^user/auctions/edit/([0-9]+)/?$|',   'UserAuctionManagement',  'postEdit'),
        App\Core\Route::get('|^user/auctions/add/?$|',              'UserAuctionManagement',  'getAdd'),
        App\Core\Route::post('|^user/auctions/add/?$|',             'UserAuctionManagement',  'postAdd'),
        \App\Core\Route::get('|^contact/?$|',                       'Main',                   'contact'),
        \App\Core\Route::post('|^postContact/?$|',                  'ApiContact',             'postContact'),

        App\Core\Route::any('|^.*$|',                               'Main',                   'home')
    ];
