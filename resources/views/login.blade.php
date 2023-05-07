<!DOCTYPE html>
<html>
<head>
    <title>Diabetes Predictor</title>
</head>
<body>
    <h1>Diabetes Predictor</h1>

    <form action="{{ url('/predict') }}" method="post">
        @csrf
        <p>
            <label for="pregnancies">Number of Pregnancies:</label>
            <input type="number" name="pregnancies" id="pregnancies" required>
        </p>
        <p>
            <label for="glucose">Glucose Level:</label>
            <input type="number" name="glucose" id="glucose" required>
        </p>
        <button type="submit">Predict</button>
    </form>
</body>
</html>
