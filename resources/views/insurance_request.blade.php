<!-- resources/views/insurance_request.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Insurance Plan Request</title>
</head>
<body>
    <h1>Request an Insurance Quote</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form action="{{ route('insurance.submit') }}" method="POST">
        @csrf
        <label for="email">Your Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="plan">Select a Plan:</label>
        <select name="plan" id="plan" required>
            <option value="americanamicable">American Amicable</option>
            <option value="aetna">Aetna</option>
            <option value="mutualofomaha">Mutual of Omaha</option>
            <option value="globelifeinsurance">Globe Life Insurance</option>
            <option value="cica-lifeofamerica">CICA Life of America</option>
            <option value="aig">AIG</option>
            <option value="prosperitylife">Prosperity Life</option>
            <option value="gtlic">GTLIC</option>
            <option value="royalneighborsofamerica">Royal Neighbors of America</option>
            <option value="sslco">SSL Co</option>
            <option value="lbig">LBIG</option>
            <option value="aflac">Aflac</option>
            <option value="aetnacvshealth">Aetna CVS Health</option>
            <option value="americolife">Americo Life</option>
            <option value="sbli">SBLI</option>
        </select>

        <button type="submit">Get Quotes</button>
    </form>
</body>
</html>
