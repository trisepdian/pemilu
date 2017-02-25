<html>
	<!---<link rel="stylesheet" type="text/css" href={!! asset('css/style1.css') !!}>-->
	<link rel="stylesheet" type="text/css" href={!! asset('css/stylehome.css') !!}>
	<link rel="stylesheet" type="text/css" href={!! asset('css/style1.css') !!}>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<!--
<style>	
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #fff;
}

li {
    float: left;
}

li a {
    display: block;
    color: #57bc90;
    text-align: center;
    padding: 40px 80px;
    text-decoration: none;
}

li a:hover {
    background-color: #77c9d4;
	color: white;
}
</style>
	-->
	
	

<!--<body style='background-image:url({{asset("image/Pilkada-Serentak.jpg")}}); background-size:1400px 700px;'>-->

<body style='background-color: #fff;'>

<nav>    
<ul>    
	<li><a href="home.html">Home</a></li>
	<li><a href="about.html">Presentase</a></li> 
	<li><a href="help.html">Maps</a></li>
</ul> 
</nav>





<!--<div id="title"> PEMILU 2017</div>-->	
<div id="form-main">
  <div id="form-div">
	<form class="form" id="form1" method="post" action="{{URL::route('Send')}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<p class="name">
					<input type="text" name="tps" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="ID TPS" id="name"/><br>
				</p>
				<p class="name">
					<select name="kelamin" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input provinsi">
						<option value=""> -Provinsi- </option>
						@foreach($provinces as $province)
						<option value="{{ $province->wilayah_id }}">{{ $province->nama }}</option>
						@endforeach
					</select>
				</p>
				
				<p class="name">
					<select name="kelamin" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input kabupaten">
						<option value=""> -Kabupaten/Kota- </option>
					</select>
				</p>
				
				<p class="name">
					<select name="kelamin" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input kecamatan">
						<option value=""> -Kecamatan- </option>
					</select>
				</p>
				
				<p class="name">
					<select name="kelamin" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input desa">
						<option value=""> -Kelurahan/Desa- </option>
					</select>
				</p>
				
				
				

				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<p class="name">
					<input type="text" name="kd1" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Kandidat 1" id="name"/><br>
				</p>
				
				<p class="name">
					<input type="text" name="kd2" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Kandidat 2" id="name"/><br>
				</p>
				
				<p class="name">
					<input type="text" name="kd3" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Kandidat 3" id="name"/><br>
				</p>
				<!--<p class="text">
					<textarea name="message" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Message"></textarea><br><br>
				</p>-->
		<div class="submit">
        <input type="submit" name="submit" value="SEND" id="button-blue"/>
        <div class="ease"></div>
      </div>
    </form>
</div>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		$('.provinsi').change(function(){
			var id = $(this).val();
			var tingkat = '1';
			var to = '.kabupaten';

			if(id)
				getChild(id,tingkat,to);
			else
				$(to).append('<option value="">-Kelurahan/Desa-</option>');
		});
		$('.kabupaten').change(function(){
			var id = $(this).val();
			var tingkat = '2';
			var to = '.kecamatan';

			if(id)
				getChild(id,tingkat,to);
			else
				$(to).append('<option value="">-Kelurahan/Desa-</option>');
		});
		$('.kecamatan').change(function(){
			alert('kecamatan');
		});

		function getChild(id,tingkat,to){
			$.ajax({
				url : '{{ url("getChildWilayah") }}/'+id,
				type : 'GET',
				success : function(data){
					var result = getOption(JSON.parse(data),tingkat);
					$(to).html('');
					$(to).append(result);
					$(to).change();
				},
				error : function(a,b,c){}
			})
		}

		function getOption(data,tingkat){
			var txt = '<option value="">'+(tingkat==2?'-Kabupaten-':(tingkat==3?'-Kecamatan-':'-Kelurahan/Desa-'))+'</option>';
			
			$.each(data,function(i,v){
				txt += '<option value="'+v.wilayah_id+'">'+v.nama+'</option>';
			});

			return txt;
		}
	});
</script>

</html>







<!--<h2>{{URL::route('Send')}}</h1>

<h2>{$nama}</h2>-->