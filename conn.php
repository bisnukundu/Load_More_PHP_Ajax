<?php
    $conn = new PDO("mysql:host=localhost;dbname=market","root","");
   
    if(isset($_REQUEST["page"])){
        $page = $_REQUEST["page"];
    }else{
        $page = 0;
    }
    $limit = 5;
$sql = "SELECT * FROM post LIMIT {$page},{$limit}";
    $result = $conn->prepare($sql);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){ 
          $id= $row["post_id"];  
        ?>
     <tr>
         <td><?php echo $row["post_id"];?></td>
         <td><?php echo $row["post_title"];?></td>
     </tr>
   <?php  
    }
    if(isset($id)){
        echo "<tr id='rw'> <td colspan=2> <button class='btn btn-block btn-info btn-large' id='btn' data-id={$id}>Load More</button></td></tr>";
    }else{
        echo "<tr> <td colspan=2> <button class='btn btn-block' disabled id='btn'>Data Finished</button></td></tr>";
    }
   
?>