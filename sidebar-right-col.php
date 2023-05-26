<div class="rightCol">
			
			<table class="standard-box table table-striped table-hover" id="ongoing-events">
					
					<tbody>
			
						<tr>
						<th colspan="4" style="width:180px">Ongoing Events</th>
					
						<th colspan="4"<i class="fa fa-star"></i></th>
						</tr>
					
					
					<?php  $countb = 0;
					
					$today = date('Ymd'); //define "today" format; note timezone offset of -6 hours
					$args = array(
							'post_type' => 'events',
							'post_status'  =>  'publish',
							'meta_key' => 'start_date',
							'orderby' => 'meta_value_num',
						
							'meta_query' => array(
							
									array(
									'key' => 'end_date',
									'value' => $today, //value of "order-date" custom field
									'compare' => '>=', //show events greater than or equal to today
									'type' => 'NUMERIC' ), array(
									'key' => 'start_date',
									'value' => $today, //value of "order-date" custom field
									'compare' => '<', //show events greater than or equal to today
									'type' => 'NUMERIC'
									)
									
												)
							
								);
					
					$the_query = new WP_Query( $args );
					
					
					if ( $the_query->have_posts()) : while ( $the_query->have_posts() && $countb<5 ) : $the_query->the_post(); { ?>
					
					<?php $date = get_post_meta( $post->ID, 'start_date', true ); ?>
					<?php $enddate = get_post_meta( $post->ID, 'end_date', true ); ?>
					
						<tr><td colspan="5" style="width:100%" >
						<div><a href="<?php echo get_permalink( $post_id );?>"><?php echo get_post_meta( $post->ID, 'event_name',true ); ?></a></div>
						
						<?php 
						$strStart = date("Y-m-d H:i:s");
						$strEnd = date( "l, jS F Y", strtotime( $enddate ) ); 
						
						$dteStart = new DateTime($strStart); 
						$dteEnd   = new DateTime($strEnd); 
						
						$dteDiff  = $dteStart->diff($dteEnd);
						
						?>
						
						<div class="end-text"><strong>Time left:</strong> <?php echo $dteDiff->format("%dd %hh %im");  ?></div>
						</td>
					
						</tr>
						
					 <?php } ?>
						
					<?php $countb++; endwhile; else: ?>
					<tr><th colspan="5" style="width:100%" >No ongoing events.</th>
						
						</tr>
					<?php endif; wp_reset_postdata();?>
					
				
					</tbody>
					
					</table>
					
			<div class="spacer"></div>
					
			<div class="widget-logo standard-box">
				<img src="http://www.uk-ctf.org/wp-content/uploads/2018/07/drag_logo2.png"></img>
			</div>
			
			<table class="table table-striped table-hover rightTable">
			<tbody>
			
			<tr>
				<td colspan="4"><div><strong>UK Team Rankings</strong></div><div class="end-text"><? echo date('F Y'); ?></div></td>
			</tr>
			</tbody>
			</table>
			
			
		
			
			<?php
			
			$file = "http://www.uk-ctf.org/uk_team_rankings_feb_2019";
			
			$json = file_get_contents($file);
			$json_decoded = json_decode($json);
				
			$val = 0;
			
			echo '<div class="col-box-con">';
			
			foreach($json_decoded as $result){
				 
				
				if ($val == 0) {
					echo    '<div class="col-box rank"><a href="/rankings/" class="rankNum leader">';
				} else {
					echo    '<div class="col-box rank"><a href="/rankings/" class="rankNum">';
				}
				
				$val++;
					
			echo $val;
			echo    '.';
			echo '</a><span class="rankTeam text-ellipsis">'.$result->Name.'</span>';
			echo		'<span class="rankPoints">'.$result->Points.'</span>';
			echo '</div>';	
			
			
				if ($val == 5) {
					echo	'</div>';
					break;  
					
				}
			}
			
			?>	
			<div class="spacer"></div>
			
			
			</div>
			
