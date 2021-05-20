

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <form role="form" id='forms-reset_password' class="signinform">

            <div class="container">
                <div style="color:#2790E3;font-size:24px;">Reset Password?</div>
                <div class="pb-5" style="color: #858585; font-size:14px;"></div>
                <label for="uname"><b class="texts">Type your new Password</b></label><br>
                <input type="hidden" name="user[user_id]" value="<?=$data['user_id']?>"></input>
                <input class="signinfield" type="password" name="user[user_password]" id="ilny-password" placeholder="Your password...(Required)" required><br>

                <button class="formbutton" href="javascript:void(0);" id='reset_password-btn' style="color:white;">Reset</button>
 
            </div>

        </form>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="behind" >
            <a href=""> <img class="newmind" style="width: 200px;" src="<?i('')?>footerlogo.png"></a>
        </div>
    </div>
</div>
       
