      </div>
    </div>
    <div id="hidden-area">
    	<?php 
    		if(isset($_SESSION['message'])){
    			echo($_SESSION['message']);
    			unset($_SESSION['message']);
    		}
    	?>
    </div>
    <script src="../assets/js/halfmoon.min.js"></script>
    <script src="../assets/js/jquery.js"></script>
  </body>
</html>