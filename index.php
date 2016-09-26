<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
    <meta charset="UTF-8">
    <title>EDM</title>

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css"/>
</head>
<body>
<div id="tudo">
<!-- Content Section -->
	<div class="container">
			<header id="topo">
			<div id="logo">
				<span><img src="images/logo.png"></span>			
			</div>

			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="http://www.edmbrasil.org">ESCOLA DE MINISTÉRIOS</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <form class="navbar-form navbar-left" role="search">
					<div class="form-group">
					  <input class="form-control" placeholder="Buscar Serviço..." type="text" id="service">
					</div>					  
					<button type="submit" class="btn btn-default" onclick="readWorkers(document.getElementById('service').value)">Buscar</button>
				  </form>
				<div class="navbar-form navbar-right">
					<div class="pull-right">
						<button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Adicionar Prestador</button>
					</div>
				</div>
				</div>
			  </div>
			</nav>
		</header>

		<div class="row">
			<div class="col-md-12">
				<h3>Prestadores:</h3>
				<div class="records_content"></div>
			</div>
		</div>	
	</div>
</div>
<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadastrar Novo Prestador</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" placeholder="ex: João" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="lastname">Sobrenome:</label>
                    <input type="text" id="lastname" placeholder="ex: Silva" class="form-control"/>
                </div>
				
				<div class="form-group">
				  <label for="rbtype">Tipo:</label>				  
					<label class="radio-inline" for="rbtype-0">
					  <input name="rbtype" id="rbtype-0" value="1" checked="checked" type="radio">
					  Autônomo
					</label> 
					<label class="radio-inline" for="rbtype-1">
					  <input name="rbtype" id="rbtype-1" value="2" type="radio">
					  Empresário
					</label> 
					<label class="radio-inline" for="rbtype-2">
					  <input name="rbtype" id="rbtype-2" value="3" type="radio">
					  Freelancer
					</label>				  
				</div>
				
				<div class="form-group">
                    <label for="address">Endereço:</label>
                    <input type="text" id="address" placeholder="ex: Rua Três, 233" class="form-control"/>
                </div>
				
				<div class="form-group">
				  <label for="rbchurch">Congregação:</label>				  
					<label class="radio-inline" for="rbchurch-0">
					  <input name="rbchurch" id="rbchurch-0" value="1" checked="checked" type="radio">
					  Sede
					</label> 
					<label class="radio-inline" for="rbchurch-1">
					  <input name="rbchurch" id="rbchurch-1" value="2" type="radio">
					  Zona Leste
					</label> 
					<label class="radio-inline" for="rbchurch-2">
					  <input name="rbchurch" id="rbchurch-2" value="3" type="radio">
					  Zona Sul
					</label>				  
				</div>

                <div class="form-group">
                    <label for="email1">Email 1:</label>
                    <input type="email" id="email1" placeholder="joao@email.com" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="email2">Email 2:</label>
                    <input type="email" id="email2" placeholder="joao@email.com" class="form-control"/>
                </div>
				
				<!-- Text input-->
				<div class="form-group">
				  <label for="phone1">Phone 1:</label>  				  
				  <input id="phone1" name="phone1" placeholder="ex: (12)99999-9999" class="form-control" type="text">				  
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label for="phone2">Phone 2:</label>  				  
				  <input id="phone2" name="phone2" placeholder="ex: (12)88888-8888" class="form-control" type="text">				  
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label for="profession">Profissão :</label>  				  
				  <input id="profession" name="profession" placeholder="ex: pedreiro" class="form-control" type="text">				  
				</div>

				<!-- Textarea -->
				<div class="form-group">
				  	<label for="description">Descrição:</label>				                     
					<textarea class="form-control" id="description" name="description">Ex: Profissional habilitado a trabalhar na área de construção civil.</textarea>				  
				</div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Salvar</button>
            </div>
        </div>
    </div>
</div>
	
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alterar Dados</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_name">Nome:</label>
                    <input type="text" id="update_name" placeholder="ex: João" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_lastname">Sobrenome:</label>
                    <input type="text" id="update_lastname" placeholder="ex: Silva" class="form-control"/>
                </div>
				
				<div class="form-group">
				  <label for="update_rbtype">Tipo:</label>				  
					<label class="radio-inline" for="rbtype-0">
					  <input name="update_rbtype" id="rbtype-0" value="1" checked="checked" type="radio">
					  Autônomo
					</label> 
					<label class="radio-inline" for="rbtype-1">
					  <input name="update_rbtype" id="rbtype-1" value="2" type="radio">
					  Empresário
					</label> 
					<label class="radio-inline" for="rbtype-2">
					  <input name="update_rbtype" id="rbtype-2" value="3" type="radio">
					  Freelancer
					</label>				  
				</div>
				
				<div class="form-group">
                    <label for="update_address">Endereço:</label>
                    <input type="text" id="update_address" placeholder="ex: Rua Três, 233" class="form-control"/>
                </div>
				
				<div class="form-group">
				  <label for="update_rbchurch">Congregação:</label>				  
					<label class="radio-inline" for="rbchurch-0">
					  <input name="update_rbchurch" id="rbchurch-0" value="1" checked="checked" type="radio">
					  Sede
					</label> 
					<label class="radio-inline" for="rbchurch-1">
					  <input name="update_rbchurch" id="rbchurch-1" value="2" type="radio">
					  Zona Leste
					</label> 
					<label class="radio-inline" for="rbchurch-2">
					  <input name="update_rbchurch" id="rbchurch-2" value="3" type="radio">
					  Zona Sul
					</label>				  
				</div>

                <div class="form-group">
                    <label for="update_email1">Email 1:</label>
                    <input type="email" id="update_email1" placeholder="joao@email.com" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="update_email2">Email 2:</label>
                    <input type="email" id="update_email2" placeholder="joao@email.com" class="form-control"/>
                </div>
				
				<!-- Text input-->
				<div class="form-group">
				  <label for="update_phone1">Phone 1:</label>  				  
				  <input id="update_phone1" name="update_phone1" placeholder="ex: (12)99999-9999" class="form-control" type="text">				  
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label for="update_phone2">Phone 2:</label>  				  
				  <input id="update_phone2" name="update_phone2" placeholder="ex: (12)88888-8888" class="form-control" type="text">				  
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label for="update_profession">Profissão :</label>  				  
				  <input id="update_profession" name="update_profession" placeholder="ex: pedreiro" class="form-control" type="text">				  
				</div>

				<!-- Textarea -->
				<div class="form-group">
				  	<label for="update_description">Descrição:</label>				                     
					<textarea class="form-control" id="update_description" name="update_description">Ex: Profissional habilitado a trabalhar na área de construção civil.</textarea>				  
				</div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Salvar Alterações</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS file -->
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="js/script.js"></script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-75591362-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
