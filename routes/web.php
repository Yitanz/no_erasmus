<?php

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
 Route::get('/',"HomeController@index")->name('home');
 Route::get('/contacte','HomeController@contacte')->name('contacte');
 Route::get('/noticies',"HomeController@noticies")->name('noticies');
 Route::get('/noticies/n',"HomeController@noticia")->name('noticia');
 Route::get('/atraccions',"HomeController@atraccions")->name('atraccions');
 Route::get('/atraccions/{id}',"HomeController@llistarAtraccionsPublic")->name('atraccions_generades');
 Route::get('/entrades',"HomeController@entrades")->name('entrades');
 Route::get('/gestio',"HomeController@gestio")->name('gestio')->middleware(['auth','is_admin','verified']);
 Route::get('/perfil',"HomeController@perfil")->name('perfil')->middleware(['auth','verified']);
 Route::get('/incidencia',"HomeController@incidencia")->name('incidencia')->middleware(['auth','verified']);
 Route::get('/mes', "HomeController@mes")->name('mes');
 Route::get('/pizzeria',"HomeController@pizzeria")->name('pizzeria');
 Route::get('/faq',"HomeController@faq")->name('faq');
 Route::get('/multimedia',"HomeController@multimedia")->name('multimedia');
 Route::get('/promocions',"HomeController@promocions")->name('promocions');
 Route::get('/promocions/n',"HomeController@promocio")->name('promocio');
 Route::get('/tendes/figures', array('as' => 'tenda_figures','uses' => 'HomeController@tenda_figures'));
 Route::get('/construccio','HomeController@construccio')->name('construccio');

 Route::any('/restaurant', 'HomeController@tenda_burger')->name('restaurant');
 Route::any('/restaurant/compra', 'HomeController@burger_comprar')->name('restaurant.compra');

//guardar CONTACTE
 Route::post('/contacte', 'ContacteController@store' )->name('contacte2');

 //gestio ticket/dubtes/contacte

 Route::get('gestio/ticket', 'ContacteController@index')->name('ticket.index')->middleware(['auth','is_admin','verified']);

 Route::any('gestio/ticket/destroy/{id}', 'ContacteController@destroy')->name('ticket.assign.destroy')->middleware(['auth','is_admin','verified']);

 Route::any('gestio/ticket/list', 'ContacteController@assignList')->name('ticket.list')->middleware(['auth','is_admin','verified']);

 Route::any('gestio/ticket/{id}', 'ContacteController@llistarEmpleats')->name('ticket.assign')->middleware(['auth','is_admin','verified']);

 Route::any('gestio/save{id}','ContacteController@saveTicket')->name('saveTicket')->middleware(['auth','is_admin','verified']);


//assignacio emp-zona Manteniment

Route::get('gestio/zones/assign', 'AssignEmpZonaController@index')->name('zones.assign')->middleware(['auth','is_admin','verified']);
Route::get ('gestio/zones/{id}/data', 'AssignEmpZonaController@viewData')->name('AssignEmpZonaData')->middleware(['auth','is_admin','verified']);
Route::get ('gestio/zones/{id}/data/empleat/', 'AssignEmpZonaController@filterEmploye')->name('filterEmploye')->middleware(['auth','is_admin','verified']);
Route::any('/gestio/zones/crearassignaciomanteniment/guardar/{id}', 'AssignEmpZonaController@saveAssign')->name('zones.saveAssign')->middleware(['auth','is_admin','verified']);
Route::get ('/gestio/zones/llistarAssign', 'AssignEmpZonaController@listAssign')->name('zones.list')->middleware(['auth','is_admin','verified']);;
Route::get('/gestio/zones/eliminarAssign/{id}', 'AssignEmpZonaController@deleteAssign')->name('zones.emp.delete')->middleware(['auth','is_admin','verified']);

