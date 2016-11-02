<script type="text/javascript" src="<?php echo Yii::app()->params->base_url; ?>js/jquery.cleditor.min.js"></script>
<script src="<?php echo Yii::app()->params->base_path_language; ?>languages/<?php echo Yii::app()->session['prefferd_language']?>/global.js" type="text/javascript"></script>
<script  type="text/javascript"> 
   	function generalEntry() {
	   	
		 var credit = $j("#credit").val();
		 var debit = $j("#debit").val();
		 var supplier_id = $j("#supplier_id option:selected").val();
		 var paymentType = $j("#paymentType option:selected").val();
		 
		 if(supplier_id == 0 && supplier_id == 0)
		 {
		 	jAlert(msg['INSERT_ONE_VALUE']);
			return false;
		 }
		 
		 if(supplier_id == "0")
		 {
		 	jAlert(msg['SELECT_CUST']);
			return false;
		 }
		 
		 if(paymentType == "0")
		 {
		 	jAlert(msg['SELECT_PAY_TYPE']);
			return false;
		 }
		 
		 if(credit == "")
		 {
		 	var credit = 0 ;	 
		 }
		 if(debit == "")
		 {
		 	var debit = 0 ;	 
		 }
		 
		 $j.ajax({
		  type: 'POST',
		  url: '<?php echo Yii::app()->params->base_path;?>admin/addGeneralEntryforSupplier',
		  data: 'credit='+credit+'&debit='+debit+'&supplier_id='+supplier_id+'&paymentType='+paymentType,
		  cache: false,
		  success: function(data)
		  {
		   $j(".main-wrapper").html(data);
		   /*setTimeout(function() { $j("#msgbox").fadeOut();}, 2000 );
	  	   setTimeout(function() { $j("#msgbox1").fadeOut();},2000 );*/ 
		  }
		 });
   }
   
   function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode 
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
	  
	function emptyValue(boxid)
	{
		$j("#"+boxid+"").attr("value","");
	}	
   
</script>

<a href="#verifycodePopup" id="verifycode"></a>
<!-- End Mouse Scroll Finction -->
<div id="update-message"></div>
<!-- Middle Part -->

<div class="clear"></div>

<div class="mainDiv" >
<h1><a href="<?php echo Yii::app()->params->base_path;?>admin/generalEntryforAdmin">##_MONEY_TRANSACTION_##</a> <img src="<?php echo Yii::app()->params->base_url;?>images/path-arrow.png" alt="" border="0" />##_GENERAL_ACCOUNT_ENTRY_SUPPLIER_##</h1>        
        <div class="content-box">
             <div style="margin-left:10px;">
             <div class="RightSide">	
            
             <div class="productboxgreen">
				<div style="margin-left:10px;">
                 <table width="400" border="1" style="background-color:#cccccc;">
                 	<tr>
                    	<td align="center"><h2>##_SUPPLIER_NAME_##</h2></td>
                        <td align="center">
                     
                        
                       <select name="supplier_id" id="supplier_id" class="select-box2" style="width:250px;">
                               <option value="0" selected>##_SELECT_YOUR_SUPPLIER_##</option>
							   <?php foreach ($supplierList as $row) { ?>
                       <option value="<?php echo  $row['supplier_id'] ; ?>"><?php echo $row['supplier_name'];?>
                           </option>
                           <?php } ?>
                		</select>
                       
                        </td>
                        
                        
                    </tr>
                    <tr>
                 	    <td align="center"><h2>##_RECEIVE_##</h2></td>
                    	<td align="center"><input style="width:160px; text-align:right;" class="textbox" type="text" id="debit" name="debit" value="0" /></td>
                    </tr>
                    <tr>
                    	<td align="center"><h2>##_PAY_##</h2></td>
                        <td align="center"><input style="width:160px; text-align:right;"  class="textbox" type="text" id="credit" name="credit" value="0"  /></td>
                    </tr>
                    <tr>
                    	<td align="center"><h2>##_PAY_TYPE_##</h2></td>
                        <td align="center">
                        <select id="paymentType" name="paymentType" style="width:160px;"  >
                        	<option value="0" selected="selected">##_SELECT_PAY_TYPE_##</option>
                            <option value="1" >##_CASH_##</option>
                            <option value="2" >##_CARD_##</option>
                            <option value="3" >##_CHEQUE_##</option>
                        </select>
                        </td>
                    </tr>
                    
                 </table>   
                 <div class="btnfield">   
               		<input type="submit" name="submit" value="##_BTN_SUBMIT_##" style=" background-color:#02356E; color:#FFF; width:100px; height:30px;"  class="btn" onclick="javascript:generalEntry();" />  
                    <input id="btn_cancel_password" type="button" onclick="javascript:window.location='<?php echo Yii::app()->params->base_path; ?>admin/generalEntryforAdmin'" value="##_BTN_CANCEL_##" class="btn" style=" background-color:#02356E; color:#FFF; width:100px; height:30px;"   />
                </div>
            </div>
       </div>
    </div>
    
</div>
</div>
</div>
</div>