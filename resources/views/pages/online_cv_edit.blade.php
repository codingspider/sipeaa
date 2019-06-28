@extends('layouts.app2')
@section('title', 'CV Update')

@section('content')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <form class="well form-horizontal">
                      <fieldset>
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
                      </fieldset>
                   </form>
                </td>
            
             </tr>
          </tbody>
       </table>
    </div>
@endsection