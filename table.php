<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Responsive Table</title>   
<meta name="description" content="">  
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 20px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }
  th {
    background-color: #f2f2f2;
  }
  tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  @media (max-width: 600px) {
    table, thead, tbody, th, td, tr {
      display: block;
    }
    thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }
    tr {
      border: 1px solid #ccc;
      margin-bottom: 10px;
    }
    td {
      border: none;
      position: relative;
      padding-left: 50%;
    }
    td:before {
      position: absolute;
      top: 6px;
      left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
    }
    td:nth-of-type(1):before {
      content: "Sr No.";
    }
    td:nth-of-type(2):before {
      content: "Client Name";
    }
    td:nth-of-type(3):before {
      content: "Country";
    }
    td:nth-of-type(4):before {
      content: "Salary";
    }
  }
  .dataTables_wrapper .dataTables_filter {
    float: none;
    text-align: right;
    width: 80%;
    margin: 0 auto;
  }
  .dataTables_wrapper .dataTables_filter input {
    width: 100%;
    padding: 6px;
  }
  .dataTables_wrapper .dataTables_length {
    float: none;
    text-align: right;
    width: 80%;
    margin: 20px auto;
  }
</style>
</head>  
<body>  
<div class="container">
  <table id="myTable" class="table table-striped table-bordered table-hover" >  
    <thead>  
      <tr>  
        <th>Sr No.</th>  
        <th>Donor Name</th>  
        <th>Blood Group</th>  
        <th>State</th>  
        <th>City</th>  
        <th>Medical Conditions</th>
        <th>Recently Donated</th>
        <th>Review</th>
      </tr>  
    </thead>  
    <tbody>  
      <?php
      // Assuming you have a MySQL database connection already established
      $servername = "localhost";
      $username = "root"; // Replace with your MySQL username
      $password = ""; // Replace with your MySQL password
      $dbname = "bloodhub"; // Replace with your MySQL database name

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // SQL query to fetch data from the database
      $sql = "SELECT d.*
            FROM donor d
            JOIN (
                SELECT email, MAX(schedule_date) AS max_date
                FROM donor
                GROUP BY email
            ) max_dates ON d.email = max_dates.email AND d.schedule_date = max_dates.max_date;
            ";
      $result = $conn->query($sql);
      $srno = 1;
      if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $srno . "</td>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["blood_group"] . "</td>";
          echo "<td>" . $row["state"] . "</td>";
          echo "<td>" . $row["city"] . "</td>";
          echo "<td>" . $row["medical_conditions"] . "</td>";
          $date = $row["schedule_date"];
          
          $year = date('Y', strtotime($date));   // Output: '2024'
          $month = date('m', strtotime($date));  // Output: '07'
          $day = date('d', strtotime($date));    // Output: '28'
          
          echo "<td>" . $day."/".$month."/".$year."</td>";
          echo "<td>" . $row["review"] . "</td>";
          echo "</tr>";
          $srno++;
        }
      } else {
        echo "0 results";
      }

      $conn->close();
      ?>
    </tbody>  
  </table>
  
  <!-- Search input and Show entries dropdown -->
  <div class="dataTables_wrapper">
    <div class="dataTables_filter">
      <label>Search:<input type="search" class="form-control input-sm" placeholder=""></label>
      <button class="btn btn-primary btn-sm">Search</button>
    </div>
    <div class="dataTables_length">
      <label>Show entries:
        <select class="form-control input-sm">
          <option>10</option>
          <option>25</option>
          <option>50</option>
          <option>100</option>
        </select>
      </label>
    </div>
  </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
    $('#myTable').DataTable({
      responsive: true // Enable DataTables responsive feature
    });
});
</script>
</body>  
</html>
