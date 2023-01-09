<!DOCTYPE html>
<html>
<head>
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

a {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
</head>
<body>

    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <?php 
      $pending = DB::table('users')
        ->join('Leaves', 'users.id', '=', 'Leaves.empid')
        ->get();
    ?>

<h2 class="text-blue h4">LATEST LEAVE APPLICATIONS</h2>

<table>
  <tr>
    <th>STAFF NAME</th>
    <th>LEAVE TYPE</th>
    <th>APPLIED DATE</th>
    <th>STATUS</th>
    <th>ACTION</th>
  </tr>

  @foreach ($pending as $item)
    @if ($item->Status == '0')
  <tr>
    <td class="table-plus">
        <div class="name-avatar d-flex align-items-center">
            <div class="avatar mr-2 flex-shrink-0">
                <img src="/uploads/avatars/{{$item->avatar}}" class="border-radius-100 shadow" width="40" height="40" alt="">
            </div>
            <div class="txt">
                <div class="weight-600">{{$item->FirstName}} {{$item->LastName}}</div>
            </div>
        </div>
    </td>
    <td>{{$item->Leavetype}}</td>
    <td>{{ \Carbon\Carbon::parse($item->created_at)->format( 'd F Y')}}</td>
    <td> @if ($item->Status == '0')
        <span style="color: blue">Pending</span>
    @else
        
    @endif
    </td>
    <td><a href="http://localhost:8000/admin/leave_details/{{$item->id}}">Take&nbsp;Action</a></td>
  </tr>
  @else                    
  @endif
 @endforeach
  
</table>


</body>
</html>

