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
            @if(isset(Auth::user()->nip))
            <script>window.location="/indikator-kinerja";</script>
           @endif
           <form method="POST" action="{{ url('/login/check') }}">
                @csrf
				<h1>Login</h1>
                <br>
				<div class="log-in-container" style="width: 100%;">
                    @if ($message = Session::get('error'))
                     <p style="text-align: start; color:red;font-size:8pt;margin-bottom:-3%; font-weight:300;">{{ $message }}</p>
                    @endif
                    @if ($message = Session::get('logout'))
                    <script>
                          alert("Berhasil Logout");
                        </script>
                     <p style="text-align: start; color:red;font-size:8pt;margin-bottom:-3%; font-weight:300;">{{ $message }}</p>
                    @endif
					<input id="nip" placeholder="masukkan nip" type="text" class="" name="nip"  required autocomplete="nip" autofocus>
                </div>
				<div class="log-in-container" style="width: 100%;">
					<input id="password" placeholder="masukkan password" type="password" class="" name="password" required autocomplete="current-password">


				</div>
				<div class="log-in-container" style="width: 100%;margin-top:-3%">
                    <input style="float:left; color:black; margin-left:-45%;" type="checkbox" class="fa-solid fa-eye" id="eye" name="password"  onclick="myFunction()">
                    <label style="font-size: 8pt;align-items:flex-start; margin-left:-95%;" for="password">
                        Tampilkan password
                    </label>
				</div>

				{{-- <a href="/indikator-kinerja">Lupa password?</a>--}}
				<input type="submit" name="login" style="cursor:pointer; background-color:black; color:white; width:50%; font-style:bold; border-radius: 8px; margin-top:10%" value="LOGIN">
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
