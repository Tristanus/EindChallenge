<div class="container">
    <div class="row">
        <div class="col-md-6">
                    <div class="well-block">
                        <div class="well-title">
                            <h2>Maak hier uw afspraak</h2>
                        </div>
                        <form action="<?= URL ?>challenge/saveAppointment" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="_date">Datum</label>
                                        <input id="_date" name="_date" type="date" placeholder="Uw datum" class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="_time">Tijd</label>
                                        <select id="_time" name="_time" class="form-control">
                                            <option value="08:00">08:00</option>
                                            <option value="09:00">09:00</option>
                                            <option value="10:00">10:00</option>
                                            <option value="11:00">11:00</option>
                                            <option value="12:00">12:00</option>
                                            <option value="13:00">13:00</option>
                                            <option value="14:00">14:00</option>
                                            <option value="15:00">15:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="17:00">17:00</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="employee_id">Kapster</label>
                                        <select id="employee_id" name="employee_id" class="form-control">
                                            <?php
                                                foreach ($employees as $employee)
                                                {
                                                    echo "<option value=\"" . $employee['id'] . "\">" . $employee['firstname'] . " " . $employee['lastname'] . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button id="singlebutton" name="singlebutton" type="submit" value="Send" class="btn btn-default">Maak uw afspraak</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- form end -->
                    </div>
        </div>
    </div>
</div>