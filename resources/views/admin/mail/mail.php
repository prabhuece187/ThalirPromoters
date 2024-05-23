	<div id="section-to-print">
    <div class="print-inner-layout" >
        <p class="print-type fs-12px text-right"></p> 
        <table id="tbody" class="table table-sm table-bordered table-sm-responsive tbl" >            
            <thead class="print">
                <tr class="text-center">                    
                    <td width="100%" colspan="8"> 
                        <p class=" mb-0"><b> Change Password Link</b> </p>

					     <?php 
					        function myCrypt($value, $key, $iv){
							    $encrypted_data = openssl_encrypt($value, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
							    return base64_encode($encrypted_data);
							}
							$valTxt=$data['email'];
							$key="01234567890123456789012345678901"; // 32 bytes
							$vector="1234567890123412"; // 16 bytes
							$encrypted = myCrypt($valTxt, $key, $vector);
                            $en = str_replace( array('/' ), '₹', $encrypted);
							echo $en;
					      ?>
  
                        <div >
                         <a href="http://localhost:8000/admin-login#/forgotpassword/<?php echo $en ?>">Click Here</a>.
                         
                      </div>
                    </td>
                </tr>

              <h1></h1>	
        </table>
    </div>
    <h2></h2> 
</div>
