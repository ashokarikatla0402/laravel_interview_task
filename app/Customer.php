<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Customer extends Model
{
    use SoftDeletes;
    protected $table = "customers";
    protected $guarded = [
        'id'
    ];

    public function getCustomers(){
        return $this->select(DB::raw("id,full_name,age,languages,(case when willing_to_work = 1 then 'Yes' else 'No' end) as willing_to_work,(case when gender = 1 then 'Male' else 'Female' end) as gender"))->get();
    }
    /*
     * create customer data
     */
    public function postCreate($data){
        return $this->create($data);
    }
    /*
     * delete the customer record
     */
    public function getCustomerDelete($id){
        return Customer::destroy($id);
    }
    /*
     * get customer record
     */
    public function getCustomer($id){
        return $this->where('id',$id)->first();
    }
    /*
     * update customers data
     */
    public function updateCustomerData($data){

        return $this->where('id',$data['customer_id'])->update([
            'full_name'=>$data['full_name'],
            'age'=>$data['age'],
            'gender'=>$data['gender'],
            'willing_to_work'=>$data['willing_to_work'],
            'languages'=>$data['languages'],
        ]);
    }
    /*
     * modifiy langauages value
     */
    public function modifyLanguagesValue($languages){
        return implode(',',$languages);
    }
}
