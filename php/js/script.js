$(function () {
  $("#register-link").on('click',function () {
    $("#login-box").hide();
    $("#register-box").show();
  });
  $("#login-link").on('click',function () {
    $("#login-box").show();
    $("#register-box").hide();
  });
  $("#forgot-link").on('click',function () {
    $("#login-box").hide();
    $("#forgot-box").show();
  });
  $("#back-link").on('click',function () {
    $("#login-box").show();
    $("#forgot-box").hide();
  });
  //Register Ajax Request
  $("#register-btn").on('click',function (e){
    if($("#register-form")[0].checkValidity()){
      e.preventDefault();
      $("#register-btn").val('Please Wait...');
      if($('#rpassword').val() !== $("#cpassword").val()){
        $("#passError").text('* Password Did Not Match!');
        $("#register-btn").val('Sign Up');
      } else {
        $("#passError").text('');
        $.ajax({
          url: '../php/include/action.php',
          method: 'post',
          data: $("#register-form").serialize()+'&action=register',
          success:function (response){
            $("#register-btn").val('Sign up');
            if (response === 'register'){
              window.location.href = '../../../KPM/php/pages/home.php';
            }
            else {
              $("#regAlert").html(response)
            }
          }
        })
      }
    }
  })

  //Login Ajax Request
  $('#login-btn').on('click',function (e){
    if($("#login-form")[0].checkValidity()){
      e.preventDefault();

      $("#login-btn").val('Please Wait...');
      $.ajax({
        url: '../php/include/action.php',
        method: 'post',
        data: $('#login-form').serialize()+'&action=login',
        success:function (response){
          $("#login-btn").val('Sign In');
          if (response === 'login'){
            window.location.href = '../../../KPM/php/pages/home.php';
          }
          else {
            $("#loginAlert").html(response);
          }
        }
      })
    }
  })

  //Forgot Password Ajax request
  $("#forgot-btn").on('click', function (e){
    if($("#forgot-form")[0].checkValidity()){
      e.preventDefault();

      $("#forgot-btn").val('Please Wait...');
      $.ajax({
        url: '../php/include/action.php',
        method: 'post',
        data: $('#forgot-form').serialize()+'&action=forgot',
        success:function (response){
          $("#forgot-btn").val('Reset Password');
          $("#forgot-form")[0].reset();
          $("#forgotAlert").html(response);
        }
      })
    }
  })
});

