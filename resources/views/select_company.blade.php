<!-- resources/views/select_company.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Select Company</title>
</head>
<body>
    <h1>Select a Company</h1>

    <!-- Show success or error messages -->
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form action="{{ route('company.submit') }}" method="POST">
        @csrf
        <label for="company">Choose a company:</label>
        <select name="company" id="company">
            @foreach($companies as $company)
                <option value="{{ $company }}">{{ ucfirst($company) }}</option>
            @endforeach
        </select>
        <button type="submit">Send Email</button>
    </form>
</body>
</html>
