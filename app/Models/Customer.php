<?php
	
	namespace App\Models;
	
	use Illuminate\Database\Eloquent\Model;
	
	/**
 * App\Models\Customer
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $company
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property string|null $billing_address_1
 * @property string|null $billing_address_2
 * @property string|null $billing_city
 * @property string|null $billing_state
 * @property string|null $billing_zip
 * @property string|null $shipping_address_1
 * @property string|null $shipping_address_2
 * @property string|null $shipping_city
 * @property string|null $shipping_state
 * @property string|null $shipping_zip
 * @property string|null $phone
 * @property string|null $fax
 * @property string|null $email
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereBillingAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereBillingAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereBillingCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereBillingState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereBillingZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereShippingAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereShippingAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereShippingCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereShippingState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereShippingZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $name
 */
	class Customer extends Model
	{
		protected $attributes = ['name'];
		protected $fillable = [
			'company',
			'first_name',
			'middle_name',
			'last_name',
			'billing_address_1',
			'billing_address_2',
			'billing_city',
			'billing_state',
			'billing_zip',
			'shipping_address_1',
			'shipping_address_2',
			'shipping_city',
			'shipping_state',
			'shipping_zip',
			'phone',
			'fax',
			'email'
		];
		
		public function getNameAttribute()
		{
			if (isset($this->company))
				return $this->company;
			else
				return $this->first_name . ' ' . $this->last_name;
		}
	}
