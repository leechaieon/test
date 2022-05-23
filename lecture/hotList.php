<?php
$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
$list_num = 20;
$hotsql = "select * from project_1_review order by hit desc limit 3";
$hotresult= mysqli_query($conn,$hotsql);

			   while($hotrow= mysqli_fetch_array($hotresult)){
				$hot_no = $hotrow['no'];
                $write=$hotrow['user_id'];
		        $length=strlen($write);
		        $hot_writer  = substr($write,0,$length-2)."**";
				
				$hot_lec_type = iconv("utf-8","euc-kr",$hotrow['lec_type']);
				$hot_lec_title = iconv("utf-8","euc-kr",$hotrow['lec_title']);
				$hot_title = iconv("utf-8","euc-kr",$hotrow['title']);
				$hot_content = iconv("utf-8","euc-kr",$hotrow['content']);
				$hot_star = $hotrow['star'];
				$hot_hit = $hotrow['hit'];  
			?>
			<tr class="bbs-sbj">
					<td><span class="txt-icon-line"><em>BEST</em></span></td>
					<td><?php echo "{$hot_lec_type}";?></td>
					<td>
					<a href="04_수강후기_상세.php?no='<?php echo "$hot_no"?>'&lec_title=<?php echo "$hot_lec_title"?>">
							<span class="tc-gray ellipsis_line">수강 강의명 | <?php echo "{$hot_lec_title}";?></span>
							<strong class="ellipsis_line"><?php echo "{$hot_title}";?></strong>
						</a>
					</td>
					<td>
						<span class="star-rating">
							<span class="star-inner" style="width:<?php echo "{$hot_star}";?>%"></span>
						</span>
					</td>
					<td class="last"><?php echo "{$hot_writer}";?></td>
				</tr>
				<?php
				  
				  
				}?>