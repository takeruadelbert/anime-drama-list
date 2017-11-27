<!-- Login wrapper -->
<div class="login-wrapper">
    <?php
//    echo $this->element(_TEMPLATE_DIR."/londiniumv/flash-message");
    echo $this->Form->create("Account", array("action" => "login_admin"));
    ?>
    <div class="app app-header-fixed ">
        <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container = false;">
            <a href class="navbar-brand block m-t">Login <?= _APP_NAME?></a>
            <div class="m-b-lg">
                <div class="wrapper text-center">
                    <strong>Sign in</strong>
                </div>
            
                <div class="text-danger wrapper text-center" ng-show="authError">
                    <?= $this->element(_TEMPLATE_DIR."/londiniumv/flash-message") ?>
                </div>
                <div class="list-group list-group-sm">
                    <div class="list-group-item">
                        <?php
                        echo $this->Form->input("username", array("class" => "form-control no-border", "div" => false, "label" => false, "placeholder" => "Username"));
                        ?>
                    </div>
                    <div class="list-group-item">
                        <?php
                        echo $this->Form->input("password", array("class" => "form-control no-border", "div" => false, "label" => false, "placeholder" => "Password"));
                        ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block" ng-click="" ng-disabled='form.$invalid'>Log in</button>
                <div class="text-center m-t m-b">
                    <a ui-sref="access.forgotpwd">Forgot password?</a>
                </div>
                <div class="line line-dashed"></div>
                <p class="text-center"><small>Do not have an account?</small></p>
                <a ui-sref="access.signup" class="btn btn-lg btn-default btn-block">Create an account</a>
            </div>
            <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
                <p>
                    <small class="text-muted">Copyright &copy; <?= $this->StnAdmin->copyrightYear(_APP_START)?> <?= _APP_CORPORATE ?> <br> Developed & Maintenance by <a href="<?= _DEVELOPER_WEBSITE ?>"><?= _DEVELOPER_NAME ?></a></small>
                </p>
            </div>
        </div>
    </div>
    <?php
    echo $this->Form->end();
    ?>
</div>  
<!-- /login wrapper -->