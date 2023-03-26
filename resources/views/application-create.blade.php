@php use App\Models\Application; @endphp
@extends('layout.app')

@section('content')

    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sign in</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if($service->two_sided)
                    <form action="{{ route('application.invite') }}" method="POST">
                        <div class="card-body">
                            @php /** @var Application $application */ @endphp
                            @csrf
                            <input type="hidden" name="application_id" value="{{ $application->id }}">
                            <input type="hidden" name="client_id" value="{{ $application->client_id }}">

                            <div class="form-group">
                                <label for="pinfl">Pinfl</label>
                                <input type="text" name="pinfl" class="form-control" id="pinfl" placeholder="Enter text">
                            </div>

                            <button type="submit" class="btn btn-success">Invite second person</button>
                        </div>
                    </form>
                @endif
                <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">
                        @foreach($requirements as $key => $requirement)

                            <div class="form-group">
                                <label for="exampleInputFile">{{ $requirement->title }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="file-{{ $key }}" class="custom-file-input" id="{{ $requirement->id }}">
                                        <label class="custom-file-label" for="{{ $requirement->id }}">Choose file</label>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                            <input type="hidden" name="application_id" value="{{ $application->id }}">
                            <input type="hidden" name="client_id" value="{{ $client->id }}">
                            <input type="hidden" name="service_type" value="{{ $service->type }}">

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
