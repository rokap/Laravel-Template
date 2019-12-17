<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Model;
	
	/**
 * App\Models\Account
 *
 * @property int $id
 * @property int $number
 * @property string $name
 * @property int $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $type_id
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereTypeId($value)
 */
	class Account extends Model
	{
		protected $fillable = [
			'number',
			'name',
			'type_id'
		];
		
		public function type()
		{
			return $this->belongsTo(AccountType::class);
		}
		
		public function activate()
		{
			$this->status = true;
			$this->save();
		}
		
		public function deactivate()
		{
			$this->status = false;
			$this->save();
		}
		
		public function balance($format = false)
		{
			$balance = AccountTransaction::whereAccountId($this->id)->sum("amount");
			
			if ($format)
				$balance = '$' . number_format($balance, 2);
			
			return $balance;
		}
	}
