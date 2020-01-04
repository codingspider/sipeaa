       <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form action="{{ URL::to('/dashboard/army/submit')}}" method="POST">
              {{ csrf_field() }}
          <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="form_name">BA No. *</label>
                        <select name="batch" id="batch" class="form-control">
                            <option value="BA">BA</option>
                            <option value="BSS">BSS</option>
                            <option value="JSS">JSS</option>
                            <option value="BSP">BSP</option>
                            <option value="BJO">BJO</option>
                            <option value="No">NO</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="form_name" class="text-hidden"></label>
                        <input type="text" name="batch_no" id="batch_no" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Ranks *</label>
                        <input type="text" id="ranks" name="ranks" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Type *</label>
                        <select name="type" id="type" class="form-control">
                            <option value="Officer">Officer</option>
                            <option value="JCO">JCO</option>
                            <option value="NCO">NCO</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Arms *</label>
                        <select name="arms" id="arms" class="form-control">
                            <option value="Ac">Ac</option>
                            <option value="Arty">Arty</option>
                            <option value="EB">EB</option>
                            <option value="Bir">Bir</option>
                            <option value="Sigs">Sigs</option>
                            <option value="EME">EME</option>
                            <option value="Engr">Engr</option>
                            <option value="ORD">ORD</option>
                            <option value="ASC">ASC</option>
                            <option value="AMC">AMC</option>
                            <option value="AEC">AEC</option>
                            <option value="ADC">ADC</option>
                            <option value="CMP">CMP</option>
                            <option value="AFNS">AFNS</option>
                            <option value="RVFC">RVFC</option>
                            <option value="ACC">ACC</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Trade</label>
                        <input id="trade" type="text" name="trade" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Course </label>
                        <input id="course" type="text" name="course" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Date of Commission *</label>
                        <input id="commission" type="date" name="commission" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="form_phone">Date of Retirement * </label>
                        <input id="retirement" type="date" name="retirement" class="form-control">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <button type="submit" id="retirement_submit" class="btn btn-success">Submit</button>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>