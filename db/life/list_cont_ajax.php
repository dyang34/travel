<?php
$SYS_ROOT_DIR = substr($_SERVER['DOCUMENT_ROOT'], 0, strrpos(substr($_SERVER['DOCUMENT_ROOT'], 0, strlen($_SERVER['DOCUMENT_ROOT'])-1),'/',0));
require_once $SYS_ROOT_DIR."/travel/db/include/common.php";

$sql = "select count(*) total_cnt from free where secret='N' and content_type = '".$p_content_type."' ";
$result=mysql_query($sql, $conn_ulife);
$row=mysql_fetch_array($result);

$total_cnt = $row["total_cnt"];

$sql = "select @rnum:=@rnum+1 as rnum, r.* from ( "
        ."  select @rnum:=0, a.* "
        ."  from free a  "
        ."  INNER JOIN (  "
        ."      select no from free where secret='N' and content_type = '".$p_content_type."' order by no desc "
        ."      limit ".($p_page_num-1)*$p_page_size.", ".$p_page_size 
        ."  ) pg_idx  "
        ."  on a.no=pg_idx.no "
        ." ) r "
;

$result=mysql_query($sql, $conn_ulife);
while($row=mysql_fetch_array($result)) {
    $content = htmlspecialchars_decode($row["content"]);
    $content = get_content_from_html($content, "cls_list_summary");
    $content=fnFilterString_return(strip_tags($content));
    $content = strip_tags($content); 
    $title=stripslashes($row["title"]);
?>
<li>
    <div class="lists_item js-load">
        <a href="/travel/db/life/life_view.php?no=<?=$row[no]?>">
            <figure><img src="http://ulife.co.kr/board/free/photo480/<?=$row[file_name]?>?v=<?=time()?>" alt=""></figure>
            <h3><?=$title?></h3>
            <p><?=$content?></p>
        </a>
    </div>
</li>
<?php
}

$fg_more = "Y";
if(($p_page_num*$p_page_size) >= $total_cnt) {
    $fg_more = "N";
}
?>
<input type="hidden" name="hdnMoreCont" value="<?=$fg_more?>" />