<?php

use App\Http\Livewire\Admin\AdminAddAlianceComponent;
use App\Http\Livewire\Admin\AdminAddEventoComponent;
use App\Http\Livewire\Admin\AdminAddNoticeComponent;
use App\Http\Livewire\Admin\AdminAddProyectComponent;
use App\Http\Livewire\Admin\AdminAddSliderComponent;
use App\Http\Livewire\Admin\AdminAlianzasComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditAlianzaComponent;
use App\Http\Livewire\Admin\AdminEditEventoComponent;
use App\Http\Livewire\Admin\AdminEditNoticeComponent;
use App\Http\Livewire\Admin\AdminEditProyectComponent;
use App\Http\Livewire\Admin\AdminEditSliderComponent;
use App\Http\Livewire\Admin\AdminEventosComponent;
use App\Http\Livewire\Admin\AdminMensajesComponent;
use App\Http\Livewire\Admin\AdminNoticiasComponent;
use App\Http\Livewire\Admin\AdminProyectosComponent;
use App\Http\Livewire\Admin\AdminSliderComponent;
use App\Http\Livewire\Admin\AdminGaleriaComponent;
use App\Http\Livewire\Admin\AdminAddGaleriaComponent;
use App\Http\Livewire\Admin\AdminEditGaleriaComponent;
use App\Http\Livewire\Contactos\EncuentranosComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\DetailsNoticeComponent;
use App\Http\Livewire\GaleriaComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Nosotros\ActividadesDeEcuAliadoComponent;
use App\Http\Livewire\Nosotros\HistoriaComponent;
use App\Http\Livewire\Nosotros\LeccionesAprendidasEnElTrabajoComunitarioComponent;
use App\Http\Livewire\Nosotros\MisionVisionObjetivosComponent;
use App\Http\Livewire\Nosotros\TransparenciaInstitucionalComponent;
use App\Http\Livewire\Servicios\VentaDeInsumosComponent;
use Illuminate\Support\Facades\Route;


//HOME
Route::get('/', HomeComponent::class);

//NOSOTROS
Route::get('historia', HistoriaComponent::class);
Route::get('mision-vision-objetivos', MisionVisionObjetivosComponent::class);
Route::get('actividades-de-ecualiado', ActividadesDeEcuAliadoComponent::class);
Route::get('lecciones-aprendidas-en-el-trabajo-comunitario', LeccionesAprendidasEnElTrabajoComunitarioComponent::class);
Route::get('transparencia-institucional', TransparenciaInstitucionalComponent::class);

//SERVICIOS
Route::get('venta-de-insumos', VentaDeInsumosComponent::class);

//CONTACTOS
Route::get('encuentranos', EncuentranosComponent::class);

//GALERIA
Route::get('galeria', GaleriaComponent::class);

//DETALLES
Route::get('/eventos/{slug}', DetailsComponent::class)->name('eventos.details');
Route::get('/noticias/{slug}', DetailsNoticeComponent::class)->name('noticias.details');

//For Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

    Route::get('/admin/slider', AdminSliderComponent::class)->name('admin.slider');
    Route::get('/admin/slider/add', AdminAddSliderComponent::class)->name('admin.addslider');
    Route::get('/admin/slider/edit/{sliders_image}', AdminEditSliderComponent::class)->name('admin.editslider');

    Route::get('/admin/eventos', AdminEventosComponent::class)->name('admin.eventos');
    Route::get('/admin/eventos/add', AdminAddEventoComponent::class)->name('admin.addevent');
    Route::get('/admin/eventos/edit/{eventos_slug}', AdminEditEventoComponent::class)->name('admin.editevent');

    Route::get('/admin/noticias', AdminNoticiasComponent::class)->name('admin.noticias');
    Route::get('/admin/noticias/add', AdminAddNoticeComponent::class)->name('admin.addnotice');
    Route::get('/admin/noticias/edit/{noticias_slug}', AdminEditNoticeComponent::class)->name('admin.editnotice');


    Route::get('/admin/proyectos', AdminProyectosComponent::class)->name('admin.proyectos');
    Route::get('/admin/proyectos/add', AdminAddProyectComponent::class)->name('admin.addproject');
    Route::get('/admin/proyectos/edit/{proyectos_name}', AdminEditProyectComponent::class)->name('admin.editproject');


    Route::get('/admin/alianzas', AdminAlianzasComponent::class)->name('admin.alianzas');
    Route::get('/admin/alianzas/add', AdminAddAlianceComponent::class)->name('admin.addaliance');
    Route::get('/admin/alianzas/edit/{alianzas_name}', AdminEditAlianzaComponent::class)->name('admin.editaliance');

    Route::get('/admin/mensajes', AdminMensajesComponent::class)->name('admin.mensajes');

    Route::get('/admin/galeria', AdminGaleriaComponent::class)->name('admin.galeria');
    Route::get('/admin/galeria/add', AdminAddGaleriaComponent::class)->name('admin.addgale');
    Route::get('/admin/galeria/edit/{eventos_slug}', AdminEditGaleriaComponent::class)->name('admin.editgale');

}) ;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
