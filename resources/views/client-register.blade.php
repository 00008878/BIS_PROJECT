@extends('layout.app')

@section('content')

    <div class="row d-flex justify-content-center">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Please fill in the form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('client.register') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName" class="sr-only">Name</label>
                            <input type="text" name="name" id="inputName" class="form-control" placeholder="Name"
                                   required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputSurname" class="sr-only">Surname</label>
                            <input type="text" name="surname" id="inputSurname" class="form-control"
                                   placeholder="Surname" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputPatronymic" class="sr-only">Patronymic</label>
                            <input type="text" name="patronymic" id="inputPatronymic" class="form-control"
                                   placeholder="Patronymic" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputPhone" class="sr-only">Phone</label>
                            <input type="text" name="phone" id="inputPhone" class="form-control" placeholder="Phone"
                                   required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputBirthdate" class="sr-only">Birthdate</label>
                            <input type="date" name="birthdate" id="inputBirthdate" class="form-control"
                                   placeholder="Birthdate" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputGender" class="sr-only">Gender</label>
                            <input type="text" name="gender" id="inputName" class="form-control" placeholder="Gender"
                                   required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputSerialNumber" class="sr-only">Passport Serial Number</label>
                            <input type="text" name="serial_number" id="inputSerialNumber" class="form-control"
                                   placeholder="Serial Number" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputPinfl" class="sr-only">Pinfl</label>
                            <input type="number" name="pinfl" id="inputPinfl" class="form-control" placeholder="Pinfl"
                                   required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputIssueDate" class="sr-only">Issue Date</label>
                            <input type="date" name="issue_date" id="inputIssueDate" class="form-control"
                                   placeholder="Issue Date" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputExpiryDate" class="sr-only">Expiry Date</label>
                            <input type="date" name="expiry_date" id="inputExpiryDate" class="form-control"
                                   placeholder="Expiry Date" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress" class="sr-only">Address</label>
                            <input type="text" name="address" id="inputAddress" class="form-control"
                                   placeholder="Address" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputRegion" class="sr-only">Region</label>
                            <input type="text" name="region" id="inputRegion" class="form-control" placeholder="Region"
                                   required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputCityName" class="sr-only">City Name</label>
                            <input type="text" name="city_name" id="inputCityName" class="form-control"
                                   placeholder="City Name" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputNationality" class="sr-only">Nationality</label>
                            <input type="text" name="nationality_name" id="inputNationality" class="form-control"
                                   placeholder="Nationality" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label for="inputType" class="sr-only">Type</label>
                            <select name="type" id="inputType" class="form-control pb-2">
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
