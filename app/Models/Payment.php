<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Model;
	
	/**
	 * App\Models\Payment
	 *
	 * @property int $id
	 * @property \Illuminate\Support\Carbon|null $created_at
	 * @property \Illuminate\Support\Carbon|null $updated_at
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payment newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payment newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payment query()
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payment whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payment whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payment whereUpdatedAt($value)
	 * @mixin \Eloquent
	 */
	class Payment extends Model
	{
		protected $appends =['type'];
		
		public function getTypeAttribute()
		{
			return 'Payment';
		}
		
		public function invoice()
		{
			return $this->belongsTo(Invoice::class);
		}
	}
