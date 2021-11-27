$(function(){
    
    
$("#inquiry_form").on('submit', function(e){
    e.preventDefault();

    var url =  $(this).attr('data-url');
    var c_name = $('#company_name').val();
    var states = $('#states').val();
    var city = $('#city').val();
    var category = $('#business_category').val();
    var name = $('#name').val();
    var page_name = $('#current_page').val();
    var mobile_no = $('#mobile_no').val();
    var email = $('#email').val();
    var hear = $('#hear').val();
    // var term_condition = $('#term_condition').val();
    var term_condition = $('#term_condition').val();
    
   $.ajax({
          url:url,
          type:"POST",
          headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data:{
            c_name:c_name,
            states:states,
            city:city,
            category:category,
            page_name:page_name,
            name:name,
            email:email,
            mobile_no:mobile_no,
            hear:hear,
            term_condition:term_condition
          },
          success:function(response){
              
              if(response.status){
                   $("#ajax_message").html();
                  $("#ajax_message").html("Successfull");
              }
            else{
                 $("#ajax_message").html();
                 $("#ajax_message").html('faild');
            }
            
          },
    });
    document.getElementById("inquiry_form").reset();
});


$("#contact_inquiry").on('submit', function(e){
    e.preventDefault();

    var url =  $(this).attr('data-url');
    var name  = $('#contact_name').val();
    var email = $('#contact_email').val();
    var mobile_no = $('#contact_mobile').val();
    var subject = $('#contact_subject').val();
    var i_category = $('#contact_category').val();
    var website = $('#contact_website').val();
    var message = $('#contact_message').val();
    
   $.ajax({
          url:url,
          type:"POST",
          headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data:{
            name:name,
            email:email,
            mobile_no:mobile_no,
            subject:subject,
            i_category:i_category,
            website:website,
            message:message
          },
          success:function(response){
              
              if(response.status){
                   $("#response_message").html();
                  $("#response_message").html("Successfull");
              }
            else{
                 $("#response_message").html();
                 $("#response_message").html('faild');
            }
            
          },
    });
    document.getElementById("contact_inquiry").reset();
});
    
})