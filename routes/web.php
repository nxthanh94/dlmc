<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::pattern('id','([0-9]*)');
Route::pattern('slug','(.*)');

Route::get('/', function () {
    return view('index.index');
});
Route::get('/',[
	'as' => 'public.index', 
	'uses' => 'IndexController@index'
]);

Route::get('chi-tiet-tin/{slug}-{id}.html',[
	'uses' => 'NewsController@detail',
	'as' => 'public.chitiet'
]);

Route::get('gioi-thieu',[
	'uses' => 'GioithieuController@index',
	'as' => 'public.gioithieu'
]);

Route::get('gioi-thieu/{slug}-{id}.html',[
	'uses' => 'GioithieuController@detail',
	'as' => 'public.gioithieu.detail'
]);


Route::get('lien-he',[
	'as' => 'public.lienhe', 
	'uses' => 'LienheController@getindex'
]);

Route::post('lien-he',[
	'as' => 'public.lienhe', 
	'uses' => 'LienheController@postlienhe'
]);

Route::get('tim-kiem',[
	'uses' => 'IndexController@timkiem',
	'as' => 'public.sanpham.timkiem'
]);

Route::get('slider/{slug}/{id}',[
	'uses' => 'SliderController@index',
	'as' => 'public.slider.index'
]);

Route::get('quang-cao/{slug}/{id}',[
	'uses' => 'QuangcaoController@index',
	'as' => 'public.quangcao.index'
]);

Route::get('thu-tuc-hanh-chinh',[
	'as' => 'public.thutuc.index', 
	'uses' => 'TuyendungController@index'
]);

Route::get('thu-tuc-hanh-chinh/{slug}-{id}',[
	'uses' => 'TuyendungController@danhmuc',
	'as' => 'public.thutuc.danhmuc'
]);

Route::get('thu-tuc-hanh-chinh/{slug}-{id}.html',[
	'uses' => 'TuyendungController@detail',
	'as' => 'public.thutuc.detail'
]);

Route::get('du-an',[
	'as' => 'public.duan.index', 
	'uses' => 'CongtrinhController@index'
]);

Route::get('du-an/{slug}-{id}',[
	'uses' => 'CongtrinhController@danhmuc',
	'as' => 'public.duan.danhmuc'
]);

Route::get('du-an/{slug}-{id}.html',[
	'uses' => 'CongtrinhController@detail',
	'as' => 'public.duan.detail'
]);

Route::get('tin-tuc',[
	'as' => 'public.tintuc', 
	'uses' => 'NewsController@index'
]);

Route::get('tin-tuc/{slug}-{id}',[
	'as' => 'public.detail', 
	'uses' => 'NewsController@detail'
]);

Route::get('chi-tiet/{slug}-{id}',[
	'as' => 'public.chitiet', 
	'uses' => 'NewsController@chitiet'
]);

Route::get('chuyen-muc-chieu-sang',[
	'as' => 'public.chieusang.index', 
	'uses' => 'DichvuController@index'
]);

Route::get('chuyen-muc-chieu-sang/{slug}-{id}',[
	'uses' => 'DichvuController@detail',
	'as' => 'public.chieusang.detail'
]);

Route::get('chuyen-muc-chieu-sang/{slug}-{id}.html',[
	'uses' => 'DichvuController@detail1',
	'as' => 'public.chieusang.detail1'
]);

Route::get('{slug1}/{id}.html',[
	'uses' => 'QuangcaoController@detail',
	'as' => 'public.quangcao.detail'
]);

Route::get('co-so',[
	'as' => 'public.coso.index', 
	'uses' => 'CosoController@index'
]);

Route::get('co-so/{slug}-{id}.html',[
	'uses' => 'CosoController@detail',
	'as' => 'public.coso.detail'
]);

Route::get('lich-cong-tac',[
	'as' => 'public.lich.index', 
	'uses' => 'LichController@index'
]);

