<?php
  include('dbconn.php');


  if( isset($_POST['action']) && $_POST['action'] == '1pts'){
    $cmd = "UPDATE `playerlist` SET `freethrow_made` = `freethrow_made` + 1,`total_pts` = `total_pts` + 1  WHERE `Player I.D.` = '".$_POST['id']."'" ;
    $update = mysqli_query($conn,$cmd);
    if($update){
      $select = mysqli_query($conn,"SELECT * FROM `playerlist` WHERE '".$_POST['id']."'");
      $row = mysqli_fetch_array($select);
      echo json_encode($row['total_pts']);
    }else{
      echo json_encode($cmd);
    }
  }

  if( isset($_POST['action']) && $_POST['action'] == 'm_1pts'){
    $cmd = "UPDATE `playerlist` SET `freethrow_missed` = `freethrow_missed` + 1
    WHERE `Player I.D.` = '".$_POST['id']."'" ;
    $update = mysqli_query($conn,$cmd);
    if($update){
      $select = mysqli_query($conn,"SELECT * FROM `playerlist` WHERE '".$_POST['id']."'");
      $row = mysqli_fetch_array($select);
      echo json_encode($row['freethrow_missed']);
    }else{
      echo json_encode($cmd);
    }
  }

  if( isset($_POST['action']) && $_POST['action'] == '2pts'){
    $cmd = "UPDATE `playerlist` SET `two_pts_made` = `two_pts_made` + 1,`total_pts` = `total_pts` + 2 WHERE `Player I.D.` = '".$_POST['id']."'" ;
    $update = mysqli_query($conn,$cmd);
    if($update){
      $select = mysqli_query($conn,"SELECT * FROM `playerlist` WHERE '".$_POST['id']."'");
      $row = mysqli_fetch_array($select);
      echo json_encode($row['total_pts']);
    }else{
      echo json_encode($cmd);
    }
  }

  if( isset($_POST['action']) && $_POST['action'] == 'm_2pts'){
    $cmd = "UPDATE `playerlist` SET `two_pts_missed` = `two_pts_missed` + 1 WHERE `Player I.D.` = '".$_POST['id']."'" ;
    $update = mysqli_query($conn,$cmd);
    if($update){
      $select = mysqli_query($conn,"SELECT * FROM `playerlist` WHERE '".$_POST['id']."'");
      $row = mysqli_fetch_array($select);
      echo json_encode($row['two_pts_missed']);
    }else{
      echo json_encode($cmd);
    }
  }


  if( isset($_POST['action']) && $_POST['action'] == '3pts'){
    $cmd = "UPDATE `playerlist` SET `three_pts_made` = `three_pts_made` + 1,`total_pts` = `total_pts` + 3  WHERE `Player I.D.` = '".$_POST['id']."'" ;
    $update = mysqli_query($conn,$cmd);
    if($update){
      $select = mysqli_query($conn,"SELECT * FROM `playerlist` WHERE '".$_POST['id']."'");
      $row = mysqli_fetch_array($select);
      echo json_encode($row['total_pts']);
    }else{
      echo json_encode($cmd);
    }
  }


  if( isset($_POST['action']) && $_POST['action'] == 'm_3pts'){
    $cmd = "UPDATE `playerlist` SET `three_pts_missed` = `three_pts_missed` + 1 WHERE `Player I.D.` = '".$_POST['id']."'" ;
    $update = mysqli_query($conn,$cmd);
    if($update){
      $select = mysqli_query($conn,"SELECT * FROM `playerlist` WHERE '".$_POST['id']."'");
      $row = mysqli_fetch_array($select);
      echo json_encode($row['three_pts_missed']);
    }else{
      echo json_encode($cmd);
    }
  }


  if( isset($_POST['action']) && $_POST['action'] == 'ast'){
    $cmd = "UPDATE `playerlist` SET `Assist` = `Assist` + 1 WHERE `Player I.D.` = '".$_POST['id']."'" ;
    $update = mysqli_query($conn,$cmd);
    if($update){
      $select = mysqli_query($conn,"SELECT * FROM `playerlist` WHERE '".$_POST['id']."'");
      $row = mysqli_fetch_array($select);
      echo json_encode($row['Assist']);
    }else{
      echo json_encode($cmd);
    }
  }
  
  if( isset($_POST['action']) && $_POST['action'] == 'drb'){
    $cmd = "UPDATE `playerlist` SET `defensive_rebound` = `defensive_rebound` + 1, `rebound` = `rebound` + 1 WHERE `Player I.D.` = '".$_POST['id']."'" ;
    $update = mysqli_query($conn,$cmd);
    if($update){
      $select = mysqli_query($conn,"SELECT * FROM `playerlist` WHERE '".$_POST['id']."'");
      $row = mysqli_fetch_array($select);
      echo json_encode($row['defensive_rebound']);
    }else{
      echo json_encode($cmd);
    }
  }

  if( isset($_POST['action']) && $_POST['action'] == 'orb'){
    $cmd = "UPDATE `playerlist` SET `offensive_rebound` = `offensive_rebound` + 1, `rebound` = `rebound` + 1 WHERE `Player I.D.` = '".$_POST['id']."'" ;
    $update = mysqli_query($conn,$cmd);
    if($update){
      $select = mysqli_query($conn,"SELECT * FROM `playerlist` WHERE '".$_POST['id']."'");
      $row = mysqli_fetch_array($select);
      echo json_encode($row['offensive_rebound']);
    }else{
      echo json_encode($cmd);
    }
  } 

  if( isset($_POST['action']) && $_POST['action'] == 'stl'){
    $cmd = "UPDATE `playerlist` SET `steal` = `steal` + 1 WHERE `Player I.D.` = '".$_POST['id']."'" ;
    $update = mysqli_query($conn,$cmd);
    if($update){
      $select = mysqli_query($conn,"SELECT * FROM `playerlist` WHERE '".$_POST['id']."'");
      $row = mysqli_fetch_array($select);
      echo json_encode($row['steal']);
    }else{
      echo json_encode($cmd);
    }
  }
  
  if( isset($_POST['action']) && $_POST['action'] == 'fl'){
    $cmd = "UPDATE `playerlist` SET `fouls` = `fouls` + 1 WHERE `Player I.D.` = '".$_POST['id']."'" ;
    $update = mysqli_query($conn,$cmd);
    if($update){
      $select = mysqli_query($conn,"SELECT * FROM `playerlist` WHERE '".$_POST['id']."'");
      $row = mysqli_fetch_array($select);
      echo json_encode($row['fouls']);
    }else{
      echo json_encode($cmd);
    }
  }




?>