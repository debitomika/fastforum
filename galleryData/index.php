<?php
/* @var $this DataController */

$this->breadcrumbs=array(
	'Data',
);
?>
<head>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery_galdata.js" type="text/javascript"></script>	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/galerifix.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fancybox.css?v=2.1.0" />
	<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery.fancybox.pack.js?v=2.1.0" type="text/javascript"></script>
	<script type="text/javascript">$(document).ready(function() {
				/*
				 *  Simple image gallery. Uses default settings
				 */
				
				$(".fancybox")
				.attr('rel', 'gallery')
				.fancybox({
				helpers : {
					title: {
					type: 'inside',
					position: 'bottom'
					}
				},
				beforeLoad: function() {
					var el, id = $(this.element).data('title-id');

					if (id) {
					el = $('#' + id);
            
                if (el.length) {
                    this.title = el.html();
                }
            }
        }
    });
			});
</script>

</head>
<h1> Data Gallery </h1>
<br/><br/>

<div id="wrapper">
	<form name="search" action="prosesgaleri.php" method="post">
	<table border="0" cellpadding="0" cellspacing="0"><tr>
			<td colspan ="3" align="left" valign="center"><p><b>Quick Search</b></p>
			<td colspan ="2" align="left" valign="center"><p><b>Keyword</b></p></td>
			</tr>
			<tr>
				<td><input type="text" name="what" size="50" id="searchtextfield" value="What? (topic, indicator)" 
				onfocus="if(this.value ==this.defaultValue) 
				{this.value='';}"
				onblur="if(this.value==''){this.value=this.defaultValue;}" /></td>
				<td rowspan = "2"><input type="submit" /></td>
				<td rowspan = "2" width="50px" ><p>OR</p></td>
				<td rowspan = "2"><input type="text" name="keyword" size="50" /></td>
				<td rowspan = "2" width="50px"><input type="submit" /></td>
			</tr>
			<tr>
				<td><input type="text" name="where" id="searchtextfield" size="50" value="Where? (province,city)"
				onfocus="if(this.value == this.defaultValue) 
				{this.value='';}" onblur="if(this.value==''){this.value=this.defaultValue;}" /></td>
			</tr>
	</table>
</div>

<?php
$con=mysqli_connect("localhost","root","","fast");
if(mysqli_connect_errno()){
echo "Failed to connect to MySQL :" .mysqli_connect_error();
}	
	$query2="SELECT * from data";
	$result2=mysqli_query($con,$query2) or die(mysqli_error());
	$no=1;
//proses menampilkan data
$TotalFiles=mysqli_num_rows($result2);

	$FilePerPage = 6;
	$PagesTotal = ceil($TotalFiles/$FilePerPage);

if(isset($_GET['page']) && is_numeric($_GET['page'])){
	$currentpage = (int) $_GET['page'];
}
else{
	$currentpage = 1;
}
if ($currentpage>$PagesTotal){
	$currentpage = $PagesTotal;
}
if($currentpage<1){
	$currentpage = 1;
}

$offset = ($currentpage - 1)* $FilePerPage;
$range =10;
if($currentpage > 1){
	echo"<a title = 'First' href='http://localhost/test/index.php?r=Data?page=1'>First </a>";
		$prevpage = $currentpage - 1;
		echo "<a title= 'Previous' href='http://localhost/test/index.php?r=Data?page=$prevpage'> <<</a>";
}

for ($i = ($currentpage - $range); $i<(($currentpage+$range)+1); $i++){
	if(($i>0)&&($i<=$PagesTotal)){
		if($i == $currentpage){
			echo "[<b>$i<b>]";
		}
		else{
			echo "<a href='http://localhost/test/index.php?r=Data?page=$i'> $i</a>";
		}
	}
}
if($currentpage !=  $PagesTotal){
	$nextpage = $currentpage +1;
	echo "<a title = 'Next' href='http://localhost/test/index.php?r=Data?page=$nextpage'> >></a>";
	echo "<a title = 'Last' href='http://localhost/test/index.php?r=Data?page=$PagesTotal'> Last</a>";
}

$start=($currentpage*6)-6;
$limit=($currentpage*6);
$query="SELECT * from data limit $start, $limit";

$result=mysqli_query($con,$query) or die(mysqli_error());

$jml_kolom=3;
 
$cnt = 0;
echo "<table border=0px cellpadding='5' width='900px'>
	<tr>";

while($rows=mysqli_fetch_array($result)){
	if ($cnt >= $jml_kolom)
      {
          echo "</tr><tr>";
          $cnt = 0;
    }
 
    $cnt++;
	echo '<td width="300px" valign="center">
		<a class="fancybox" data-title-id="title-1" href="'.Yii::app()->request->baseUrl. '/images/' .$rows['gambar'].'"';
	echo 'title="<h3><center>' .$rows['nama_data']. '</center></h3><p>' .$rows['deskripsi'].'</p>" >'; 
	echo '<br/><br/><center><img class="img-polaroid" src="'.Yii::app()->request->baseUrl. '/images/' .$rows['gambar'].'"';
	echo 'width="150" height="150" alt="" />';
	echo "<br/><br/><b>";
	//echo "<tr>aaas";
	echo $rows['nama_data'];
	echo "</center></a></td>";
}
echo "</tr></table>";

?>