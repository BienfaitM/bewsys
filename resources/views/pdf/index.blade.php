<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>

    <style>
#scores {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#scores td, #scores th {
  border: 1px solid #ddd;
  padding: 8px;
}

#scores tr:nth-child(even){background-color: #f2f2f2;}

#scores tr:hover {background-color: #ddd;}

#scores th{
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #2f4aa7;
  color: white;
}
</style>
</head>
<body>
    <h1 style="text-align: center;">Employee Performance Summary</h1>

    <div class="row">
    <div class="card-body table-full-width table-responsive">
                       
    <div class="card-body table-full-width table-responsive">

    <table id="scores" class="table table-hover table-striped">

    <thead>
     <tr>
           <td><b>Employee Name</b></td>
           <td><b>Section Name</b></td>
           <td><b>Total Score</b></td>


        
        </tr>
                                   </thead>
  
    <tbody>
    @foreach( $scores as $score ) 
        <tr>
            <!-- <td>{{$score->id}}</td> -->
            <td>{{$score->name}}</td>
            <td>{{$score->Section_name}}</td>
            <td>{{$score->sum}}</td>



        </tr>
    </tbody>
    @endforeach
</table>
</div>
</body>
</html>