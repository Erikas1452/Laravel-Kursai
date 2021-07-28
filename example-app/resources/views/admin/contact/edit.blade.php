@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
<div class="card card-default">
     <div class="card-header card-header-border-bottom">
          <h2>Edit Contact Info</h2>
     </div>
     <div class="card-body">
     <form action="{{ url('/contact/update/'.$contactedit->id) }}" method="POST">
          @csrf
               <div class="form-group">
                    <label for="exampleFormControlInput1">Email </label>
                    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" value="{{ $contactedit->email }}" >
               </div>

               <div class="form-group">
                    <label for="exampleFormControlTextarea1">Phone</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="phone">
                    {{ $contactedit->phone }}
                    </textarea>
               </div>

               <div class="form-group">
                    <label for="exampleFormControlTextarea1"><Address></Address></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">
                    {{ $contactedit->address }}
                    </textarea>
               </div>

               <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                    
               </div>
          </form>
     </div>
</div>
 


@endsection
