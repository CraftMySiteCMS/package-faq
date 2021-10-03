<?php
$title = FAQ_DASHBOARD_TITLE;
$description = FAQ_DASHBOARD_DESC;
/** @var faqModel[] $faq_list */
?>

<?php $styles = '<link rel="stylesheet" href="'.getenv("PATH_SUBFOLDER").'admin/resources/vendors/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="'.getenv("PATH_SUBFOLDER").'admin/resources/vendors/datatables-responsive/css/responsive.bootstrap4.min.css">';?>

<?php $scripts = '<script src="'.getenv("PATH_SUBFOLDER").'admin/resources/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="'.getenv("PATH_SUBFOLDER").'admin/resources/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="'.getenv("PATH_SUBFOLDER").'admin/resources/vendors/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="'.getenv("PATH_SUBFOLDER").'admin/resources/vendors/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="'.getenv("PATH_SUBFOLDER").'admin/resources/vendors/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="'.getenv("PATH_SUBFOLDER").'admin/resources/vendors/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script>
    $(function () {
        $("#faq_table").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            language: {
                processing:     "'.FAQ_LIST_PROCESSING.'",
                search:         "'.FAQ_LIST_SEARCH.'",
                lengthMenu:    "'.FAQ_LIST_LENGTHMENU.'",
                info:           "'.FAQ_LIST_INFO.'",
                infoEmpty:      "'.FAQ_LIST_INFOEMPTY.'",
                infoFiltered:   "'.FAQ_LIST_INFOFILTERED.'",
                infoPostFix:    "'.FAQ_LIST_INFOPOSTFIX.'",
                loadingRecords: "'.FAQ_LIST_LOADINGRECORDS.'",
                zeroRecords:    "'.FAQ_LIST_ZERORECORDS.'",
                emptyTable:     "'.FAQ_LIST_EMPTYTABLE.'",
                paginate: {
                    first:      "'.FAQ_LIST_FIRST.'",
                    previous:   "'.FAQ_LIST_PREVIOUS.'",
                    next:       "'.FAQ_LIST_NEXT.'",
                    last:       "'.FAQ_LIST_LAST.'"
                },
                aria: {
                    sortAscending:  "'.FAQ_LIST_SORTASCENDING.'",
                    sortDescending: "'.FAQ_LIST_SORTDESCENDING.'"
                }
            },
        });
    });
</script>';?>

<?php ob_start(); ?>

<div class="content">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title"><?= FAQ_DASHBOARD_TABLE_TITLE ?></h3>
                    </div>

                    <div class="card-body">

                        <table id="faq_table" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th><?= FAQ_DASHBOARD_TABLE_QUESTION ?></th>
                                    <th><?= FAQ_DASHBOARD_TABLE_RESPONSE ?></th>
                                    <th><?= FAQ_DASHBOARD_TABLE_AUTHOR ?></th>
                                    <th><?= FAQ_DASHBOARD_TABLE_EDITING ?></th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php /** @var faqModel[] $faqList */
                            foreach ($faqList as $faq) : ?>
                                <tr>
                                    <td><?= $faq['question'] ?></td>
                                    <td><?= $faq['response'] ?></td>
                                    <td><?= $faq['author'] ?></td>
                                    <td class="text-center">

                                        <button onclick="window.location.href='../faq/edit/<?= $faq['faq_id'] ?>'" class="btn btn-warning"><i class="fas fa-edit"></i></button>

                                        <form action="../faq/delete" method="post" class="d-inline-block">
                                            <input type="hidden" value="<?= $faq['faq_id'] ?>" name="id">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th><?= FAQ_DASHBOARD_TABLE_QUESTION ?></th>
                                    <th><?= FAQ_DASHBOARD_TABLE_RESPONSE ?></th>
                                    <th><?= FAQ_DASHBOARD_TABLE_AUTHOR ?></th>
                                    <th><?= FAQ_DASHBOARD_TABLE_EDITING ?></th>
                                </tr>
                            </tfoot>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require(getenv("PATH_ADMIN_VIEW").'template.php'); ?>