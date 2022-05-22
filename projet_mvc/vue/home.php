<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/tbl.css">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;

            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <center><h1>LISTE DES INSCRITS</h1></center>
    
    <?php
    session_start();
    if(isset($_SESSION['pass']) && isset($_SESSION['user'])){
    include_once '../model/connection.php';
    include_once ('../controle/header.php');
    $result=select_eleve();
    echo "<table><thead>
 <tr>
 <th>ID</th>
 <th>Nom</th>
 <th>Prenom</th>
 <th>CNE</th>
 <th>Adresse</th>
 <th>Ville</th>
 <th>E_mail</th>
 <th>Photo</th>
 </th><thead>\n";
 while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo  '<tbody><tr>'
    .'<td>'. $row['ID_eleve']  .'</td>'
    .'<td>'. $row['Nom']       .'</td>'
    .'<td>'. $row['Prenom']    .'</td>'
    .'<td>'. $row['CNE']       .'</td>'
    .'<td>'. $row['Adresse']   .'</td>'
    .'<td>'. $row['Ville']     .'</td>'
    .'<td>'. $row['email']     .'</td>'
    ."<td>"."<img alt=\image\ src= ".$row['Photo']." width=\150px\ height=\150px\></td></tr><tbody>";
      }
    echo "</table>";
    $conn=null;
}
    else{
        echo '<center>';
        echo 'you have to login <br>';
        echo "<a href=\"../index.php\">login</a>";
    }
    ?>
    
</body>

</html>