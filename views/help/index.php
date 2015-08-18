<p id="pgHelpTitle">CodeCycle Help</p>

<div id="divDesign" class="divHelp">
    <p class="sub1">Design</p>
    <p class="sub2">Change Request</p>
    <span class="sub2">
        A Change Request is a request to change the Requirements and the application's features / functionality to fit a new need.
        Generally requests come from the client about a new feature or something that they don't like within the application.
        An existing feature may be annoying to users, or a new feature may need to be added to improve the functionality of the application.
    </span>
        <p class="sub3">Create</p>
            <span class="sub3">
                Users can create Change Requests by hovering over the Design menu item, then hovering over the Change Request menu item, then clicking on Create.

            </span>
            <span class="sub3">
                Upon creation, the Assigned To user will receive an email notification about the new Change Request.
            </span>
            <br><br>
            <span class="sub3">
                Title: The name for the Change Request. 
            </span>
            <span class="sub3">
                Description: A description of the change to be made. What are the details of the change?
            </span>
            <span class="sub3">
                Project: The application whose features and Requirements that the request will be changing.
            </span>
            <span class="sub3">
                Area Affected: The area of the application that will be most affected by the change.
            </span>
            <span class="sub3">
                Priority: The level of importance that should be placed on implementation. 
            </span>
            <span class="sub3">
                Status: The current state of the Change Request. Describes if the Change Request is in design, development, test, or has been completed. 
            </span>
            <span class="sub3">
                Assigned To: The current person who is "in charge" of analyzing and/or completing this Change Request.
            </span>
            <span class="sub3">
                Requested By: The title of the person who requested that the application be changed. Usually client, but sometimes a suggestion comes from a developer or tester.
            </span>
            <span class="sub3">
                Intended Approach: A description of how the developers plan to make the change. What features exactly will change? What features will be removed? How will the application look after implementation?
            </span>
            <span class="sub3">
                Questions: Unknown information or problems about the Change Request that the team needs to ask the client. All questions should be answered before implementing.
            </span>
            <span class="sub3">
                Completion Time: The number of hours, days, or weeks that the developers think it will take to implement and fully test the change.
            </span>
            <span class="sub3">
                Map Requirements: A reference to the Requirements that will need to be updated to support the change.
            </span>
        <p class="sub3">Edit</p>
            <span class="sub3">
                Users can edit Change Requests by hovering over the Design menu item, then hovering over the Change Request menu item, then clicking on Edit.

            </span>
            <span class="sub3">
                Upon modification, the Assigned To user will receive an email notification about the new Change Request. The Assigned To user will only receive an email if the Assigned To field has been changed.
            </span>
            <span class="sub3">
                Users can search for a Change Request to Edit based on it's Project, or Edit a specific Change Request by accessing it through the List.
            </span>
            <br><br>
            <span class="sub3">
                Title: The name for the Change Request. 
            </span>
            <span class="sub3">
                Description: A description of the change to be made. What are the details of the change?
            </span>
            <span class="sub3">
                Project: The application whose features and Requirements that the request will be changing.
            </span>
            <span class="sub3">
                Area Affected: The area of the application that will be most affected by the change.
            </span>
            <span class="sub3">
                Priority: The level of importance that should be placed on implementation. 
            </span>
            <span class="sub3">
                Status: The current state of the Change Request. Describes if the Change Request is in design, development, test, or has been completed. 
            </span>
            <span class="sub3">
                Assigned To: The current person who is "in charge" of analyzing and/or completing this Change Request.
            </span>
            <span class="sub3">
                Requested By: The title of the person who requested that the application be changed. Usually client, but sometimes a suggestion comes from a developer or tester.
            </span>
            <span class="sub3">
                Intended Approach: A description of how the developers plan to make the change. What features exactly will change? What features will be removed? How will the application look after implementation?
            </span>
            <span class="sub3">
                Questions: Unknown information or problems about the Change Request that the team needs to ask the client. All questions should be answered before implementing.
            </span>
            <span class="sub3">
                Completion Time: The number of hours, days, or weeks that the developers think it will take to implement and fully test the change.
            </span>
            <span class="sub3">
                Map Requirements: A reference to the Requirements that will need to be updated to support the change.
            </span>
        <p class="sub3">List</p>
            <span class="sub3">
                Users can view a list of Change Requests by hovering over the Design menu item, then hovering over the Change Request menu item, then clicking on List.
            </span>
            <span class="sub3">
                The list will display a table of all the Change Requests in the system matching the user-selected search parameters.
            </span>
            <span class="sub3">
                Search by Project: Filters the list based on which Project the Change Request affects.
            </span>
            <span class="sub3">
                Search by Assignee: Filters the list based on which user the Change Request is assigned to.
            </span>
            <span class="sub3">
                Search by Status: Filters the list based on the status of the Change Request.
            </span>
            <br><br>
            <span class="sub3">
                <img src="<?php echo URL;?>images/editIcon.png" style="width: 25px; height: 25px;"> Clicking the Edit Icon will take users to the edit page for that Change Request.
            </span>
            <span class="sub3">
                <img src="<?php echo URL; ?>images/detailsIcon.png" style="width:25px; height: 25px;"> Clicking the View Details Icon will take users to a read-only page for the Change Request.
            </span>
            <span class="sub3">
                <img src="<?php echo URL; ?>images/deleteIcon.png" style="width: 25px; height: 25px;"> Clicking the Delete Icon will delete the Change Request from the database and remove it from the list.
            </span>
    <p class="sub2">Requirement</p>
    <span class="sub2">
        A Requirement is a specifically worded statement that describes one very small detail of the application's functionality or limitations.
        During the Design phase, Requirements are one of the most important aspect of communication between developer and client, as they tell the client exactly what they are going to see in the finished product.
        Requirements will be updated constantly throughout the course of the application's life as changes are expected and welcomed. 
        
    </span>
    <span class="sub2">
        Testers will also use the Requirements to verify that the application works as expected.
        They will base their testing first and foremost on the passing / failing of each Requirement, as Requirements mark the standard set by the client.        
    </span>
        <p class="sub3">Create</p>
            <span class="sub3">
                 Users can create Requirements by hovering over the Design menu item, then hovering over the Requirement menu item, then clicking on Create.
            </span>
            <br><br>
            <span class="sub3">
                Title: The initial statement of the Requirement. Should be specific and apply to one detail of the application.
            </span>
            <span class="sub3">
                Description: A more detailed description of the Requirement. Tells clients and developers exactly what the feature to develop is.
            </span>
            <span class="sub3">
                Role Permission: Most applications have different functionality based on Roles, for instance if someone is a paid user or a free user they might see different things. Details about Roles go in this section.
            </span>
            <span class="sub3">
                Business Rules: The very finite details of the Requirement. Usually describes where the feature will take the user, what input it will accept, and how it will interact with the rest of the application.
            </span>
            <span class="sub3">
                Project: The application name that the Requirement is describing.
            </span>
            <span class="sub3">
                Area Affected: The area of the application that the Requirement is describing.
            </span>
        <p class="sub3">Edit</p>
            <span class="sub3">
                 Users can edit Requirements by hovering over the Design menu item, then hovering over the Requirement menu item, then clicking on Edit.
            </span>
            <span class="sub3">
                Users can search for a Requirement to Edit based on it's Project, or Edit a specific Requirement by accessing it through the List.
            </span>
            <br><br>
            <span class="sub3">
                Title: The initial statement of the Requirement. Should be specific and apply to one detail of the application.
            </span>
            <span class="sub3">
                Description: A more detailed description of the Requirement. Tells clients and developers exactly what the feature to develop is.
            </span>
            <span class="sub3">
                Role Permission: Most applications have different functionality based on Roles, for instance if someone is a paid user or a free user they might see different things. Details about Roles go in this section.
            </span>
            <span class="sub3">
                Business Rules: The very finite details of the Requirement. Usually describes where the feature will take the user, what input it will accept, and how it will interact with the rest of the application.
            </span>
            <span class="sub3">
                Project: The application name that the Requirement is describing.
            </span>
            <span class="sub3">
                Area Affected: The area of the application that the Requirement is describing.
            </span>
        <p class="sub3">List</p>
            <span class="sub3">
                Users can view a list of Requirements by hovering over the Design menu item, then hovering over the Requirement menu item, then clicking on List.
            </span>
            <span class="sub3">
                The list will display a table of all the Requirements in the system matching the user-selected search parameters.
            </span>
            <span class="sub3">
                Search by Project: Filters the list based on which Project the Requirement affects.
            </span>
            <span class="sub3">
                Search by Area: Filters the list based on which area of the application the Requirement affects.
            </span>
            <span class="sub3">
                Search by Edited By: Filters the list based on who last edited or created the Requirement.
            </span>
            <br><br>
            <span class="sub3">
                <img src="<?php echo URL;?>images/editIcon.png" style="width: 25px; height: 25px;"> Clicking the Edit Icon will take users to the edit page for that Requirement.
            </span>
            <span class="sub3">
                <img src="<?php echo URL; ?>images/detailsIcon.png" style="width:25px; height: 25px;"> Clicking the View Details Icon will take users to a read-only page for the Requirement.
            </span>
            <span class="sub3">
                <img src="<?php echo URL; ?>images/deleteIcon.png" style="width: 25px; height: 25px;"> Clicking the Delete Icon will delete the Requirement from the database and remove it from the list.
            </span>
