<h1>Users</h1>

<div class="container px-lg-5">
  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5 border bg-light" style="height:340px;overflow-y: auto;">
    <?php if(!empty($params)){ ?>
    <ul class="list-group">
    <?php 
        $count = 0;
        foreach($params as $user){
              $cl = $count==0 ? 'active' : '';
    ?>
        <a id="<?php echo $user->getId(); ?>" href="#" class="list-group-item list-group-item-action <?php echo $cl; ?>" onclick="showUserData(<?php echo $user->getId(); ?>)" >
            <?php echo $user->getName(); ?>
        </a>

    <?php
        $count++;
        }   
    ?>
            
        </ul>
    <?php }else{ ?>

        <p style="text-align:center;">No users</p>

    <?php } ?>
    </div>
    <div class="col py-3 px-lg-5 border bg-light">
    <form method="post" id="form1" action="/ship-crew-notification/saveUsers">
            <h2>New User</h2>
            <div class="form-group">
                <label >Username</label>
                <input type="text" class="form-control" name="username" id="username" >
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="text" class="form-control" name="email" id="email" >
            </div>
            <div class="form-group">
                <div class="dropdown">
                    <select id="select">
                        <option value="">Select Rolle</option>
                        <option value="">Administrator</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
  </div>
</div>




