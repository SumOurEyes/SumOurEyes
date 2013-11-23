<?php 
	$page = "projects";
	include("header.php");

	$cookie = explode("-",$_COOKIE["auth"]);
    $userid = $cookie[0];
?>
	<script>
	$(document).ready(function() {
        
        $("#projectsubmit").submit(function(event){
          event.preventDefault();
          if($('#projectname').val() !== "") {        
              $.post("addProject.php", {name: $('#projectname').val(), user: $("#userid").val()}, function(id){
                  window.location = "project.php?projectid="+id;
              });
          }
       	 else {
         alert("Please add a project name.");   
        	}
        });

        function deleteProject(id){
          $.post("deleteProject.php", {id: id}, function(){
            $("#project"+id).remove();
          });
        }

        $(".deleteproject").click(function(event){
          event.preventDefault();
          deleteProject(this.id);
          this.remove();

        });
        
        //ALEX CODE BELOW////////////////--------------------------------------
       
        var currentProjectId = "";               // used to store the projectid of the project to be shared/renamed
        
        // Update the database with new user given name
        function renameProject(projectid, newName) {
            $.post('renameProject.php', {project:projectid, newName:newName}, function() {
            });
            
        }
        
        // Handles the "Confirm" Rename Modal Button being clicked
        $(document.getElementById("confirmRenameProjectBtn")).click(function(event){
            event.preventDefault();
            var newName = document.getElementById('renameproj_box').value;
            if(newName != ''){
                renameProject(currentProjectId, newName);
                document.getElementById('project' + currentProjectId).innerHTML = newName;
            }
            else {
                alert("value must not be null");   
            }
        });
            
        function deleteSharedProject(projectid) {
            $.post('deleteSharedProject.php', {project: projectid, user:$("#userid").val()}, function() {
                $("#sharedproject"+projectid).remove();
            });
        }
        
        $(".deletesharedproject").click(function(event){
            event.preventDefault();
            deleteSharedProject(this.id);
            this.remove();
        });
        
        function shareProject(sharedUserId, projectId, permissions){
             $.post("shareProject.php", {user: sharedUserId, project: projectId, permissions: permissions}, function(){
             });
        }
       
        // Used to grab project id and info when a link that opens a modal is clicked
        $(".modalInitialize").click(function(event){
            event.preventDefault();
            currentProjectId = this.id;
            projectName = document.getElementById("project" + currentProjectId).innerHTML;
            document.getElementById('shareModalHeader').innerHTML = '<h3>' + "Share \'" + projectName + '\'</h3>';
            document.getElementById('renameModalHeader').innerHTML = '<h3>' + "Rename \'" + projectName + '\'</h3>';
        });
        
        // Handles the "Share" modal button being clicked
        $(document.getElementById("shareProjectBtn")).click(function(event){
            event.preventDefault();
            
            var perm_ddl = document.getElementById("permissions_ddl"); // the permissions dropdown
            var selected_perm = perm_ddl.options[perm_ddl.selectedIndex].value;      // get selected option
            
            var sharedUserTextBox = document.getElementById("shareduser_box");
            var sharedUserEmail = sharedUserTextBox.value;
        
            // Convert Email to ID, then Insert into 'sharedprojects' table
            $.post('getSharedUserID.php', {email: sharedUserEmail}, function(data){
               try{ 
                   var sharedUserIDs = jQuery.parseJSON(data);
                    $.each(sharedUserIDs, function(i, sharedUser){
                        if(sharedUser.id == $("#userid").val()) {
                            alert("Cannot share project with yourself! Please try again");   
                        }
                        else {
                            shareProject(sharedUser.id, sharedProjectId, selected_perm);
                        }
                    });
                  }
                catch(e){alert(e);}
            });   
        });
        //ALEX Code Above
    });
	</script>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container content">
		<h2>Projects</h2>
		<div class="col-lg-4">
          <h3>My projects</h3>
          <p><?php
          		
        include("connect.php");
        		
				$result = mysql_query("SELECT id, name FROM projects WHERE userid = '".$userid."' ORDER BY name ASC")
				or die(mysql_error());
				if  (mysql_num_rows($result)>0)
				{
					while($row = mysql_fetch_array( $result )) 
					{	
						echo 
                            '<li class="dropdown">
                                <a href="project.php?projectid='.$row['id'].'" id="project'.$row['id'].'" class="dropdown-toggle" data-                                     toggle="dropdown" data-hover="dropdown" data-delay="250" data-close-others="true">'.$row['name'].'</a> 
                                 <ul class="dropdown-menu pull-right">
                                    <li><a tabindex="-1" href="#shareproject" class="modalInitialize" data-toggle="modal"                                                           id="'.$row['id'].'">Share</a></li>
                                    <li class="divider"></li>
                                    <li><a tabindex="-1" href="#renameproject" class="modalInitialize" data-toggle="modal"                                                            id="'.$row['id'].'">Rename</a></li>
                                    <li><a tabindex="-1" href="#" class="deleteproject" id="'.$row['id'].'" >Delete</a></li>
                                </ul>    
                             </li>';
					}
				}else{
					echo "Ain't got no projects yet...";
				}
			?></p>
        </div>
        <div class="col-lg-4">
          <h3>Shared with me</h3>
            <!-- Alex Code Below ----------------------------------------------------------------!-->
                      <p><?php
          		
        include("connect.php");
        		
				$result = mysql_query("SELECT id, name FROM projects INNER JOIN sharedprojects ON projects.id = sharedprojects.projectid WHERE sharedprojects.userid = '".$userid."' ORDER BY name ASC")
				or die(mysql_error());
				if  (mysql_num_rows($result)>0)
				{
					while($row = mysql_fetch_array( $result )) 
					{	
						echo '<a href="project.php?projectid='.$row['id'].'" id="sharedproject'.$row['id'].'">'.$row['name'].'</a> 
                              <a href="#" class="deletesharedproject" id="'.$row['id'].'" ><img src="https://cdn1.iconfinder.com/data/icons/aspneticons_v1.0_Nov2006/trash_(delete)_16x16.gif" /></a>';
					}
				}else{
					echo "Ain't got no shared projects yet...";
				}
			?></p>
            
            <!-- Alex Code Above ----------------------------------------------------------------!-->
          <!--<p>No shared projects yet.</p>!-->
        </div>
        <div class="col-lg-4">
          <h3>Create new</h3>
          <p><form id="projectsubmit">
			<input type="text" name="projectname" id="projectname" placeholder="Project name"/>
			<input type="hidden" value="<?= $userid ?>" id="userid"/>
			<input type="submit" value="Create" name="projectsubmit" class="btn btn-success" />
			
			</form></p>
        </div>
		
    <!-- Alex code below!-->
        <!--Rename Project Modal!-->
        <div class="modal fade" id="renameproject" role="dialog">
            <div class="modal-dialog">
                <div class="modal-header" id="renameModalHeader" role="dialog">
                    <h3>Rename Project: </h3>
                </div>
                <div class= "modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="renameproj_box" style="text-align:left" class="col-sm-4 control-label">Rename To: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="renameproj_box" placeholder="New Project Name">    
                        </div>
                        </div>    
                    </form>
                </div>
                 <div class = "modal-footer">
                      <a href="#" id = "cancelRenameProjectBtn" class="btn btn-default" data-dismiss="modal" data-target="#renameproject"                                 name="renameproject">Cancel</a>                 
                    <a href="#" id = "confirmRenameProjectBtn" class="btn btn-success" data-dismiss="modal" data-target="#renameproject"                                 name="renameproject">Confirm</a>
                </div>
            </div>
        </div>

        <!--Share Project Modal!-->
        <div class="modal fade" id="shareproject" role="dialog">
            <div class = "modal-dialog">
                <div class= "modal-header" id="shareModalHeader">
                    <h3>Share Project: </h3>
                </div>
                <div class = "modal-body">
                    
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="shareduser_box" style="text-align:left" class="col-sm-4 control-label">Share With: </label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="shareduser_box" placeholder="Email">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="permissions_ddl" style="text-align:left" class="col-sm-4 control-label">User Permissions: </label>
                            <div class="col-sm-8">
                                <select id="permissions_ddl" class="form-control input-sm">
                                        <option value="edit">Edit</option>
                                        <option value="read">Read Only</option>
                                        <option value="comment">Comment</option>
                                </select>
                            </div>
                        </div>
                    </form>
                
                </div>
                <div class = "modal-footer">
                    <a href="#" id = "shareProjectBtn" class="btn btn-success" data-dismiss="modal" data-target="#shareproject" name="shareproject">
                        Share!
                    </a>
                </div>
            </div>
        </div>
    <!-- Alex code above!-->

    </div> <!-- /container -->
    <footer>
          <p>&copy; SumOurEyes 2013 | <a href="">Contact</a></p>
        </footer>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="twitter-bootstrap-hover-dropdown-master/twitter-bootstrap-hover-dropdown.min.js"></script>
	</body>
</html>