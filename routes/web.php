<?php

use App\Exports\SiswaTemplateExport;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\DaftarEskulController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', [FormController::class, 'index'])->name('home');

Auth::routes();

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', IsAdminMiddleware::class])
    ->group(function () {

        Route::post('/siswa/bulk-delete', [SiswaController::class, 'bulkDelete'])
            ->name('siswa.bulkDelete');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/filter-tahun', function (Request $request) {
            session(['filter_tahun' => $request->tahun_ajaran]);
            return redirect()->back();
        })->name('filter.tahun');

        Route::get('/siswa/template', function () {
            return Excel::download(new SiswaTemplateExport, 'template_siswa.xlsx');
        })->name('siswa.template');

        Route::resource('siswa', SiswaController::class);

        Route::post('/siswa/import', [SiswaController::class, 'import'])
            ->name('siswa.import');

        Route::delete('/siswa/bulk-delete', [SiswaController::class, 'bulkDelete'])
            ->name('siswa.bulkDelete');

        Route::resource('eskul', EskulController::class);
        Route::resource('jadwal', JadwalController::class);

        Route::resource('daftar_eskul', DaftarEskulController::class)->parameters([
            'daftar_eskul' => 'daftar_Eskul',
        ]);

        Route::resource('penerimaan', PenerimaanController::class);

        Route::post('/penerimaan/{id}/approve', [PenerimaanController::class, 'approve'])
            ->name('penerimaan.approve');

        Route::post('/penerimaan/{id}/reject', [PenerimaanController::class, 'reject'])
            ->name('penerimaan.reject');

        Route::post('/penerimaan/approve-menunggu', [PenerimaanController::class, 'approveMenunggu'])
            ->name('penerimaan.approveMenunggu');

        Route::post('/penerimaan/reject-menunggu', [PenerimaanController::class, 'rejectMenunggu'])
            ->name('penerimaan.rejectMenunggu');
    });

Route::middleware(['auth'])->group(function () {

    Route::post('/daftar-eskul', [DaftarEskulController::class, 'store'])
        ->name('daftar.eskul.store');

    Route::get('/eskul/{id}/detail', [FormController::class, 'show'])
        ->name('eskul.detail');
});
