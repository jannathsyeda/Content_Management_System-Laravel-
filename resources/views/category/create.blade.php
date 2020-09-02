@extends('layouts.app')

@section('content')

@if ($errors->any())
<div class="alert alert-danger m-3">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card card-default">
      <div class="card-header">
        {{ isset($category) ? 'edit category' :'create category' }}
      </div>
      <div class="card-body">
        <form action="{{ isset($category)? route('category.update',$category->id) : route('category.store') }}" method="POST">
          @csrf
        @if(isset($category))
      @method('PUT')
        @endif
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ isset($category)? $category->name : '' }}">
          </div>
          

          <div class="form-group text-center">
            <button type="submit" class="btn btn-success">
      {{ isset($category) ? 'edit category' : 'add category' }}          
</button>
          </div>

          
           
          
        </form>

      
      </div>
    </div>
  </div>
</div>


@endsection