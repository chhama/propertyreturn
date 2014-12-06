<?php 
	
	$today=date('Y-m-d h:i:s');
	$firstday=date('Y-m-01 00:00:00');

	$total_ret=DB::table('property')
                 ->select('created_at',DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
                 ->groupBy('date')
                 ->whereBetween('created_at',array($firstday,$today))
                
                 ->get();

           // dd($total_ret);

?>

<script language="javascript">
	  $(document)
	        .ready(function() {

	        	
	            
				var data = {

				  // The label: php code generates the dates upto the current day
				  
				  	labels: [	<?php 
									for($i=1;$i<date('d');$i++)
										echo "'$i'".', ';
									echo "'$i'";

							 	?>
							 ],

				  // If there is interaction data for the particular date, the sum is entered, otherwise 0 
				  series: [
				  	{
				  		name: 'abb',
				  		<?php 
							$i=1;
							$wt=new stdClass;
							$wt->total = 0;
							$wt->date = date('Y-m-d'); 
						?>
						data: [@foreach($total_ret as $wt)
							<?php  
								while(substr($wt->date,8,2) > $i){
									echo '0,';
									$i++;
								}

							?>						
								{{$wt->total}}
								{{","}}

								<?php $i++; ?>		
							
							@endforeach
								{{$wt->total}}

							<?php 
								/* Fill up with 0 the remaining days after the last date of an existing interaction */
								$last=substr($wt->date,8,2);
								while($last < date('d'))
								{
									echo ",0";
									$last++;
								}
							 ?>
						]
					}
				  ]
				};
				var options = {
  
};

				// In the global name space Chartist we call the Line function to initialize a line chart
				// As a first parameter we pass in a selector where we would like to get our chart created
				// Second parameter is the actual data object
					Chartist.Line('.ct-chart', data,options);
					console.log(data);

					var $chart = $('.ct-chart');

var $toolTip = $chart
  .append('<div class="tooltip"></div>')
  .find('.tooltip')
  .hide();

$chart.on('mouseenter', '.ct-point', function() {
  var $point = $(this),
    value = $point.attr('ct:value'),
    seriesName = $point.parent().attr('ct:series-name');

  $point.animate({'stroke-width': '50px'}, 300, easeOutQuad);
  $toolTip.html(seriesName + '<br>' + value).show();
});

$chart.on('mouseleave', '.ct-point', function() {
  var $point = $(this);

  $point.animate({'stroke-width': '20px'}, 300, easeOutQuad);
  $toolTip.hide();
});

$chart.on('mousemove', function(event) {
  $toolTip.css({
    left: (event.offsetX || event.originalEvent.layerX) - $toolTip.width() / 2 - 10,
    top: (event.offsetY || event.originalEvent.layerY) - $toolTip.height() - 40
  });
});
			});


</script>