//assignacio emp-zona neteja
Route::get ('gestio/zones/{id}/data/neteja', 'AssignEmpZonaController@viewDataNeteja')->name('AssignEmpZonaDataNeteja')->middleware(['auth','is_admin','verified']);
Route::get ('gestio/zones/{id}/data/empleat/neteja', 'AssignEmpZonaController@filterEmployeNeteja')->name('filterEmploye')->middleware(['auth','is_admin','verified']);
/*Route::get ('gestio/zones/{id}/data/empleat/', 'AssignEmpZonaController@filterEmploye')->name('filterEmploye')->middleware(['auth','is_admin','verified']);
Route::any('/gestio/zones/crearassignaciomanteniment/guardar/{id}', 'AssignEmpZonaController@saveAssign')->name('zones.saveAssign')->middleware(['auth','is_admin','verified']);
Route::get ('/gestio/zones/llistarAssign', 'AssignEmpZonaController@listAssign')->name('zones.list')->middleware(['auth','is_admin','verified']);;
Route::get('/gestio/zones/eliminarAssign/{id}', 'AssignEmpZonaController@deleteAssign')->name('zones.emp.delete')->middleware(['auth','is_admin','verified']);

//assignacio emp-zona Atencio al client
/*
Route::get ('gestio/zones/{id}/data', 'AssignEmpZonaController@viewData')->name('AssignEmpZonaData')->middleware(['auth','is_admin','verified']);
Route::get ('gestio/zones/{id}/data/empleat/', 'AssignEmpZonaController@filterEmploye')->name('filterEmploye')->middleware(['auth','is_admin','verified']);
Route::any('/gestio/zones/crearassignaciomanteniment/guardar/{id}', 'AssignEmpZonaController@saveAssign')->name('zones.saveAssign')->middleware(['auth','is_admin','verified']);
Route::get ('/gestio/zones/llistarAssign', 'AssignEmpZonaController@listAssign')->name('zones.list')->middleware(['auth','is_admin','verified']);;
Route::get('/gestio/zones/eliminarAssign/{id}', 'AssignEmpZonaController@deleteAssign')->name('zones.emp.delete')->middleware(['auth','is_admin','verified']);*/



   /* RUTES GRUP 1 */
   Auth::routes(['verify' => true]);

 Route::patch('/notification-read/{id}', 'NotificationsController@destroy')->name('markasread')->middleware(['auth','verified']);

 Route::post('/incidencia', 'IncidenciesController@store_incidencia')->name('incidencia')->middleware(['auth','verified']);

 Route::get('gestio/incidencies/assign', 'IncidenciesController@assigned')->name('incidencies.assign')->middleware(['auth','is_admin','verified']);

 Route::get('gestio/incidencies/done', 'IncidenciesController@done')->name('incidencies.done')->middleware(['auth','is_admin','verified']);

 Route::resource('gestio/incidencies', 'IncidenciesController')->middleware(['auth','is_admin','verified']);

 Route::resource('gestio/empleats', 'EmpleatsController')->middleware(['auth','is_admin','verified']);

 Route::resource('gestio/zones', 'ZonesController')->middleware(['auth','is_admin','verified']);

 Route::resource('gestio/AssignEmpZona', 'AssignEmpZonaController')->middleware(['auth','is_admin','verified']);

 Route::resource('gestio/GestioServeis', 'GestioServeisController')->middleware(['auth','is_admin','verified']);

 Route::resource('gestio/serveis', 'ServeisController')->middleware(['auth','is_admin','verified']);

 Route::resource('/gestio/noticies', 'NoticiesController')->middleware(['auth','is_admin','verified']);

 Route::resource('/gestio/promocions', 'PromocionsController')->middleware(['auth','is_admin','verified']);


 Route::get('/view/incidencies/assign', 'IncidenciesController@assignadesGuardarPDF')->middleware(['auth','is_admin','verified']);

 Route::get('/votacions',"HomeController@votacions")->name('votacions');

 Route::post('/votacions',"HomeController@votacio_accio")->name('votacio_accio');

 Route::get('/tasques','HomeController@tasques')->name('tasques')->middleware(['auth','is_worker','verified']);

 Route::get('/notificacions', 'HomeController@notificacionsGeneral')->name('notificacions')->middleware(['auth','is_worker','verified']);

 Route::patch('/tasques/ticket/{id}', 'ContacteController@conclude')->name('ticket.bonic.conclude')->middleware(['auth','is_worker','verified']);

 Route::patch('/tasques/{id}', 'IncidenciesController@conclude')->name('incidencies.conclude')->middleware(['auth','is_worker','verified']);



 /* RUTES GRUP 2 */
 Route::any('/gestio/atraccions/crearassignaciomantenimentdate/{id}','AtraccionsController@crearAssignacioMantenimentDate')->name('atraccions.crearassignaciomantenimentdate')->middleware(['auth','is_admin','verified']);

 Route::any('/gestio/atraccions/crearassignacionetejadate/{id}','AtraccionsController@crearAssignacioNetejaDate')->name('atraccions.crearassignacionetejadate')->middleware(['auth','is_admin','verified']);

 Route::any('/gestio/atraccions/crearassignaciogeneraldate/{id}','AtraccionsController@crearAssignacioGeneralDate')->name('atraccions.crearassignaciogeneraldate')->middleware(['auth','is_admin','verified']);

 Route::any('/gestio/atraccions/crearassignaciomanteniment/{id}', 'AtraccionsController@crearAssignacioManteniment')->name('atraccions.crearassignaciomanteniment')->middleware(['auth','is_admin','verified']);

 Route::any('/gestio/atraccions/crearassignacioneteja/{id}', 'AtraccionsController@crearAssignacioNeteja')->name('atraccions.crearassignacioneteja')->middleware(['auth','is_admin','verified']);

 Route::any('/gestio/atraccions/crearassignaciogeneral/{id}', 'AtraccionsController@crearAssignacioGeneral')->name('atraccions.crearassignaciogeneral')->middleware(['auth','is_admin','verified']);

 Route::any('/gestio/atraccions/crearassignaciomanteniment/guardar/{id}', 'AtraccionsController@guardarAssignacio')->name('atraccions.guardarAssignacio')->middleware(['auth','is_admin','verified']);

 Route::any('/gestio/atraccions/assigna', 'AtraccionsController@assigna')->name('atraccions.assigna')->middleware(['auth','is_admin','verified']);

 Route::any('/gestio/atraccions/assignacions', 'AtraccionsController@assignacions')->name('atraccions.assignacions')->middleware(['auth','is_admin','verified']);

 Route::any('/gestio/atraccions/assignacions/editAssignacions/{id}', 'AtraccionsController@editAssignacions')->name('atraccions.assignacions.editAssignacions')->middleware(['auth','is_admin','verified']);

 Route::any('/gestio/atraccions/assignacions/updateAssignacions/{id}', 'AtraccionsController@updateAssignacions')->name('atraccions.assignacions.updateAssignacions')->middleware(['auth','is_admin','verified']);

 Route::any('/gestio/atraccions/assignacions/destroy/{id}', 'AtraccionsController@destroyAssignacions')->name('atraccions.assignacions.destroy')->middleware(['auth','is_admin','verified']);


 Route::resource('/gestio/atraccions', 'AtraccionsController')->middleware(['auth','is_admin','verified']);

 Route::get('/gestio/atraccions/image', 'AtraccionsController@store')->name('image.upload')->middleware(['auth','is_admin','verified']);

 Route::post('/gestio/atraccions/image', 'AtraccionsController@store')->name('image.upload.post')->middleware(['auth','is_admin','verified']);

 Route::resource('/gestio/clients', 'ClientsController')->middleware(['auth','is_admin','verified']);

 /* Guardar PDF */
 Route::get('/view/atraccions/index', 'AtraccionsController@guardarPDF');

 /* Gestio imatges */
 Route::get("/gestio/imatges", "ImageController@create")->name('imatges.create')->middleware(['auth','is_admin','verified']);
 Route::post("/gestio/imatges/save", "ImageController@save")->name('imatges.save')->middleware(['auth','is_admin','verified']);

 /* Entrades */
 Route::post('/entrades', array('as' => 'entrades','uses' => 'HomeController@parc_afegir_cistella'));
 Route::resource('/gestio/productes', 'gestioProductes')->middleware(['auth','is_admin','verified']);
 Route::resource('/gestio/ventes', 'VentesController')->middleware(['auth','is_admin','verified']);

 Route::get('/cistella', 'HomeController@cistella')->name('cistella')->middleware(['auth','verified']);
 Route::delete('/cistella', 'HomeController@cistella_delete')->name('cistella')->middleware(['auth','verified']);
 Route::get('/compra', 'HomeController@compra')->name('compra')->middleware(['auth','verified']);
 Route::get('/compra_finalitzada', 'HomeController@compra_finalitzada')->name('compra_finalitzada')->middleware(['auth','verified']);

 /* Tenda */
 Route::get('/tenda', 'TendaController@indexTenda')->name('tenda');
 Route::get('/tenda/atraccions', 'TendaController@indexAtraccions')->name('tendaFotos');
 Route::get('/imprimirFotos/{id}','TendaController@imprimirFotos');
 Route::get('/comprarFotos/{id}','TendaController@afegir_Foto');
