<?php
include 'inc/header.php';
?>
	<div class="main">
		<div class="header" >
			<h1>Login or Create a Free Account!</h1>
		</div>
		<p>Lorem iopsum dolor sit amit,consetetur sadipscing eliter,sed diam voluptua.At vero  eso et accusam et justo duo dolores et ea rebum. </p>
			<form>
				<ul class="left-form">
					<h2>New Account:</h2>
					<li>
						<input type="text"   placeholder="Username" required/>
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="text"   placeholder="Email" required/>
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password"   placeholder="password" required/>
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password"   placeholder="password" required/>
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> 
					<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Please inform me of upcoming  w3layouts, Promotions and news</label>
					<input type="submit" onclick="myFunction()" value="Create Account">
						<div class="clear"> </div>
				</ul>
				<ul class="right-form">
					<h3>Login:</h3>
					<div>
						<li><input type="text"  placeholder="Username" required/></li>
						<li> <input type="password"  placeholder="Password" required/></li>
						<h4>I forgot my Password!</h4>
							<input type="submit" onclick="myFunction()" value="Login" >
					</div>
					<div class="clear"> </div>
				</ul>
				<div class="clear"> </div>
					
			</form>
			
		</div>
		<?php
include 'inc/footer.php';
?>