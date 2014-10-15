<div class="sagenda_container">
    <div class="sagenda_col">


        <?php
        if (!$connected) {
            echo '<div class="sagenda_alert sagenda_alert-faliure">';
            echo '<p>You didn’t connected your Sagenda account :</p>';
            echo '<p>1.&nbsp; Create a free account on <a href="https://sagenda.net/Accounts/Register">Sagenda.</a> (setup your “bookable items” and events).</p>';
            echo '<p>2.&nbsp; Copy your token (from the backend of sagenda.net Settings / account settings) to your WordPress installation (backend of wp / Settings / Sagenda).</p>';
            echo '</div>';
        }
        ?>


    </div>

    <div class="sagenda_row">
        <div class="sagenda_col">
            <form method="post" id="subscribe_event" action="" role="form">                
                <div id="form-step1">
                    <div class="sagenda_row">
                        <div class="sagenda_col">
                            <div class="sagenda_alert-faliure" id="alert-mesg">
                            </div>
                            <?php wp_nonce_field('add_reservation_form', 'br_user_form'); ?>
                            <div class="sagenda_alert sagenda_alert-success" style="margin-left: 0;display: none">
                                You successfully subscribe for the event.
                            </div>
                        </div>
                    </div>
                    <?php if ($this->version > 3.4) { ?>
                        <div class="sagenda_row">
                            <div class="sagenda_col">
                                <div class="sagenda_alert sagenda_alert-error" id="alert">

                                </div>
                                <div class="sagenda_form-group">
                                    <label for="exampleInputEmail1">Start date</label>
                                    <div class="sagenda_input-append date" id="startDate" data-date="12-24-2012" data-date-format="dd-mm-yyyy">                                
                                        <input type="text" class="sagenda_form-control"  readonly value="" id="dpd1">
                                        <div class="sagenda_add-on" id="dp4" data-date-format="dd-mm-yyyy" data-val="true" data-date=""><i class="sagenda_icon-th"></i></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sagenda_row">
                            <div class="sagenda_col">
                                <div class="sagenda_form-group">
                                    <label for="exampleInputEmail1">End Date</label>
                                    <div class="sagenda_input-append date" id="endDate" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                        <input type="text" class="sagenda_form-control" value="" readonly id="dpd2">
                                        <div class="sagenda_add-on" id="dp5" data-date-format="dd-mm-yyyy" data-val="true" data-date=""><i class="sagenda_icon-th"></i></div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    } else {
                        ?>
                        <div class="sagenda_row">
                            <div class="sagenda_col">
                                <div class="sagenda_form-group">
                                    <label for="exampleInputEmail1">Start Date</label>
                                    <div>
                                        <input type="date" id="startDate"  name="startDate" class="sagenda_form-control" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sagenda_row">
                            <div class="sagenda_col">
                                <div class="sagenda_form-group">
                                    <label for="exampleInputEmail1">End Date</label>
                                    <div>
                                        <input type="date" id="endDate"  name="endDate" class="sagenda_form-control" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
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

    <div class="sagenda_row">
        <div class="sagenda_col">
            <a href="http://www.sagenda.net" target="_blank" class="sagenda-ref-link">Create a free Booking Account on Sagenda!</a>
        </div>
    </div>
</div>