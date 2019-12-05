<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="TalentBox Concept">
    <meta name="keyword" content="Registration, Autoresponder, php">

    <title>Sign Up - TalentBox Concept</title>

    <!-- CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
	  <div id="login-page">
	  	<div class="container">		       
		        <div class="login-wrap">
				<form name="form" id="validation-reg" method="post" action="" class="form-login">
				  <h2 class="form-login-heading">Sign Up</h2>
          <div id="loading" style="text-align: center"></div>
					<br>
					<div class="form-group">
              <div class="col-sm-12">
		            <input type="text"  id="name" name="name" class="form-control" placeholder="Name" autofocus>
              </div>
					</div>

					<div class="form-group">
              <div class="col-sm-12">
		            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
              </div>
					</div>

          <div class="form-group">
              <div class="col-sm-12">
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
              </div>
          </div>

          <div class="form-group">
              <div class="col-sm-12">
                  <input type="text" id="occupation" name="occupation" class="form-control" placeholder="Occupation">
              </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
		          <button class="btn btn-block"><i class="fa fa-paper-plane"></i> Sign Up</button>
            </div>
					</div>

          <br><br><br>
          <div class="form-login-footer">
            <footer class="site-footer">
              <div class="text-center">
                <a href="https://www.talentboxconcept.com">TalentBox Concept</a>
              </div>
            </footer>
          </div>
                    
        </form>
		  </div> 	
	  </div>
	 </div>
	
    <!-- js -->
    <script src="js/jquery.2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	  <script src="js/jquery.validate.min.js"></script>
	
    <script type="text/javascript">

      jQuery(function($) {
          $.validator.setDefaults({
              submitHandler: function () {
                  register();
              }
          });

          $().ready(function () {
              // validate the comment form when it is submitted
              $("#validation-reg").validate({
                  errorElement: 'div',
                  errorClass: 'help-block',
                  focusInvalid: false,
                  rules: {
                      name: {
                          required: true
                      },
                      email: {
                          required: true
                      },
                      phone: {
                          required: true,
                          number: true
                      },
                      occupation: {
                          required: true
                      }
                  },

                  highlight: function (e) {
                      $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
                  },

                  success: function (e) {
                      $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
                      $(e).remove();
                  }

              })
          });
      
          function register() {
              $("#loading").html('<div class="alert alert-block alert-success"><strong><i class="fa fa-spinner"></i>   PLEASE WAIT</strong></div>');
              $.post('mail.php', $("form").serialize(), function (hasil) {
                  $('form input[type="text"],form input[type="email"],form input[type="text"],form input[type="text"]').val('');
                  $("#loading").html(hasil);
              });
          };
      });
  </script>
</body>
</html>
