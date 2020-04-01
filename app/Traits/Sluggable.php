<?php
namespace App\Traits;

trait Sluggable
{
	public static function bootSluggable()
	{
		static::saving(function ($model) {
			$model->slug = $model->generateSlug($model->{$model->sluggable()});
		});
	}

	protected function sluggableField() {
		return 'title';
	}

	public function generateSlug($string)
	{
		return strtolower(preg_replace(
			['/[^\w\s]+/', '/\s+/'],
			['', '-'],
			$string
		));
	}
}
