<?php
?>

<link rel="stylesheet" type="text/css" href="style.css">

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<table id="myTable">
  <tr>
    <th style="width:60%;color: black; font-size: 25px">Course name</th>
    <th style="width:40%;color: black; font-size: 25px">Enrolment key</th>
  </tr>
  <tr>
    <td>PAF</td>
    <td>PAF@1</td>
    <td style=" border: none;height: 30px;padding: 2px;">
                                        <a href="enrol.php" style="text-decoration: none;padding: 2px 5px;color: white;border-radius: 3px;background:#105b5e;">Enrol</a>
                                    </td>
  </tr>
  <tr>
    <td>ITPM</td>
    <td>ITPM@1</td>
    <td style=" border: none;height: 30px;padding: 2px;">
                                        <a href="enrol.php" style="text-decoration: none;padding: 2px 5px;color: white;border-radius: 3px;background:#105b5e;">Enrol</a>
                                    </td>
  </tr>
  <tr>
    <td>DS</td>
    <td>DS@1</td>
    <td style=" border: none;height: 30px;padding: 2px;">
                                        <a href="enrol.php" style="text-decoration: none;padding: 2px 5px;color: white;border-radius: 3px;background:#105b5e;">Enrol</a>
                                    </td>
  </tr>
  <tr>
    <td>NDM</td>
    <td>NDM@1</td>
    <td style=" border: none;height: 30px;padding: 2px;">
                                        <a href="enrol.php" style="text-decoration: none;padding: 2px 5px;color: white;border-radius: 3px;background:#105b5e;">Enrol</a>
                                    </td>
  </tr>
   <tr>
    <td>OOP</td>
    <td>OOP@1</td>
    <td style=" border: none;height: 30px;padding: 2px;">
                                        <a href="enrol.php" style="text-decoration: none;padding: 2px 5px;color: white;border-radius: 3px;background:#105b5e;">Enrol</a>
                                    </td>
  </tr>
   <tr>
    <td>CN</td>
    <td>CN@1</td>
    <td style=" border: none;height: 30px;padding: 2px;">
                                        <a href="enrol.php" style="text-decoration: none;padding: 2px 5px;color: white;border-radius: 3px;background:#105b5e;">Enrol</a>
                                    </td>
  </tr>
   
</table>

<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>