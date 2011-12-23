<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
       "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<meta name="author" content="Marco Koch">
		<meta name="date" content="2010-01-29T19:33:00+01:00">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>5th.ch</title>
		<?php
		date_default_timezone_set('Europe/Zurich'); //timezone Europe/Zurich
		$CurrentHour = date("G"); //get current hour in 24-hour format without leading zeros
		//$CurrentHour=13; //for testing the code
		
		if ($CurrentHour%2==0)
			{
			//wenn Division durch zwei keinen Rest ergibt => gerade
			echo("<link href=\"gerade.css\" type=\"text/css\" rel=\"stylesheet\">");
			}
			
		else
			{
			//wenn Division durch zwei einen Rest ergibt => ungerade
			echo("<link href=\"ungerade.css\" type=\"text/css\" rel=\"stylesheet\">");
			}
		?>
		
          <script type="text/javascript">
          
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'XX-XXXXXXX-X']);
            _gaq.push(['_trackPageview']);
          
            (function() {
              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
              ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
          
          </script>	

	</head>
	<body>
		<h1>5th.ch </h1>
		 check out <a href="http://blog.5th.ch/">blog.5th.ch</a> <br><br>
			<?php
				function text2links($str) 
				{
						if($str=='' or !preg_match('/(http|www\.|@)/i', $str)) 
							{
								return $str; 
							}
						$lines = explode("\n", $str); $new_text = '';

						while (list($k,$l) = each($lines)) { 
							// replace links:
							$l = preg_replace("/http:\/\/([^ )\r\n!]+)/i", 
								"<a href=\"http://\\1\">\\1</a>", $l);
							$l = preg_replace("/https:\/\/([^ )\r\n!]+)/i", 
								"<a href=\"https://\\1\">\\1</a>", $l);
							$l = preg_replace(
								"/@([a-z0-9A-Z_]{1,15})/", 
								"<a href=\"http://twitter.com/\\1\">@\\1</a>", $l);
							$new_text .= $l."\n";
						}
						return $new_text;
				}


				$username='koma5'; // set user name
				$format='json'; // set format
				$tweet=json_decode(file_get_contents("http://api.twitter.com/1/statuses/user_timeline/{$username}.{$format}")); // get tweets and decode them into a variable

				echo text2links("@koma5's latest tweet:<br>" . $tweet[0]->text); // show latest tweet

			?>

			 <br> <br>
			
	
		
		
	</body>
</html>
