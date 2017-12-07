<?php 
$username = $_GET['ref'];
	$user = get_user_by( 'login', $username );
	$user_id = $user->ID;
	$mcauser= get_user_meta( $user_id, mca_member, true ); 
?>
<div id="myModal" class="mca-modal email-optin">
	<div class="modal-content-active-membership mcapopup">
        <span class="close">Close</span>
            <h3>Do You Have An Active Motor Club of America Account?</h3>
            <div class="buttons-row">
                <div class="left-col">
                    <a href="https://www.tvcmatrix.com/secure/cart/addItem.aspx?qty=1&itID=9135&PromoID=83&uid=<?php echo $user->mca_member; ?>" target="_blank" class="btn">NO... I DO NOT!</a>
                    <p>
                        If you do not have an "Active" Motor Club of America account, select this option.
                    </p>
                </div>
                <div class="right-col">
                    <a href="https://mcaprotools.com/invite" class="btn yesido">YES... I DO!</a>
                    <p>
                        Selecting this options means you already have an "Active" Motor Club of America account.
                    </p>
                </div>
            </div>
        </div>
			
        
        
    </div>