<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();



Route::get('admin','Admin\AuthController@getLogin');
Route::post('admin/login','Admin\AuthController@postLogin');
Route::get('admin/register','Admin\AuthController@getRegister');
Route::post('admin/register','Admin\AuthController@postRegister');
// Route::get('admin/dashboard','AdminController@getIndex');
Route::get('admin/logout',['as'=>'admin.getLogout','uses'=>'AdminController@getLogout']);

Route::get('admin/limit', function () {
    return view('admin.limit');
});


Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){

	Route::group(['prefix'=>'infoadmin'],function(){
		Route::get('infoadmin',['as'=>'admin.infoadmin.getInfo','uses'=>'AdminController@getInfo']);
		Route::post('infoadmin',['as'=>'admin.infoadmin.postInfo','uses'=>'AdminController@postInfo']);
		Route::get('changePass',['as'=>'admin.infoadmin.getChangePass','uses'=>'AdminController@getChangePass']);
		Route::post('changePass',['as'=>'admin.infoadmin.postChangePass','uses'=>'AdminController@postChangePass']);
	});

	Route::group(['prefix'=>'home'],function(){
		Route::get('dashboard',['as'=>'admin.home.getIndex','uses'=>'AdminController@getIndex']);
	});

	Route::group(['prefix'=>'cate'],function(){
		Route::get('list',['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
	});

	Route::group(['prefix'=>'contact'],function(){
		Route::get('list',['as'=>'admin.contact.getList','uses'=>'ContactController@getList']);
	});

	Route::group(['prefix'=>'information'],function(){
		Route::get('edit',['as'=>'admin.information.getEdit','uses'=>'InformationController@getEdit']);
		Route::post('edit',['as'=>'admin.information.postEdit','uses'=>'InformationController@postEdit']);
	});


	Route::group(['prefix'=>'order'],function(){
		Route::get('list',['as'=>'admin.order.getList','uses'=>'OrderController@getList']);
		Route::get('listdetail/{id}',['as'=>'admin.order.getListdetail','uses'=>'OrderController@getListdetail']);
		Route::get('editorder/{id}',['as'=>'admin.order.getEdit','uses'=>'OrderController@getEdit']);
		Route::post('editorder/{id}',['as'=>'admin.order.postEdit','uses'=>'OrderController@postEdit']);
	});


	Route::group(['prefix'=>'gallery'],function(){
		Route::get('list',['as'=>'admin.gallery.getList','uses'=>'GalleryController@getList']);
		Route::get('addgallery',['as'=>'admin.gallery.getAdd','uses'=>'GalleryController@getAdd']);
		Route::post('addgallery',['as'=>'admin.gallery.postAdd','uses'=>'GalleryController@postAdd']);
		Route::get('editgallery/{id}',['as'=>'admin.gallery.getEdit','uses'=>'GalleryController@getEdit']);
		Route::post('editgallery/{id}',['as'=>'admin.gallery.postEdit','uses'=>'GalleryController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.gallery.getDelete','uses'=>'GalleryController@getDelete']);
	});

	

	Route::group(['prefix'=>'product'],function(){
		Route::get('listmenu',['as'=>'admin.product.getListmenu','uses'=>'ProductController@getListmenu']);
		Route::get('addmenu',['as'=>'admin.product.getAddmenu','uses'=>'ProductController@getAddmenu']);
		Route::post('addmenu',['as'=>'admin.product.postAddmenu','uses'=>'ProductController@postAddmenu']);
		Route::get('editmenu/{id}',['as'=>'admin.product.getEditmenu','uses'=>'ProductController@getEditmenu']);
		Route::post('editmenu/{id}',['as'=>'admin.product.postEditmenu','uses'=>'ProductController@postEditmenu']);
		Route::get('editmenu',['as'=>'admin.product.getNull','uses'=>'ProductController@getNull']);
		Route::get('deletemenu/{id}',['as'=>'admin.product.getDeletemenu','uses'=>'ProductController@getdeletemenu']);
		Route::get('listmenusm/{id}',['as'=>'admin.product.getListmenusm','uses'=>'ProductController@getListmenusm']);
		Route::get('deletemenusm/{id}',['as'=>'admin.product.getDeletemenusm','uses'=>'ProductController@getdeletemenusm']);
		Route::get('editmenusm/{id}',['as'=>'admin.product.getEditmenusm','uses'=>'ProductController@getEditmenusm']);
		Route::post('editmenusm/{id}',['as'=>'admin.product.postEditmenusm','uses'=>'ProductController@postEditmenusm']);
		Route::get('editmenusm',['as'=>'admin.product.getNull','uses'=>'ProductController@getNull']);
		Route::get('addmenusm',['as'=>'admin.product.getAddmenusm','uses'=>'ProductController@getAddmenusm']);
		Route::post('addmenusm',['as'=>'admin.product.postAddmenusm','uses'=>'ProductController@postAddmenusm']);
		Route::get('listproduct',['as'=>'admin.product.getListproduct','uses'=>'ProductController@getListproduct']);
		Route::get('addproduct',['as'=>'admin.product.getAddproduct','uses'=>'ProductController@getAddproduct']);
		Route::post('addproduct',['as'=>'admin.product.postAddproduct','uses'=>'ProductController@postAddproduct']);
		Route::get('editproduct/{id}',['as'=>'admin.product.getEditproduct','uses'=>'ProductController@getEditproduct']);
		Route::post('editproduct/{id}',['as'=>'admin.product.postEditproduct','uses'=>'ProductController@postEditproduct']);
		Route::get('editproduct',['as'=>'admin.product.getNull','uses'=>'ProductController@getNull']);
		Route::get('deleteproduct/{id}',['as'=>'admin.product.getDeleteproduct','uses'=>'ProductController@getDeleteproduct']);
	});

	Route::group(['prefix'=>'article'],function(){
		Route::get('listmenu',['as'=>'admin.article.getListmenu','uses'=>'ArticleController@getListmenu']);
		Route::get('addmenu',['as'=>'admin.article.getAddmenu','uses'=>'ArticleController@getAddmenu']);
		Route::post('addmenu',['as'=>'admin.article.postAddmenu','uses'=>'ArticleController@postAddmenu']);
		Route::get('editmenu/{id}',['as'=>'admin.article.getEditmenu','uses'=>'ArticleController@getEditmenu']);
		Route::post('editmenu/{id}',['as'=>'admin.article.postEditmenu','uses'=>'ArticleController@postEditmenu']);
		Route::get('deletemenu/{id}',['as'=>'admin.article.getDeletemenu','uses'=>'ArticleController@getdeletemenu']);
		Route::get('listmenusm/{id}',['as'=>'admin.article.getListmenusm','uses'=>'ArticleController@getListmenusm']);
		Route::get('deletemenusm/{id}',['as'=>'admin.article.getDeletemenusm','uses'=>'ArticleController@getdeletemenusm']);
		Route::get('editmenusm/{id}',['as'=>'admin.article.getEditmenusm','uses'=>'ArticleController@getEditmenusm']);
		Route::post('editmenusm/{id}',['as'=>'admin.article.postEditmenusm','uses'=>'ArticleController@postEditmenusm']);
		Route::get('addmenusm',['as'=>'admin.article.getAddmenusm','uses'=>'ArticleController@getAddmenusm']);
		Route::post('addmenusm',['as'=>'admin.article.postAddmenusm','uses'=>'ArticleController@postAddmenusm']);
		Route::get('listarticle',['as'=>'admin.article.getListarticle','uses'=>'ArticleController@getListarticle']);
		Route::get('addarticle',['as'=>'admin.article.getAddarticle','uses'=>'ArticleController@getAddarticle']);
		Route::post('addarticle',['as'=>'admin.article.postAddarticle','uses'=>'ArticleController@postAddarticle']);
		Route::get('editarticle/{id}',['as'=>'admin.article.getEditarticle','uses'=>'ArticleController@getEditarticle']);
		Route::post('editarticle/{id}',['as'=>'admin.article.postEditarticle','uses'=>'ArticleController@postEditarticle']);
		Route::get('deletearticle/{id}',['as'=>'admin.article.getDeletearticle','uses'=>'ArticleController@getDeletearticle']);
	});

	Route::group(['prefix' => 'staff'],function(){
		Route::get('list',['as'=>'admin.staff.getList', 'uses' => 'AdminController@getList']);
		Route::get('add',['as'=>'admin.staff.getAddStaff', 'uses' => 'AdminController@getAddStaff']);
		Route::post('add',['as'=>'admin.staff.postAddStaff', 'uses' => 'AdminController@postAddStaff']);
		Route::get('delete/{id}',['as'=>'admin.staff.getDeleteStaff', 'uses' => 'AdminController@getDeleteStaff']);
	});

});


/*-----------------Shopping cart------------------*/
Route::get('/add-to-cart/{id}',['as'=>'product.addToCart','uses'=>'ShoppingController@getAddToCart']);
Route::get('/sub-to-cart/{id}',['as'=>'product.subToCart','uses'=>'ShoppingController@getSubToCart']);
Route::get('/shopping-cart',['as'=>'product.shoppingCart','uses'=>'ShoppingController@shoppingCart']);
//Route::get('remove/{id}',['as'=>'product.remove','uses'=>'ShoppingController@getRemoveItem']);
Route::get('/checkout',['as'=>'checkout','uses'=>'ShoppingController@getCheckOut']);
Route::post('/checkout',['as'=>'checkout','uses'=>'ShoppingController@postCheckOut']);
/*-----------------End Shopping cart------------------*/


/*----------------------frontend----------------------------*/
Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
Route::get('/san-pham/{slug}',['as'=>'product','uses'=>'HomeController@product']);
Route::get('/san-pham-noi-bat',['as'=>'product.hot','uses'=>'HomeController@productHot']);
Route::get('/san-pham-giam-gia',['as'=>'product.sale','uses'=>'HomeController@productSale']);
Route::get('/chi-tiet-san-pham/{slug}',['as'=>'product.item','uses'=>'HomeController@productDetail']);
Route::get('/tim-kiem',['as'=>'portSearch', 'uses' => 'SearchController@portSearch']);
//Route::get('/tim-kiem-thanh-cong',['as'=>'search', 'uses' => 'SearchController@search']);
Route::get('/dat-hang-thanh-cong',['as'=>'success', 'uses' => 'ShoppingController@success']);
Route::get('/liên-he-thanh-cong',['as'=>'success_contact', 'uses' => 'ContactController@success_contact']);
Route::get('lien-he','HomeController@contact');
// Route::get('/contact',['as'=>'contact','uses'=>'ContactController@getContact']);
Route::post('/contact',['as'=>'contact','uses'=>'ContactController@postContact']);