</div>
<div id="divDevelop" class="divHelp">
    <p class="sub1">Develop</p>
    <p class="sub2">Asset</p>
    <span class="sub2">
        An Asset is a non-coded work item. This can be anything that needs to be made/bought/downloaded for the application that cannot be written in a programming language.        
    </span>
    <span class="sub2">
        Examples: Images, Backgrounds, Sound Effects, Music, Fonts, Videos, etc.
    </span>
        <p class="sub3">Create</p>
            <span class="sub3">
                Users can create Assets by hovering over the Develop menu item, then hovering over the Asset menu item, then clicking on Create.
            </span>
            <span class="sub3">
                Upon creation, the Assigned To user will receive an email notification about the new Asset.
            </span>
            <span class="sub3">
                Users can create multiple Assets at a time if they are all going to have the same Project, Type, Status, and Assigned To user.
            </span>
            <br><br>
            <span class="sub3">
                Title: The name of the Asset. Should be the exact file name that the developers will be expecting when they add the file to the project.
            </span>
            <span class="sub3">
                Status: The current stage of the Asset. Is it being designed, developed, or is it already in the Project?
            </span>
            <span class="sub3">
                Type: The kind of item that the Asset will be. Is it an image? Video? Music?
            </span>
            <span class="sub3">
                Project: The application that the Asset will be seen in.
            </span>
            <span class="sub3">
                Assigned To: The user in charge of making/buying/finding the Asset.
            </span>
        <p class="sub3">Edit</p>
            <span class="sub3">
                Users can edit Assets by hovering over the Develop menu item, then hovering over the Asset menu item, then clicking on Edit.
            </span>
            <span class="sub3">
                Upon modification, if the Assigned To user has changed, the new Assigned To user will receive an email notification about the new Asset.
            </span>
            <span class="sub3">
                Users can search for an Asset to Edit based on it's Project, or Edit a specific Asset by accessing it through the List.
            </span>
            <br><br>
            <span class="sub3">
                Title: The name of the Asset. Should be the exact file name that the developers will be expecting when they add the file to the project.
            </span>
            <span class="sub3">
                Status: The current stage of the Asset. Is it being designed, developed, or is it already in the Project?
            </span>
            <span class="sub3">
                Type: The kind of item that the Asset will be. Is it an image? Video? Music?
            </span>
            <span class="sub3">
                Project: The application that the Asset will be seen in.
            </span>
            <span class="sub3">
                Assigned To: The user in charge of making/buying/finding the Asset.
            </span>
        <p class="sub3">List</p>
            <span class="sub3">
                Users can view a list of Assets by hovering over the Develop menu item, then hovering over the Asset menu item, then clicking on List.
            </span>
            <span class="sub3">
                The list will display a table of all the Assets in the system matching the user-selected search parameters.
            </span>
            <span class="sub3">
                Search by Project: Filters the list based on which Project the Asset affects.
            </span>
            <span class="sub3">
                Search by Assignee: Filters the list based on who the Asset is assigned to.
            </span>
            <span class="sub3">
                Search by Status: Filters the list based on the status of the Asset.
            </span>
            <span class="sub3">
                Search by Type: Filters the list based on the type of the Asset.
            </span>
            <br><br>
            <span class="sub3">
                <img src="<?php echo URL;?>images/editIcon.png" style="width: 25px; height: 25px;"> Clicking the Edit Icon will take users to the edit page for that Asset.
            </span>
            <span class="sub3">
                <img src="<?php echo URL; ?>images/detailsIcon.png" style="width:25px; height: 25px;"> Clicking the View Details Icon will take users to a read-only page for the Asset.
            </span>
            <span class="sub3">
                <img src="<?php echo URL; ?>images/deleteIcon.png" style="width: 25px; height: 25px;"> Clicking the Delete Icon will delete the Asset from the database and remove it from the list.
            </span>
    <p class="sub2">Project</p>
    <span class="sub2">
        A Project is an application at it's highest level. This can be a web site, mobile app, game, software, or any other type of application.
    </span>
        <p class="sub3">Create</p>
            <span class="sub3">
                Users can create Projects by hovering over the Develop menu item, then hovering over the Asset menu item, then clicking on Create.
            </span>
            <br><br>
            <span class="sub3">
                Title: The name of the application to be developed.
            </span>
        <p class="sub3">Edit</p>
            <span class="sub3">
                Users can edit Projects by hovering over the Develop menu item, then hovering over the Asset menu item, then clicking on Edit.
            </span>
            <span class="sub3">
                Users can search for a Project to Edit based on it's Title, or Edit a specific Project by accessing it through the List.
            </span>
            <br><br>
            <span class="sub3">
                Title: The name of the application to be developed.
            </span>
        <p class="sub3">List</p>
            <span class="sub3">
                Users can view a list of Projects by hovering over the Develop menu item, then hovering over the Project menu item, then clicking on List.
            </span>
            <span class="sub3">
                The list will display a table of all the Projects in the system.
            </span>            
            <br><br>
            <span class="sub3">
                <img src="<?php echo URL;?>images/editIcon.png" style="width: 25px; height: 25px;"> Clicking the Edit Icon will take users to the edit page for that Asset.
            </span>            
            <span class="sub3">
                <img src="<?php echo URL; ?>images/deleteIcon.png" style="width: 25px; height: 25px;"> Clicking the Delete Icon will delete the Asset from the database and remove it from the list.
            </span>
