<?php      
  function is_negative($number)
  {   
    $message_color = 'style="color:red"';
    if ($number < 0)        
    {            
      show_message('This is negative number! It must be positive!',  $message_color); 
    }
    else 
    {
      check_digits_format($number);           
    }
  }
    
  function check_digits_format($number)
  {            
    $birthday_year = intval($number);

    if($number == 0)
    {            
      $birthday_year = 2000;
    }
    else if($number >= 1 && $number <= 9)
    {            
      $birthday_year = '200'.$birthday_year;
    }
    else if($number >= 10 && $number <= 15)
    {
      $birthday_year = '20'.$birthday_year;
    }
    else if($number >=16 && $number <=99)
    {
      $birthday_year = '19'.$birthday_year;
    }
    else if ($number > 99 && $number <= 1915)
    {
      $message_color = 'style="color:red"';
      show_message('Sorry, you are too old to use this "Age calculator"...', $message_color);
      return;
    }   
    else if ($number > 2016)
    {
      $message_color = 'style="color:red"';
      show_message('Lol !!! Are you kidding whit me?', $message_color);
      return;
    }  

    calculate_age($birthday_year);
  }
    
  function calculate_age($birthday_year)
  {
    $current_year = date('Y');
    $age = $current_year - $birthday_year;
    $age = 'You are '.$age.' years old!';
    $message_color = 'style="color:green"';
    show_message($age, $message_color);
  } 
        
  function show_message($message, $color)
  {
    print_r('<div '.$color.'>'.print_r($message, true).'</div>');
  }
?>

<!doctype html>
<html lang="en-US">
  <head>
    <meta charset=utf-8" />
    <title> На колко години съм? </title> 
  </head>
  <body>
    <?php              
      $message_color = 'style="color:red"';
      if(isset($_GET['input_years']) != '')
      {
        if (is_numeric($_GET['input_years']))
        {
          is_negative($_GET['input_years']);                
        }
        else
        {    
          show_message('This is not a number', $message_color);
        }
      }
    ?>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" target="_self">
      <input type="text" id="input_years" name="input_years" value="1990" />
      <input type="submit" id="calculate_years" value="calculate" name="calculate_button" />
    </form>
  </body>
</html>
