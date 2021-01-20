<!-- modal #OpenEntity -->
<div class="modal fade" id="openEntity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <i class="far fa-window-restore text-warning"></i> Extended Customer Edit </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6> Edit Customer&nbsp;<i class="far fa-address-card text-info"></i></h6>
          <input type="text" id="extOrderID" />
          <div class="row">
            <div class="col-lg-8">
              <div class="row">
                <!-- column 1 -->
                <div class="col-md-6">            
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">StoreID:</small></label>
                    <div class="col-sm-7">
                      <input type="text" id="entStoreID" class="form-control form-control-sm" disabled >
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">StoreName:</small></label>
                    <div class="col-sm-7">
                      <input type="text" id="extStoreName" name="ext_store_name" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">Company:</small></label>
                    <div class="col-sm-7">
                      <input type="text" name="company" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">A.B.N.</small></label>
                    <div class="col-sm-7">
                      <input type="text" id="extAbn" name="abn" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">Title</small></label>
                    <div class="col-sm-7">
                        <?php person_title();?>
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">Nick Name</small></label>
                    <div class="col-sm-7">
                      <input type="text" id="extNickName"  name="nickname" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">First Name</small></label>
                    <div class="col-sm-7">
                      <input type="text" id="extFirstName" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">Last Name</small></label>
                    <div class="col-sm-7">
                      <input type="text" id="extLastName" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">D.O.B.</small></label>
                    <div class="col-sm-7">
                      <input type="text" id="extDOB" name="abn" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">UserName</small></label>
                    <div class="col-sm-7">
                      <input type="text" name="abn" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">Password</small></label>
                    <div class="col-sm-7">
                      <input type="text" name="abn" class="form-control form-control-sm">
                    </div>
                  </div>
                </div><!--#end column1-->               
                <!-- column2 -->
                <div class="col-md-6">
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">Latest Orders Week:</small></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form-control-sm" >
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">Latest Orders Sat:</small></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form-control-sm" >
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">Latest Orders Sun:</small></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form-control-sm" >
                    </div>
                  </div>  
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted"> Email 1:</small></label>
                    <div class="col-sm-7">
                      <input type="text" id="extEmail1" class="form-control form-control-sm" >
                    </div>
                  </div> 
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted"> Email 2:</small></label>
                    <div class="col-sm-7">
                      <input type="text" id="extBillingEmail2" class="form-control form-control-sm" >
                    </div>
                  </div> 
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">Website:</small></label>
                    <div class="col-sm-7">
                      <input type="text" id="extBillingWebsite" class="form-control form-control-sm" >
                    </div>
                  </div> 
                   <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted"> Work Phone:</small></label>
                    <div class="col-sm-7">
                      <input type="text" id="extBillingWorkPhone" class="form-control form-control-sm" >
                    </div>
                  </div>
                   <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted"> Home Phone:</small></label>
                    <div class="col-sm-7"> 
                      <input type="text" id="extPhoneHome" class="form-control form-control-sm" >
                    </div>
                  </div>
                    <div class="form-group row m-1">
                      <label class="col-sm-4 col-form-label"><small class="text-muted"> Fax phone:</small></label>
                      <div class="col-sm-7">
                        <input type="text" id="extbillingFaxPhone" class="form-control form-control-sm" >
                      </div>
                    </div>
                    <div class="form-group row m-1">
                      <label class="col-sm-4 col-form-label"><small class="text-muted"> Mobile Phone:</small></label>
                      <div class="col-sm-7">
                        <input type="text" id="extBillingMobilePhone" class="form-control form-control-sm" >
                      </div>
                    </div>
                </div><!--#end column 2-->
              </div>
              <!-- row2 column 1-->
              <div class="row">
                <div class="col-md-6">
                   <!-- social media -->
                  <h6> Social Media <i class="fas fa-users text-info"></i> </h6>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label text-right">facebook &nbsp;<i class="fab fa-facebook text-info"></i></label>
                    <div class="col-sm-7">
                      <input type="text" id="extBillingFb" class="form-control form-control-sm" >
                    </div>
                  </div>
                   <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label text-right">whatsapp &nbsp;<i class="fab fa-whatsapp-square text-info"></i></label>
                    <div class="col-sm-7">
                      <input type="text" id="extShippingWhatsapp" class="form-control form-control-sm" >
                    </div>
                  </div>
                   <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label text-right">viber &nbsp;<i class="fab fa-viber text-info"></i></label>
                    <div class="col-sm-7">
                      <input type="text" id="extBillingViber" class="form-control form-control-sm" >
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label text-right">Wechat &nbsp;<i class="fab fa-weixin text-info"></i></label>
                    <div class="col-sm-7">
                      <input type="text" id="extBillingWechat" name="extShippingWechat" class="form-control form-control-sm" >
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label text-right">Skype &nbsp;<i class="fab fa-skype text-info"></i></label>
                    <div class="col-sm-7">
                      <input type="text" id="extBillingSkype" class="form-control form-control-sm" >
                    </div>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group row m-1">
                    <button type="button" class="btn btn-warning">update</button>
                    <button type="button" class="btn btn-secondary">close</button>
                   </div>
                </div>   
              </div><!--#end row2 column1-->

                <div class="row">
                  <div class="col-md-9">
                      <div class="card text-white bg-secondary mb-3" style="max-width: 50rem;">
                        <div class="card-body">
                          <input type="hidden" id="notesIDCatch" />
                            <h5 id="entityStatusMessage" class="card-title m-1"> <span class="h6" > Entity Status: </span> &nbsp;<span class="entityStatusMessage"></span></h6>
                              <p class="entityStatusLastUpdated lead text-light" style="font-size:16px!important;color:#fff!important;"></p>
                              <?php  entity_status(); ?>
                                <input type="hidden" id="tempInactiveCalendarDefaultOneWeek" value="<?php html(tomorrowDate()); ?>" >
                                <input type="hidden" id="tempInactiveCalendarDefaultTwoWeek" value="<?php html(tomorrowDate()); ?>" >
                                <input type="hidden" id="tempInactiveCalendarDefaultOneMonth" value="<?php html(tomorrowDate()); ?>" >
                                <div id="tempInActive">

                                  <div id="tempInactiveCalendarDefaultContainer" class="col-sm-9">
                                    <div class="row">                        
                                      <div class="form-group row input-group-sm m-1">
                                        <div class="input-group input-group-sm date" data-target-input="nearest">
                                            <input type="text" 
                                              id="tempInactiveCalendardefault"
                                              class="form-control datetimepicker-input" 
                                              data-toggle="datetimepicker"
                                              data-datetimepicker
                                              data-target="#tempInactiveCalendardefault"/>
                                              <div class="input-group-append" data-target="#tempInactiveCalendardefault" data-toggle="datetimepicker">
                                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                              </div>
                                          </div>
                                      </div>                               
                                    </div>
                                  </div> 

                                  <div id="tempInactiveCalendarOneWeekContainer" class="col-sm-9" >
                                      <div class="row">
                                        <div class="form-group row input-group-sm m-1">
                                          <div class="input-group input-group-sm date" data-target-input="nearest">               
                                            <input type="text" 
                                              id="tempInactiveCalendarOneWeek"
                                              name="temp_inactive_calendar" 
                                              class="form-control form-control-sm datetimepicker-input"
                                              data-toggle="datetimepicker"
                                              data-datetimepicker
                                              data-target="#tempInactiveCalendarOneWeek">
                                              <div class="input-group-append" data-target="#tempInactiveCalendarOneWeek" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                          </div>
                                        </div>
                                      </div>  
                                  </div>   

                                  <div id="tempInactiveCalendartwoWeekContainer" class="col-sm-9">
                                    <div class="row">
                                      <div class="form-group row input-group-sm m-1">
                                        <div class="input-group input-group-sm date" data-target-input="nearest">               
                                          <input type="text" 
                                            id="tempInactiveCalendartwoWeek" 
                                            name="temp_inactive_calendar" 
                                            class="form-control form-control-sm datetimepicker-input"
                                            data-toggle="datetimepicker"
                                            data-datetimepicker
                                            data-target="#tempInactiveCalendartwoWeek">
                                            <div class="input-group-append" data-target="#tempInactiveCalendartwoWeek" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>  
                                  </div>  

                                  <div id="tempInactiveCalendarOneMonthContainer" class="col-sm-9">
                                    <div class="row">
                                      <div class="form-group row input-group-sm m-1">
                                        <div class="input-group input-group-sm date" data-target-input="nearest">               
                                          <input type="text" 
                                            id="tempInactiveCalendarOneMonth" 
                                            name="temp_inactive_calendar" 
                                            class="form-control form-control-sm datetimepicker-input"
                                            data-toggle="datetimepicker"
                                            data-datetimepicker
                                            data-target="#tempInactiveCalendarOneMonth">
                                           <div class="input-group-append" data-target="#tempInactiveCalendarOneMonth" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>  
                                  </div>  

                                  <form action="" method="post" class="form-inline">
                                    <div class="form-group ">
                                      <button type="button" id="oneWeek" data-one-week="6" class="btn btn-sm btn-light mb-1 m-1">One Week</button>
                                      <button type="button" id="twoWeek" data-two-week="12" class="btn btn-sm btn-light mb-1 m-1">Two Weeks</button>
                                      <button type="button" id="oneMonth" data-one-month="29" class="btn btn-sm btn-light mb-1 m-1">One Month</button>
                                    </div> 
                                  </form>
                               
                                <div class="form-group row m-1">
                                  <div class="col-sm-9">                
                                    <?php temp_inactive(); ?>
                                  </div>
                                </div>

                              </div>
                              <div id="permanentInactive">
                                <div class="form-group row m-1">
                                        <div class="col-sm-9">  
                                    <?php permanent_inactive(); ?>
                                  </div>
                                </div>
                              </div>
                              <div id="scheduleInactive">

                              <!-- default -->
                              <div id="sIDefaultContainer">
                                <div class="col-sm-9">
                                  <div class="row">
                                    <div class="form-group row input-group-sm m-1">
                                      <div class="input-group input-group-sm date" data-target-input="nearest">
                                        <input type="text" 
                                          id="scheduleInactiveStartDateDefault" 
                                          class="form-control form-control-sm datetimepicker-input"
                                          data-toggle="datetimepicker"
                                          data-datetimepicker 
                                          data-target="#scheduleInactiveStartDateDefault">
                                         <div class="input-group-append" data-target="#scheduleInactiveStartDateDefault" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>  
                                </div>
                                <div class="col-sm-9">
                                  <div class="row">
                                    <div class="form-group row input-group-sm m-1">
                                      <div class="input-group input-group-sm date" data-target-input="nearest">
                                        <input type="text" 
                                          id="scheduleInactiveEndDateDefault" 
                                          class="form-control form-control-sm datetimepicker-input"
                                          data-toggle="datetimepicker"
                                          data-datetimepicker
                                          data-target="#scheduleInactiveEndDateDefault">
                                        <div class="input-group-append" data-target="#scheduleInactiveEndDateDefault" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>  
                                </div> 
                              </div><!-- #end default -->
                                 
                                <!-- one week -->
                                <div id="sIOneWeekContainer">
                                  <div class="col-sm-9">
                                    <div class="row">
                                      <div class="form-group row input-group-sm m-1" data-target-input="nearest">
                                        <div class="input-group input-group-sm date">
                                          <input type="text" 
                                            id="scheduleInactiveStartDateOneWeek" 
                                            class="form-control form-control-sm datetimepicker-input"
                                            data-toggle="datetimepicker"
                                            data-datetimepicker
                                            data-target="#scheduleInactiveStartDateOneWeek">         
                                          <div class="input-group-append" data-target="#scheduleInactiveStartDateOneWeek" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>  
                                  </div>
                                  <div class="col-sm-9">
                                    <div class="row">
                                      <div class="form-group row input-group-sm m-1">
                                        <div class="input-group input-group-sm date" data-target-input="nearest">
                                          <input type="text" 
                                            id="scheduleInactiveEndDateOneWeek" 
                                            class="form-control form-control-sm datetimepicker-input"
                                            data-toggle="datetimepicker"
                                            data-datetimepicker
                                            data-target="#scheduleInactiveEndDateOneWeek">
                                          <div class="input-group-append" data-target="#scheduleInactiveEndDateOneWeek" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>  
                                  </div> 
                                </div><!-- #one week --> 

                                 <!-- one week -->
                                  <div id="sITwoWeekContainer">
                                    <div class="col-sm-9">
                                      <div class="row">
                                        <div class="form-group row input-group-sm m-1" data-target-input="nearest">
                                          <div class="input-group input-group-sm date">
                                            <input type="text" 
                                              id="scheduleInactiveStartDateTwoWeek" 
                                              class="form-control form-control-sm datetimepicker-input"
                                              data-toggle="datetimepicker"
                                              data-datetimepicker
                                              data-target="#scheduleInactiveStartDateTwoWeek">         
                                            <div class="input-group-append" data-target="#scheduleInactiveStartDateTwoWeek" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>  
                                    </div>
                                    <div class="col-sm-9">
                                      <div class="row">
                                        <div class="form-group row input-group-sm m-1">
                                          <div class="input-group input-group-sm date" data-target-input="nearest">
                                            <input type="text" 
                                              id="scheduleInactiveEndDateTwoWeek" 
                                              class="form-control form-control-sm datetimepicker-input"
                                              data-toggle="datetimepicker"
                                              data-datetimepicker
                                              data-target="#scheduleInactiveEndDateTwoWeek">
                                            <div class="input-group-append" data-target="#scheduleInactiveEndDateTwoWeek" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>  
                                    </div> 
                                  </div><!-- #one week --> 
                          
                                  <!-- one month -->
                                  <div id="sIOneMonthContainer">
                                    <div class="col-sm-9">
                                      <div class="row">
                                        <div class="form-group row input-group-sm m-1 ">
                                          <div class="input-group input-group-sm date" data-toggle="datetimepicker">
                                            <input type="text" 
                                              id="scheduleInactiveStartDateOneMonth" 
                                              class="form-control form-control-sm datetimepicker-input"
                                              data-toggle="datetimepicker"
                                              data-datetimepicker
                                              data-target="#scheduleInactiveStartDateOneMonth"
                                              >
                                             <div class="input-group-append" data-target="#scheduleInactiveStartDateOneMonth" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>  
                                    </div>
                                    <div class="col-sm-9">
                                      <div class="row">
                                        <div class="form-group row input-group-sm m-1">
                                          <div class="input-group input-group-sm date" data-toggle="datetimepicker">
                                            <input type="text" 
                                              id="scheduleInactiveEndDateOneMonth" 
                                              class="form-control form-control-sm datetimepicker-input"
                                              data-toggle="datetimepicker"
                                              data-datetimepicker
                                              data-target="#scheduleInactiveEndDateOneMonth">
                                            <div class="input-group-append" data-target="#scheduleInactiveEndDateOneMonth" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>  
                                    </div> 
                                  </div> <!-- #one month -->

                                <div class="form-group ">
                                  <button type="button" id="sIoneWeek" class="btn btn-sm btn-light mb-1 m-1">One Week</button>
                                  <button type="button" id="sItwoWeek" class="btn btn-sm btn-light mb-1 m-1">Two Weeks</button>
                                  <button type="button" id="isIOneMonth" class="btn btn-sm btn-light mb-1 m-1">One Month</button>
                                </div>
                                <div class="form-group row m-1">
                                    <div class="col-sm-9">                
                                      <?php temp_inactive(); ?>
                                    </div>
                                  </div>
                              </div>
                             <br>
                             Notes <i class="fas fa-clipboard text-info"></i> 
                            <h6 class="card-title">Current Notes</h6>
                              <div class="table-wrapper-scroll-y my-custom-scrollbar">     
                                <table id="notesTable" class="table table-striped bg-light">
                                  <tbody>
                                  </tbody>
                                </table>      
                              </div>             
                             <div class="form-group row m-1">
                              <h6 class="card-title">Add Notes &nbsp;<i class="fas fa-pen text-danger"></i> </h6>
                              <textarea class="form-control" id="operatorNotes" rows="5" aria-label="With textarea"></textarea> 
                            </div>   
                            <div class="form-group row m-1">
                              <button type="button" id="entitySaveNotesButton" class="btn btn-sm btn-primary">Save notes</button>
                            </div>    
                        </div>
                    </div>
                  </div>
                </div>

            </div>
            <!-- column3 -->
            <div class="col-lg-4">
              <div class="col-md-12">
                 <h6> Billing address </h6>
              <div class="form-group row m-1">
                <label class="col-sm-4 col-form-label"><small class="text-muted">Line 1:</small></label>
                <div class="col-sm-7">
                  <input type="text" id="extBillingAddress_1" class="form-control form-control-sm" >
                </div>
              </div>
              <div class="form-group row m-1">
                <label class="col-sm-4 col-form-label"><small class="text-muted">Line 2:</small></label>
                <div class="col-sm-7">
                  <input type="text" id="extBillingAddress_2" class="form-control form-control-sm" >
                </div>
              </div>
               <div class="form-group row m-1">
                <label class="col-sm-4 col-form-label"><small class="text-muted">Line 3:</small></label>
                <div class="col-sm-7"> 
                  <input type="text" id="extbillingAddress_3" class="form-control form-control-sm" >
                </div>
              </div>              
              <div class="form-group row m-1">
                <label class="col-sm-4 col-form-label"><small class="text-muted">Country:</small></label>
                <div class="col-sm-7"> 
                  <select class="countryBase custom-select form-control form-control-sm">
                    <option selected>== please select ==</option>
                  </select>
                </div>
              </div>
               <div class="form-group row m-1">
                <label class="col-sm-4 col-form-label"><small class="text-muted">State:</small></label>
                <div class="col-sm-7"> 
                  <select class="stateBase custom-select form-control form-control-sm">
                    <option selected>== please select ==</option>
                  </select>
                </div>
              </div>
              <div class="form-group row m-1">
                <label class="col-sm-4 col-form-label"><small class="text-muted">Suburb:</small></label>
                <div class="col-sm-7">
                  <input id="extSuburb" type="text" class="form-control form-control-sm" >
                </div>
              </div>
              <div class="form-group row m-1">
                <label class="col-sm-4 col-form-label"><small class="text-muted"></small></label>
                <div class="col-sm-7">              
                  <button type="button" class="btn btn-sm btn-warning">Update</button>
                  <button type="button" class="btn  btn-sm btn-secondary">Cancel</button>
                </div>
              </div>
              <!-- background-->
              <div class="p-3 mb-2 bg-info text-white">
                <h6> Additional Store Information </h6>
                <?php store_type(); ?>
                <div class="form-group row m-1">
                  <label class="col-sm-4 col-form-label"><small class="text-white">Merchant Name:</small></label>
                  <div class="col-sm-7">
                    <input id="extBillingMerchantName" type="text" class="form-control form-control-sm" >
                  </div>
                </div>
                 <div class="form-group row m-1">
                  <label class="col-sm-4 col-form-label"><small class="text-white">Maps</small>
                    <i class="store_map"></i>     
                  </label>
                </div>
                <div class="form-group row m-1">
                  <label class="col-sm-4 col-form-label"><small class="text-white">Latitude:</small></label>
                  <div class="col-sm-7">
                    <input id="extBillingStoreLatitude" type="text" class="form-control form-control-sm" >
                  </div>
                </div>
                <div class="form-group row m-1">
                  <label class="col-sm-4 col-form-label"><small class="text-white">Longitude:</small></label>
                  <div class="col-sm-7">
                    <input id="extBillingStoreLongitude" type="text" class="form-control form-control-sm" >
                  </div>
                </div>
                <div class="p-3 mb-2 bg-light text-dark">
                   <div class="form-group row m-1">
                    <label class="col-sm-4 col-form-label"><small class="text-muted">BSB:</small></label>
                    <div class="col-sm-9">
                      <input type="text" id="extBillingBsn" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-5 col-form-label"><small class="text-muted">Bank Account Name:</small></label>
                    <div class="col-sm-9">
                      <input type="text" id="extBillingStoreBankAccountName" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-5 col-form-label"><small class="text-muted">Swift Code:</small></label>
                    <div class="col-sm-9">
                      <input type="text" id="extBillingStoreSwiftC" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="form-group row m-1">
                    <label class="col-sm-5 col-form-label"><small class="text-muted">Bank Name:</small></label>
                    <div class="col-sm-9">
                      <input type="text" id="extBillingStoreBankName" class="form-control form-control-sm">
                    </div>
                  </div>
                    <div class="form-group row m-1">
                    <label class="col-sm-5 col-form-label"><small class="text-muted">Bank Address:</small></label>
                    <div class="col-sm-9">
                      <input type="text" id="extBillingStoreBankAddress" class="form-control form-control-sm">
                    </div>
                  </div>
                </div>
                <div class="form-group row m-1">
                  <div class="col-sm-9">              
                    <button type="button" class="btn btn-sm btn-primary">Delivery Zones</button>
                    <button type="button" class="btn  btn-sm btn-warning"> Update </button>
                  </div>
                </div>
                 <div class="form-group row m-1">
                  <div class="col-sm-9">              
                     <button type="button" class="btn  btn-sm btn-secondary">Leave Supervisor Mode</button>
                  </div>
                </div>
              </div><!--#background--> 
              </div><!--#ol-md-12-->
            </div>
            <!--#column3 -->
          </div> 
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- #end modal Entity -->
