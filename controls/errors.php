<?php if(count($errors)> 0): ?>
                    <div class="error" style="color: #D92A2A; "> 
                     <?php foreach($errors as $error): ?>
                        <li style="list-style-type: none; " ><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 16px;padding-right=40%"></i><?php echo($error); ?></li>
                     <?php endforeach;?>
                    </div> 
          <?php endif; ?> 