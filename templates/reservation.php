<div class="sagenda_container">
    <div class="sagenda_col">

        <p class="sagenda_text-warning">
            <?php
            if (!is_user_logged_in()) {
                echo '<p>You need to be a site member to be able to ';
                echo 'Subscribe for events. Sign up to gain access!</p>';
                return;
            }
            ?>
        </p>
    </div>

    <div class="sagenda_row">
        <div class="sagenda_col">
            <form method="post" id="subscribe_event" action="" role="form">                
                <div id="form-step1">
                    <div class="sagenda_row">
                        <div class="sagenda_col">
                            <?php wp_nonce_field('add_reservation_form', 'br_user_form'); ?>
                            <div class="sagenda_alert sagenda_alert-success" style="margin-left: 0;display: none">
                                You successfully subscribe for the event.
                            </div>
                        </div>
                    </div>
                    <div class="sagenda_row">
                        <div class="sagenda_col">

                            <div class="well">
            
            
			<div class="alert alert-error" id="alert">
				<strong>Oh snap!</strong>
			  </div>
			<table class="table">
				
				<tbody>
					<tr>
						<td id="startDate">2012-02-20</td>
						<td id="endDate">2012-02-25</td>
					</tr>
				</tbody>
			</table>
          </div>
                            
                            <div class="sagenda_form-group">
                                <label for="exampleInputEmail1">Start date</label>
                                <div class="sagenda_input-append date" id="dp1" data-date="12-02-2012" data-date-format="dd-mm-yyyy">                                
                                    <input type="text" class="sagenda_form-control"  readonly value="" id="dpd1">
                                    <a href="#" class="sagenda_add-on" id="dp4" data-date-format="dd-mm-yyyy" data-val="true" data-date=""><i class="sagenda_icon-th"></i></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sagenda_row">
                        <div class="sagenda_col">
                            <div class="sagenda_form-group">
                                <label for="exampleInputEmail1">End Date</label>
                                <div class="sagenda_input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                    <input type="text" class="sagenda_form-control" value="" readonly id="dpd2">
                                    <a href="#" class="sagenda_add-on" id="dp5" data-date-format="dd-mm-yyyy" data-val="true" data-date=""><i class="sagenda_icon-th"></i></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sagenda_row">
                        <div class="sagenda_col">
                            <div class="sagenda_form-group">
                                <label for="exampleInputPassword1">Bookable Items</label>
                                <br />
                                <select class="sagenda_form-control " id="bookableitems" >
                                    <option value="0">Bookable Item</option>
                                    <?php foreach ($bookableItems as $bookableItem) { ?>
                                        <option value="<?php echo $bookableItem->Id ?>"><?php echo $bookableItem->Name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="sagenda_row">
                        <div class="sagenda_col">
                            <div class="sagenda_form-group">
                                <label for="exampleInputPassword1">Click an event to book It:</label>
                                <br />
                                <div id="events-list">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once 'booking.php'; ?>
            </form>
        </div>
    </div>

</div>