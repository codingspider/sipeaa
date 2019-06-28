<ul class="nav nav-tabs" id="myForm">
                                        <li class="active"><a href="#one">Personal</a></li>
                                        <li><a href="#two">Education / Training</a></li>
                                        <li><a href="#three">Employment</a></li>
                                        <li><a href="#five">Photograph</a></li>
                                        </ul>
                                
                                    <form action="{{ URL::to('/online/cv/create') }}" method="POST" enctype="multipart/form-data">
                                        <div class="tab-content form-group">
             
                                        <div class="tab-pane active" id="one">
                                                <div class="row">
                                                        <div class="col">
                                                            <label for="">First Name</label>
                                                          <input type="text" name="first_name" style="color:#3931af" class="form-control" placeholder="First name">
                                                        </div>
                                                        <div class="col">
                                                                <label for="">Last Name</label>
                                                          <input type="text" name="last_name" style="color:#3931af" class="form-control" placeholder="Last name">
                                                        </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                        <div class="col">
                                                                <label for="">Nationality</label>
                                                          <input type="text" name="nationality" style="color:#3931af" class="form-control" placeholder="Nationality">
                                                        </div>
                                                        <div class="col">
                                                                <label for="">National ID</label>
                                                          <input type="text" name="na_id" style="color:#3931af" class="form-control" placeholder="National ID NO">
                                                        </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                        <div class="col">
                                                                <label for="">Father Name</label>
                                                          <input type="text" name="father_name" style="color:#3931af" class="form-control" placeholder="Father Name">
                                                        </div>
                                                        <div class="col">
                                                                <label for="">Mother Name</label>
                                                          <input type="text" name="mother_name" style="color:#3931af" class="form-control" placeholder="Mother Name">
                                                        </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                        <div class="col">
                                                                <label for="">Date of Birth</label>
                                                          <input type="date" name="dob" style="color:#3931af" class="form-control" placeholder="Date Of Birth">
                                                        </div>
                                                        <div class="col">
                                                                <label for="">Phone Number</label>
                                                          <input type="text" name="mobile" style="color:#3931af" class="form-control" placeholder="Phone Number">
                                                        </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                        <div class="col">
                                                                <label for="">Gender</label>
                                                          <select class="form-control" name="gender" id="gender">
                                                                <option value="Married">--Select--</option>
                                                              <option value="Male">Male</option>
                                                              <option value="Female">Female</option>
                                                              <option value="Others">Others</option>
                                                          </select>
                                                        </div>
                                                        <div class="col">
                                                                <label for="">Maritial Status</label>
                                                        <select class="form-control" name="maritial_status">
                                                                <option value="Married">--Select--</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Unmarried">Unmarried</option>
                                                                <option value="Single">Single</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                        <div class="col">
                                                                <label for="">Present Address</label>
                                                          <input type="text" name="present_add" style="color:#3931af" class="form-control" placeholder="Present Address">
                                                        </div>
                                                        <div class="col">
                                                                <label for="">Permanent Address</label>
                                                          <input type="text" name="permanent_add" style="color:#3931af" class="form-control" placeholder="Permanent Address">
                                                        </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                        <div class="col">
                                                                <label for="">Job Type</label>
                                                          <select class="form-control" name="job_type" id="gender">
                                                              <option value="Male">Select your Job type</option>
                                                              <option value="Male">Full Time</option>
                                                              <option value="Female">Part Time</option>
                                                              <option value="Others">Entry Level</option>
                                                              <option value="Others">High Level</option>
                                                          </select>
                                                        </div>
                                                        <div class="col">
                                                                <label for="">Expect Salary</label>
                                                                <input type="text" name="exp_salary" style="color:#3931af" class="form-control" placeholder="Expected Salary">
                                                        </div>
                                                </div>
                                        
                                        </div>
                                        <div class="tab-pane" id="two">
                                                <div class="row">
                                                        <div class="col">
                                                            <label for="education">Level of Education 
                                                                </label>
                                                            <select required class="form-control" name="level_education" id="gender">
                                                                <option value="PSC">PSC/5 pass</option>
                                                                <option value="JSC/JDC">JSC/JDC/8 pass</option>
                                                                <option value="Secondary">Secondary</option>
                                                                <option value="Secondary">Higher Secondary</option>
                                                                <option value="Diploma" selected="">Diploma</option>
                                                                <option value="Honors">Bachelor/Honors</option>
                                                                <option value="Masters">Masters</option>
                                                                <option value="PhD">PhD (Doctor of Philosophy)</option>
                                                            </select>
                                                          
                                                        </div>
                                                        <div class="col">
                                                            <label for="education">Results 
                                                                </label>
                                                            <select class="form-control" name="job_type" id="gender">
                                                                    <option value="0">Select</option>
                                                                    <option value="Firs_class">First Division/Class</option>
                                                                    <option value="Second_class">Second  Division/Class</option>
                                                                    <option value="Third_class">Third Division/Class</option>
                                                                    <option value="Grade">Grade</option>
                                                                    <option value="Appeared">Appeared</option>
                                                                    <option value="Enrolled">Enrolled</option>
                                                                    <option value="Awarded">Awarded</option>
                                                                    <option value="Do_not_Mention">Do not mention</option>
                                                                    <option value="Passed" selected="">Pass</option> 
                                                            </select>
                                                          
                                                        </div>
                                                        
                                                </div>
                                                <br>
                                                <div class="row">
                                                        <div class="col">
                                                            <label for="education">Board of Education 
                                                                </label>
                                                            <select required class="form-control" name="board_education" id="gender">
                                                                    <option value="Chattogram">Chattogram</option>
                                                                    <option value="Cumilla">Cumilla</option>
                                                                    <option value="Dhaka">Dhaka</option>
                                                                    <option value="Dinajpur">Dinajpur</option>
                                                                    <option value="Jashore">Jashore</option>
                                                                    <option value="Rajshahi">Rajshahi</option>
                                                                    <option value="Sylhet">Sylhet</option>
                                                                    <option value="Madrasah">Madrasah</option>
                                                                    <option value="Technical">Technical</option>
                                                            </select>
                                                          
                                                        </div>
                                                        <div class="col">
                                                            <label for="education">Instititue Name 
                                                                </label>
                                                           <input type="text" name="institiute-name" class="form-control" placeholder="Instititue Name" required>
                                                            </select>
                                                          
                                                        </div>
                                                        
                                                </div>
                                        </div>
                                        <div class="tab-pane" id="three">
                                                <div class="row">
                                                        <div class="col">
                                                            <label for=""> Company Name</label>
                                                          <input type="text" name="company_name" style="color:#3931af" class="form-control" placeholder="Company Name">
                                                        </div>
                                                        <div class="col">
                                                            <label for="">company Buisiness</label>
                                                          <input type="text" name="compnay_buisness" style="color:#3931af" class="form-control" placeholder="Company Buisness">
                                                        </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                        <div class="col">
                                                            <label for=""> Designation</label>
                                                          <input type="text" name="designation" style="color:#3931af" class="form-control" placeholder="Company Name">
                                                        </div>
                                                        <div class="col">
                                                            <label for="">company Location</label>
                                                          <input type="text" name="compnay_loacation" style="color:#3931af" class="form-control" placeholder="Company Buisness">
                                                        </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                        <div class="col">
                                                            <label for=""> Employment Period From</label>
                                                          <input type="date" name="from_date" style="color:#3931af" class="form-control" placeholder="Start Date">
                                                        </div>
                                                        <div class="col">
                                                            <label for="">Employment Period till</label>
                                                          <input type="date" name="to_date" style="color:#3931af" class="form-control" placeholder="End Date">
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="tab-pane" id="four">
                                            <input type="text" class="form-control" name="email" placeholder="enter others">
                                        </div>
                                        <div class="tab-pane" id="five">
                                            <label for="">Add Photograph</label>
                                            <br>
                                            <input type="file" name="images" required>
                                            <br>
                                            
                                        </div>    
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>