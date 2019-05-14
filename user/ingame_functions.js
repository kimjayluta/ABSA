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
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id1);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id1);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id1);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id1);
                  $(this).parent().parent().find(".ffl").attr("data-id",p_id1);
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
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id1);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id1);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id1);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id1);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id1);
                  $(this).parent().parent().find(".ffl").attr("data-id",p_id1);
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
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id2);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id2);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id2);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id2);
                  $(this).parent().parent().find(".ffl").attr("data-id",p_id2);
                  $('#pos1 option[value=' + p_id2 + ']').attr('disabled','disabled');
                  $('#pos3 option[value=' + p_id2 + ']').attr('disabled','disabled');
                  $('#pos4 option[value=' + p_id2 + ']').attr('disabled','disabled');
                  $('#pos5 option[value=' + p_id2 + ']').attr('disabled','disabled');
                  temp2 = p_id2;
                  cop2 = 1;
                }else{
                  p_id2 = $(this).val();
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id2);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id2);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id2);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id2);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id2);
                  $(this).parent().parent().find(".ffl").attr("data-id",p_id2);
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
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id3);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id3);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id3);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id3);
                  $(this).parent().parent().find(".ffl").attr("data-id",p_id3);
                  $('#pos1 option[value=' + p_id3 + ']').attr('disabled','disabled');
                  $('#pos2 option[value=' + p_id3 + ']').attr('disabled','disabled');
                  $('#pos4 option[value=' + p_id3 + ']').attr('disabled','disabled');
                  $('#pos5 option[value=' + p_id3 + ']').attr('disabled','disabled');
                  temp3 = p_id3;
                  cop3 = 1;
                }else{
                  p_id3 = $(this).val();
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id3);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id3);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id3);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id3);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id3);
                  $(this).parent().parent().find(".ffl").attr("data-id",p_id3);
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
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id4);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id4);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id4);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id4);
                  $(this).parent().parent().find(".ffl").attr("data-id",p_id4);
                  $('#pos1 option[value=' + p_id4 + ']').attr('disabled','disabled');
                  $('#pos2 option[value=' + p_id4 + ']').attr('disabled','disabled');
                  $('#pos3 option[value=' + p_id4 + ']').attr('disabled','disabled');
                  $('#pos5 option[value=' + p_id4 + ']').attr('disabled','disabled');
                  temp4 = p_id4;
                  cop4 = 1;
                }else{
                  p_id4 = $(this).val();
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id4);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id4);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id4);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id4);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id4);
                  $(this).parent().parent().find(".ffl").attr("data-id",p_id4);
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
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id5);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id5);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id5);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id5);
                  $(this).parent().parent().find(".ffl").attr("data-id",p_id5);
                  $('#pos1 option[value=' + p_id5 + ']').attr('disabled','disabled');
                  $('#pos2 option[value=' + p_id5 + ']').attr('disabled','disabled');
                  $('#pos3 option[value=' + p_id5 + ']').attr('disabled','disabled');
                  $('#pos4 option[value=' + p_id5 + ']').attr('disabled','disabled');
                  temp5 = p_id5;
                  cop5 = 1;
                }else{
                  p_id5 = $(this).val();
                  $(this).parent().parent().find(".1pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".2pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".3pts").attr("data-id",p_id5);
                  $(this).parent().parent().find(".ast").attr("data-id",p_id5);
                  $(this).parent().parent().find(".drb").attr("data-id",p_id5);
                  $(this).parent().parent().find(".orb").attr("data-id",p_id5);
                  $(this).parent().parent().find(".fl").attr("data-id",p_id5);
                  $(this).parent().parent().find(".ffl").attr("data-id",p_id5);
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
          $.ajax({
            url:'ingame.php',
            method:'post',
            data:{action:'1pts',id:id},
            success:function(data){
              let result = JSON.parse(data);
              console.log(result);
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
              console.log(result);
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
              console.log(result);
            }
          });
        });
    
        
  });