Route::get('lich-cong-tac/{slug}-{id}',[
	'uses' => 'LichController@danhmuc',
	'as' => 'public.lich.danhmuc'
]);

Route::get('lich-cong-tac/{slug}-{id}.html',[
	'uses' => 'LichController@detail',
	'as' => 'public.lich.detail'
]);

Route::get('thu-vien',[
	'as' => 'public.thuvien.index', 
	'uses' => 'ThuVienController@index'
]);

Route::get('thu-vien/{slug}-{id}',[
	'uses' => 'ThuVienController@danhmuc',
	'as' => 'public.thuvien.danhmuc'
]);

Route::get('thu-vien/{slug}-{id}.html',[
	'uses' => 'ThuVienController@detail',
	'as' => 'public.thuvien.detail'
]);


//////////////////////////////////////////////////////////////////
//Quản lý admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware' => 'auth','middleware' =>'role'], function () {
	Route::get('',[
		'uses' => 'IndexController@index',
		'as'  => 'admin.index.index'
	]);

	//Quản lý chi tiết hóa đơn
	Route::group(['prefix' => 'chi-tiet-hoa-don','middleware' =>'role'], function () {
		Route::get('/{id}',[
		'uses' => 'ChitiethoadonController@index',
		'as'  => 'admin.chitiethoadon.index'
		]);

		Route::get('/del/{id}',[
		'uses' => 'ChitiethoadonController@del',
		'as'  => 'admin.chitiethoadon.del'
		]);

		
	});

	//Quản lý thư viện
	Route::group(['prefix' => 'thu-vien','middleware' =>'role'], function () {
		Route::get('',[
			'uses' => 'ThuVienController@index',
			'as'  => 'admin.thuvien.index'
		]);
		Route::get('add', 'ThuVienController@getadd');
		Route::post('add', ['as'=>'admin.thuvien.add','uses'=>'ThuVienController@postadd']);
		Route::get('/del/{id}',[
		'uses' => 'ThuVienController@del',
		'as'  => 'admin.thuvien.del'
		]);

	});


	//Quản lý danh muc thu vien
	Route::group(['prefix' => 'danh-muc-thu-vien'], function () {
		Route::get('',[
		'uses' => 'ListTVController@index',
		'as'  => 'admin.listtv.index'
		]);

		Route::get('add',[
		'uses' => 'ListTVController@getadd',
		'as'  => 'admin.listtv.add'
		]);

		Route::post('add',[
		'uses' => 'ListTVController@postadd',
		'as'  => 'admin.listtv.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'ListTVController@getedit',
		'as'  => 'admin.listtv.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'ListTVController@postedit',
		'as'  => 'admin.listtv.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'ListTVController@del',
		'as'  => 'admin.listtv.del'
		]);


	});

	//Quản lý danh muc thu vien
	Route::group(['prefix' => 'danh-muc-con'], function () {
		Route::get('',[
		'uses' => 'ListTV1Controller@index',
		'as'  => 'admin.listtv1.index'
		]);

		Route::get('add',[
		'uses' => 'ListTV1Controller@getadd',
		'as'  => 'admin.listtv1.add'
		]);

		Route::post('add',[
		'uses' => 'ListTV1Controller@postadd',
		'as'  => 'admin.listtv1.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'ListTV1Controller@getedit',
		'as'  => 'admin.listtv1.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'ListTV1Controller@postedit',
		'as'  => 'admin.listtv1.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'ListTV1Controller@del',
		'as'  => 'admin.listtv1.del'
		]);


	});
	//Quản lý hãng sản xuất
	Route::group(['prefix' => 'hang-san-xuat'], function () {
		Route::get('',[
		'uses' => 'HangsanxuatController@index',
		'as'  => 'admin.hangsanxuat.index'
		]);

		Route::get('add',[
		'uses' => 'HangsanxuatController@getadd',
		'as'  => 'admin.phanquyen.add'
		]);

		Route::post('add',[
		'uses' => 'HangsanxuatController@postadd',
		'as'  => 'admin.hangsanxuat.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'HangsanxuatController@getedit',
		'as'  => 'admin.hangsanxuat.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'HangsanxuatController@postedit',
		'as'  => 'admin.hangsanxuat.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'HangsanxuatController@del',
		'as'  => 'admin.hangsanxuat.del'
		]);


	});
	//Quản lý quảng cáo
	Route::group(['prefix' => 'quang-cao'], function () {
		Route::get('',[
		'uses' => 'QuangcaoController@index',
		'as'  => 'admin.quangcao.index'
		]);

		Route::get('chi-tiet/{id}',[
		'uses' => 'QuangcaoController@chitiet',
		'as'  => 'admin.quangcao.chitiet'
		]);

		Route::get('add',[
		'uses' => 'QuangcaoController@getadd',
		'as'  => 'admin.quangcao.add'
		]);

		Route::post('add',[
		'uses' => 'QuangcaoController@postadd',
		'as'  => 'admin.quangcao.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'QuangcaoController@getedit',
		'as'  => 'admin.quangcao.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'QuangcaoController@postedit',
		'as'  => 'admin.quangcao.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'QuangcaoController@del',
		'as'  => 'admin.quangcao.del'
		]);


	});

	//Quản lý dich vu
	Route::group(['prefix' => 'dich-vu'], function () {
		Route::get('',[
		'uses' => 'DichvuController@index',
		'as'  => 'admin.dichvu.index'
		]);

		Route::get('chi-tiet/{id}',[
		'uses' => 'DichvuController@chitiet',
		'as'  => 'admin.dichvu.chitiet'
		]);

		Route::get('add',[
		'uses' => 'DichvuController@getadd',
		'as'  => 'admin.dichvu.add'
		]);

		Route::post('add',[
		'uses' => 'DichvuController@postadd',
		'as'  => 'admin.dichvu.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'DichvuController@getedit',
		'as'  => 'admin.dichvu.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'DichvuController@postedit',
		'as'  => 'admin.dichvu.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'DichvuController@del',
		'as'  => 'admin.dichvu.del'
		]);


	});

	//Quản lý cong trinh
	Route::group(['prefix' => 'cong-trinh'], function () {
		Route::get('',[
		'uses' => 'CongtrinhController@index',
		'as'  => 'admin.congtrinh.index'
		]);

		Route::get('chi-tiet/{id}',[
		'uses' => 'CongtrinhController@chitiet',
		'as'  => 'admin.congtrinh.chitiet'
		]);

		Route::get('add',[
		'uses' => 'CongtrinhController@getadd',
		'as'  => 'admin.congtrinh.add'
		]);

		Route::post('add',[
		'uses' => 'CongtrinhController@postadd',
		'as'  => 'admin.congtrinh.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'CongtrinhController@getedit',
		'as'  => 'admin.congtrinh.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'CongtrinhController@postedit',
		'as'  => 'admin.congtrinh.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'CongtrinhController@del',
		'as'  => 'admin.congtrinh.del'
		]);


	});

	//Quản lý list cong trinh
	Route::group(['prefix' => 'loai-cong-trinh'], function () {
		Route::get('',[
		'uses' => 'ListCTController@index',
		'as'  => 'admin.listct.index'
		]);

		Route::get('chi-tiet/{id}',[
		'uses' => 'ListCTController@chitiet',
		'as'  => 'admin.listct.chitiet'
		]);

		Route::get('add',[
		'uses' => 'ListCTController@getadd',
		'as'  => 'admin.listct.add'
		]);

		Route::post('add',[
		'uses' => 'ListCTController@postadd',
		'as'  => 'admin.listct.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'ListCTController@getedit',
		'as'  => 'admin.listct.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'ListCTController@postedit',
		'as'  => 'admin.listct.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'ListCTController@del',
		'as'  => 'admin.listct.del'
		]);


	});

	//Quản lý tuyen dung
	Route::group(['prefix' => 'tuyen-dung'], function () {
		Route::get('',[
		'uses' => 'TuyendungController@index',
		'as'  => 'admin.tuyendung.index'
		]);

		Route::get('chi-tiet/{id}',[
		'uses' => 'TuyendungController@chitiet',
		'as'  => 'admin.tuyendung.chitiet'
		]);

		Route::get('add',[
		'uses' => 'TuyendungController@getadd',
		'as'  => 'admin.tuyendung.add'
		]);

		Route::post('add',[
		'uses' => 'TuyendungController@postadd',
		'as'  => 'admin.tuyendung.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'TuyendungController@getedit',
		'as'  => 'admin.tuyendung.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'TuyendungController@postedit',
		'as'  => 'admin.tuyendung.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'TuyendungController@del',
		'as'  => 'admin.tuyendung.del'
		]);


	});

	//Quản lý list tuyen dung
	Route::group(['prefix' => 'danh-muc-tuyen-dung'], function () {
		Route::get('',[
		'uses' => 'ListTDController@index',
		'as'  => 'admin.listtd.index'
		]);

		Route::get('chi-tiet/{id}',[
		'uses' => 'ListTDController@chitiet',
		'as'  => 'admin.listtd.chitiet'
		]);

		Route::get('add',[
		'uses' => 'ListTDController@getadd',
		'as'  => 'admin.listtd.add'
		]);

		Route::post('add',[
		'uses' => 'ListTDController@postadd',
		'as'  => 'admin.listtd.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'ListTDController@getedit',
		'as'  => 'admin.listtd.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'ListTDController@postedit',
		'as'  => 'admin.listtd.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'ListTDController@del',
		'as'  => 'admin.listtd.del'
		]);


	});

	//Quản lý loai dich vu
	Route::group(['prefix' => 'loai-dich-vu'], function () {
		Route::get('',[
		'uses' => 'ListDVController@index',
		'as'  => 'admin.listdv.index'
		]);

		Route::get('add',[
		'uses' => 'ListDVController@getadd',
		'as'  => 'admin.listdv.add'
		]);

		Route::post('add',[
		'uses' => 'ListDVController@postadd',
		'as'  => 'admin.listdv.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'ListDVController@getedit',
		'as'  => 'admin.listdv.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'ListDVController@postedit',
		'as'  => 'admin.listdv.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'ListDVController@del',
		'as'  => 'admin.listdv.del'
		]);


	});


	//Quản lý liên kết
	Route::group(['prefix' => 'lien-ket'], function () {
		Route::get('',[
		'uses' => 'LienKetController@index',
		'as'  => 'admin.lienket.index'
		]);

		Route::get('add',[
		'uses' => 'LienKetController@getadd',
		'as'  => 'admin.lienket.add'
		]);

		Route::post('add',[
		'uses' => 'LienKetController@postadd',
		'as'  => 'admin.lienket.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'LienKetController@getedit',
		'as'  => 'admin.lienket.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'LienKetController@postedit',
		'as'  => 'admin.lienket.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'LienKetController@del',
		'as'  => 'admin.lienket.del'
		]);


	});

	//Quản lý cơ sở
	Route::group(['prefix' => 'co-so'], function () {
		Route::get('',[
		'uses' => 'CosoController@index',
		'as'  => 'admin.coso.index'
		]);

		Route::get('add',[
		'uses' => 'CosoController@getadd',
		'as'  => 'admin.coso.add'
		]);

		Route::post('add',[
		'uses' => 'CosoController@postadd',
		'as'  => 'admin.coso.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'CosoController@getedit',
		'as'  => 'admin.coso.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'CosoController@postedit',
		'as'  => 'admin.coso.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'CosoController@del',
		'as'  => 'admin.coso.del'
		]);

		Route::get('chi-tiet/{id}',[
		'uses' => 'CosoController@chitiet',
		'as'  => 'admin.coso.chitiet'
		]);


	});

	//Quản lý cài đặt
	Route::group(['prefix' => 'cai-dat'], function () {
		Route::get('',[
		'uses' => 'CaidatController@index',
		'as'  => 'admin.caidat.index'
		]);

		Route::get('add',[
		'uses' => 'CaidatController@getadd',
		'as'  => 'admin.caidat.add'
		]);

		Route::post('add',[
		'uses' => 'CaidatController@postadd',
		'as'  => 'admin.caidat.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'CaidatController@getedit',
		'as'  => 'admin.caidat.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'CaidatController@postedit',
		'as'  => 'admin.caidat.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'CaidatController@del',
		'as'  => 'admin.caidat.del'
		]);


	});

	//Quản lý loai tin tuc
	Route::group(['prefix' => 'loai-tin-tuc'], function () {
		Route::get('',[
		'uses' => 'ListNewsController@index',
		'as'  => 'admin.listnews.index'
		]);

		Route::get('add',[
		'uses' => 'ListNewsController@getadd',
		'as'  => 'admin.listnews.add'
		]);

		Route::post('add',[
		'uses' => 'ListNewsController@postadd',
		'as'  => 'admin.listnews.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'ListNewsController@getedit',
		'as'  => 'admin.listnews.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'ListNewsController@postedit',
		'as'  => 'admin.listnews.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'ListNewsController@del',
		'as'  => 'admin.listnews.del'
		]);


	});
	//Quản lý hãng slider
	Route::group(['prefix' => 'slider'], function () {
		Route::get('',[
		'uses' => 'SliderController@index',
		'as'  => 'admin.slider.index'
		]);

		Route::get('add',[
		'uses' => 'SliderController@getadd',
		'as'  => 'admin.slider.add'
		]);

		Route::post('add',[
		'uses' => 'SliderController@postadd',
		'as'  => 'admin.slider.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'SliderController@getedit',
		'as'  => 'admin.slider.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'SliderController@postedit',
		'as'  => 'admin.slider.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'SliderController@del',
		'as'  => 'admin.slider.del'
		]);


	});

	//Quản lý gioi thieu
	Route::group(['prefix' => 'gioi-thieu'], function () {
		Route::get('',[
		'uses' => 'GioithieuController@index',
		'as'  => 'admin.gioithieu.index'
		]);

		Route::get('add',[
		'uses' => 'GioithieuController@getadd',
		'as'  => 'admin.gioithieu.add'
		]);

		Route::post('add',[
		'uses' => 'GioithieuController@postadd',
		'as'  => 'admin.gioithieu.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'GioithieuController@getedit',
		'as'  => 'admin.gioithieu.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'GioithieuController@postedit',
		'as'  => 'admin.gioithieu.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'GioithieuController@del',
		'as'  => 'admin.gioithieu.del'
		]);


	});

	//Quản lý hóa đơn
	Route::group(['prefix' => 'hoa-don'], function () {
		Route::get('',[
		'uses' => 'HoadonController@index',
		'as'  => 'admin.hoadon.index'
		]);

		Route::get('del/{id}',[
        	'uses' => 'HoadonController@del',
        	'as' => 'admin.hoadon.del'
        ]);

        Route::get('/trang-thai/{id}/{status}',[
		'uses' => 'HoadonController@trangthai',
		'as'  => 'admin.hoadon.trangthai'
		]);

		
	});

	//Quản lý liên hệ
	Route::group(['prefix' => 'lien-he'], function () {
		Route::get('',[
		'uses' => 'LienheController@index',
		'as'  => 'admin.lienhe.index'
		]);

		Route::get('/del/{id}',[
		'uses' => 'LienheController@del',
		'as'  => 'admin.lienhe.del'
		]);

		
	});

	//Quản lý comment
	Route::group(['prefix' => 'binh-luan'], function () {
		Route::get('',[
		'uses' => 'CommentController@index',
		'as'  => 'admin.comment.index'
		]);

		Route::get('/del/{id}',[
		'uses' => 'CommentController@del',
		'as'  => 'admin.comment.del'
		]);

		
	});

	//Quản lý phân quyền
	Route::group(['prefix' => 'phan-quyen'], function () {
		Route::get('',[
		'uses' => 'PhanquyenController@index',
		'as'  => 'admin.phanquyen.index'
		]);

		Route::get('add',[
		'uses' => 'PhanquyenController@getadd',
		'as'  => 'admin.phanquyen.add'
		]);

		Route::post('add',[
		'uses' => 'PhanquyenController@postadd',
		'as'  => 'admin.phanquyen.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'PhanquyenController@getedit',
		'as'  => 'admin.phanquyen.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'PhanquyenController@postedit',
		'as'  => 'admin.phanquyen.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'PhanquyenController@del',
		'as'  => 'admin.phanquyen.del'
		]);

	});

	//Quản lý sản phẩm
	Route::group(['prefix' => 'san-pham'], function () {
		Route::get('',[
		'uses' => 'SanphamController@index',
		'as'  => 'admin.sanpham.index'
		]);

		Route::get('mo-ta/{id}',[
		'uses' => 'SanphamController@mota',
		'as'  => 'admin.sanpham.mota'
		]);

		Route::get('add',[
		'uses' => 'SanphamController@getadd',
		'as'  => 'admin.sanpham.add'
		]);

		Route::post('add',[
		'uses' => 'SanphamController@postadd',
		'as'  => 'admin.sanpham.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'SanphamController@getedit',
		'as'  => 'admin.sanpham.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'SanphamController@postedit',
		'as'  => 'admin.sanpham.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'SanphamController@del',
		'as'  => 'admin.sanpham.del'
		]);
	});

	//Quản lý loại sản phẩm
	Route::group(['prefix' => 'loai-san-pham'], function () {
		Route::get('',[
		'uses' => 'LoaisanphamController@index',
		'as'  => 'admin.loaisanpham.index'
		]);

		Route::get('add',[
		'uses' => 'LoaisanphamController@getadd',
		'as'  => 'admin.loaisanpham.add'
		]);

		Route::post('add',[
		'uses' => 'LoaisanphamController@postadd',
		'as'  => 'admin.loaisanpham.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'LoaisanphamController@getedit',
		'as'  => 'admin.loaisanpham.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'LoaisanphamController@postedit',
		'as'  => 'admin.loaisanpham.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'LoaisanphamController@del',
		'as'  => 'admin.loaisanpham.del'
		]);
	});

	//Quản lý tin tức
	Route::group(['prefix' => 'tin-tuc'], function () {
		Route::get('',[
		'uses' => 'NewsController@index',
		'as'  => 'admin.news.index'
		]);

		Route::get('chi-tiet/{id}',[
		'uses' => 'NewsController@chitiet',
		'as'  => 'admin.news.chitiet'
		]);

		Route::get('add',[
		'uses' => 'NewsController@getadd',
		'as'  => 'admin.news.add'
		]);

		Route::post('add',[
		'uses' => 'NewsController@postadd',
		'as'  => 'admin.news.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'NewsController@getedit',
		'as'  => 'admin.news.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'NewsController@postedit',
		'as'  => 'admin.news.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'NewsController@del',
		'as'  => 'admin.news.del'
		]);
	});

	//Quản lý lịch
	Route::group(['prefix' => 'lich'], function () {
		Route::get('',[
		'uses' => 'LichController@index',
		'as'  => 'admin.lich.index'
		]);

		Route::get('chi-tiet/{id}',[
		'uses' => 'LichController@chitiet',
		'as'  => 'admin.lich.chitiet'
		]);

		Route::get('add',[
		'uses' => 'LichController@getadd',
		'as'  => 'admin.lich.add'
		]);

		Route::post('add',[
		'uses' => 'LichController@postadd',
		'as'  => 'admin.lich.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'LichController@getedit',
		'as'  => 'admin.lich.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'LichController@postedit',
		'as'  => 'admin.lich.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'LichController@del',
		'as'  => 'admin.lich.del'
		]);
	});

	//Quản lý danh mục lịch
	Route::group(['prefix' => 'danh-muc-lich'], function () {
		Route::get('',[
		'uses' => 'LLichController@index',
		'as'  => 'admin.listlich.index'
		]);

		Route::get('chi-tiet/{id}',[
		'uses' => 'LLichController@chitiet',
		'as'  => 'admin.listlich.chitiet'
		]);

		Route::get('add',[
		'uses' => 'LLichController@getadd',
		'as'  => 'admin.listlich.add'
		]);

		Route::post('add',[
		'uses' => 'LLichController@postadd',
		'as'  => 'admin.listlich.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'LLichController@getedit',
		'as'  => 'admin.listlich.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'LLichController@postedit',
		'as'  => 'admin.listlich.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'LLichController@del',
		'as'  => 'admin.listlich.del'
		]);
	});

	//Quản lý thanh toan
	Route::group(['prefix' => 'thanh-toan'], function () {
		Route::get('',[
		'uses' => 'ThanhtoanController@index',
		'as'  => 'admin.thanhtoan.index'
		]);

		Route::get('add',[
		'uses' => 'ThanhtoanController@getadd',
		'as'  => 'admin.thanhtoan.add'
		]);

		Route::post('add',[
		'uses' => 'ThanhtoanController@postadd',
		'as'  => 'admin.thanhtoan.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'ThanhtoanController@getedit',
		'as'  => 'admin.thanhtoan.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'ThanhtoanController@postedit',
		'as'  => 'admin.thanhtoan.edit'
		]);

		Route::get('/del/{id}',[
		'uses' => 'ThanhtoanController@del',
		'as'  => 'admin.thanhtoan.del'
		]);
	});

	//Quản lý users
	Route::group(['prefix' => 'nguoi-dung'], function () {
		Route::get('',[
		'uses' => 'UsersController@index',
		'as'  => 'admin.users.index'
		]);

		Route::get('add',[
		'uses' => 'UsersController@getadd',
		'as'  => 'admin.users.add'
		]);

		Route::post('add',[
		'uses' => 'UsersController@postadd',
		'as'  => 'admin.users.add'
		]);

		Route::get('edit/{id}',[
		'uses' => 'UsersController@getedit',
		'as'  => 'admin.users.edit'
		]);

		Route::post('edit/{id}',[
		'uses' => 'UsersController@postedit',
		'as'  => 'admin.users.edit'
		]);

		Route::get('del/{id}',[
        	'uses' => 'UsersController@del',
        	'as' => 'admin.users.del'
        ])->middleware('role1');
	});
});

//login
Route::group(['namespace' => 'Auth','prefix' => 'auth'], function () {
    Route::get('login',[
    'uses'=> 'AuthController@getLogin',
    'as' => 'public.auth.login'
    ]);

    Route::post('login',[
    'uses'=> 'AuthController@postLogin',
    'as' => 'public.auth.login'
    ]);

    Route::get('logout',[
    'uses'=> 'AuthController@logout',
    'as' => 'public.auth.logout'
    ]);
    
});

//tim kiem
Route::get('tim-kiem',[
	'uses' => 'IndexController@timkiem',
	'as' => 'public.sanpham.timkiem'
	]);

Route::get('tim-kiem1/{id}',[
	'uses' => 'IndexController@timkiem1',
	'as' => 'public.sanpham.timkiem1'
]);
//thong báo
Route::get('noaccess', function(){
    return view('errors.404');
});


//Đăng kí

Route::get('dang-ki',[
	'uses' => 'IndexController@getadd',
	'as'  => 'auth.dangki'
]);

Route::post('dang-ki',[
	'uses' => 'IndexController@postadd',
	'as'  => 'auth.dangki'
]);



