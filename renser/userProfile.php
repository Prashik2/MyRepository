<div class="container">
      <div class="row" >
     
        <div class="col-md-6  toppad" style="margin-left: -15px" >

   
          <div class="panel panel-default">
            <div class="panel-heading" style="height: 50px">
              <span class="col-md-6"><h3 class="panel-title">{{userProfileDetail.name}}</h3></span>
             
             <span class="col-md-6" style="text-align: right;">
             <a title="Edit" ng-show="!userProfileDetail.showEdit" data-toggle="tooltip" type="button" ng-click="userProfileDetail.showEdit = !userProfileDetail.showEdit;validateProfile=false;" class="btn btn-xs btn-info glyphicon glyphicon-edit "></a>
              <a style="cursor:pointer;  color: green; " title="Save" ng-show="userProfileDetail.showEdit" ng-click="userProfileDetail.showEdit = !userProfileDetail.showEdit; updateProfile()" class="btn btn-xs btn-primary glyphicon glyphicon-ok-circle"></a>
                      
              <a style="cursor:pointer; ; color: red; " title="Cancel" ng-show="userProfileDetail.showEdit"  ng-click="userProfileDetail.showEdit = !userProfileDetail.showEdit; " class="btn btn-xs btn-warning glyphicon glyphicon-remove-circle"></a>
                </span>    
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{userProfileDetail.profilePic}}" data-toggle="modal" data-target="#myModalprofilePic " 
                 class="img-circle img-responsive"   > 
                
               
                </div>
                
            
                <div class=" col-md-9 col-lg-9 "> 
                <div  id="profileMsg" class="alert col-sm-12">
  							
						</div>
                  <table class="table table-user-information" style="color: black">
                    <tbody>
                   
                      <tr>
                        <td>Name:</td>
                        <td><span ng-show="!userProfileDetail.showEdit">{{userProfileDetail.name}}</span>
                        <input ng-show="userProfileDetail.showEdit" type="text" class="form-control" ng-model="userProfileDetail.name" >
                        </td>
                      </tr>
                     
                         <tr>
                        <td>Email</td>
                        <td><a href=""><span >{{userProfileDetail.email}}</span></a>
                        </td>
                      </tr><tr>
                        <td>Mobile</td>
                        <td><span >{{userProfileDetail.mobile}}</span>
                        </td>
                           
                      </tr>
                     
                       <!--  <tr>
                        <td>Address</td>
                        <td><span ng-show="!userProfileDetail.showEdit">{{userProfileDetail.addLine}}</span>
                        <textarea rows="2" ng-trim="false" maxlength="250" class="form-control" placeholder="Address" ng-show="userProfileDetail.showEdit"  ng-model="userProfileDetail.addLine"></textarea>
                        </td>
                      </tr> -->
                   
                   <!-- tr>
                        <td>City</td>
                        <td><span ng-show="!userProfileDetail.showEdit">{{userProfileDetail.city}}</span>
                        <input ng-show="userProfileDetail.showEdit" type="text" class="form-control" ng-model="userProfileDetail.city">
                        </td>
                      </tr>
                      
                       <tr>
                        <td>State</td>
                        <td><span ng-show="!userProfileDetail.showEdit">{{userProfileDetail.state}}</span>
                        <input ng-show="userProfileDetail.showEdit" type="text" class="form-control" ng-model="userProfileDetail.state">
                        </td>
                      </tr>
                       --> 
                       <tr>
                        <td>Country</td>
                        <td><span ng-show="!userProfileDetail.showEdit">{{userProfileDetail.country}}</span>
                        <input ng-show="userProfileDetail.showEdit" type="text" class="form-control" ng-model="userProfileDetail.country">
                        </td>
                      </tr>
                      
                       <tr>
                        <td>Zip Code</td>
                        <td><span ng-show="!userProfileDetail.showEdit">{{userProfileDetail.pin}}</span>
                        <input ng-show="userProfileDetail.showEdit" type="text" class="form-control" ng-model="userProfileDetail.pin">
                        </td>
                      </tr>
                  
                     
                    </tbody>
                  </table>
                  
                 
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                  <a title="Edit" ng-show="!userProfileDetail.showEdit" data-toggle="tooltip" type="button" ng-click="userProfileDetail.showEdit = !userProfileDetail.showEdit;validateProfile=false;" class="btn btn-xs btn-info glyphicon glyphicon-edit"></a>
                 <a style="cursor:pointer;  color: green; " title="Save" ng-show="userProfileDetail.showEdit" ng-click="userProfileDetail.showEdit = !userProfileDetail.showEdit; updateProfile()" class="btn btn-xs btn-primary glyphicon glyphicon-ok-circle"></a>
                      
                 <a style="cursor:pointer; ; color: red; " title="Cancel" ng-show="userProfileDetail.showEdit"  ng-click="userProfileDetail.showEdit = !userProfileDetail.showEdit; " class="btn btn-xs btn-warning glyphicon glyphicon-remove-circle"></a>
                      
                    </div>
            
          </div>
        </div>
      </div>
    </div>