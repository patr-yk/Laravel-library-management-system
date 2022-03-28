<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class book extends Model
{
    use HasFactory;
    protected $fillable = [
			'name',
			'category_id',
			'auther_id',
			'publisher_id',
			'status',
			'created_at',
			'updated_at',
			'isbn',
			'releaseDate',
			'format',
			'pageNumber',
			'language',
			'imgUrl',
			'img2Url',
			'resume',
			'place',
			'owner_id',
			'comment'
		];

    /**
     * Get the auther that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function auther(): BelongsTo
    {
        return $this->belongsTo(auther::class,'auther_id','id');
    }

    /**
     * Get the category that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    /**
     * Get the publisher that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(publisher::class);
    }

		/**
     * Get the publisher that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(owner::class);
    }

}
