<!DOCTYPE html>
<html lang="en">
   <head>
      <title>My Poll</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>      
      <link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>          
	  <style>
	  .wide {
	  width:300px;
	  }
	  .top50 {
	  padding-top:50px;
	  
	  }
	  .input-field label {
    color: #000000;
	}
	nav .nav-wrapper i {
    display: block;
    font-size: 3rem;
	}
	@media (max-width:600px) {
		nav .nav-wrapper i {
		display: block;
		font-size: 4rem;
		}
	}
	  </style>
   </head>
   
   <body> 
   <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center"><i class="material-icons">insert_comment</i> Opinion Poll</a>
      
    </div>
  </nav>
      <div class = "row" style="margin-left:20px">
         <form class = "col s12" action="results.php" method="post"> 
		 <h5 class="top50">1. Who is your favourite author?</h5>
            <div class = "row">
               <div class = "input-field col s12">
					<p>
					  <label>
						<input name="author" type="radio" value = "miguel" />
						<span>Miguel de Cervantes</span>
					  </label>
					</p>
					<p>
					  <label>
						<input name="author" type="radio" value = "charles"/>
						<span>Charles Dickens</span>
					  </label>
					</p>
					<p>
					  <label>
						<input name="author" type="radio" value = "jjr"/>
						<span>J.R.R. Tolkien</span>
					  </label>
					</p>
					<p>
					  <label>
						<input name="author" type="radio" value = "antoine"/>
						<span>Antoine de Saint-Exuper</span>
					  </label>
					</p>
					<p>
					  <label>
						<input name="author" type="radio" value = "none" checked />
						<span>None of the above</span>
					  </label>
					</p>
                   
                  <br />
				  
                 <button class="btn waves-effect waves-light" type="submit" name="action">Submit
					<i class="material-icons right">send</i>
				</button>
								

               </div>
			    
            </div>           
         </form>       
		
      </div>

   </body>   
</html>
