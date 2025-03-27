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
    <select name="status" id="status">
        <option value="">Choose Status</option>
        <option value="1">active</option>
        <option value="0">inactive</option>
    </select>
    <table border="1px" id="data-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>State</th>
                <th>Phone no.</th>
                <th>is_active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <script>
        $(document).ready(function() {

            var table = $("#data-table").DataTable({
                processing : true,
                serverSide : true,
                ajax:{
                    url:"{{route('students.index')}}",
                    data: function (d) {
                        d.is_active = $('#status').val()
                        d.search = $('input[type="search"]').val()
                    },
                },
                columns : [
                    {data:'id',name:'id'},
                    {data:'name',name:'name'},
                    {data:'email',name:'email'},
                    {data:'state',name:'state'},
                    {data:'phone',name:'phone'},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'action', name: 'action'},
                ]
            });
            

            $('#status').on('change', function () {
                table.ajax.reload();
            });

            $('#data-table').on('click','.delete-student', function() {
                const studentId = $(this).data('id');
                // console.log(studentId);
                if(studentId){
                    $.ajax({
                        url:`{{url('students/delete')}}/${studentId}`,
                        method: 'DELETE',
                        data:{
                            _token: '{{ csrf_token() }}',
                        },
                        
                        success: function(response){
                            if(response.status == 'success'){
                                //relode takes two parameter : one is callback function so i write null becuase i dont call any function
                                //and second is that after the success data will redirect in first page so i write false to prevent it.
                                table.ajax.reload(null,false);
                            }
                            else{
                                alert(response.message);
                            }

                        }

                    })
                }
            });


        })
    </script>
</body>

</html>