<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form-1</title>
</head>

<body style="background: #E4E1D0; margin: 5% 30%; ">
<!-- Пользователь заполняет форму (обязательное текстовое поле), после отправки внизу формы отображается блок с введенным текстом и указанными стилями. А ошибки - сверху формы -->
	<?php 
		$errors = [];
		$ttext = $_POST['ttext'] ?? null;
		$ttext = htmlentities($ttext);
		$fontFamily = $_POST['fontFamily'] ?? [];
		$fontSize = $_POST['fontSize'] ?? null;
		$color = $_POST['color'] ?? null;			
		$background = $_POST['background'] ?? null;	
		$fontStyle = $_POST['fontStyle'] ?? [];

		if(isset($_POST['but'])) {	
			if(!$ttext) {
				$errors[] = 'Text is required';
			}
			if ($errors) {
				echo '<ul style="color: red"> <li>'. implode('</li><li>', $errors) . '</li></ul>';
			}
		}
	?>		
	<div style="background: #F5F5F5; width: 550px;">	
		<form  action="index.php" method="POST" style="padding: 20px;  width: 500px;">
			<label>Text:<br>
				<textarea name="ttext" rows="6" style="margin-bottom: 11px; width: 250px; margin-top: 8px;" value="<?= ($errors ?? null) ? $ttext : null ?>" ></textarea><br> 
			</label>

			<label style="margin-bottom: 15px;">Font-family:<br>
				<select name="fontFamily"  style="margin-top: 8px; margin-bottom: 20px; border-radius: 5px;  width: 256px;" >
					<option value="Arial" <?= ($errors ?? null) && $fontFamily== 'Arial' ? 'selected' : null ?> >Arial</option>
					<option value="Times" <?= ($errors ?? null) && $fontFamily== 'Times' ? 'selected' : null ?> >Times</option>
					<option value="Courier" <?= ($errors ?? null) && $fontFamily== 'Courier' ? 'selected' : null ?> >Courier</option>
					<option value="Comic Sans MS" <?= ($errors ?? null) && $fontFamily== 'Comic Sans MS' ? 'selected' : null ?> >Comic Sans MS</option>
					<option value="Arial">Arial</option>		
				</select><br>
			</label>

			<label style="position: relative;">Font-size:<br>
				<input type="number" name="fontSize" min="10" max="60" style="margin-top: 8px; margin-bottom: 20px; border-radius: 5px;"  value="<?= ($errors ?? null) ? $fontSize : 12 ?>" >
				<p style="position: absolute; top:11px; left: 21px;">px</p>
			</label><br>

			<label>
				<input type="checkbox" name="fontStyle[]" value="	font-style: italic" style="margin-top: 13px;" <?= ($errors ?? null) && in_array ('font-style: italic', $fontStyle) ? 'checked' : null ?> >italic<br>
				<input type="checkbox" name="fontStyle[]" value="font-weight: bold" <?= ($errors ?? null) && in_array ('font-weight: bold', $fontStyle) ? 'checked' : null ?> >bold<br>
				<input type="checkbox" name="fontStyle[]" value="text-decoration: underline" style="margin-bottom: 18px;" <?= ($errors ?? null) && in_array ('text-decoration: underline', $fontStyle) ? 'checked' : null ?> >underline<br>			
			</label>

			<label>Color:
			<input type="color" name="color" style="width: 195px; margin-bottom: 18px; margin-left: 15px;" value="<?= ($errors ?? null) ? $color : null ?>"><br></label>

			<label>Использовать фон?<br>
				<input type="radio" name="background" value="background:#F5F5F5" checked style="margin-top: 13px;" <?= ($errors ?? null) && $background=='background:#F5F5F5' ? 'checked' : null ?> >Да<br>
				<input type="radio" name="background" value=" " style="margin-bottom: 18px;" <?= ($errors ?? null) && $background==null ? 'checked' : null ?> >Нет<br>	
			</label>	
								
			
			<button name="but" style="width: 114px; margin: 0px 55px 0px 150px; border-radius: 5px;  border: 1px solid black;">Button</button>	
		</form>
	</div>
	<div id="myText" style="margin-top: 20px; width: 510px; padding: 20px; <?= $background ?> ">
			<?php
			if(isset($_POST['but'])) {	
				if (!$errors) {						
					echo '<div style="color:'. $color . '; font-family:' . $fontFamily  . ' ; font-size:' . $fontSize . 'px;' . implode('; ', $fontStyle) . ' " >' . $ttext . '</div>';		
				}
				/*else echo 'Заполните, пожалуйста, поле Text:';*/		
			}	

			?>			
		</div>

</body>
</html>


