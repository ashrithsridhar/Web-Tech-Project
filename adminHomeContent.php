<?php//subjects
$subjects_result = mysqli_query($conn,'SELECT * FROM subjects');
$subjects = mysqli_fetch_all($subjects_result, MYSQLI_ASSOC);
	if(isset($_POST['add_subject'])){
		$subject = $_POST['subject'];
		$add_subject = "INSERT INTO subjects(subject) VALUES('$subject')";
		mysqli_query($conn,$add_subject);
		header("Location: adminHome.php");
	}

//tests
$tests_result = mysqli_query($conn,'SELECT * FROM test');
$tests = mysqli_fetch_all($tests_result, MYSQLI_ASSOC);

//new-test
	if(isset($_POST['add_test'])){
		$test_name = $_POST['test_name'];
		$subject = $_POST['subject'];
		$sdatetime = $_POST['sdatetime'];
		$edatetime = $_POST['edatetime'];
		$test_duration = $_POST['test_duration'];
		$attempts = $_POST['attempts'];
		$yes_no = $_POST['yes_no'];
		$add_test = " INSERT INTO test(subject, test_name, sdatetime, edatetime, test_duration, attempts, yes_no) VALUES('$subject','$test_name','$sdatetime','$edatetime','$test_duration','$attempts','$yes_no') ";
		mysqli_query($conn,$add_test);
		header("Location: adminHome.php");
	}

//search-users
$searchusers_result = mysqli_query($conn,'SELECT * FROM users');
$usernames = mysqli_fetch_all($searchusers_result, MYSQLI_ASSOC);


?>

<div id="subjects" class="tab-pane in fade active">
	<h3>Subjects</h3><br><br>
	<ul class="list-group">
	<?php foreach($subjects as $subject) : ?>
		<li class="list-group-item"><?php echo $subject['subject']; ?></li>
	<?php endforeach; ?>
	</ul>
	<br><br><br><br>
	<form method="post" action="">
		<input class="form-control" type="text" name="subject" placeholder="Add New Subject"><br>
		<input type="submit" name="add_subject" value="Add" class="btn btn-danger btn-block">
	</form>
</div>
<div id="tests" class="tab-pane fade">
	<h3>Tests</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Test Name</th>
                <th>Subject</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Add Questions</th>
								
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tests as $test): ?>
                    <tr>
                        <td><?php echo $test['test_name'];?></td>
                        <td><?php echo $test['subject']; ?></td>
                        <td><?php echo $test['sdatetime']; ?></td>
                        <td><?php echo $test['edatetime']; ?></td>
                        <td><a href='editTest.php?var=<?php echo $test['test_id']; ?> ' class="btn btn-primary">Add Question</a></td>
								</tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div id="new-test" class="tab-pane fade">
<h3>Create Test</h3>
<form method="post" action="">
		<div class="form-group">
			<input class="form-control" type="text" name="test_name" placeholder="Test Name" style="width: 300px;">
		</div>
		<div class="form-group">
	     	<select name="subject" class="form-control" id="sel1" style="width: 300px;">
	     		<option disabled>Select Subject</option>
	     		<?php foreach($subjects as $subject) : ?>
	        		<option value="<?php echo $subject['subject']; ?>"><?php echo $subject['subject']; ?></option>
	        	<?php endforeach; ?>
	      	</select>
	    </div>
	    <div class="form-inline form-group">
			<input class="form-control" type="datetime-local" name="sdatetime" style="width: 300px;">
			Start Date and Time
		</div>
		<div class="form-inline form-group">
			<input class="form-control" type="datetime-local" name="edatetime" style="width: 300px;">
			End Date and Time
		</div>
		<div class="form-group">
			<input class="form-control" type="number" name="test_duration" placeholder="Duration in Minutes" style="width: 300px;">
		</div>
		<div class="form-group">
			<input class="form-control" type="number" name="attempts" placeholder="No of attempts allowed" style="width: 300px;">
		</div>
		<div class="form-group">
	     	<select name="yes_no" class="form-control" id="sel1" style="width: 300px;">
	     		<option disabled>Show Immediate Results</option>
	     		<option>Yes</option>
	     		<option>No</option>
	      </select>
	    </div>
      	<p>*To show Immediate Results</p><br>
		<input type="submit" name="add_test" value="Create Test" class="btn btn-danger" style="height: 40px; width:300px;">
</form>
</div>
