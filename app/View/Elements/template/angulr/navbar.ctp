<style>
    .navbar-brand img {
        max-height: 50px;
        margin-top: 10px;
    }
</style>
<div class="navbar-header bg-white-only">
    <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
          <i class="glyphicon glyphicon-cog"></i>
    </button>
    <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
      <i class="glyphicon glyphicon-align-justify"></i>
    </button>
    <div class="navbar-header" style="height: 70px;"><a class="navbar-brand" href="<?= Router::url("/admin/dashboard", true) ?>"><img height="50" src="<?= Router::url("/img/logo.png", true) ?>" alt="Dinas Pemuda, Olahraga dan Pariwisata" title="<?= _APP_CORPORATE?>"></a></div>
</div>
<div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons"><span class="sr-only">Toggle navbar</span><i class="icon-grid3"></i></button>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar"><span class="sr-only">Toggle navigation</span><i class="icon-paragraph-justify2"></i></button>
    </div>
    <?php
    $notifications = [];
    
        $notifications[] = [
            "message" => 'Contoh Notif',
            "time" => strtotime("2016-05-03 12:12:01"),
            "style" => [
                "icon" => "icon-envelop",
                "textType" => "text-success",
            ],
        ];
    $countNotif = count($notifications);
    array_multisort(array_column($notifications, "time"), SORT_DESC, $notifications);
    ?>
    <ul class="nav navbar-nav navbar-right" style="margin-right: 50px;">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" style="top: 10px;">
                <i class="icon-bell fa-fw"></i>
                <span class="visible-xs-inline">Notifications</span>
                <?php
                if ($countNotif > 0) {
                    ?>
                    <span class="badge badge-sm up bg-danger pull-right-xs"><?= $countNotif ?></span>
                    <?php
                }
                ?>
            </a>
            <div class="dropdown-menu w-xl animated fadeInUp">
                <div class="panel-heading b-light bg-light">
                    <center><strong><?= __("Notifikasi") ?></strong></center>
                </div>
                <div class="list-group">
                    <?php
                    if (!empty($notifications)) {
                        foreach ($notifications as $notification) {
                            ?>
                            <div class="list-group-item">
                                <span class="clear block m-b-none">
                                    <?= $notification["message"] ?> <br>
                                    <small class="text-muted"><?= $this->Html->getTimeago($notification["time"]); ?></small>
                                </span>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="list-group-item">
                            <span class="clear block m-b-none">
                                Tidak ada notifikasi.
                            </span>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </li>

        <li class="dropdown">
            <a class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
                <i class="fa fa-dedent fa-fw text"></i>
                <i class="fa fa-indent fa-fw text-active"></i>
            </a>
        </li>
    </ul>
</div>