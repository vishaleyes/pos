<?php
$extraPaginationPara='&keyword='.$ext['keyword'].'&sortType='.$ext['currentSortType'].'&sortBy='.$ext['sortBy'].'&startdate='.$ext['startdate'].'&enddate='.$ext['enddate'];
?>
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->params->base_url;?>css/custom-theme/jquery-ui-1.8.13.custom.css" />
<script type="text/javascript">
var base_path = "<?php echo Yii::app()->params->base_path;?>";
var $j = jQuery.noConflict();
$j(document).ready(function(){
	$j('.delete_this').click(function(){
		var id	=	$j(this).attr('lang');
		if(confirm("##_ADMIN_DELET_CONFIRM_##")){
			window.location=base_path+"admin/deleteCategory/id/"+id;
		}
	});
	
	$j(function() {
		var dates = $j( "#startdate, #enddate" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				var option = this.id == "startdate" ? "minDate" : "maxDate",
					instance = $j( this ).data( "datepicker" ),
					date = $j.datepicker.parseDate(
						instance.settings.dateFormat ||
						$j.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	});
});
function checkAll(){
	for (var i=0;i<document.forms[2].elements.length;i++)
	{
		var e=document.forms[2].elements[i];
		if ((e.name != 'checkboxAll') && (e.type=='checkbox'))
		{
			e.checked=document.forms[2].checkboxAll.checked;
		}
	}
}

function dSelectCheckAll()
{
	document.getElementById('checkboxAll').checked="";
}

function validateForm(){
	var checked	=	$j("input[name=checkbox[]]:checked").map(
    function () {return this.value;}).get().join(",");
	
	if(!checked){
		alert('Please select at least one record.');
		return false;
	}
	
	if(confirm("Do you want to delete this record")){
		return true;
	}
	return false;
}

function validateAll()
{
	var flag=0;
	
	return true;
	
}
function popitup(url) {
	newwindow=window.open(url,'name','height=400,width=780,scrollbars=yes,screenX=250,screenY=200,top=150');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>
<div align="center">
	<?php if(Yii::app()->user->hasFlash('success')): ?>                                
        <div id="msgbox" class="clearmsg"> <?php echo Yii::app()->user->getFlash('success'); ?></div>
        <div class="clear"></div>
    <?php endif; ?>
    <?php if(Yii::app()->user->hasFlash('error')): ?>
        <div id="msgbox" class="clearmsg errormsg"> <?php echo Yii::app()->user->getFlash('error'); ?></div>
        <div class="clear"></div>
    <?php endif; ?>
</div>
<div class="clear"></div>
<div id="content">
	<div>
		<h1>##_CATEGORY_LIST_##</h1>
        
		
        <table width="100%" border="0" class="search-table" cellpadding="2" cellspacing="2">
                	<tr>
                        <td align="right" colspan="8">
                        	<a href="<?php echo Yii::app()->params->base_path;?>admin/addCategory" class="btn">##_ADD_CATEGORY_##</a> 
                			
                		</td>
                    </tr>
                    <?php
                    echo CHtml::beginForm(Yii::app()->params->base_path.'admin/category/','post',array('cat_id' => 'searchForm','name' => 'searchForm')) ?>
                    <tr><td colspan="8" class="height10"></td></tr>
                    <tr>
                        <td width="8%" align="left">##_ADMIN_SEARCH_## :</td>
                        <td width="20%" align="left">
                        	<input name="keyword" id="keyword" class="textbox2" type="text" value="<?php echo $ext['keyword'];?>"/>
                        </td>
                   		<td width="14%" align="right">##_ADMIN_START_DATE_## :</td>
                      	<td width="14%">
                        	<input name="startdate" id="startdate" class="textbox2 datebox" type="text" value="<?php if(isset($ext['startdate'])){echo $ext['startdate'];}?>"/>
                        </td>
                        <td width="12%" align="right">##_ADMIN_END_DATE_## :</td>
						<td width="14%" align="left">
                        	<input name="enddate" width="20" id="enddate" class="textbox2 datebox" type="text" value="<?php if(isset($ext['enddate'])){echo $ext['enddate'];}?>"/>
                        </td>
                        <td width="9%" align="right">
                        	<input type="submit"  name="Search" value="##_ADMIN_SEARCH_##"  class="btn" />
                        </td>
                        <td width="9%" align="right">
                        	<input type="button"  name="" value="##_ADMIN_SHOWALL_##"  onclick="window.location.href='<?php echo Yii::app()->params->base_path;?>admin/category'"  class="btn"  />
                        </td>
                        
                    </tr>
                    <?php echo CHtml::endForm();?>
                </table>
      <?php 
        echo CHtml::beginForm(Yii::app()->params->base_path.'admin/deleteRecord/type/All','post',array('cat_id' => 'deleteRecordForm','name' => 'deleteRecordForm','onsubmit' => 'return validateForm();')) ?>
        <div id="store">
            <div class="content-box">
            
                <table cellpadding="0" cellspacing="0" border="0" class="listing" width="960">
                	<tr>
                    	<?php /*?><th width="83">
                        	<input name="checkboxAll" type="checkbox" id="checkboxAll" value="1" onclick="checkAll();">
                        </th><?php */?>
                        <th width="115" align="center">##_ADMIN_NO_##</th>
                        <th width="291" align="center"><a href="<?php echo Yii::app()->params->base_path;?>admin/category/sortType/<?php echo $ext['sortType'];?>/sortBy/category_name" class="sort">##_CATEGORY_NAME_##<?php 
                            if($ext['img_name'] != '' && $ext['sortBy'] == 'category_name'){ ?>
                                <img src="<?php echo Yii::app()->params->base_url;?>images/<?php echo $ext['img_name'];?>" class="sortImage" />
                                <?php
                            } ?>
                            </a></th>
							<th width="291" align="center"><a href="<?php echo Yii::app()->params->base_path;?>admin/category/sortType/<?php echo $ext['sortType'];?>/sortBy/cat_description" class="sort">##_CATEGORY_DESC_##<?php 
                            if($ext['img_name'] != '' && $ext['sortBy'] == 'cat_description'){ ?>
                                <img src="<?php echo Yii::app()->params->base_url;?>images/<?php echo $ext['img_name'];?>" class="sortImage" />
                                <?php
                            } ?>
                            </a></th>
							
							<th width="282" align="center"><a href="<?php echo Yii::app()->params->base_path;?>admin/category/sortType/<?php echo $ext['sortType'];?>/sortBy/created" class="sort">##_ADMIN_CREATE_DATE_##<?php 
                            if($ext['img_name'] != '' && $ext['sortBy'] == 'created'){ ?>
                                <img src="<?php echo Yii::app()->params->base_url;?>images/<?php echo $ext['img_name'];?>" class="sortImage" />
                                <?php
                            } ?>
                            </a></th>
                            
                             
							<th width="189" align="center"><a href="<?php echo Yii::app()->params->base_path;?>admin/category/sortType/<?php echo $ext['sortType'];?>/sortBy/modified" class="sort">##_ADMIN_MODIFY_DATE_##<?php 
                            if($ext['img_name'] != '' && $ext['sortBy'] == 'modified'){ ?>
                                <img src="<?php echo Yii::app()->params->base_url;?>images/<?php echo $ext['img_name'];?>" class="sortImage" />
                                <?php
                            } ?>
                            </a></th>
                            <th width="15" align="center">##_ADMIN_EDIT_##</th>
                            <th width="5" align="center">##_ADMIN_DELETE_##</th>
                        
                    </tr>
                    
                    <?php
                    $i=1;
					$cnt = $data['pagination']->itemCount;
					if($cnt>0){
						
						foreach($data['category']  as $row){ ?>
                            <tr>
                                <?php /*?><td class="alignCenter">
                                    <input name="checkbox[]" type="checkbox" onclick="dSelectCheckAll()" id="checkbox<?php echo $row['cat_id'];?>" value="<?php echo $row['cat_id'];?>">
                                </td><?php */?>
                                <td class="alignCenter">
                                    <?php 
                                    echo $i+($data['pagination']->getCurrentPage()*$data['pagination']->getLimit());
                                    ?>
                                </td>
                                <td  align="left">
								<a href="<?php echo Yii::app()->params->base_path;?>admin/prouductForCategory/cat_id/<?php echo $row['cat_id'];?>/cat_name/<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?>
                                </a>
                                </td>
                                 <td align="left"><?php echo $row['cat_description'];?></td>
                                  <td class="alignCenter"><?php if(isset($row['created']) && $row['created'] != ""  && $row['created'] != "0000-00-00 00:00:00" ) { echo date("d-m-Y", strtotime($row['created'])); } else { echo "-NULL-"; }?></td>
                                   <td class="alignCenter"><?php if(isset($row['modified']) && $row['modified'] != ""  && $row['modified'] != "0000-00-00 00:00:00" ) { echo date("d-m-Y", strtotime($row['modified'])); } else { echo "-NULL-"; }?></td>
                                   <td class="alignCenter" width="15">
                                    <a href="<?php echo Yii::app()->params->base_path;?>admin/addCategory/cat_id/<?php echo $row['cat_id'];?>" title="Edit"><img src="<?php echo Yii::app()->params->base_url; ?>images/edit_pencil.png" /> </a>
                                </td>
                                   
                                <td class="alignCenter" width="15">
                                    <a class="delete_this" href="javascript:;"  lang="<?php echo $row['cat_id'];?>" title="Delete Seeker">
                                        <img src="<?php echo Yii::app()->params->base_url;?>images/false.png" alt="Delete" border="0"/>
                                    </a>
                                </td>
                                
                                                                
                                
                            </tr>
                            <?php
                            $i++;
						}
					}else{?>
                    <tr>
                    	<td colspan="10">##_ADMIN_NO_RECORD_FOUND_##</td>
                    </tr>
                    <?php
					}?>
                    <input type="hidden" name="total_acc" id="total_acc" value="<?php echo $i;?>" />
                </table>
            </div>
            <div>
                
                <div>
                	 <?php  
					 if($cnt > 0 && $data['pagination']->getItemCount()  > $data['pagination']->getLimit()){?>
                    	 <div class="pagination">
                         <?php 
						 $extraPaginationPara='&keyword='.$ext['keyword'].'&sortBy='.$ext['sortBy'].'&startdate='.$ext['startdate'].'&enddate='.$ext['enddate'];
						 $this->widget('application.extensions.WebPager',
										 array('cssFile'=>Yii::app()->params->base_url.'css/style.css',
												 'extraPara'=>$extraPaginationPara,
												'pages' => $data['pagination'],
												'id'=>'link_pager',
						));
					 ?>	
                     </div>
					 <?php  
					 }?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
  	<?php echo CHtml::endForm();?>
</div>
</div>