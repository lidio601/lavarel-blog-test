<form id="loginform" action="/login">
    {{ csrf_field() }}
    <h3 class="box-title m-b-20">Sign In</h3>
    <div class="form-group ">
        <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Username">
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control" type="password" required="" placeholder="Password">
        </div>
    </div>
    <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase" type="submit">Log In</button>
        </div>
    </div>
    <div class="form-group m-b-0">
        <div class="col-sm-12 text-center">
            <p>Don't have an account? <a href="/#register" class="text-primary m-l-5"><b>Sign Up</b></a></p>
        </div>
    </div>
</form>