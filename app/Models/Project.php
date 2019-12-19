<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Model;
	
	/**
	 * App\Models\Project
	 *
	 * @property int $id
	 * @property \Illuminate\Support\Carbon|null $created_at
	 * @property \Illuminate\Support\Carbon|null $updated_at
	 * @property int $customer_id
	 * @property string $name
	 * @property string $description
	 * @property string $due_date
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project newModelQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project newQuery()
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project query()
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereCustomerId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereDescription($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereDueDate($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereName($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereUpdatedAt($value)
	 * @mixin \Eloquent
	 * @property int|null $project_status_id
	 * @property-read \App\Models\Customer $customer
	 * @property-read \App\Models\Customer $status
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereProjectStatusId($value)
	 */
	class Project extends Model
	{
		protected $fillable = [
			'name',
			'customer_id',
			'description',
			'due_date',
			'project_status_id'
		];
		
		protected $dates = ['due_date'];
		
		public function customer()
		{
			return $this->belongsTo(Customer::class,'customer_id','id');
		}
		
		public function status()
		{
			return $this->belongsTo(ProjectStatus::class, 'project_status_id');
		}
		
		public function estimates()
		{
			return $this->hasMany(Estimate::class);
		}
		
		public function invoices()
		{
			return $this->hasMany(Invoice::class);
		}
		
		public function payments()
		{
			return $this->hasMany(Payment::class);
		}
		
		public function purchases()
		{
			return $this->hasMany(PurchaseOrder::class);
		}
		
		public function bills()
		{
			return $this->hasMany(Bill::class);
		}
		
		public function checks()
		{
			return $this->hasMany(Check::class);
		}
	}
