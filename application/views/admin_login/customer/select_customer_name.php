
         <!-- =============================================== -->
         
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
          
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="<?= base_url('admin/customer'); ?>"> 
                              <i class="fa fa-list"></i>  Customer List </a>  
                           </div>
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="<?= base_url('admin/customer/addNewCustomer'); ?>"> 
                              <i class="fa fa-plus"></i>  Add Customer </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                             
                           <?php echo form_open('admin/customer/fetchSubDetails', ['id'=>'addDetails', 'class'=>'col-sm-6']); ?>
                           
                            <div class="form-group">
                                 <label>Select Subscriber Name <span class="not" style="color: red;">(if not in list firstly add customer)</span></label>

                                  <select class="form-control" name="subscriberName" required>
                                    <option value="">---Select subscriber name---</option>
                                     <?php 
                                       foreach($customerData as $customerData2){
                                       ?>
                                    <option value="<?php echo $customerData2->user_name ?>"><?php echo ucwords(strtolower($customerData2->user_name)); ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              
                               <?php echo form_button(['type'=>'submit', 'class'=>'btn btn-success', 'value'=>'true', 'content'=>'Select']); ?>
                      
                           </form>
                        </div>

                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         