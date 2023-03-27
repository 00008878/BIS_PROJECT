@extends('layout.app')

@section('content')

@if(isset($message))
    <h1>{{$message}}</h1>
@endif
<div class="row d-flex justify-content-center">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Please upload file</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('client.upload-passport', ['client_id' => request()->route()->parameters['client_id']]) }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputImage" class="sr-only">Image</label>
                        <input type="file" name="image" id="inputImage" class="form-control" placeholder="Image" required="" autofocus="">
                    </div>
                    <div class="form-group">
                        <label for="inputFileType" class="sr-only">File Type</label>
                        <select name="file_type" id="inputFileType" class="form-control pb-2">
                            <option value="passport">Passport</option>
                            <option value="ID">ID</option>
                        </select>
                    </div>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Continue</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection
