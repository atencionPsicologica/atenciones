<?php if (isset($_SESSION['mensaje'])) { //mensaje, cuando realiza alguna acción crud ?>
	<div class="alert alert-success">
		<strong><?php echo $_SESSION['mensaje']; ?></strong>
	</div>
<?php } 
	unset($_SESSION['mensaje']);
?>	
<!--div class="container">
	<h2>Ingresar</h2>
	<form  action="?controller=usuario&action=login" method="post">
		<div class="form-group">
			<label for="email">	Email:	</label>			
			<input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email" required="true" autocomplete="off">	
			
		</div>

		<div class="form-group">
			<label for="pwd"> Contraseña:</label>
			<input type="password"  class="form-control" id="pwd" name="pwd" placeholder="Ingrese su contraseña" required="true">				
		</div>

		<div class="form-group">
			<div class="col-sm-2">
			    <button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-ok"></span> Ingresar</button>
		    </div>			
		</div>		
	</form>
</div-->



<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" action="?controller=usuario&action=login" method="post">
					<span class="login100-form-title p-b-70">
						Por María, quédate en nosotros Jesús.
					</span>
					<span class="login100-form-avatar">
						<img src="assets/login/images/MUJ.png" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="Enter email">
						<input class="input100" type="text" id="email" name="email">
						<span class="focus-input100" data-placeholder="usuario"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" id="pwd" name="pwd">
						<span class="focus-input100" data-placeholder="contraseña"></span>
					</div>

					<div class="container-login100-form-btn">
						
						<button type="submit" class="login100-form-btn btn btn-success"> Ingresar</button>
					</div>

					<!--ul class="login-more p-t-190">
						<li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

							<a href="#" class="txt2">
								Username / Password?
							</a>
						</li>

						<li>
							<span class="txt1">
								Don’t have an account?
							</span>

							<a href="#" class="txt2">
								Sign up
							</a>
						</li>
					</ul-->
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>


