<?php

namespace Modules\Sekolah\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webpatser\Uuid\Uuid;

class Sekolah extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'uuid';
	public $incrementing = false;
	protected $keyType = 'string';

    protected static function newFactory()
    {
        return \Modules\Sekolah\Database\factories\SekolahFactory::new();
    }

    public static function boot()
	{
		parent::boot();
		self::creating(function ($model) {
			$model->uuid = (string) Uuid::generate();
		});
	}
	
	public function getRouteKeyName()
	{
		return 'uuid';
	}
    
}
