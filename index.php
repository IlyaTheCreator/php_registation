<?php

    require 'header.php';

?>
    
   

  <main role="main ">
    <div class="jumbotron mt-3">
      <div class="col-sm-8 mx-auto">
       
       
        
        
        <?php
          
          if (isset($_SESSION['first']))  {
              
              echo "<h3>Your nickname: " . "<span class='text-primary'>" . $_SESSION['nick'] . "</span></h3>";
              echo "<h3>Your first name: " . "<span class='text-primary'>" . $_SESSION['first'] . "</span></h3>";
              echo "<h3>Your lastname: " . "<span class='text-primary'>" . $_SESSION['last'] . "</span></h3>";
              echo "<h3>Your email: " . "<span class='text-primary'>" . $_SESSION['email'] . "</span></h3>";
              
          }
          
        ?>
        
        
        
        
        <h1 class='mt-4'>Just text</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores cumque maxime sint, quam omnis esse eum, eligend explicabo incidunt quo ipsum sunt veritatis? Sed libero, nobis alias, rerum culpa accusamus!
        </p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente voluptas incidunt dolore ea porro dolor alias laboriosam, neque quod obcaecati, facere fugiat quidem ab. Nihil sit rerum error, hic incidunt iusto cum eius magni nostrum sint minus ad iure, fuga corrupti libero unde, enim illum atque minima consectetur deserunt repellendus necessitatibus saepe! Quia eum, nulla ipsa omnis cum officia molestias quo reprehenderit quae, iste iusto necessitatibus aut atque illo repudiandae! Inventore vitae ut ex quas fugit perspiciatis vel, aliquam magni, cumque explicabo. Odit mollitia aliquam laborum doloribus quia sequi hic, minus asperiores at repellendus ab, minima beatae non sed nobis 
        </p>
        <p>
            <a class='btn btn-primary' target='_blank' href='https://google.com' role='button'>Just link to google</a>
        </p>
          
        
        
        
      </div>
    </div>
  </main>
    

    
<?php

    require 'footer.php';

?>