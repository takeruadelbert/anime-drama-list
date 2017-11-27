<?php
echo $this->element(_TEMPLATE_DIR . "/{$template}/filter/genre");
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="block-inner text-danger">
            <h6 class="heading-hr"><?= __("DATA GENRE") ?>
                <div class="pull-right">
                    <?= $this->element(_TEMPLATE_DIR . "/{$template}/roleaccess/delete") ?>
                    <?= $this->element(_TEMPLATE_DIR . "/{$template}/roleaccess/add") ?>
                </div>
                <small class="display-block"></small>
            </h6>
        </div>
        <div class="table-responsive pre-scrollable stn-table">
            <form id="checkboxForm" method="post" name="checkboxForm" action="<?php echo Router::url('/' . $this->params['prefix'] . '/' . $this->params['controller'] . '/multiple_delete', true); ?>">
                <table width="100%" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="50"><input type="checkbox" class="styled checkall"/></th>
                            <th width="50">No</th>
                            <th><?= __("Name") ?></th>
                            <th width="100"><?= __("Action") ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $limit = intval(isset($this->params['named']['limit']) ? $this->params['named']['limit'] : 10);
                        $page = intval(isset($this->params['named']['page']) ? $this->params['named']['page'] : 1);
                        $i = ($limit * $page) - ($limit - 1);
                        if (empty($data['rows'])) {
                            ?>
                            <tr>
                                <td class = "text-center" colspan = 4>No Data Found</td>
                            </tr>
                            <?php
                        } else {
                            foreach ($data['rows'] as $item) {
                                ?>
                                <tr id="row-<?= $i ?>" class="removeRow<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>">
                                    <td class="text-center"><input type="checkbox" name="data[<?php echo Inflector::classify($this->params['controller']) ?>][checkbox][]" value="<?php echo $item[Inflector::classify($this->params['controller'])]['id']; ?>"  id="checkBoxRow" class="styled checkboxDeleteRow" /></td>
                                    <td class="text-center"><?= $i ?></td>
                                    <td><?= $item['Genre']['name'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= Router::url("/admin/genres/view/{$item['Genre']['id']}") ?>"><button type="button" class="btn btn-default btn-xs btn-icon tip" title="Genre Detail"><i class="icon-file"></i></button></a>
                                                <?= $this->element(_TEMPLATE_DIR . "/{$template}/roleaccess/edit", ["editUrl" => Router::url("/admin/{$this->params['controller']}/edit/{$item[Inflector::classify($this->params['controller'])]['id']}")]) ?>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <?php echo $this->element(_TEMPLATE_DIR . "/{$template}/pagination") ?>
</div>

