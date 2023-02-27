<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
    <title>Test</title>
</head>
<body>
@if (Auth::check())
    <a href="/logout" class="btn btn-secondary">Выход</a>
@endif
<form method="POST" action="{{ route('client.register') }}" class="form-signin">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">Please fill in the form</h1>
    <label for="inputName" class="sr-only">Name</label>
    <input type="text" name="name" id="inputName" class="form-control" placeholder="Name" required="" autofocus="">

    <label for="inputSurname" class="sr-only">Surname</label>
    <input type="text" name="surname" id="inputSurname" class="form-control" placeholder="Surname" required="" autofocus="">

    <label for="inputPatronymic" class="sr-only">Patronymic</label>
    <input type="text" name="patronymic" id="inputPatronymic" class="form-control" placeholder="Patronymic" required="" autofocus="">

    <label for="inputPhone" class="sr-only">Phone</label>
    <input type="text" name="phone" id="inputPhone" class="form-control" placeholder="Phone" required="" autofocus="">

    <label for="inputBirthdate" class="sr-only">Birthdate</label>
    <input type="date" name="birthdate" id="inputBirthdate" class="form-control" placeholder="Birthdate" required="" autofocus="">

    <label for="inputGender" class="sr-only">Gender</label>
    <input type="text" name="gender" id="inputName" class="form-control" placeholder="Gender" required="" autofocus="">

    <label for="inputSerialNumber" class="sr-only">Passport Serial Number</label>
    <input type="text" name="serial_number" id="inputSerialNumber" class="form-control" placeholder="Serial Number" required="" autofocus="">

    <label for="inputPinfl" class="sr-only">Pinfl</label>
    <input type="number" name="pinfl" id="inputPinfl" class="form-control" placeholder="Pinfl" required="" autofocus="">

    <label for="inputIssueDate" class="sr-only">Issue Date</label>
    <input type="date" name="issue_date" id="inputIssueDate" class="form-control" placeholder="Issue Date" required="" autofocus="">

    <label for="inputExpiryDate" class="sr-only">Expiry Date</label>
    <input type="date" name="expiry_date" id="inputExpiryDate" class="form-control" placeholder="Expiry Date" required="" autofocus="">

    <label for="inputAddress" class="sr-only">Address</label>
    <input type="text" name="address" id="inputAddress" class="form-control" placeholder="Address" required="" autofocus="">

    <label for="inputRegion" class="sr-only">Region</label>
    <input type="text" name="region" id="inputRegion" class="form-control" placeholder="Region" required="" autofocus="">

    <label for="inputCityName" class="sr-only">City Name</label>
    <input type="text" name="city_name" id="inputCityName" class="form-control" placeholder="City Name" required="" autofocus="">

    <label for="inputNationality" class="sr-only">Nationality</label>
    <input type="text" name="nationality_name" id="inputNationality" class="form-control" placeholder="Nationality" required="" autofocus="">

    <label for="inputType" class="sr-only">Type</label>
    <select name="type" id="inputType" class="form-control pb-2">
        <option value="passport">Passport</option>
        <option value="ID">ID</option>
    </select>

    <button class="btn btn-lg btn-primary btn-block mt-2" type="submit">Continue</button>
</form>
</body>
</html>
