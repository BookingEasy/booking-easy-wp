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
                <div class="row">
                    <div class="col-xs-12">
                        <?php wp_nonce_field('add_reservation_form', 'br_user_form'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Please select a date</label>
                            <div class="input-append date" id="dp1" data-date="12-02-2012" data-date-format="dd-mm-yyyy">                                
                                <input type="text" class="form-control span2" data-val="true" value="" id="dpd1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Please select a date</label>
                            <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                <input type="text" class="form-control" value="" id="dpd2">
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
                <div class="reservation-form2" style="display: none">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="reservation-form-heading">
                                On 27 September 2013 from 10.00 to 13.00
                                <input type="hidden" id="event-schedule-id" name="event-schedule-id" />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Courtesy</label>
                                <div class="col-sm-8">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                        Mr
                                    </label>

                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                        Mrs
                                    </label>
                                </div>
                            </div>                              
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">First Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="firstName" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Last Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="firstName" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Phone Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="firstName" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">First Name</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="firstName" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">First Name</label>
                                <div class="col-sm-8">

                                    <textarea class="form-control" id="description" name="description"  rows="8"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <script type="text/javascript">
                        //                                     
                  
                    </script>


                </div>
            </form>
        </div>
    </div>