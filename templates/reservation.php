<div class="container1">
    <div class="row">
        <div class="col-xs-12">
            <p class="text-warning">
                <?php
                if (!is_user_logged_in()) {
                    echo '<p>You need to be a site member to be able to ';
                    echo 'Subscribe for events. Sign up to gain access!</p>';
                    return;
                }
                ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form method="post" id="subscribe_event" action="" role="form">                
                <div id="form-step1">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php wp_nonce_field('add_reservation_form', 'br_user_form'); ?>
                            <div class="alert alert-success" style="margin-left: 0;display: none">You successfully subscribe for the event.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Start date</label>
                                 <div class="input-append date" id="dp1" data-date="12-02-2012" data-date-format="dd-mm-yyyy">                                
                                    <input type="text" class="form-control" data-val="true" readonly value="" id="dpd1">
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">End Date</label>
                                <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                    <input type="text" class="form-control" value="" readonly id="dpd2">
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Bookable Items</label>
                                <br />
                                <select class="form-control " id="bookableitems" >
                                    <option value="0">Bookable Item</option>
                                    <?php foreach ($bookableItems as $bookableItem) { ?>
                                        <option value="<?php echo $bookableItem->Id ?>"><?php echo $bookableItem->Name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
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