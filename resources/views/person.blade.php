<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>




<h2>Person Page</h2>
<table>
    <thead>
    <td>Name</td>
    <td>Email</td>
    </thead>
    <tbody>
    @foreach($results as $result)
        <tr>
            <td>{{$result->name}}</td>
            <td>{{$result->email}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
