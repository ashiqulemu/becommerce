@extends('admin.admin')

@section('content')

    <div id="page-wrapper">
        <br>
        <div class="row site-forms">
            <form method="post" action="{{url('/admin/category/'.$id)}}" enctype='multipart/form-data'>
                @csrf
                @method('patch')
                <div class="">
                    <div class="form-box-header">
                        Edit Category
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input
                                   class="form-control"
                                   name="name"
                                   type="text"
                                   value="{{$category->name}}"
                                   placeholder="name">

                            @if ($errors->has('name'))
                                <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" >{{$category->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Image</label>
                            <input
                                    class="form-control"
                                    name="category_image"
                                    type="file"
                                    placeholder="image">

                            @if ($errors->has('category_image'))
                                <div class="error">{{ $errors->first('category_image') }}</div>
                            @endif
                            <img src="{{url("/images/".$category->category_image)}}" class="thumbnail" width="100"/>
                            <input type="hidden" name="hidden_image" value="{{$category->category_image}}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Status</label>
                            @if($category->status=='Active')
                                <input type="radio" name="status" checked value="Active" id="active">
                                <label for="active">Active</label>
                                <input type="radio" name="status" value="Inactive" id="inactive">
                                <label for="inactive">Inactive</label>
                            @else
                                <input type="radio" name="status" value="Active" id="active">
                                <label for="active">Active</label>
                                <input type="radio" name="status" checked value="Inactive" id="inactive">
                                <label for="inactive">Inactive</label>
                                @endif

                            @if ($errors->has('status'))
                                <div class="error">{{ $errors->first('status') }}</div>
                            @endif

                        </div>

                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary ml-2" type="submit">Update</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    <!-- /#page-wrapper -->

@endsection