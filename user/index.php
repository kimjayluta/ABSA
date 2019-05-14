<?php
    include('dbconn.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <style>
          
    </style>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/bootstrap-grid.css">
      <link rel="stylesheet" href="css/bootstrap-grid.min.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link href="css/simple-sidebar.css" rel="stylesheet">         
      <link rel="stylesheet" href="css/fontawesome.css">
      <link rel="stylesheet" href="css/fontawesome.min.css">
      <link rel="stylesheet" href="css/theme.css">
  </head>
  <body class=" bg-dark">
        <div class = "container">
          <div class = "row mt-2 pt-4 mb-2 bg-light">
            <div class = 'col-2'>
             <h5> PLAYERS</h5>
            </div>  
            <div class = 'mb-1 col-1'>
              <h5>FREE THROW</h5>
            </div>
            <div class = 'mb-1 col-1'>
              <h5>TWO POINT</h5>
            </div>
            <div class = 'mb-1 col-1'>
              <h5>THREE POINT</h5>
            </div>
            <div class = 'mb-1 col-1'>
              <h5>ASSIST</h5>
            </div>
            <div class = 'mb-1 col-2'>
              <h5>REBOUND</h5>
            </div>
            <div class = 'mb-1 col-1'>
              <h5>STEAL</h5>
            </div>
            <div class = 'mb-1 col-1'>
              <h5>FOUL</h5>
            </div>
            <div class = 'mb-1 col-1'>
              <h5>FLAGRANT FOUL</h5>
            </div>
          </div>
          <?php
              
              $i = 1;
              while($i<6){
                  $select = mysqli_query($conn,"SELECT * FROM `playerlist`");
                  echo "<div class = 'row'>";
                  echo "  <div class = 'col-2'>";
                  echo "    <SELECT class='custom-select player-select' id = 'pos".$i."'>";
                  echo "          <option selected disabled>SELECT PLAYER</option>";
                    while($row = mysqli_fetch_array($select)){
                      echo "      <option class = 'player-name' id = 'name".$row['Player I.D.']."' value = '".$row['Player I.D.']."' >".$row['Name']."</option>";
                    }
                  echo "    </SELECT>";
                  echo "  </div>";
                  echo "  <div class = 'mb-1 col-1'>";
                  echo "    <div class='btn-group'>";
                  echo "      <button class = '1pts btn btn-success' id = '$i' >1</button>";
                  echo "      <button class = 'm_1pts btn btn-danger' id = '$i' >1</button>";
                  echo "    </div>";
                  echo "  </div>";
                  echo "  <div class = 'mb-1 col-1'>";
                  echo "    <div class='btn-group'>";
                  echo "      <button class = '2pts btn btn-success' id = '$i' >2</button>";
                  echo "      <button class = 'm_2pts btn btn-danger' id = '$i' >2</button>";
                  echo "    </div>";
                  echo "  </div>";
                  echo "  <div class = 'mb-1 col-1'>";
                  echo "    <div class='btn-group'>";
                  echo "      <button class = '3pts btn btn-success' id = '$i' >3</button>";
                  echo "      <button class = 'm_3pts btn btn-danger' id = '$i' >3</button>";
                  echo "    </div>"; 
                  echo "  </div>";
                  echo "  <div class = 'mb-1 col-1'>";
                  echo "    <button class = 'ast btn btn-secondary' id = '$i' >assist</button>";
                  echo "  </div>";
                  echo "  <div class = 'mb-1 col-1'>";
                  echo "    <button class = 'drb btn' id = '$i' >defensive</button>";
                  echo "  </div>";
                  echo "  <div class = 'mb-1 col-1'>";
                  echo "    <button class = 'orb btn' id = '$i' >offensive</button>";
                  echo "  </div>";
                  echo "  <div class = 'mb-1 col-1'>";
                  echo "    <button class = 'stl btn' id = '$i' >steal</button>";
                  echo "  </div>";
                  echo "  <div class = 'mb-1 col-1'>";
                  echo "    <button class = 'fl btn' id = '$i' >foul</button>";
                  echo "  </div>";
                  echo "  <div class = 'mb-1 col-1'>";
                  echo "    <button class = 'ffl btn' id = '$i' >flagrant foul</button>";
                  echo "  </div>";
                  echo "</div>";
                  $i++;
              }
          ?>
        </div>
    
        <!--<div class="modal fade" id="confirm">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Shoot or Missed</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>         
                <div class="modal-body ">
                  <div class="row">
                    <div class = "col mx-auto">
                      <button type="submit" class="shoot btn btn-success" id = "" name="">MADE</button>
                      <button type="submit" class="missed btn btn-warning" id = "" name="">MISSED</button>
                    </div>
                  </div>      
                </div>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>  -->
    
  </body>
</html>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery.ajax-cross-origin.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/fontawesome.js"></script>
<script src="js/fontawesome.min.js"></script>
<script src="js/solid.js"></script>

<script>
  $(document).ready(function(){
    var temp1 = 0;
    var temp2 = 0;
    var temp3 = 0;
    var temp4 = 0;
    var temp5 = 0;
    var cop1 = 0;
    var cop2 = 0;
    var cop3 = 0;
    var cop4 = 0;
    var cop5 = 0;
    var p_id1 = 0;
    var p_id2 = 0;
    var p_id3 = 0;
    var p_id4 = 0;
    var p_id5 =0;
        $('.player-select').on('change', function(){

            var pos = $(this).attr("id");
            console.log(pos);
            switch(pos){
              case 'pos1':
                if(cop1 == 0){
                  p_id1 = $(this).val();
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".m_1pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".m_2pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".m_3pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id1);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id1);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id1);
                  $(this).parent().parent().find(".stl").attr("data-id",p_id1);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id1);
                  
                  //console.log( $(this).parent().parent().find(".1pts").html() );
                  $('#pos2 option[value=' + p_id1 + ']').attr('disabled','disabled');
                  $('#pos3 option[value=' + p_id1 + ']').attr('disabled','disabled');
                  $('#pos4 option[value=' + p_id1 + ']').attr('disabled','disabled');
                  $('#pos5 option[value=' + p_id1 + ']').attr('disabled','disabled');
                  temp1 = p_id1;
                  cop1 = 1;
                }else{
                  p_id1 = $(this).val();     
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".m_1pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".m_2pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".m_3pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id1);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id1);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id1);
                  $(this).parent().parent().find(".stl").attr("data-id",p_id1);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id1);
                  $('#pos2 option[value=' + p_id1 + ']').attr('disabled','disabled');
                  $('#pos3 option[value=' + p_id1 + ']').attr('disabled','disabled');
                  $('#pos4 option[value=' + p_id1 + ']').attr('disabled','disabled');
                  $('#pos5 option[value=' + p_id1 + ']').attr('disabled','disabled');
                  $('#pos2 option[value=' + temp1 + ']').removeAttr('disabled');
                  $('#pos3 option[value=' + temp1 + ']').removeAttr('disabled');
                  $('#pos4 option[value=' + temp1 + ']').removeAttr('disabled');
                  $('#pos5 option[value=' + temp1 + ']').removeAttr('disabled');
                  console.log('Enable:' + temp1);
                  cop1 = 0;
                }
                sel = 1;
                break;
                
              case 'pos2': 
                if(cop2 == 0){
                  p_id2 = $(this).val();
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".m_1pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".m_2pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".m_3pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id2);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id2);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id2);
                  $(this).parent().parent().find(".stl").attr("data-id",p_id2);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id2);
                  $('#pos1 option[value=' + p_id2 + ']').attr('disabled','disabled');
                  $('#pos3 option[value=' + p_id2 + ']').attr('disabled','disabled');
                  $('#pos4 option[value=' + p_id2 + ']').attr('disabled','disabled');
                  $('#pos5 option[value=' + p_id2 + ']').attr('disabled','disabled');
                  temp2 = p_id2;
                  cop2 = 1;
                }else{
                  p_id2 = $(this).val();
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".m_1pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".m_2pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".m_3pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id2);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id2);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id2);
                  $(this).parent().parent().find(".stl").attr("data-id",p_id2);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id2);
                  $('#pos1 option[value=' + p_id2 + ']').attr('disabled','disabled');
                  $('#pos3 option[value=' + p_id2 + ']').attr('disabled','disabled');
                  $('#pos4 option[value=' + p_id2 + ']').attr('disabled','disabled');
                  $('#pos5 option[value=' + p_id2 + ']').attr('disabled','disabled');
                  $('#pos1 option[value=' + temp2 + ']').removeAttr('disabled');
                  $('#pos3 option[value=' + temp2 + ']').removeAttr('disabled');
                  $('#pos4 option[value=' + temp2 + ']').removeAttr('disabled');
                  $('#pos5 option[value=' + temp2 + ']').removeAttr('disabled');
                  console.log('Enable:' + temp2);
                  cop2 = 0;
                }
                sel = 2;
                break;
                
              case 'pos3': 
                if(cop3 == 0){
                  p_id3 = $(this).val();
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".m_1pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".m_2pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".m_3pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id3);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id3);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id3);
                  $(this).parent().parent().find(".stl").attr("data-id",p_id3);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id3);
                  $('#pos1 option[value=' + p_id3 + ']').attr('disabled','disabled');
                  $('#pos2 option[value=' + p_id3 + ']').attr('disabled','disabled');
                  $('#pos4 option[value=' + p_id3 + ']').attr('disabled','disabled');
                  $('#pos5 option[value=' + p_id3 + ']').attr('disabled','disabled');
                  temp3 = p_id3;
                  cop3 = 1;
                }else{
                  p_id3 = $(this).val();
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".m_1pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".m_2pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".m_3pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id3);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id3);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id3);
                  $(this).parent().parent().find(".stl").attr("data-id",p_id3);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id3);
                  $('#pos1 option[value=' + p_id3 + ']').attr('disabled','disabled');
                  $('#pos2 option[value=' + p_id3 + ']').attr('disabled','disabled');
                  $('#pos4 option[value=' + p_id3 + ']').attr('disabled','disabled');
                  $('#pos5 option[value=' + p_id3 + ']').attr('disabled','disabled');
                  $('#pos1 option[value=' + temp3 + ']').removeAttr('disabled');
                  $('#pos2 option[value=' + temp3 + ']').removeAttr('disabled');
                  $('#pos4 option[value=' + temp3 + ']').removeAttr('disabled');
                  $('#pos5 option[value=' + temp3 + ']').removeAttr('disabled');
                  console.log('Enable:' + temp3);
                  cop3 = 0;
                }
                sel = 3;
                break;
                
              case 'pos4': 
                if(cop4 == 0){
                  p_id4 = $(this).val();
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".m_1pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".m_2pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".m_3pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id4);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id4);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id4);
                  $(this).parent().parent().find(".stl").attr("data-id",p_id4);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id4);
                  $('#pos1 option[value=' + p_id4 + ']').attr('disabled','disabled');
                  $('#pos2 option[value=' + p_id4 + ']').attr('disabled','disabled');
                  $('#pos3 option[value=' + p_id4 + ']').attr('disabled','disabled');
                  $('#pos5 option[value=' + p_id4 + ']').attr('disabled','disabled');
                  temp4 = p_id4;
                  cop4 = 1;
                }else{
                  p_id4 = $(this).val();
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".m_1pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".m_2pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".m_3pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id4);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id4);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id4);
                  $(this).parent().parent().find(".stl").attr("data-id",p_id4);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id4);
                  $('#pos1 option[value=' + p_id4 + ']').attr('disabled','disabled');
                  $('#pos2 option[value=' + p_id4 + ']').attr('disabled','disabled');
                  $('#pos3 option[value=' + p_id4 + ']').attr('disabled','disabled');
                  $('#pos5 option[value=' + p_id4 + ']').attr('disabled','disabled');
                  $('#pos1 option[value=' + temp4 + ']').removeAttr('disabled');
                  $('#pos2 option[value=' + temp4 + ']').removeAttr('disabled');
                  $('#pos3 option[value=' + temp4 + ']').removeAttr('disabled');
                  $('#pos5 option[value=' + temp4 + ']').removeAttr('disabled');
                  console.log('Enable:' + temp4);
                  cop4 = 0;
                }
                sel = 4;
                break;
                
              case 'pos5': 
                if(cop5 == 0){
                  p_id5 = $(this).val();
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".m_1pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".m_2pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".m_3pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id5);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id5);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id5);
                  $(this).parent().parent().find(".stl").attr("data-id",p_id5);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id5);
                  $('#pos1 option[value=' + p_id5 + ']').attr('disabled','disabled');
                  $('#pos2 option[value=' + p_id5 + ']').attr('disabled','disabled');
                  $('#pos3 option[value=' + p_id5 + ']').attr('disabled','disabled');
                  $('#pos4 option[value=' + p_id5 + ']').attr('disabled','disabled');
                  temp5 = p_id5;
                  cop5 = 1;
                }else{
                  p_id5 = $(this).val();
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".m_1pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".m_2pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".m_3pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id5);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id5);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id5);
                  $(this).parent().parent().find(".stl").attr("data-id",p_id5);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id5);
                  $('#pos1 option[value=' + p_id5 + ']').attr('disabled','disabled');
                  $('#pos2 option[value=' + p_id5 + ']').attr('disabled','disabled');
                  $('#pos3 option[value=' + p_id5 + ']').attr('disabled','disabled');
                  $('#pos4 option[value=' + p_id5 + ']').attr('disabled','disabled');
                  $('#pos1 option[value=' + temp5 + ']').removeAttr('disabled');
                  $('#pos2 option[value=' + temp5 + ']').removeAttr('disabled');
                  $('#pos3 option[value=' + temp5 + ']').removeAttr('disabled');
                  $('#pos4 option[value=' + temp5 + ']').removeAttr('disabled');
                  console.log('Enable:' + temp5);
                  cop5 = 0;
                }
                sel = 5;
                break;
                
            }
        }); 
   
        $('.1pts').on('click',function(){
          let id = $(this).data("id");
          console.log(id);
          $.ajax({
            url:'ingame.php',
            method:'post',
            data:{action:'1pts',id:id},
            success:function(data){
              let result = JSON.parse(data);
              console.log("TOTAL POINTS: "+result);
            }
          });
        });   
   
        $('.m_1pts').on('click',function(){
          let id = $(this).data("4id");
          console.log(id);
          $.ajax({
            url:'ingame.php',
            method:'post',
            data:{action:'m_1pts',id:id},
            success:function(data){
              let result = JSON.parse(data);
              console.log("freethrow missed: "+result);
            }
          });
        });    
     
        $('.2pts').on('click',function(){
          let id = $(this).data("id");
          $.ajax({
            url:'ingame.php',
            method:'post',
            data:{action:'2pts',id:id},
            success:function(data){
              let result = JSON.parse(data);
              console.log("TOTAL POINTS: "+result);
            }
          });
        });    
    
        $('.m_2pts').on('click',function(){
          let id = $(this).data("id");
          $.ajax({
            url:'ingame.php',
            method:'post',
            data:{action:'m_2pts',id:id},
            success:function(data){
              let result = JSON.parse(data);
              console.log("TOTAL POINTS: "+result);
            }
          });
        });   
    
        $('.3pts').on('click',function(){
          let id = $(this).data("id");
          $.ajax({
            url:'ingame.php',
            method:'post',
            data:{action:'3pts',id:id},
            success:function(data){
              let result = JSON.parse(data);
              console.log("TOTAL POINTS: "+result);
            }
          });
        });
    
    
    
        $('.m_3pts').on('click',function(){
          let id = $(this).data("id");
          $.ajax({
            url:'ingame.php',
            method:'post',
            data:{action:'m_3pts',id:id},
            success:function(data){
              let result = JSON.parse(data);
              console.log("TOTAL POINTS: "+result);
            }
          });
        });   
    
        $('.ast').on('click',function(){
          let id = $(this).data("id");
          $.ajax({
            url:'ingame.php',
            method:'post',
            data:{action:'ast',id:id},
            success:function(data){
              let result = JSON.parse(data);
              console.log("Assist: "+result);
            }
          });
        });
    
        $('.drb').on('click',function(){
          let id = $(this).data("id");
          $.ajax({
            url:'ingame.php',
            method:'post',
            data:{action:'drb',id:id},
            success:function(data){
              let result = JSON.parse(data);
              console.log("Defensive rebound: "+result);
            }
          });
        });
      
        $('.orb').on('click',function(){
          let id = $(this).data("id");
          $.ajax({
            url:'ingame.php',
            method:'post',
            data:{action:'orb',id:id},
            success:function(data){
              let result = JSON.parse(data);
              console.log("Offensive rebound: "+result);
            }
          });
        });
   
      
        $('.stl').on('click',function(){
          let id = $(this).data("id");
          $.ajax({
            url:'ingame.php',
            method:'post',
            data:{action:'stl',id:id},
            success:function(data){
              let result = JSON.parse(data);
              console.log("steal: "+result);
            }
          });
        });
        
        $('.fl').on('click',function(){
          let id = $(this).data("id");
          $.ajax({
            url:'ingame.php',
            method:'post',
            data:{action:'fl',id:id},
            success:function(data){
              let result = JSON.parse(data);
              console.log("foul: "+result);
              //.attr("disabled","disabled")
              if (result > 5){
                $('.fl').parent().parent().find('data-id',id).attr("disabled","disabled");
              }
            }
          });
        });
   
    
        
  });

</script>