<!DOCTYPE html>
<html>
<head>
    <title>Kapcsolatfelvétel</title>
</head>
<body>
    <h2>Új üzenet érkezett:</h2>
    <p><strong>Név:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Üzenet:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
