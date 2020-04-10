<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="<?php echo site_url('Login/index') ?>" method="post">
            <div class="heroe">
            <h2>Enter your access credentials</h2>
            </div>
                <div class="form-group">  
                    <label for="inputUser_name" class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="user_name" class="form-control" id="User_name"  placeholder="User Name">
                    </div>
                </div>
				<div class="form-group">  
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="Email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
                    </div>
                </div>      
                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Login</button>        
                    </div>
                </div>
            </form>            
        </div>
    </div>
</div>
