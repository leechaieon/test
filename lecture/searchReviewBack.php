<?php

            $sep = $_POST["sep"];    
		    $keyword = iconv("euc-kr","utf-8",$_POST["keyword"]);
            $conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
            if($sep=="lec_title"){
            $sql = "select * from project_1_review where lec_title like '%{$keyword}%'";
            $sql2 = "select * from project_1_review where lec_title like '%{$keyword}% limit $start, $list_num;";}
            else{$sql= "select * from project_1_review where user_id like '%{$keyword}%'";
            $sql2 = "select * from project_1_review where user_id like '%{$keyword}%' limit $start, $list_num;";}
            $result= mysqli_query($conn,$sql);
            $result2=mysqli_query($conn,$sql2);
			$cnt = mysqli_num_rows($result);
			$list_num = 20;
			
   if($cnt==0){
	   
	   echo"검색 결과가 없습니다."
;
		
				
		?>		
		<?php
			}else{
			
			while($row = mysqli_fetch_array($result)){
			$no = $row['no'];
			$writer = $row['user_id'];
			$lec_type = iconv("utf-8","euc-kr",$row['lec_type']);
			$lec_title = iconv("utf-8","euc-kr",$row['lec_title']);
			$title = iconv("utf-8","euc-kr",$row['title']);
			$content = iconv("utf-8","euc-kr",$row['content']);
			$star = $row['star'];
			$hit = $row['hit'];
			?>
			  <tr class="bbs-sbj">
					<td><?php echo "{$no}";?></td>
					<td><?php echo "{$lec_type}";?></td>
					<td>
					<a href="04_수강후기_상세.php?no='<?php echo "$no"?>'&lec_title=<?php echo "$lec_title"?>">
							<span class="tc-gray ellipsis_line">수강 강의명 :<?php echo "{$lec_title}";?></span>
							<strong class="ellipsis_line"><?php echo "{$title}";?></strong>
						</a>
					</td>
					<td>
						<span class="star-rating">
							<span class="star-inner" style="width:<?php echo "{$star}";?>%"></span>
						</span>
					</td>
					<td class="last"><?php echo "{$writer}";?></td>
				</tr> 

				
				
				<?php
				  }}
				?>