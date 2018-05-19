
<div class="container" id="form_login">
	<div class="row" >
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Welcome to KRU Hospital </h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
													<div class="" id="validate">

													</div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" id="username" name="username" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" id="password" name="password" type="password" value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="button" id="oklogin" class="btn btn-success btn-block">Login</button>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
  $('#oklogin').click(function(){
    $.post('systems/login_pro.php',{
      username : $('#username').val(),
      password : $('#password').val()
    },function(data){
      //alert(data);
      if (data=='OK') {
        //alert('loginได้จ่ะ');
        //$('#login').load('systems/login_out.php');
        //$('#show_list').load('systems/movie_list.php');
        $('#showmain').load('systems/treat_show.php');
        $('#shownav').load('systems/navbar.php');
        //$('#navbar').load('systems/navbar.php');
      } else {
        //alert('ไม่สามารถ เข้าสู่ระบบได้');
				  $('#validate').html(data);
      }
    });
  });
});
</script>
