<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to Dashboard</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td><a href="logout">Logout</a></td>
        </tr>
    </table>
</body>
</html>