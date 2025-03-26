<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <title>Students Data</title>
</head>

<body>
    <h1 style="text-align: center;">Students Data</h1>
    <table border="1px" id="data-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>State</th>
                <th>Phone no.</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $("#data-table").DataTable({
                processing : true,
                serverSide : true,
                ajax:"{{route('students.index')}}",
                columns : [
                    {data:'id',name:'id'},
                    {data:'name',name:'name'},
                    {data:'email',name:'email'},
                    {data:'state',name:'state'},
                    {data:'phone',name:'phone'},
                ]
            })

        })
    </script>
</body>

</html>