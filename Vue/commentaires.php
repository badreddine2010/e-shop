<?php

require_once("../ctrl/init.ctrl.php");
require_once("../ctrl/header.php");
?>

<html>

<body>
	<div class="wrapper">
	
		<section>
			<br><br><br>
			<div class="wrap">
				<h2>Les suggestions des adhérents :</h2><br>
					<br><br>
					<div class="scroll">
						<?php
						
									$sql=executeRequete("SELECT * FROM comments ");

									echo "<table class='table table-bordered'>";
									echo "<tr>
							<td style='width: 500px;height: 70px; '><h2><font color=white><u>Commentaire</u></font></h3></td>
							<td style='width: 500px;height: 70px; '><h2><font color=White><u>Expéditeur</u></font></h3></td>
							<td style='width: 500px;height: 70px; '><h2><font color=White><u>Date d'envoi</u></font></h3></td>
							
							</tr>";
									while ($row = $sql->fetch_assoc())  
									{
										echo "<tr>";
											echo "<td >"; echo $row['comment']; echo "</td>";
											echo "<td >"; echo  $row['nom']; echo "</td>";
											echo "<td>".strftime('%d-%m-%Y',strtotime($row['dater']))."</td>";

										echo "</tr>";
										echo '</table>';
									}?>
					</div>
				</div>
			</div>
				</div>
		</section>

		</div>
			</div>
		<br><br><br><br><br><br>
		</section>
	</div>
	</div>
	</div>
	</div>

</body>
</html>
</div>

<?php require_once '../ctrl/footer.php'?>
