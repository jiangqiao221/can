<?php

use app\models\DictionaryLogic;

/** @var array $tables */
/** @var int $count */

$this->title = '数据字典';

?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->title ?></title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="text-center" style="margin: 25px auto;"><?= $this->title ?></h2>
        </div>
    </div>
    <p class="bg-info text-center" style="line-height: 40px;">（注：共<?= $count ?>张表，按Ctrl+F查找关键字）</p>
    <?php $i = 1; ?>
    <?php foreach ($tables as $table): ?>
        <h4 style="margin-top: 40px;"><?= $i ?>.<?= $table['Name'] ?>&nbsp;&nbsp;<?= $table['Comment'] ?></h4>
        <?php $fields = DictionaryLogic::getFullFields($table['Name']); ?>
        <table class="table table-bordered table-hover">
            <tr class="active">
                <th class="col-xs-2">Field</th>
                <th class="col-xs-2">Type</th>
                <th class="col-xs-2">Collation</th>
                <th class="col-xs-2">Null</th>
                <th class="col-xs-2">Default</th>
                <th class="col-xs-2">Comment</th>
            </tr>
            <?php foreach ($fields as $field): ?>
                <tr>
                    <td><?= $field['Field'] ?></td>
                    <td><?= $field['Type'] ?></td>
                    <td><?= $field['Collation'] ?></td>
                    <td><?= $field['Null'] ?></td>
                    <td><?= $field['Default'] ?></td>
                    <td>
                        <?php
                        $more = [];
                        if (!empty($field['Comment'])) {
                            $more[] = $field['Comment'];
                        }
                        if (!empty($field['Key'])) {
                            $more[] = $field['Key'];
                        }
                        if (!empty($field['Extra'])) {
                            $more[] = $field['Extra'];
                        }
                        if (!empty($more)) {
                            echo implode(',', $more);
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php $i++; ?>
    <?php endforeach; ?>
</div>
</body>
</html>