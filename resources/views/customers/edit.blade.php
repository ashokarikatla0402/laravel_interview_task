@extends('layouts.app')
@section('title',' Edit Customer')
@section('content')
<h3>Edit Customer</h3>
@if($errors->any())
    @component('alert', ['errors' => $errors->all(),'status_class'=>'alert-danger'])
    @endcomponent
@endif
<div>
    <form action="{{ url('customers/update') }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" value="{{ $customer->id }}" name="customer_id">
        <label for="full_name">
            Full Name
        </label>
        <input type="text" name="full_name" id="full_name" value="{{ $customer->full_name }}" required placeholder="Full Name">
        <label for="age">
            Age
        </label>
        <input type="number" min="1" max="1000"  name="age" value="{{ $customer->age }}" id="age" required placeholder="age" maxlength="2">
        <label for="gender">
            Gender
        </label>
        <select name="gender" id="gender" required>
            <option value="">Select Gender</option>
            <option value="1" @if($customer->gender == "1") selected @endif>Male</option>
            <option value="0"  @if($customer->gender == "0") selected @endif>Female</option>
        </select>
        <label for="">Willing To Work?</label>
        <label for="willing_to_work_yes">
            <input type="radio" name="willing_to_work"  @if($customer->willing_to_work == "1") checked @endif  id="willing_to_work_yes" value="1" >Yes
        </label>
        <label for="willing_to_work_no">
            <input type="radio" name="willing_to_work"  @if($customer->willing_to_work == "0") checked @endif  id="willing_to_work_no" value="0" >No
        </label>


        <label for="">Languages</label>
        <label for="lang_telugu">
            <input type="checkbox" name="languages[]"   @if($customer->languages != null  && in_array("telegu",explode(',',$customer->languages))) checked @endif  id="lang_telugu" value="telugu" >Telugu
        </label>
        <label for="lang_english">
            <input type="checkbox" name="languages[]" @if($customer->languages != null && in_array("english",explode(',',$customer->languages))) checked @endif id="lang_english" value="english" >English
        </label>
        <label for="lang_hindi">
            <input type="checkbox" name="languages[]" @if($customer->languages != null && in_array("hindi",explode(',',$customer->languages))) checked @endif id="lang_hindi" value="hindi" >Hindi
        </label>
        <label for="lang_tamil">
            <input type="checkbox" name="languages[]" @if($customer->languages != null && in_array("tamil",explode(',',$customer->languages))) checked @endif  id="lang_tamil" value="tamil" >Tamil
        </label>

        <input type="submit" value="Update">
    </form>
</div>
@endsection