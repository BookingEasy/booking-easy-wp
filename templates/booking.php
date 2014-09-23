<div id="booking-form" style="display: none">
    <div class="sagenda_row">
        <div class="sagenda_col">
            <div class="sagenda_row">
                <div class="sagenda_col">
                    <div class="reservation-form-heading">
                               
                    </div>
                </div>
            </div>

            <div class="sagenda_row">
                <div class="sagenda_col">
                    <div class="sagenda_form-group">
                        <label for="exampleInputEmail1">Courtesy</label>
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="Mr" checked />
                            Mr
                        </label>

                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="Mrs" />
                            Mrs
                        </label>
                    </div>
                </div>
            </div>


            <div class="sagenda_row">
                <div class="sagenda_col">
                    <div class="sagenda_form-group">
                        <label for="exampleInputPassword1">First Name</label>
                        <br />
                        <input type="text" class="sagenda_form-control" id="firstName" required placeholder="First Name" />
                        <input type="hidden" class="sagenda_form-control" id="EventIdentifier" placeholder="EventIdentifier" />
                    </div>
                </div>
            </div>

            <div class="sagenda_row">
                <div class="sagenda_col">
                    <div class="sagenda_form-group">
                        <label for="exampleInputPassword1">Last Name</label>
                        <br />
                        <input type="text" class="sagenda_form-control" id="lastName" required placeholder="Last Name" />
                    </div>
                </div>
            </div>


            <div class="sagenda_row">
                <div class="sagenda_col">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone Number</label>
                        <br />
                        <input type="text" class="sagenda_form-control" id="phonenumber" required placeholder="Phone Number" />
                    </div>
                </div>
            </div>

            <div class="sagenda_row">
                <div class="sagenda_col">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <br />
                        <input type="email" class="sagenda_form-control" id="email" required placeholder="Email" />
                    </div>
                </div>
            </div>

            <div class="sagenda_row">
                <div class="sagenda_col">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <br />
                        <textarea class="sagenda_form-control" id="description" name="description" required rows="5"></textarea>
                    </div>
                </div>
            </div>           

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-default" id="backtocalender">Back to Calender</button>
                    <button type="button" class="btn btn-primary btn-default" id="submit-reservation">Submit</button>
                </div>
            </div>

        </div>
    </div>
</div>