</div>
<div id="divTest" class="divHelp">
    <p class="sub1">Test</p>
    <p class="sub2">Bug</p>
    <span class="sub2">
        A Bug is a feature or piece of functionality that does not match the Requirements. Bugs can be anything that crashes the application, anything that is inconsistent with the rest of the application, anything that does not follow the rules of a Requirement, or anything that was supposed to be developed but wasn't.
    </span>    
        <p class="sub3">Create</p>
            <span class="sub3">
                Users can create Bugs by hovering over the Test menu item, then hovering over the Bug menu item, then clicking on Create.
            </span>
            <span class="sub3">
                Upon creation, the Assigned To user will receive an email notification about the new Bug.
            </span>
            <br><br>
            <span class="sub3">
                Title: The name of the Bug. Should describe briefly what the issue is.
            </span>
            <span class="sub3">
                Description: The description of the Bug in more detail. Where is the issue occurring and what is happening?   
            </span>
            <span class="sub3">
                Project: The application that the Bug is occurring in.
            </span>
            <span class="sub3">
                Area Affected: The area of the application that the Bug is occurring in.
            </span>
            <span class="sub3">
                Reproduction Steps: Step-by-step instructions about how to find the Bug and make the application cause the issue.
            </span>
            <span class="sub3">
                Status: The current status of the Bug.
            </span>
            <span class="sub3">
                Platform: The device or browser that the Bug occurs in. There could be more than one, but select the Platform that you found the issue in. 
            </span>
            <span class="sub3">
                Assigned To: The user that will be working on the Bug. 
            </span>
        <p class="sub3">Edit</p>
            <span class="sub3">
                Users can edit Bugs by hovering over the Test menu item, then hovering over the Bug menu item, then clicking on Edit.
            </span>
            <span class="sub3">
                Upon modification, if the Assigned To user was changed, the new Assigned To user will receive an email notification about the Bug.
            </span>
            <span class="sub3">
                Users can search for a Bug by Project, or edit a specific Bug by accessing it from the List.
            </span>
            <br><br>
            <span class="sub3">
                Title: The name of the Bug. Should describe briefly what the issue is.
            </span>
            <span class="sub3">
                Description: The description of the Bug in more detail. Where is the issue occurring and what is happening?   
            </span>
            <span class="sub3">
                Project: The application that the Bug is occurring in.
            </span>
            <span class="sub3">
                Area Affected: The area of the application that the Bug is occurring in.
            </span>
            <span class="sub3">
                Reproduction Steps: Step-by-step instructions about how to find the Bug and make the application cause the issue.
            </span>
            <span class="sub3">
                Status: The current status of the Bug.
            </span>
            <span class="sub3">
                Platform: The device or browser that the Bug occurs in. There could be more than one, but select the Platform that you found the issue in. 
            </span>
            <span class="sub3">
                Assigned To: The user that will be working on the Bug. 
            </span>
        <p class="sub3">List</p>
            <span class="sub3">
                Users can view a list of Bugs by hovering over the Test menu item, then hovering over the Bug menu item, then clicking on List.
            </span>
            <span class="sub3">
                The list will display a table of all the Bugs in the system matching the user-selected search parameters.
            </span>
            <span class="sub3">
                Search by Project: Filters the list based on which Project the Bug affects.
            </span>
            <span class="sub3">
                Search by Assignee: Filters the list based on who the Bug is assigned to.
            </span>
            <span class="sub3">
                Search by Status: Filters the list based on the status of the Bug.
            </span>            
            <br><br>
            <span class="sub3">
                <img src="<?php echo URL;?>images/editIcon.png" style="width: 25px; height: 25px;"> Clicking the Edit Icon will take users to the edit page for that Bug.
            </span>
            <span class="sub3">
                <img src="<?php echo URL; ?>images/detailsIcon.png" style="width:25px; height: 25px;"> Clicking the View Details Icon will take users to a read-only page for the Bug.
            </span>
            <span class="sub3">
                <img src="<?php echo URL; ?>images/deleteIcon.png" style="width: 25px; height: 25px;"> Clicking the Delete Icon will delete the Bug from the database and remove it from the list.
            </span>
    <p class="sub2">Test Case</p>
    <span class="sub2">
        A Test Case is a step-by-step guide to make sure a feature or piece of functionality is working properly and following the appropriate Requirements.
    </span>
        <p class="sub3">Create</p>
            <span class="sub3">
                Users can create Test Cases by hovering over the Test menu item, then hovering over the Test Case menu item, then clicking on Create.
            </span>
            <span class="sub3">
                Upon creation, the Assigned To user will receive an email notification about the new Test Case.
            </span>
            <br><br>
            <span class="sub3">
                Title: The name of the Test Case. Should be briefly descriptive saying what it is testing.
            </span>
            <span class="sub3">
                Description: A more detailed description of the Test Case. What will make this case pass? What will make it fail?
            </span>
            <span class="sub3">
                Reproduction Steps: The step-by-step instructions of how to test this particular case. If any step fails, the whole Test Case fails and a Bug should be created.
            </span>
            <span class="sub3">
                Project: The application that the Test Case is testing.
            </span>
            <span class="sub3">
                Area: The area of the application that the Test Case is testing.
            </span>
            <span class="sub3">
                Status: The status of the Test Case.
            </span>
            <span class="sub3">
                Assigned To: The user responsible for following the steps and making sure that this feature/functionality passes testing.
            </span>
        <p class="sub3">Edit</p>
            <span class="sub3">
                Users can edit Test Cases by hovering over the Test menu item, then hovering over the Test Case menu item, then clicking on Edit.
            </span>
            <span class="sub3">
                Upon modification, if the Assigned To user has changed, the new Assigned To user will receive an email notification about the Test Case.
            </span>
            <span class="sub3">
                Users can search for a Test Case by Project, or edit a specific Test case by accessing it from the List.
            </span>
            <br><br>
            <span class="sub3">
                Title: The name of the Test Case. Should be briefly descriptive saying what it is testing.
            </span>
            <span class="sub3">
                Description: A more detailed description of the Test Case. What will make this case pass? What will make it fail?
            </span>
            <span class="sub3">
                Reproduction Steps: The step-by-step instructions of how to test this particular case. If any step fails, the whole Test Case fails and a Bug should be created.
            </span>
            <span class="sub3">
                Project: The application that the Test Case is testing.
            </span>
            <span class="sub3">
                Area: The area of the application that the Test Case is testing.
            </span>
            <span class="sub3">
                Status: The status of the Test Case.
            </span>
            <span class="sub3">
                Assigned To: The user responsible for following the steps and making sure that this feature/functionality passes testing.
            </span>
        <p class="sub3">List</p>
            <span class="sub3">
                Users can view a list of Test Cases by hovering over the Test menu item, then hovering over the Test menu item, then clicking on List.
            </span>
            <span class="sub3">
                The list will display a table of all the Test Cases in the system matching the user-selected search parameters.
            </span>
            <span class="sub3">
                Search by Project: Filters the list based on which Project the Test Case affects.
            </span>
            <span class="sub3">
                Search by Assignee: Filters the list based on who the Test Case is assigned to.
            </span>
            <span class="sub3">
                Search by Status: Filters the list based on the status of the Test Case.
            </span>            
            <br><br>
            <span class="sub3">
                <img src="<?php echo URL;?>images/editIcon.png" style="width: 25px; height: 25px;"> Clicking the Edit Icon will take users to the edit page for that Test Case.
            </span>
            <span class="sub3">
                <img src="<?php echo URL; ?>images/detailsIcon.png" style="width:25px; height: 25px;"> Clicking the View Details Icon will take users to a read-only page for the Test Case.
            </span>
            <span class="sub3">
                <img src="<?php echo URL; ?>images/deleteIcon.png" style="width: 25px; height: 25px;"> Clicking the Delete Icon will delete the Test Case from the database and remove it from the list.
            </span>
