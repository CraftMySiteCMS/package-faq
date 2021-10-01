<?php
$title = _Faq_dashboard_TITLE;
$description = _Faq_dashboard_DESC;
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
                processing:     "'._Faq_list_processing.'",
                search:         "'._Faq_list_search.'",
                lengthMenu:    "'._Faq_list_lengthMenu.'",
                info:           "'._Faq_list_info.'",
                infoEmpty:      "'._Faq_list_infoEmpty.'",
                infoFiltered:   "'._Faq_list_infoFiltered.'",
                infoPostFix:    "'._Faq_list_infoPostFix.'",
                loadingRecords: "'._Faq_list_loadingRecords.'",
                zeroRecords:    "'._Faq_list_zeroRecords.'",
                emptyTable:     "'._Faq_list_emptyTable.'",
                paginate: {
                    first:      "'._Faq_list_first.'",
                    previous:   "'._Faq_list_previous.'",
                    next:       "'._Faq_list_next.'",
                    last:       "'._Faq_list_last.'"
                },
                aria: {
                    sortAscending:  "'._Faq_list_sortAscending.'",
                    sortDescending: "'._Faq_list_sortDescending.'"
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
                        <h3 class="card-title"><?= _Faq_dashboard_Table_Title ?></h3>
                    </div>

                    <div class="card-body">

                        <table id="faq_table" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th><?= _Faq_dashboard_Table_Question ?></th>
                                    <th><?= _Faq_dashboard_Table_Response ?></th>
                                    <th><?= _Faq_dashboard_Table_Author ?></th>
                                    <th><?= _Faq_dashboard_Table_Editing ?></th>
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
                                    <th><?= _Faq_dashboard_Table_Question ?></th>
                                    <th><?= _Faq_dashboard_Table_Response ?></th>
                                    <th><?= _Faq_dashboard_Table_Author ?></th>
                                    <th><?= _Faq_dashboard_Table_Editing ?></th>
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