<!DOCTYPE html>
<html>
<head>
<style>
span {
    color:red;
    font-weight: bold;
}
</style>
</head>
<body>

    <h1>{{ $details['title'] }}</h1>
    <p>Dear {{ $details['body'] }}</p>

    We would like to acknowledge you that your request for a leave has been <span>Rejected</span>.
   
</body>
</html>

