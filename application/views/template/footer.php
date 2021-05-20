<?php defined("BASEPATH") or exit("No direct script access allowed"); ?>




<div class="modal fade" id="sampleModal" role="dialog" data-backup="static" aria-labelledby="sampleModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class= "modal-content text-center">
            <div class="modal-header">
                <h2>sample modal</h2>
            </div>
            <div class="modal-body">
                <h2>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit modi minus aliquid et at velit voluptatum, 
                    tempore similique, sed provident harum itaque architecto! Dolor ipsum nostrum saepe quo voluptate blanditiis!</h2>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" id="saveBtn">Save</button>
            </div>
        </div>
    </div>

</div>




</body>
</html>
<script src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/sweetalert/sweetalert2.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap-select.min.js'); ?>"></script>


<script>
    var site_url = "<?php echo site_url();?>";


        if (<?php echo $this->session->flashdata("response") ? $this->session->flashdata("response") : 0; ?>) {
            alert("<?php echo $this->session->flashdata('message') ?>");

        }
</script>

<?php if (current_url() == site_url()): ?>
<script src="<?php echo site_url('assets/js/scripts/login/login.js'); ?>"></script>
<?php elseif(current_url() == site_url("dashboard")): ?>
<script src="<?php echo site_url('assets/js/scripts/dashboard/dashboard.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/chartjs/chart.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/chartjs/chart.annotation.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/chartjs/chart.datalabels.min.js'); ?>"></script>


<?php elseif(current_url() == site_url("registration")): ?>
<script src="<?php echo site_url('assets/js/scripts/registration/registration.js'); ?>"></script>
<?php endif; ?>


