<div class="container">
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
            <form role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Please select a date</label>
                    <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                        <input class="span2" size="16" type="text" value="12-02-2012" readonly="">
                        <span class="add-on"><i class="icon-calendar"></i></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Please Select a date</label>
                    <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                        <input class="span2" size="16" type="text" value="12-02-2012" readonly="">
                        <span class="add-on"><i class="icon-calendar"></i></span>
                    </div>
                </div>
               
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>