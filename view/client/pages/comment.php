<div class="media mb-4" >
    <img src="uploads/<?php echo $img; ?>" alt="Image" class="img-fluid mr-3 mt-1" style="width: 60px;height:52px">
    <div class="media-body">
        <h6><?php echo $name; ?><small> - <i><?php echo $date; ?></i></small></h6>
        <div class="text-primary mb-2" style="margin-bottom: 99px;">
        <?php
            for ($i = 1; $i <= $star; ++$i) {
                echo "<div id='rating'>";
                echo "  <input type='radio' name='rating' value='$i' />";
                echo "  <label class = 'voted' for='star5' title='Awesome - 5 stars'></label>";
                echo "</div>";
            }
        ?>
        </div></br>                                                  
        <p style="padding-top: 25px;"><?php echo $content; ?></p>
    </div>
</div>