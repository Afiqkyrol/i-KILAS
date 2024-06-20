<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



//////////////////////////////Login&Signup///////////////////////////////////////////////////////////////////////////////////////////////
Route::resource('/register','RegisterController')->only(['index','store']);

Route::resource('/login','LoginController')->only('index');

Route::post('/login','LoginController@process')->name('login.process');



//////////////////////////////Dashboard//////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/dashboard','DashboardController@index')->name('dashboard.dashboard');



//////////////////////////////BorangPermohonan///////////////////////////////////////////////////////////////////////////////////////////
Route::get('/dashboard/borang-kemaskini-laman-web','PermohonanController@formlamanweb')->name('borang-kemaskini.boranglamanweb');

Route::post('/dashboard/borang-kemaskini-laman-web','PermohonanController@storelamanweb')->name('borang-kemaskini.storelamanweb');

Route::get('/dashboard/borang-kemaskini-aduan','PermohonanController@formaduan')->name('borang-kemaskini.borangaduan');

Route::post('/dashboard/borang-kemaskini-aduan','PermohonanController@storeaduan')->name('borang-kemaskini.storeaduan');



Route::get('/dashboard/borang-kemaskini-laman-web/saluran','PermohonanController@formlamanweb_1')->name('borang.lamanweb1');

Route::post('/dashboard/borang-kemaskini-laman-web/saluran','PermohonanController@formlamanweb_2')->name('borang.lamanweb2');

Route::get('/dashboard/borang-kemaskini-laman-web/kategori','PermohonanController@formlamanweb_21')->name('borang.lamanweb21');

Route::post('/dashboard/borang-kemaskini-laman-web/kategori','PermohonanController@formlamanweb_3')->name('borang.lamanweb3');

Route::get('/dashboard/borang-kemaskini-laman-web/keterangan','PermohonanController@formlamanweb_31')->name('borang.lamanweb31');

Route::post('/dashboard/borang-kemaskini-laman-web/keterangan','PermohonanController@saveformlamanweb')->name('lamanweb.save');



//////////////////////////////SenaraiPermohonan/////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/dashboard/senarai','SenaraiController@permohonan')->name('senarai.permohonan');

Route::get('/dashboard/semakan','SenaraiController@semakan')->name('senarai.semakan');

Route::get('/dashboard/pengesahan','SenaraiController@pengesahan')->name('senarai.pengesahan');

Route::get('/dashboard/senarai-jtm','SenaraiController@kemaskini')->name('senarai.kemaskini');

Route::get('/dashboard/senarai-maklumat','SenaraiController@maklumat')->name('senarai.maklumat');

Route::get('/dashboard/senarai-jabatan','SenaraiController@senaraijabatan')->name('senarai.permohonanJabatan');

Route::get('/dashboard/senarai/{status}','SenaraiController@senarai_status')->name('senarai.status');

Route::get('/dashboard/senarai/semua/{status}','SenaraiController@senarai_status_admin')->name('Adminsenarai.status');



//////////////////////////////DetailsPermohonan//////////////////////////////////////////////////////////////////////////////////////////
Route::get('/dashboard/senarai/laman-web/{id}','SenaraiController@permohonanViewLamanWeb')->name('senarai.viewLamanWeb');

Route::get('/dashboard/senarai/aduan/{id}','SenaraiController@permohonanViewAduan')->name('senarai.viewAduan');

Route::get('/dashboard/senarai/semakan/aduan/{id}','SenaraiController@semakanViewAduan')->name('senarai.viewSemakanAduan');

Route::get('/dashboard/senarai/semakan/laman-web/{id}','SenaraiController@semakanViewLamanWeb')->name('senarai.viewSemakanLamanWeb');

Route::get('/dashboard/senarai/pengesahan/aduan/{id}','SenaraiController@pengesahanViewAduan')->name('senarai.viewPengesahanAduan');

Route::get('/dashboard/senarai/pengesahan/laman-web/{id}','SenaraiController@pengesahanViewLamanWeb')->name('senarai.viewPengesahanLamanWeb');

Route::get('/dashboard/senarai-jtm/kemaskini/aduan/{id}','SenaraiController@kemaskiniViewAduan')->name('senarai.viewKemaskiniAduan');

Route::get('/dashboard/senarai-jtm/kemaskini/laman-web/{id}','SenaraiController@kemaskiniViewLamanWeb')->name('senarai.viewKemaskiniLamanWeb');



//////////////////////////////TindakanPermohonan/////////////////////////////////////////////////////////////////////////////////////////
Route::post('/dashboard/senarai/semakan/aduan/tindakan','TindakanController@tindakanSemakanAduan')->name('tindakan.SemakanAduan');

Route::post('/dashboard/senarai/semakan/laman-web/tindakan','TindakanController@tindakanSemakanLamanWeb')->name('tindakan.SemakanLamanWeb');

Route::post('/dashboard/senarai/pengesahan/aduan/tindakan','TindakanController@tindakanPengesahanAduan')->name('tindakan.PengesahanAduan');

Route::post('/dashboard/senarai/pengesahan/laman-web/tindakan','TindakanController@tindakanPengesahanLamanWeb')->name('tindakan.PengesahanLamanWeb');

Route::post('/dashboard/senarai/kemaskini/aduan/tindakan','TindakanController@tindakanKemaskiniAduan')->name('tindakan.KemaskiniAduan');

