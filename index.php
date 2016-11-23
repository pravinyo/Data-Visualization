<!DOCTYPE html>
<html>
	<head>
		<title>mysql ajax data visual</title>
		<style>
		
		.btn{
		background-color:blue;
		border:none;
		color:white;
		padding:5px;
		text-align:center;
		text-decoration:none;
		display:inline-block;
		font-size:16px;
		}
		</style>
	</head>
	<body>
		<div id="chart" style="width:400px;height:400px;"></div>
		<div id="newImage" class="btn">get Data</div>
		<script src="js/flotr2.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script>
		$(document).ready(function(){
		var data_x=[],data_y=[];
		$('#chart').html('');
		 $('#newImage').click(function(){
			loadData();
				Flotr.draw(document.getElementById("chart"),[data_y],{
				title:"User Ratings Category-wise",
				colors:["red"],
				bars:{
				show:true,
				barWidth:0.5,
				shadowSize:0.1,
				fillOpacity:0.8,
				lineWidth:0.2,
					},
				yaxis:{
				min:0,
				tickDecimals:0
				},
				xaxis:{
				ticks:data_x
				},
				/*grid: {
				horizontalLines: false,
				verticalLines: false,
				}*/
				});
	});
		 	 
		 
		 function loadData(){
			$.ajax({
			type:"POST",
			url:"server.php",
			datatype:"json",
			success:function(data)
					{
						console.log(data);
						putData(data);
					}
			});
			}
			
		function putData(data)
		{
			$image=data["image"];
			$votes=data["votes"];
			$rating=data["rating"];
			
			var i=0;
			for(i;i<$image.length;i++)
			{
				data_x.push([i,$image[i]]);
				data_y.push([i,parseInt($rating[i])]);
			}
		}
		});
		</script>
	</body>
</html>