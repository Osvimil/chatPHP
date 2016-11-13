<!docytpe html>
<html lang="es">
	
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>

	<body>

		<div class="container-fluid">
			<section style="padding:15%;">
				
				<div class="row">
					<h1 class="text-center">Chat: <small>Whatever</small></h1>
					<hr>
				</div>

				<div class="row">
					<form action="" id="formChat" role="form">
						<div class="form-group">
							<label for="user">User</label>
							<input type="text" class="form-control" id="user" name="user" placeholder="enter user">
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<div id="conversation" style="height:200px; border:1px solid #ccc; padding:12px; border-radius:5px;overflow-x:hidden;">
										
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="message">Mensaje</label>
							<textarea name="message" id="message" placeholder="enter message" class="form-control" row="3"></textarea>
						</div>
						<button id="send" class="btn btn-primary">ENVIAR</button>
					</form>
				</div>
				<script src="jquery-2.1.0.min.js"></script>
				<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<script>
					$(document).on('ready',function(){
						registerMessages();
						$.ajaxSetup({
							"cache":false
						});
						setInterval("loadOldMessage()",500);
					});

					var registerMessages = function(){
						$("#send").on("click",function(e){
							e.preventDefault();
							var frm = $("#formChat").serialize();
							$.ajax({
								type:"POST",
								url:"register.php",
								data: frm
							}).done(function(info){
								$("#message").val("");
								var altura = $("#conversation").prop("scrollHeight");
						        $("#conversation").scrollTop(altura);
								console.log(info);
							});

						});
					}

					var loadOldMessage = function(){
						$.ajax({
							type: "POST",
							url: "conversation.php"
						}).done(function(info){
							$("#conversation").html(info);
							$("#conversation p:last-child").css({"background-color":"lightgreen","padding-botton":"20px"});
						});
						var altura = $("#conversation").prop("scrollHeight");
						$("#conversation").scrollTop(altura);
					}
				</script>
			</section>
		</div>
		
	</body>
</html>