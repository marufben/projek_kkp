<div class="panel panel-default form-container">
    <div class="panel-body">
        <form role="form">
            <h3 class="text-center margin-xl-bottom"><?php echo $title;?></h3>

            <div class="form-group text-center">
                <label class="sr-only" for="email">Email Address</label>
                <input type="text" name="user" class="form-control input-lg" id="user" placeholder="Email Address">
            </div>
            <div class="form-group text-center">
                <label class="sr-only" for="password">Password</label>
                <input name="password" type="password" class="form-control input-lg" id="password" placeholder="Password">
            </div>

            <a href="index.html" class="btn btn-primary btn-block btn-lg">SIGN IN</a>
        </form>
    </div>
    <div class="panel-body text-center">
        <div class="margin-bottom">
            <a class="text-muted text-underline" href="javascript:;">kkp</a>
        </div>
        <div>
            &copy;<?php echo date("Y");?>
        </div>
    </div>
</div>