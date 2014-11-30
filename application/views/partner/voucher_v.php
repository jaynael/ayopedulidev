<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="/asset/style/invoice.css" type="text/css" charset="utf-8">
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
	<script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
	  <script type="text/javascript">
	  $(document).ready(function() 
	      { 
	          $("#table").tablesorter({ 
	      widgets: ['zebra'] 
	      }); 
	      } 
	  ); 
	  </script>-->
	  
	<title>Gudness Voucher</title>

</head>

<body>

<div id="page">
	
	<!--To change the status of the invoice, update class name. for example "status paid" or "status overdue". Possible options are: draft, sent, paid, overdue-->
	<!--<div class="status sent">
		<p>Paid</p>
	</div>-->
	<div class="company-details">
		<h1><img src="/asset/images/logo.png" /></h1>
		<p class="company-address">
			Jln.Cut Mutiah Blok D No.5 Rt.8/8 Kel.Margahayu, Bekasi Timur, Jawa Barat 17113<br>
	081214939954 | partner@ayopeduli.com
		</p>
	</div>		
	<h1><?php echo $voucher_item['title'] ?></h1>
	<p class="terms"><strong>Redeemed with <?php echo $voucher_item['poin'] ?> gudness poin</strong><br>
	<?php echo $voucher_item['partnername'] ?> | Gudness Partner</p>
    <div class="code" style="float: left;">
    <span>Voucher Code :</span> <h2><?php echo $voucher_item['vocerid'] ?> </h2>
    </div>
    
    <?php 
		$code = $voucher_item['vocerid'];
		$this->load->library('ciqrcode');
		$params['data'] = $code;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH.'tes.png';
		//var_dump($params['data']);
		$this->ciqrcode->generate($params);
		
		echo '<img style="width: 150px;height: 150px;margin: -47px 0px 0px 288px;" src="'.base_url().'tes.png" />';
	?>
    
    <div class="recipient-address">
        <strong>Redeemed by :</strong><br>
        <?php echo $voucher_item['byname'] ?> <br />
        on date : <?php echo $voucher_item['time'] ?>      
    </div>
    
    <div class="barcode">
    
    </div>
    <div class="clearfix"></div>
	
	
	
	<!--<table id="table" class="tablesorter" cellspacing="0"> 
	<thead> 
	<tr> 
	    <th width="50px" class="header">Qty</th> 
	    <th class="header">Description</th> 
	    <th class="header">Price</th> 
	    <th class="header">Total</th> 
	</tr> 
	</thead> 
	<tbody> 
	<tr class="odd"> 
	    <td>1</td> 
	    <td>Integer posuere erat a ante venenatis dapibus. </td> 
	    <td>$500</td> 
	    <td>$500</td> 
	</tr> 
	<tr class="even"> 
	    <td>1</td> 
	    <td>Aenean eu leo quam. </td> 
	    <td>$300</td> 
	    <td>$300</td> 
	</tr> 
	<tr class="odd"> 
	    <td>4</td> 
	    <td>Donec ullamcorper nulla non metus auctor fringilla. </td> 
	    <td>$5</td> 
	    <td>$20</td> 
	</tr> 
	<tr class="even"> 
	    <td>2</td> 
	    <td>Duis mollis, est non commodo luctus.</td> 
	    <td>$1,000</td> 
	    <td>$2,000</td> 
	</tr> 
	<tr class="odd"> 
	    <td>8</td> 
	    <td>Etiam porta sem malesuada magna mollis euismod.</td> 
	    <td>$10</td> 
	    <td>$80</td> 
	</tr> 
	</tbody> 
	</table> 
	
	<div class="total-due">
		<div class="total-heading"><p>Amount Due</p></div>
		<div class="total-amount"><p>$2,900.00</p></div>
	</div>
	
	<hr>
	<div class="pay-buttons">
		<a href="#" class="pay-paypal">Pay now with PayPal</a>
		<a href="#" class="pay-card">Pay with Credit Card</a>
	</div>-->
	
</div>
<div class="page-shadow"></div>

</body>
</html>