</div>
<div id="divTools" class="divHelp">
    <p class="sub1">Tools</p>
    <p class="sub2">Account</p>
    <span class="sub2">
        Your Account is the information specific to you, such as your username, password, role, etc.
        Using the menu items here, users can change their passwords, request an upgraded role, or clock in/out of their timesheet.
    </span>
        <p class="sub3">Change Password</p>
            <span class="sub3">
                Users can request a new password by entering their current password and then typing in the new password twice. 
                After clicking the "Change Password" button, users will no longer be able to access their accounts via their old password. Only the new password will be acceptable on log in.
            </span>
        <p class="sub3">Request Role</p>
            <span class="sub3">
                A Role is a title given to each user to determine the permissions they are allowed on the site. Users can request more permissions from this page by sending a request to the administrator.
                The administrator must agree to your request and manually change your Role for security reasons, so please be patient in this process.
            </span>
        <p class="sub3">Timesheet</p>
            <span class="sub3">
               Users should track their time worked for payments, and to better estimate how long it will take them to complete a task.
               They can do that from this page by clicking "Clock In" or "Clock Out" when they begin work or end work respectively. From this page, users can also enter what task(s) they worked on during their day.
            </span>
    <p class="sub2">Cycle</p>   
        <p class="sub3">Create</p>
            <span class="sub3">
                Users can create Cycles by hovering over the Tools menu item, then hovering over the Cycle menu item, then clicking on Create.
            </span>
            <br><br>
            <span class="sub3">
                Start Date: The intended date that people will begin work on the Work Items.
            </span>
            <span class="sub3">
                Team Size: The number of people that will be assigned to complete the Work Items.
            </span>
            <span class="sub3">
                End Date: The intended completion date of all the tasks in the Cycle. By default, this automatically calculates based on the start date, number of team members, and number of hours estimated for each Work Item.
            </span>
            <span class="sub3">
                Auto Date: Check the box if you wish to have the system automatically calculate an End Date for the Cycle. Deselect it if you wish to enter the End Date manually.
            </span>
            <span class="sub3">
                Total Hours: Automatically calculated number of work hours that it is estimated the Cycle will take to complete.
            </span>
            <span class="sub3">
                Work Items: A list of all the Change Requests and Bugs that need to be completed. Checking the check box next to each item will add it to the Cycle as planned work.
            </span>
            <span class="sub3">
                Cycle This Work: A list of all the Change Requests and Bugs that the user selected to be in the Cycle. Deselect the check box to remove it from the Cycle and back into the Work Item list.
            </span>
        <p class="sub3">Edit</p>
            <span class="sub3">
                Users can edit Cycles by hovering over the Tools menu item, then hovering over the Cycle menu item, then clicking on Edit.
            </span>
            <span class="sub3">
                Users can search for a Cycle by entering its ID, or by accessing it from the Cycle List.
            </span>
            <br><br>
            <span class="sub3">
                Start Date: The intended date that people will begin work on the Work Items.
            </span>
            <span class="sub3">
                Team Size: The number of people that will be assigned to complete the Work Items.
            </span>
            <span class="sub3">
                End Date: The intended completion date of all the tasks in the Cycle. By default, this automatically calculates based on the start date, number of team members, and number of hours estimated for each Work Item.
            </span>
            <span class="sub3">
                Auto Date: Check the box if you wish to have the system automatically calculate an End Date for the Cycle. Deselect it if you wish to enter the End Date manually.
            </span>
            <span class="sub3">
                Total Hours: Automatically calculated number of work hours that it is estimated the Cycle will take to complete.
            </span>
            <span class="sub3">
                Work Items: A list of all the Change Requests and Bugs that need to be completed. Checking the check box next to each item will add it to the Cycle as planned work.
            </span>
            <span class="sub3">
                Cycle This Work: A list of all the Change Requests and Bugs that the user selected to be in the Cycle. Deselect the check box to remove it from the Cycle and back into the Work Item list.
            </span>
        <p class="sub3">List</p>
            <span class="sub3">
                Users can view a list of Cycles by hovering over the Tools menu item, then hovering over the Cycle menu item, then clicking on List.
            </span>
            <span class="sub3">
                The list will display a table of all the Cycles in the system.
            </span>                
            <br><br>
            <span class="sub3">
                <img src="<?php echo URL;?>images/editIcon.png" style="width: 25px; height: 25px;"> Clicking the Edit Icon will take users to the edit page for that Cycle.
            </span>
            <span class="sub3">
                <img src="<?php echo URL; ?>images/detailsIcon.png" style="width:25px; height: 25px;"> Clicking the View Details Icon will take users to a read-only page for the Cycle.
            </span>
            <span class="sub3">
                <img src="<?php echo URL; ?>images/deleteIcon.png" style="width: 25px; height: 25px;"> Clicking the Delete Icon will delete the Cycle from the database and remove it from the list.
            </span>
</div>



