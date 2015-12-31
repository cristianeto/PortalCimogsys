<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<style>
			header{
				height: 5em;
				display: flex;
				align-items: center;
				border-bottom: 1em solid #1a3047;
			}

			header img{
				height: 4em;	
			}

			h1{
				font-size: 1.3em;
				padding-top: .5em;
				padding-bottom: .5em;
			}

			main{
				padding: 1em;
				color: #1a3047;
			}

			main p{
				padding-left: 2em;
			}

			footer{
				padding: 1em .5em;
				background: #1a3047;
				color: #fff;
			}

			footer div img{
				height: 4em;
			}
			
			footer div span{
				padding: 0 !important;
				margin: 0 !important;
				width: 100%;
			}

		</style>
		<header>
			<a href="http://redconocimiento.cimogsys.com"><img src="{{ asset('img/logoREARC.png') }}" alt="Logo REAC"></a>
		</header>
		<main>
			<h1>
				Restablecer Contraseña
			</h1>
			<p>
				Si ha recibido este correo electrónico significa que se ha generado una petición para restablecer su contraseña.
			</p>
			<p>
				De no se el caso y ha recibido por error este correo, por favor no haga ninguna acción
			</p>
			<p>
				Si desea realmente restablecer su contraseña por pavor ingrese en este <a href="{{ URL::route('user/reset') . '?token=' . $token }}" title="Restablecer Contaseña">enlace</a>
			</p>
			<p>
				Este enlace Caducará en {{ Config::get('auth.reminder.expire', 1) }} minutos.
			</p>
			<p>
				Gracias,
			</p>
			<p>
				El equipo de la Red de Apoyo a la Redacción Científica
			</p>
		</main>
		<footer>
			<div>
				<img src="{{ asset('img/logoCimogsys.png') }}" alt="">
			</div>
			<div>
				<span>Dirección: Panamericana Sur Km 1 1/2 <br/>
				Telf: (593) 32998-200 Ext. 318 | Codigo Postal: EC06155 <br/>
				Terminos de Uso | Políticas de Privacidad | Acerca de | Créditos</span>
			</div>
		</footer>
	</body>
</html>
