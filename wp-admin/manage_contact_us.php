<?php
ob_start(); 
session_start();
/**
 * General settings administration panel.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */
require_once('./admin.php');
if ( ! current_user_can( 'manage_options' ) )
	wp_die( __( 'You do not have sufficient permissions to manage options for this site.' ) );
	
$title = __('Contact Us');

global $wpdb;

$QRY_SEL			= "SELECT * FROM ".$wpdb->prefix."tbl_contact_us";

$Total_QRY     		= "SELECT COUNT(1) FROM (${QRY_SEL}) AS combined_table";
$Total_Records      = $wpdb->get_var( $Total_QRY );
$Items_Per_Page		= 100;
$page             	= isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
$offset         	= ( $page * $Items_Per_Page ) - $Items_Per_Page;
$RS_contact        	= $wpdb->get_results( $QRY_SEL . " ORDER BY `id` DESC LIMIT ${offset}, ${Items_Per_Page}" );
$TotalPage         	= ceil($Total_Records / $Items_Per_Page);

$customPageHTML     	= "";
if($TotalPage > 1)
{
	$customPageHTML  =  '<div class="pagination">
						<span style="margin-right:10px;">Page '.$page.' of '.$TotalPage.'</span>'.
						paginate_links( 
								array(
									'base' => add_query_arg( 'cpage', '%#%' ),
									'format' => '',
									'prev_text' => __('< Previous'),
									'next_text' => __('Next >'),
									'mid_size' => 5,
									'total' => $TotalPage,
									'current' => $page
								)
							)
						.'</div>';
}


// Delete author
if( isset($_REQUEST['dID']) && $_REQUEST['dID'] != "" )
{
	$dID	= $_REQUEST['dID'];
	$rowsD	= $wpdb->get_row("SELECT id FROM ".$wpdb->prefix."tbl_contact_us WHERE id = '".$dID."'");
	if( $wpdb->num_rows > 0 )
	{
		$wpdb->query("DELETE FROM ".$wpdb->prefix."tbl_contact_us WHERE id = '".$dID."'");

		$_SESSION['msg'] = 'DELETE';
		header('Location: manage_contact_us.php');
		exit;
	}
	else
	{
		$_SESSION['msg'] = 'NO-FOUND';
		header('Location: manage_contact_us.php');
		exit;
	}
}

include('./admin-header.php');
?>
<div class="wrap">
    <h2>
    	<?php echo esc_html( $title ); ?>
    </h2>
      
    <table cellpadding="0" cellspacing="4" width="100%" align="left"  border="0">
        <tr>
          <td>
			<?php if($_SESSION['msg'] == "DELETE"){ ?>
                <div id="message" class="updated fade">
                  <p>Contact Deleted Successfully.</p>
                </div>
            <?php $_SESSION['msg'] = ''; }
                if($_SESSION['msg'] == "NO-FOUND"){ ?>
                <div id="message" class="updated fade">
                  <p>Contact Not-Found.</p>
                </div>
            <?php $_SESSION['msg'] = '';} ?>
            </td>
        </tr>
    </table>
  
<?php
if($RS_contact) :
?>
  <table width="100%" align="center" cellspacing="0" cellpadding="0" border="0" class="wp-list-table widefat fixed striped pages">
    <thead>
      <tr height="30">
        <th width="15%" align="center" class="manage-column column-title th-column"> 
           <strong>Name</strong>
        </th>
        <th width="15%" align="center" class="manage-column column-title th-column">
        	<strong>Email</strong>
        </th>
        <th width="15%" align="center" class="manage-column column-title th-column">
        	<strong>Phone Number</strong>
        </th>
        <th width="15%" align="center" class="manage-column column-title th-column">
        	<strong>Touch About</strong>
        </th>
        <th width="35%" align="center" class="manage-column column-title th-column">
        	<strong>Message</strong>
        </th>
        <th width="5%" align="center" class="manage-column column-title th-column">
        	<center><strong>Action</strong></center>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($RS_contact as $RS_con) { ?>
		  <tr height="30">
			<td align="left" class="artist_dleft_m">
				<?php echo stripslashes($RS_con->name);?>
            </td>
            <td align="left" class="artist_dleft_m">
            	<?php echo stripslashes($RS_con->email);?>
			</td>
            <td align="left" class="artist_dleft_m">
            	<?php echo stripslashes($RS_con->phone_number);?>
			</td>
            <td align="left" class="artist_dleft_m">
            	<?php echo stripslashes($RS_con->touch_about);?>
			</td>
            <td align="left" class="artist_dleft_m">
            	<?php echo stripslashes($RS_con->message);?>
			</td>
            <td align="left" class="artist_dleft_m"><center>
                <a href="manage_contact_us.php?dID=<?php echo $RS_con->id; ?>" onclick="return confirm('Are you sure you want to remove this Contact?')">
                	<img src="<?php echo get_admin_url();?>images/no.png" class="icon25" alt="Remove" title="Remove" />
                </a>
			</center></td>
		  </tr>
	  <?php		
      }
    	echo '<br />';
	 ?>
   </tbody>
  </table>
<?php
	echo $customPageHTML;
else:
   echo '<div align="center">
            <h2> No-Records.</h2>
          </div>';
endif;
?>
</div>

<?php include('./admin-footer.php') ?>