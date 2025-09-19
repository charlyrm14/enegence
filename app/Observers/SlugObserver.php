<?php

namespace App\Observers;

use Illuminate\Support\Str;


class SlugObserver
{
    /**
     * Handle the created event
     */
    public function created($model): void
    {
        $this->generateSlug($model);
    }

    /**
     * Generate an assign a unique slug for a given model based on its name.
     * If the slug generated its already exists the model append an id
     *
     * @return void
     */
    public function generateSlug($model): void
    {
        $slug = Str::slug($model->name);

        $exists = $model->newQuery()->where('slug', $slug)->exists();

        if(!$exists) {
            $model->slug = $slug;
        } else {
            $model->slug = "{$slug}-{$model->id}";
        }

        $model->save();
    }
}
