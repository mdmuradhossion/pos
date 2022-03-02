@extends('layouts.admin_app')
@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/category_form')}}">Category Update</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/category')}}">Category List</a></li>
            </ol>
        </div>
    </div>

    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category Update</h4> 
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @foreach($category as $view)
                        <div class="form-validation">
                            <form class="form-valide" action="{{ url('/category_update',$view->prod_cat_id) }}" method="post">
                            	@csrf      
                                
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="category_name">Category Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" value="{{ $view->category_name }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="parent_pro_cat">Parents Category <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">                
                                        <select class="form-control" id="parent_pro_cat" name="parent_pro_cat" >
                                            <option value="0">Select Parents Category</option>
                                            <?php echo Helpers::subCategoryListOption($view->parent_pro_cat) ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->

</div>
@endsection