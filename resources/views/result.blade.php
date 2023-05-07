<!DOCTYPE html>
<html>
<head>
    <title>Diabetes Prediction Results</title>
</head>
<body>
    <h1>Diabetes Prediction Results</h1>

    @if ($prediction == 1)
        <p>You have diabetes</p>
    @else
        <p>You do not have diabetes</p>
    @endif

    <p>Accuracy: {{ round($accuracy * 100, 2) }}%</p>
</body>
</html>
