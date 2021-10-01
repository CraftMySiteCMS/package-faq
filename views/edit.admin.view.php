<?php
$title = _Faq_dashboard_Edit_TITLE;
$description = _Faq_dashboard_DESC;
?>

<?php ob_start(); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="" method="post">
                        <div class="card card-primary">

                            <div class="card-header">
                                <h3 class="card-title"><?=_Faq_dashboard_Table_Edit_Title?> <strong><?= $faq->faqId ?></strong></h3>
                            </div>

                            <div class="card-body">

                                <label for="question"><?=_Faq_dashboard_Add_Question_Label?></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-question"></i></i></span>
                                    </div>
                                    <input type="text" name="question" class="form-control"
                                           placeholder="<?=_Faq_dashboard_Add_Question_Placeholder?>" value="<?= $faq->question ?>" required>

                                </div>

                                <label for="question"><?=_Faq_dashboard_Add_Response_Label?></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-paper-plane"></i></span>
                                    </div>
                                    <input type="text" name="response" class="form-control"
                                           placeholder="<?=_Faq_dashboard_Add_Response_Placeholder?>" value="<?= $faq->response ?>" required>
                                </div>

                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right"><?=_Faq_dashboard_Button_Save?></button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require(getenv("PATH_ADMIN_VIEW").'template.php'); ?>