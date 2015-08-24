$(document).ready(function() {
    
//    check_routine();
get_sub_name();
get_student_list()
email_validate();

 
    var base_url=$(".base_url").val();
    
        $('#class_id').change(function(){

            var class_id=$("#class_id").val();
            var dep_id=$("#dep_id").val();
            
            var url=base_url+"index.php?admin/get_sec_name/"+class_id+"/"+dep_id+"";
//            alert(url);
           $("#sec_id").html("<option value=''>Loading..</option>");
            $.ajax({

                type: "GET",
                url: url,
//                data: 'ip=' + $('#searchip').val(),
                before : function(){
                
                
                    
                },
                success: function(data){
//                    alert(data);

                    $("#sec_id").html(data);
                },
                error : function(){
                    alert(2);
                }

            }); // Ajax Call
        }); //event handler
   
    
    
    
    $('#dep_id').change(function(){

            var class_id=$("#class_id").val();
            var dep_id=$("#dep_id").val();
            
            var url=base_url+"index.php?admin/get_sec_name/"+class_id+"/"+dep_id+"";
            //alert(url);
           $("#sec_id").html("<option value=''>Loading.....</option>");
            $.ajax({

                type: "GET",
                url: url,
//                data: 'ip=' + $('#searchip').val(),
                before : function(){
                
                
                    
                },
                success: function(data){
//                    alert(data);

                    $("#sec_id").html(data);
                },
                error : function(){
                    alert(2);
                }

            }); // Ajax Call
        }); //event handler
        
        
        
        











}); //document.ready



function check_routine()
{
    var base_url=$(".base_url").val();
    
   $("#add_routine").submit(function(e){
      
            
            var url=base_url+"index.php?admin/class_routine/create";
//            alert(url);
          
            $.ajax({

                type: "post",
                url: url,
                data: $('#add_routine').serialize(),
//                data: 'ip=' + $('#searchip').val(),
                before : function(){
                
                
                    
                },
                success: function(data){
//                    alert(data);

                    //alert(data);
                    window.location = base_url+"index.php?admin/add_cl";
                },
                error : function(){
                    alert(2);
                }

            }); // Ajax Call
            
            e.preventDefault();
        }); //event handler
   
}

function get_sub_name()
{
  
    var base_url=$(".base_url").val();
    
        $('#sec_id').change(function(){

            var class_id=$("#class_id").val();
            var dep_id=$("#dep_id").val();
            var sec_id=$("#sec_id").val();
            
            var url=base_url+"index.php?admin/get_sub_name/"+class_id+"/"+dep_id+"/"+sec_id;
           // alert(url);
           $("#sub_id").html("<option value=''>Loading..</option>");
            $.ajax({

                type: "post",
                url: url,
                data: $('#marks').serialize(),
//                data: 'ip=' + $('#searchip').val(),
                before : function(){
                
                
                },
                success: function(data){
//                    alert(data);

                    $("#sub_id").html(data);
                },
                error : function(){
                    alert(2);
                }

            }); // Ajax Call
        }); //event handler
   
    
}

function get_student_list()
{
    var base_url=$(".base_url").val();
//    alert();
    
        $('.sec_id').change(function(){

            var class_id=$("#class_id").val();
            var dep_id=$("#dep_id").val();
            var sec_id=$("#sec_id").val();
            
            var url=base_url+"index.php?admin/get_student_list/"+class_id+"/"+dep_id+"/"+sec_id;
            //alert(url);
           $("#student_id").html("<option value=''>Loading..</option>");
            $.ajax({

                type: "post",
                url: url,
                //data: $('#marks').serialize(),
//                data: 'ip=' + $('#searchip').val(),
                before : function(){
                
                
                },
                success: function(data){
                    //alert(data);

                    $("#student_id").html(data);
                },
                error : function(){
                    alert(2);
                }

            }); // Ajax Call
        }); //event handler
}

function email_validate()
{
 
    $(".email").focusout(function(){
        
        
//        alert();
        
        var base_url=$(".base_url").val();
    
       

           
            
            var url=base_url+"index.php?admin/email_validate";
            //alert(url);
           
            $.ajax({

                type: "post",
                url: url,
                data: $('#add').serialize(),
//                data: 'ip=' + $('#searchip').val(),
                before : function(){
                
                
                },
                success: function(data){
//                    alert(data);
                    if(data=="0")
                    {
                        $(".email").val("");
                        $(".nav").html("Not Available")
                    }
                    else
                    {
                        $(".nav").html("Available")
                    }

                    
                },
                error : function(){
                    alert(2);
                }

            }); // Ajax Call
        
        
        
    });
}
