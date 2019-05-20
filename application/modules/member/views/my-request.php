<?php $this->load->view('template/landingpage/head') ?>
<link href="<?=base_url()?>assets/css/member-dashboard.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/member-info.css" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets/css/main2.css')?>" rel="stylesheet" type="text/css">
<body> 
<?php $this->load->view('template/landingpage/nav') ?>
<div class="container" style="margin-top: 90px; margin-bottom: 50px;">
	<table id="init-table" class="table table-striped table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Request Date</th>
                <th>Status Request</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
    			foreach ($reques as $key => $value) :
    				if($value['buyer_type'] == API) {
    					$buyer_type = 'API';
    				} elseif($value['buyer_type'] == WHITELABEL) {
    					$buyer_type = 'WHITE LABEL';
    				} else {
    					$buyer_type = 'TRAVEL AGENT';
    				}
        	?>
            <tr>
                <td style="text-align: center;"><?= ($key + 1); ?></td>
                <td  style="text-align: center;">
                	<?php  
                		if($value['type'] == SELLER) : 
                	?>
                	<span class="label label-success">Seller</span>
                	<?php else: ?>
            		<span class="label label-info">Buyer <?= "<b style='color:black;'>(".$buyer_type.")</b>"; ?></span>
                	<?php endif; ?>
            	</td>
                <td  style="text-align: center;"><?= date('Y-m-d',strtotime($value['request_date'])); ?></td>
                <td style="text-align: center;">
            		<?php 
            			if($value['status_request'] == WAITING) {
            				echo '<span class="label label-warning">WAITING</span>';
            			} elseif($value['status_request'] == INPROGRESS ) {
            				echo '<span class="label label-info">IN PROGRESS</span>';
            			} elseif($value['status_request'] == WAITINGSIGN ) {
            				 echo '<span class="label label-warning">WAITING SIGN</span>';
            			} else {

            			}
            		?>
        		</td>
                <td>
                	<a href="<?php echo site_url('member/cancel_request'); ?>" data-id="<?= $value['id'] ?>" class="btn btn-danger cancel-confirm"><i class="fa fa-ban"></i> Cancel</a>
                </td>
            </tr>
            <?php 
            	endforeach;
            ?>
        </tbody>
    </table>
</div>
<?php $this->load->view('template/loader/preloader') ?>
<?php $this->load->view('template/landingpage/footer', $footerPage) ?>

<script type="text/javascript">
    $(document).on("click", ".cancel-confirm", function(e) {
        e.stopPropagation();
        e.preventDefault();
        var url = $(this).attr("href");
        var data_id = $(this).data("id");
        var data_name = $(this).data("name");

        title = 'Cancel Confirmation';
        content = 'Do you really want to cancel this ?';

        popup_confirm (url, data_id, title, content);
    });
</script>
</body>
</html>