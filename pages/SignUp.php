<div class="form">
    <h3 style="text-align:center">Sign Up</h3>
    <form name="sign_up_form" action="" method="post">
        <label for="Email">Email </label><span class="form-message" id="email-message"></span><br>
        <input class="form-input" type="text" name="email" onchange="validateEmail(document.sign_up_form.email); validate(document.sign_up_form.email, document.sign_up_form.password, document.sign_up_form.confirm_password)" id="email" placeholder="Kindly enter your email..." required><br>
        <label for="Password">Password </label><span id="password-message"></span><br>
        <input class="form-input" type="password" name="password" onchange="validatePassword(document.sign_up_form.password); validate(document.sign_up_form.email, document.sign_up_form.password, document.sign_up_form.confirm_password)" id="password" placeholder="Kindly enter your password..." required><br>
        <label for="Password">Confirm Password </label><span id="confirm-password-message"></span><br>
        <input class="form-input" type="password" name="confirm_password" onchange="confirmPassword(document.sign_up_form.confirm_password); validate(document.sign_up_form.email, document.sign_up_form.password, document.sign_up_form.confirm_password)" id="confirm-password" placeholder="Kindly re-enter your password..."><br><br>
        <button type="submit" id="sign_up_button" style="background-color:#5cb85c; border: none; font-size: 15px;" class="button">Register</button>
    </form>
</div>
