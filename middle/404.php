<br/><br/><br/><br/>	
<center><h1><b>404</b></h1><h1>Page Not Found.</h1></center>
<br/>
<center><p>This Page You are Looking For doesn't exist or an other error occurred.</p></center>
<br/>


             <div class="form-actions" align="center">
		     <form>
			 <input type="submit" id="edit-submit" name="submit" value="GOTO HOME" class="btn_1 submit" style="width:300px;">
			 </form>
			 </div>
			 <?php 
			 if(isset($_REQUEST['submit']))
			 {
			 header("location:index.php?file=home");
			 }
			 ?>