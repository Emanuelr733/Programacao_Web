<?php
?>

<html>
	<head>
		<title>SISTEMA POO</title>
		<style>
			table {
				width:100%;
			}
			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
			}
			th, td {
				padding: 5px;
				text-align: left;
			}
			table#t01 tr:nth-child(even) {
				background-color: #eee;
			}
			table#t01 tr:nth-child(odd) {
			   background-color:#fff;
			}
			table#t01 th {
				background-color: black;
				color: white;
			}
		</style>
	</head>
	<body>
		<table>
			<tr style="height:50px">
				<td colspan="2">
					<h1>MENU DO SISTEMA</h1>
				</td>
			</tr>
			<tr style="height:50px">
				<td colspan="2">
					Seja bem vindo(a)
				</td>
			</tr>
			<tr style="height:400px">
				<td colspan="2">
					<!-- TABELA QUE MOSTRA O MENU DO USUARIO -->
					<table style="height:400px;">
						<tr>
							<td style="width:150px; vertical-align:top;">
								<b>>> USU&Aacute;RIO</b></br>
								<a href="frmNovoUsuario.php">Novo usu&aacute;rio</a><br>
								<a href="frmListaUsuario.php">Gerenciar Usu&aacute;rios</a><br>
                                <a href="frmNovoProduto.php">Novo produto</a><br>
                                <a href="frmListaProduto.php">Gerenciar Produtos</a>									
							</td>
							<td style="vertical-align:top; text-align:left;">
								<form method="post" action="frmNovoProduto_processa.php" enctype="multipart/form-data">
									<table>
										<tr>
											<td colspan="2">
												<b>:: Novo Produto ::</b>
											</td>
										</tr>
										<tr> 
											<td>
												Nome:											
											</td>
											<td>
												<input type="text" size="70" name="txtNome"/>
											</td>
										</tr>
										<tr> 
											<td>
												Foto:											
											</td>
											<td>
												<input type="file" size="30" name="txtArquivo"/>
											</td>
										</tr>
										<tr>
											<td colspan="2" align="right">
												<button type="reset" name="btnApagar">Apagar</button>
												<button type="submit" name="btnSalvar">Salvar</button>
											</td>
										</tr>
									</table>
								</form>
							</td>
						</tr>
					</table>					
				</td>
			</tr>
		</table>
	</body>
</html>