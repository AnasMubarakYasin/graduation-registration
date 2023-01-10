<?php

namespace App\Observers;

use App\Models\Registrar;
use Illuminate\Support\Facades\Storage;

class RegistrarObserver
{
    public function saving(Registrar $registrar)
    {
        //
    }

    /**
     * Handle the Registrar "created" event.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return void
     */
    public function created(Registrar $registrar)
    {
        $registrar->saveQuietly();
        $this->move_file($registrar);
    }

    /**
     * Handle the Registrar "updated" event.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return void
     */
    public function updated(Registrar $registrar)
    {
        $registrar->check();
    }

    /**
     * Handle the Registrar "deleted" event.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return void
     */
    public function deleted(Registrar $registrar)
    {
        $this->delete_file($registrar);
    }

    /**
     * Handle the Registrar "restored" event.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return void
     */
    public function restored(Registrar $registrar)
    {
        //
    }

    /**
     * Handle the Registrar "force deleted" event.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return void
     */
    public function forceDeleted(Registrar $registrar)
    {
        $this->delete_file($registrar);
    }

    public function move_file(Registrar $registrar)
    {
        if ($registrar->photo && Storage::exists($registrar->photo)) {
            Storage::move($registrar->photo, "registrar/$registrar->id");
        }
        if ($registrar->munaqasyah && Storage::exists($registrar->munaqasyah)) {
            Storage::move($registrar->munaqasyah, "registrar/$registrar->id");
        }
        if ($registrar->school_certificate && Storage::exists($registrar->school_certificate)) {
            Storage::move($registrar->school_certificate, "registrar/$registrar->id");
        }
        if ($registrar->ktp && Storage::exists($registrar->ktp)) {
            Storage::move($registrar->ktp, "registrar/$registrar->id");
        }
        if ($registrar->kk && Storage::exists($registrar->kk)) {
            Storage::move($registrar->kk, "registrar/$registrar->id");
        }
        if ($registrar->spukt && Storage::exists($registrar->spukt)) {
            Storage::move($registrar->spukt, "registrar/$registrar->id");
        }
    }

    public function delete_file(Registrar $registrar)
    {
        if ($registrar->photo) {
            Storage::delete($registrar->photo);
        }
        if ($registrar->munaqasyah) {
            Storage::delete($registrar->munaqasyah);
        }
        if ($registrar->school_certificate) {
            Storage::delete($registrar->school_certificate);
        }
        if ($registrar->ktp) {
            Storage::delete($registrar->ktp);
        }
        if ($registrar->kk) {
            Storage::delete($registrar->kk);
        }
        if ($registrar->spukt) {
            Storage::delete($registrar->spukt);
        }
        Storage::deleteDirectory("registrar/$registrar->id");
    }
}
