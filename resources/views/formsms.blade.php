<html>
	<!---<link rel="stylesheet" type="text/css" href={!! asset('css/style1.css') !!}>-->
	<link rel="stylesheet" type="text/css" href={!! asset('css/stylehome.css') !!}>
	<link rel="stylesheet" type="text/css" href={!! asset('css/style1.css') !!}>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	
<style>	
div.polaroid {
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
  border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
}
</style>
	
	
	

<body style='background-image:url({{asset("image/bg.jpg")}}); background-size:1350px 1000px;   height:150%;'>

<body style='background-color: #fff;'>

<nav>    
<ul>    
	<li><a href="home.html">Home</a></li>
	<li><a href="{{ url('formsms') }}">Presentase</a></li> 
	<li><a href="{{ url('../resources/views/welcome.blade.php') }}" >Maps</a></li>
</ul> 
</nav>





<!--<div id="title"> PEMILU 2017</div>-->	
<div id="form-main" >
  <div id="form-div">
	<form class="form" id="form1" method="post" action="{{URL::route('Send')}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<p class="name">
					<input type="text" name="tps" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="ID TPS" id="name" required/><br>
				</p>
				<p class="name">
					<select name="provinsi" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input provinsi">
						<option value=""> -Provinsi- </option>
						@foreach($provinces as $province)
						<option value="{{ $province->wilayah_id }}">{{ $province->nama }}</option>
						@endforeach
					</select>
				</p>
				
				<p class="name">
					<select name="kabupaten" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input kabupaten">
						<option value=""> -Kabupaten/Kota- </option>
					</select>
				</p>
				
				<p class="name">
					<select name="kecamatan" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input kecamatan">
						<option value=""> -Kecamatan- </option>
					</select>
				</p>
				
				<p class="name">
					<select name="desa" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input desa">
						<option value=""> -Kelurahan/Desa- </option>
					</select>
				</p>
				
				
				

				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<p class="name">
					<input type="text" name="kd1" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Polling kandidat 1" id="name"/><br>
				</p>
				
				<p class="name">
					<input type="text" name="kd2" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Polling kandidat 2" id="name"/><br>
				</p>
				
				<p class="name">
					<input type="text" name="kd3" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Polling kandidat 3" id="name"/><br>
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



<h2 style="padding-left: 650px">KANDIDAT</h2>

@foreach ($kandidat as $kandidat)

   <table border="0" style="padding-left: 650px">
		<tr>
			<td><div class="polaroid"><img height="200px" width="200px" src="{{ asset('image/'.$kandidat->img) }}" ></div></td>
			<td> {{ $kandidat->nama }}</td>
		</tr>

   </table>

  @endforeach

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
			var id = $(this).val();
			var tingkat = '3';
			var to = '.desa';

			if(id)
				getChild(id,tingkat,to);
			else
				$(to).append('<option value="">-Kelurahan/Desa-</option>');
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
			var txt = '<option value="">'+(tingkat==1?'-Kabupaten/Kota-':(tingkat==2?'-Kecamatan-':'-Kelurahan/Desa-'))+'</option>';
			
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