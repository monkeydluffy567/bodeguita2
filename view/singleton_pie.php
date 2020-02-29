<?php
class singleton_pie{
    private static $instance = null;
	private function singleton_pie()
    {
       ?>
		<hr>
		<marquee> gabriel champi &copy </marquee>
 	    </body>
		</html>
   	    <?php
    }

    public static function getInstance()
    {
        
        if (self::$instance==null) 
		{
            self::$instance = new singleton_pie();
        } 

        return self::$instance;
    }
}