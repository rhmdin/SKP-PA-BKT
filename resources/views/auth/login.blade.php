<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{ asset('/css/login.css') }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="icon" href="img/Logo_pa_bkt.png" type="image/icon type">
    <title>AKURIN PA BUKITTINGGI</title>
</head>
<body>
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form method="POST" action="{{ route('login') }}">
                @csrf
				<h1>Login</h1>
                <br>
				<div class="log-in-container" style="width: 100%;">
					<input id="email" placeholder="masukkan email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        {{ $message }}
                        </span>
                        @enderror
                </div>
				<div class="log-in-container" style="width: 100%;">
					<input id="password" placeholder="masukkan password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        {{ $message }}
                        </span>
                        @enderror<i class="fa-solid fa-eye" id="eye" style="
                        position: absolute;
                        top: 51%;
                        margin-left:-8%;
                        cursor: pointer;
                        color: rgb(150, 150, 150);"onclick="myFunction()"">
                    </i>
				</div>
				<a href="/indikator-kinerja">Lupa password?</a>
				<button style="cursor:pointer;">
                    <?php


					?> <a href="" style="color:white">MASUK</a>
                </button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<table>
						<tr>
							<th>
                                <img src="img/Logo_pa_bkt.png" alt="Logo PA Bukittinggi" style="height: 3cm;margin-top:-5mm;"/>
                            </th>
							<td>
                                <h1 style="font-weight: bold;">
                                    AKURIN
                                    <br>
                                    <p style="font-size:7pt; font-style:italic; margin-top:-0.25mm;">
                                        Aplikasi Pengukuran Kinerja Instansi
                                    </p>
                                    <p style="font-size:7pt; font-style:italic;margin-top:-9mm;">
                                        Pengadilan Agama Bukittinggi
                                    </p>
                                </h1>
                            </td>
						</tr>
					</table>

				</div>
			</div>
		</div>
	</div>


<script>
	const passwordInput = document.querySelector("#password")
const eye = document.querySelector("#eye")
eye.addEventListener("click", function(){
	this.classList.toggle("fa-eye-slash")
	const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
	passwordInput.setAttribute("type", type)
  })
</script>

</body>


</html>