<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class order extends Model
{
    use HasFactory;
		protected $fillable = [
			'student_id',
			'book_id',
			'note'
		];

		/**
		 * Get the student that created the order
		 *
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function student(): BelongsTo
		{
				return $this->belongsTo(student::class,'student_id','id');
		}

		/**
		 * Get the ordered book
		 *
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function book(): BelongsTo
		{
				return $this->belongsTo(book::class,'book_id','id');
		}

}
