<?php

$email = $title = $ingredients = '';
$errors = array('Email' => '', 'title' => '', 'Ingredients' => '');

	if (isset($_POST['submit'])) {

		if (empty($_POST['Email'])) {
			$errors['Email'] = 'An email is require <br/>';
		}else{
		   $email= $_POST['Email'];
		   if (!filter_var( $email, FILTER_VALIDATE_EMAIL)) {
		   	$errors['Email'] =' Email must be valide email adress';
		   }
		   
		}

		if (empty($_POST['title'])) {
			$errors['title'] = 'A title is require <br/>';
		}else{
			$title = $_POST['title'];
			if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
				$errors['title'] = 'title must be letter and space only';
			}
		}

		if (empty($_POST['Ingredients'])) {
			$errors['Ingredients'] =  'ingredients must be a list and commat <br/> ';
		}else{
			$ingredients = $_POST['Ingredients'];
			if (!preg_match('/^[a-zA-Z\s]+(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
				$errors['Ingredients'] =  'Ingredients must be a comma separated list';
			}
		}



	}
	
  ?>




  <!DOCTYPE html>
<html>

	<?php include('End/header.php'); ?>
	<section class="container grey-text">
		<h4 class="center">Add Pizzas</h4>
		<form class="white" action="add.php" method="POST">
			<label>Your Email</label>
			<input type="text" name="Email" value="<?php echo htmlspecialchars($email); ?> ">
			<div class="red-text"> <?php echo $errors['Email']; ?> </div>
			<label>Pizza Titile</label>
			<input type="text" name="title" value="<?php echo htmlspecialchars($title); ?> " >
			<div class="red-text"><?php echo $errors['title']; ?></div>
			<label>Ingredients (comma separated)</label>
			<input type="text" name="Ingredients" value="<?php echo htmlspecialchars($ingredients); ?> ">
			<div class="red-text"><?php echo $errors['Ingredients']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section> 

	<?php include('End/footer.php'); ?>
</html>
