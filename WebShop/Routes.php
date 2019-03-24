<?php
    return [
        App\Core\Route::get('|^user/register/?$|',                  'Main',                   'getRegister'),
        App\Core\Route::post('|^user/register/?$|',                 'Main',                   'postRegister'),
        App\Core\Route::get('|^user/login/?$|',                     'Main',                   'getLogin'),
        App\Core\Route::post('|^user/login/?$|',                    'Main',                   'postLogin'),
        App\Core\Route::get('|^user/logout/?$|',                    'Main',                   'getLogout'),

        App\Core\Route::get('|^admin/login/?$|',                    'Main',                   'getAdminLogin'),
        App\Core\Route::post('|^admin/login/?$|',                   'Main',                   'postAdminLogin'),
        App\Core\Route::get('|^admin/logout/?$|',                   'Main',                   'adminGetLogout'),
        
        App\Core\Route::get('|^item/([0-9]+)/?$|',                  'Item',                   'show'),
        App\Core\Route::get('|^categories/?$|',                     'Category',               'show'),
        App\Core\Route::get('|^category/([0-9]+)/?$|',              'Item',                   'showAll'),
        App\Core\Route::get('|^item/([0-9]+)/?$|',                  'Item',                   'show'),

        App\Core\Route::get('|^auction/([0-9]+)/?$|',               'Item',                   'show'),
        App\Core\Route::post('|^search/?$|',                        'Item',                   'postSearch'),

        App\Core\Route::get('|^handle/([a-z]+)/?$|',                'EventHandler',           'handle'),
        
        # API rute:
        App\Core\Route::get('|^api/bookmarks/?$|',                  'ApiBookmark',            'getBookmarks'),
        App\Core\Route::post('|^api/bookmarks/add/?$|',             'ApiBookmark',            'addBookmark'),
        App\Core\Route::get('|^api/bookmarks/clear/?$|',            'ApiBookmark',            'clearBookmarks'),
        App\Core\Route::get('|^api/bookmark/clear/([0-9]+)/?$|',    'Main',                   'clearBookmark'),
        \App\Core\Route::get('|^checkout/?$|',                      'Main',                   'checkout'),
        \App\Core\Route::post('|^checkout/?$|',                     'ApiBookmark',            'checkout'),
        \App\Core\Route::post('|^checkout/change?$|',               'Main',                   'checkoutChange'),


        # User role routes:
        App\Core\Route::get('|^user/profile/?$|',                   'UserDashboard',          'index'),
        App\Core\Route::get('|^admin/profile/?$|',                  'AdminDashboard',         'index'),

        App\Core\Route::get('|^admin/item/add/?$|',                 'AdminDashboard',         'getAddItem'),
        App\Core\Route::post('|^admin/item/add/?$|',                'AdminDashboard',         'postAddItem'),
        App\Core\Route::get('|^admin/category/add/?$|',             'AdminDashboard',         'getAddCategory'),
        App\Core\Route::post('|^admin/category/add/?$|',            'AdminDashboard',         'postAddCategory'),
        \App\Core\Route::get('|^admin/items/?$|',                   'AdminDashboard',         'items'),
        \App\Core\Route::get('|^admin/item/edit/([0-9]+)/?$|',      'AdminDashboard',         'getEditItem'),
        \App\Core\Route::post('|^admin/item/edit/([0-9]+)/?$|',     'AdminDashboard',         'postEditItem'),
        \App\Core\Route::get('|^admin/item/delete/([0-9]+)/?$|',    'AdminDashboard',         'postDeleteItem'),
        \App\Core\Route::get('|^admin/image/download/?$|',          'AdminDashboard',         'downloadImage'),

        App\Core\Route::get('|^user/auctions/?$|',                  'UserAuctionManagement',  'auctions'),
        App\Core\Route::get('|^user/auctions/edit/([0-9]+)/?$|',    'UserAuctionManagement',  ' getEdit'),
        App\Core\Route::post('|^user/auctions/edit/([0-9]+)/?$|',   'UserAuctionManagement',  'postEdit'),
        App\Core\Route::get('|^user/auctions/add/?$|',              'UserAuctionManagement',  'getAdd'),
        App\Core\Route::post('|^user/auctions/add/?$|',             'UserAuctionManagement',  'postAdd'),
        \App\Core\Route::get('|^contact/?$|',                       'Main',                   'contact'),
        \App\Core\Route::post('|^postContact/?$|',                  'ApiContact',             'postContact'),

        App\Core\Route::any('|^.*$|',                               'Main',                   'home')
    ];
