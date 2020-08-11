<!-- Left Sidebar  -->
<div class="left-sidebar">
    
<style>
/*.nav li {
  border-bottom: 3px solid rgba(0, 0, 0, 0);
}
.nav li:hover {
  border-bottom: 3px solid #eee;
}
.nav li.active {
  border-bottom: 3px solid #338ecf;
  background: blue;
}*/
</style>

<!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" >
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
               
                 <!--  <li class="nav-label">Management   </li> -->
                <?php if($_SESSION["userType"]["role"] == "SUPERADMIN") { ?>
                   <li> <a class="has-arrow" href="dashboard.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
                </li>
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-user-secret"></i><span class="hide-menu">Admin Manangement</span></a>
                    <ul aria-expanded="" class="collapse">
                        <li><a href="add-admin.php">Add admin</a></li>
                        <li><a href="admin.php">List admins</a></li>  
                    </ul>
                </li>
              
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Student Management</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="add-student.php">Add student</a></li>
                        <li><a href="student-details.php">List students</a></li>
                          <li><a href="student-history.php">Transaction history</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-credit-card-alt"></i><span class="hide-menu">Payment Management</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="add-payment.php">Student payment</a></li>
                    </ul>
                </li>
                  <li> <a class="has-arrow" href="#"  ><i class="fa fa-picture-o"></i>Paid Payment</a>
                    <ul  aria-expanded="false"  >
                        <li><a href="full_payment_paid.php">Full Payment</a></li>
                        <li><a href="partial_payment_paid.php">Partial Payment</a></li>
                        <li><a href="paid_summary.php">Summary</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow" href="#"  ><i class="fa fa-picture-o"></i>Pending Payment</a>
                    <ul  aria-expanded="false"  >
                        <li><a href="dayschollar-pending-fees.php">Days-pending</a></li>
                        <li><a href="hostel-pending-fees.php">Hostel-pending</a></li>
                        <li><a href="exam-pending-fees.php">All Students Fee Transactions</a></li>
                    </ul>
                </li>
                 <li> <a class="has-arrow1" href="images/student-information.csv" class="active"><i class="fa fa-download"></i>Download the CSV</a></li>
                   <?php } ?>
               
               
                <?php if($_SESSION["userType"]["role"] == "ADMIN") { ?>
              	<li> <a class="has-arrow" href="dashboard.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
                </li>
				
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Student Management</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="add-student.php">Add student</a></li>
                        <li><a href="student-details.php">List students</a></li>
                          <li><a href="student-history.php">Transaction history</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-credit-card-alt"></i><span class="hide-menu">Payment Management</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="add-payment.php">Student payment</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow" href="#"  ><i class="fa fa-picture-o"></i>Paid Payment</a>
                    <ul  aria-expanded="false"  >
                        <li><a href="full_payment_paid.php">Full Payment</a></li>
                        <li><a href="partial_payment_paid.php">Partial Payment</a></li>
                        <li><a href="paid_summary.php">Summary</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow" href="#"  ><i class="fa fa-picture-o"></i>Pending Payment</a>
                    <ul  aria-expanded="false"  >
                        <li><a href="dayschollar-pending-fees.php">Days-pending</a></li>
                        <li><a href="hostel-pending-fees.php">Hostel-pending</a></li>
                        <li><a href="exam-pending-fees.php">All Students Fee Transactions</a></li>
                    </ul>
                </li>
                 <li> <a class="has-arrow1" href="images/student-information.csv" class="active"><i class="fa fa-download"></i>Download the CSV</a></li>

                  <li> <a class="has-arrow1" href=" https://services.billdesk.com/console/" class="active"><i class="fa fa-download"></i>Bill Desk</a></li>
                  
				   
				   <?php } ?>

                   <?php if($_SESSION["userType"]["role"] == "ACCOUNTANT") { ?>
              
					<li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Student Management</span></a>
						<ul aria-expanded="false" class="collapse">
							  <li><a href="student-history.php">Transaction history</a></li>
						</ul>
					</li>
						<li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-credit-card-alt"></i><span class="hide-menu">Payment Management</span></a>
						<ul aria-expanded="false" class="collapse">
							<li><a href="add-payment.php">Student payment</a></li>
						</ul>
					</li>
          <li> <a class="has-arrow" href="#"  ><i class="fa fa-picture-o"></i>Paid Payment</a>
                    <ul  aria-expanded="false"  >
                        <li><a href="full_payment_paid.php">Full Payment</a></li>
                        <li><a href="partial_payment_paid.php">Partial Payment</a></li>
                        <li><a href="paid_summary.php">Summary</a></li>
                    </ul>
                </li>
					<li> <a class="has-arrow" href="#"  ><i class="fa fa-picture-o"></i>Pending Payment</a>
						<ul  aria-expanded="false"  >
							<li><a href="dayschollar-pending-fees.php">Days-pending</a></li>
							<li><a href="hostel-pending-fees.php">Hostel-pending</a></li>
							<li><a href="exam-pending-fees.php">Students All Fee <br/> Transactions</a></li>
						</ul>
					</li>

          
                  <li> <a class="has-arrow1" href=" https://services.billdesk.com/console/" class="active"><i class="fa fa-download"></i>Bill Desk</a></li>
                   <?php } ?>

                   <?php if($_SESSION["userType"]["role"] == "USER") { ?>

                 <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-newspaper-o"></i><span class="hide-menu">News Management</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="add-news.php">Add News</a></li>
                        <li><a href="news-lists.php">List News</a></li>
                    </ul>
                </li>
                 <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-picture-o"></i><span class="hide-menu">Events Management</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="add-events.php">Add Events</a></li>
                        <li><a href="events-lists.php">List Events</a></li>
                    </ul>
                </li>
                 <li> <a class="has-arrow" href="#" ><i class="fa fa-picture-o"></i>Gallery Management</a>
                    <ul  aria-expanded="false" >
                        <li><a href="add-category.php">Category</a></li>
                        <li><a href="add-image.php">Image Gallery</a></li>
                         <li><a href="add-popup.php">Popup Image</a></li>
                    </ul>
                </li>  
				
				<li> <a class="has-arrow" href="#" ><i class="fa fa-picture-o"></i>Webinar Management</a>
                    <ul  aria-expanded="false" >
                        <li><a href="add_webinar.php">Add Webinar</a></li>
                        <li><a href="view_webinar.php">List Webinar</a></li>
                    </ul>
                </li>
                
                   <?php } ?>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>