Route::post('/dashboard/senarai/kemaskini/laman-web/tindakan','TindakanController@tindakanKemaskiniLamanWeb')->name('tindakan.KemaskiniLamanWeb');



//////////////////////////////EditPermohonan/////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/dashboard/senarai/laman-web/edit/saluran/{id}','SenaraiController@permohonanEditLamanWeb_1')->name('senarai.editLamanWeb1');

Route::post('/dashboard/senarai/laman-web/edit/saluran/{id}','SenaraiController@permohonanEditLamanWeb_2')->name('senarai.editLamanWeb2');

Route::get('/dashboard/senarai/laman-web/edit/kategori/{id}','SenaraiController@permohonanEditLamanWeb_21')->name('senarai.editLamanWeb21');

Route::post('/dashboard/borang-kemaskini-laman-web/kategori/{id}','SenaraiController@permohonanEditLamanWeb_3')->name('senarai.editLamanWeb3');

Route::get('/dashboard/borang-kemaskini-laman-web/keterangan/{id}','SenaraiController@permohonanEditLamanWeb_31')->name('senarai.editLamanWeb31');

Route::post('/dashboard/borang-kemaskini-laman-web/save/{id}','SenaraiController@saveeditformlamanweb')->name('senarai.saveedit');




//Route::post('/dashboard/senarai/laman-web/edit','PermohonanController@updateLamanWeb')->name('update.lamanweb');

Route::get('/dashboard/senarai/aduan/edit/{id}','SenaraiController@permohonanEditAduan')->name('senarai.editAduan');

Route::post('/dashboard/senarai/aduan/edit','PermohonanController@updateAduan')->name('update.aduan');



//////////////////////////////Delete/DownloadDocuments////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/dashboard/borang-kemaskini-laman-web/delete/doc/{num}/{id}/{perkara}','SenaraiController@deleteFile')->name('delete.file');

Route::get('/dashboard/borang-kemaskini-laman-web/download/doc/{num}/{id}/{perkara}','SenaraiController@downloadFile')->name('download.file');



//////////////////////////////DeletePermohonan///////////////////////////////////////////////////////////////////////////////////////////

Route::get('/dashboard/senarai/laman-web/delete/{id}','PermohonanController@deleteLamanWeb')->name('delete.LamanWeb');

Route::get('/dashboard/senarai/aduan/delete/{id}','PermohonanController@deleteAduan')->name('delete.Aduan');

Route::get('/dashboard/senarai/laman-web/remove/{id}','PermohonanController@removeLamanWeb')->name('remove.LamanWeb');

Route::get('/dashboard/senarai/aduan/remove/{id}','PermohonanController@removeAduan')->name('remove.Aduan');



//////////////////////////////Logout/////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/logout','LoginController@logout')->name('logout');



//////////////////////////////Mail///////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/send-mail', function () {

    $code = rand(100000,999999);
   
    $details = [
        'title' => 'Password Reset Code',
        'body' => 'Use this code to reset your password:',
        'code' => $code
    ];

    session_start();
    $email = $_SESSION["fp_email"];
    $_SESSION["fp_code"] = $code;
   
    \Mail::to($email)->send(new \App\Mail\Email($details));
   
    return redirect()->route('mail.verification');
})->name('mail.send');





//////////////////////////////ForgotPassword/////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/forgot-password','LoginController@forgotPass')->name('forgotpassword.index');

Route::post('/forgot-password','LoginController@forgotPassProcess')->name('forgotpassword.process');

Route::get('/forgot-password/verification','LoginController@verification')->name('mail.verification');

Route::post('/forgot-password/verification','LoginController@verificationProcess')->name('mail.verificationProcess');

Route::get('/forgot-password/reset-password','LoginController@resetPassword')->name('password.reset');

Route::post('/forgot-password/reset-password','LoginController@processPassword')->name('password.process');



//////////////////////////////EditUser///////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/dashboard/search-user','UserController@jtmsearch')->name('useredit.jtmsearch');

Route::post('/dashboard/search-user','UserController@getid')->name('useredit.getid');

Route::get('/dashboard/search-user/{id}','UserController@userdetails')->name('useredit.userdetails');

Route::get('/dashboard/search-user/edit/{id}','UserController@edit')->name('useredit.edit');

Route::post('/dashboard/search-user/edit/{id}','UserController@save')->name('useredit.save');

Route::get('/dashboard/search-user/delete/{id}','UserController@delete')->name('useredit.delete');



//////////////////////////////Profile////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/dashboard/profile','UserController@profileview')->name('profile.view');

Route::get('/dashboard/profile/edit','UserController@profileedit')->name('profile.edit');

Route::post('/dashboard/profile/edit','UserController@profilesave')->name('profile.save');



//////////////////////////////Laporan/////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/dashboard/laporan','LaporanController@utama')->name('laporan.utama');




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/test','LoginController@test')->name('test');

Route::get('/example','LoginController@example')->name('example');




///////////////////GeneratePDF////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/dashboard/laporan/cetak/{id}/{perkara}','PDFController@generatePDF')->name('print.pdf');

Route::get('/dashboard/laporan/lihat/{id}/{perkara}','PDFController@lihatPDF')->name('lihat.pdf');
