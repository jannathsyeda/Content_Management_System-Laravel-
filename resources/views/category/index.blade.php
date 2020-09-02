@extends('layouts.app')

@section('content')

@if (session()->has('success'))
<div class="alert alert-success m-3" role="alert">
    {{ session()->get('success') }}
</div>
@endif
<div class="d-flex justify-content-end">   
 <a href="{{ route('category.create') }}" class="btn btn-success float-right"> Add Category</a>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-default">
        <div class="card-header"> Categories</div>
        <div class="card-body">
          <ul class="list-group">
            @foreach($categories as $category)
              <li class="list-group-item">
                {{ $category->name }}
             
                <button class="btn btn-danger btn-sm float-right" 
                onclick=" handleDelete({{ $category->id }}) ">Delete</button> 
                   <a href="{{ route('category.edit',$category->id) }}"> <button class="btn btn-primary btn-sm float-right">Edit</button></a>
                                </li>
            @endforeach
          </ul>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
         aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
        <form action="" method="POST" id="deleteCategoryForm">
          @csrf
          @method('DELETE')

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> ARE YOU SURE,you want to deleted this category??</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">no go back </button>
        <button type="submit" class="btn btn-primary">Yes delete</button>
      </div>
    </div>

</form>
          </div>
        </div>
    </div>
  </div>


</div>



@endsection

@section('scripts')
<script>

function handleDelete(id)
{
  var form =document.getElementById('deleteCategoryForm')

 form.action = 'category/'+id
  console.log('deleting.',form)
  $('#deleteModal').modal('show')

}
  </script>
@endsection