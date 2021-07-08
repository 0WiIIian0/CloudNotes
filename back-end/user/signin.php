<script type="text/javascript" src="_js/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
	
	$(document).ready(function(){

		
		$("div[id*=erro]").css("color", "#f00");

				
		$("#cadastro").submit(function(){
			var erros = 0;

			$("div[id*=error]").html("");

			$("#username").val(  $.trim($("#username").val() ) );

			if( $("#username").val() == "" )
			{
				$("#div_error_username").html("O campo username deve ser preenchido !!!");
				erros++;
			}

			if( $("#email").val() == "" )
			{
				$("#div_error_email").html("O campo email deve ser preenchido !!!");
				erros++;
			}

			if( $("#password").val() == "" )
			{
				$("#div_error_password").html("O campo password deve ser preenchido !!!");
				erros++;
			}
			return erros == 0;

		}); // submit de fcad


	}); // read

</script>

<h2>Cadastro de Usuario</h2>
<form name="cadastro" id="cadastro" method="post" action="login.php">
	<p>		
			Username:<br>
			<input type="text" name="username" id="username" maxlength="100" value="" size="60">
			<div id="div_error_username"></div>
	</p>

	<p>		
			Email:<br>
			<input type="text" name="email" id="email" maxlength="100" value="" size="50">
			<div id="div_error_email"></div>
	</p>

	<p>		
			Password:<br>
			<input type="text" name="password" id="password" maxlength="100" value="" size="60">
			<div id="div_error_password"></div>
	</p>
	<input type="submit" name="cadastrar" id="cadastrar" value=" Cadastrar ">
</form>

