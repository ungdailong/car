<?php if(!defined('DIR_APP')) die('Your have not permission'); ?>

<div class="box"> <!-- Box begins here -->
      <h2 style="float:left; width:83%">Category Media</h2> <h2 style="float:right; ">  <?php Admin::button('save, cancel'); ?> </h2>
      <div style="clear:both"></div>
      <p>Đây là module quản lý các thể loại của lĩnh vực Media. Gồm đầy đủ chức năng : Thêm, xóa, sửa.</p>
      
      
      <!--
      Classical Table below, must be used with thead and tbody tags;
      -->
     <?php if(@$_SESSION['message']) { ?>
    	<div class="warning"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php } ?>
      <form method="post" enctype="multipart/form-data" name="myform">
            <table >
                 <thead>
                  <tr class="alt"> 
                     
                      <th colspan="2"><strong>Input Information</strong></th>
                      
                  </tr>
              	</thead>
               <tr>
                    <td>Description (vi) :</td>
                    <td><textarea rows="8" name="content_vi" id="content_vi"><?php echo str_replace("\\","",@$content_vi); ?></textarea><span class="required">*</span> </td>
                </tr>
				
                <tr>
                    <td>Description (en) :</td>
                    <td><textarea rows="8" name="content_en" id="content_en"><?php echo str_replace("\\","",@$content_en); ?></textarea><span class="required">*</span> </td>
                </tr>
                	
				<tr>
                    <td style="width:10%"><?php echo "Type"; ?></td>
                    <td>
						<select name="id_type" >
                           <option value="">-----------</option>
                           <option value="1"  <?php if(@$id_type==1) echo "selected='selected'"?>>Contact Information</option>
                           <option value="2"  <?php if(@$id_type==2) echo "selected='selected'"?>>Introductions about Us</option>
                           <option value="3"  <?php if(@$id_type==3) echo "selected='selected'"?>>Director Information</option>
                           <option value="4"  <?php if(@$id_type==4) echo "selected='selected'"?>>Privacy Policy</option>
                           <option value="5"  <?php if(@$id_type==5) echo "selected='selected'"?>>Terms of use</option>
						</select>
					</td>
                </tr>	
				
            </table>
        </form>
      
           
         <!-- END Table -->
      
      
  </div> <!-- END Box-->
<script type="text/javascript">
tbl.editor('content_vi,content_en');
</script>
<script type="text/javascript">
$.tabs('#tabs a');
</script>